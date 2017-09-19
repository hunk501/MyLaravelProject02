<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MdlPR;
use App\Models\MdlPolicy;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\MdlPolicyLedger;
use Illuminate\Support\Facades\Hash;

class PolicyReceipt extends Controller {
    
    function __construct() {
        //$this->middleware("auth");
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        
        //$records = DB::table('tbl_pr_account')->get();//MdlPR::where("bounce", 0)->get();
        $records = DB::table('tbl_pr')
        			->leftJoin('tbl_pr_account', 'tbl_pr.pr_account_id', '=', 'tbl_pr_account.pr_id')->get();
        //dd($records);
        return view("pr.lists_account")->with(['records'=>$records]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request) {    	    
    	if($request->session()->has('pr_allow_edit')) {
    		//$request->session()->forget('pr_allow_edit');
    		return view("pr.create");
    	} else {
    		return view("pr.login");
    	}
    	
    	/**
    	 * Clear Session
    	 * $request->session()->forget('key'); // Piece
    	 * $request->session()->flush(); // All
    	 */
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request) {
        
    	$inputs = Input::all();
    	
        $validator = Validator::make($inputs, $this->getRules());
        if($validator->fails()) {
            return redirect("pr/create")->withErrors($validator)->withInput($inputs);
        } else {
        	
            $pr_account_id = DB::table("tbl_pr_account")->insertGetId(array(
                'pr_id' => $inputs['pr_id'],
                'firstname' => $inputs['firstname'],
                'prepared_by' => $inputs['prepared_by'],
                'policy_no' => $inputs['policy_no'],
                'payment_in' => $inputs['payment_in'],
                'received_by' => $inputs['received_by'],
                'created_at' => date("Y-m-d h:i:s a", strtotime($inputs['cur_date'])),
                'updated_at' => date("Y-m-d h:i:s a", strtotime($inputs['cur_date'])),
                'remarks'   => $inputs['remarks'],
            	'payment_status' => $inputs['payment_status'],
            ));
			
            if(isset($inputs['uploaded_files']) && !empty($inputs['uploaded_files'])) {
            	$files = Input::file("uploaded_files");
            	foreach($files as $file) {
            		if(!empty($file))  {
            			
            			$ext = $file->getClientOriginalExtension();
            			$name = rand(1111, 9999)."".time().".".$ext;
            			// Upload
            			$file->move("./uploads", $name);
            		
            			// insert to table
            			$upload_id = DB::table("tbl_pr_uploaded_files")->insertGetId(array(
            					'pr_account_id' => $inputs['pr_id'],
            					'uploaded_file' => $name,
            					'created_at' => date('Y-m-d'),
            					'updated_at' => date('Y-m-d')
            			));
            		}
            	}
            }
            
            unset($inputs['_token']);
            unset($inputs['submit']);
            unset($inputs['firstname']);
            unset($inputs['middlename']);
            unset($inputs['lastname']);
            unset($inputs['policy_no']);
            unset($inputs['payment_in']);
            unset($inputs['payment_status']);
            unset($inputs['uploaded_files']); // Temp
            unset($inputs['remarks']);

            $inputs['pr_account_id'] = $inputs['pr_id'];
            MdlPR::create($inputs);
			
            Session::flash("success", "Record has been saved.");
            
            $request->session()->forget('pr_allow_edit');
            
            return redirect("pr");
        }               
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {        
        $total_amount = 0;
        $name = NULL;
        $arrAccount = array();
        $account = DB::table('tbl_pr_account')->where("id", $id)->first();           
        if($account != NULL) {
            $records = MdlPR::where(['pr_account_id'=>$account->pr_id])->get();
        
            foreach ($records as $record) {
            	if($record->bounce <= 0) {
            		$total_amount += $record->amount;
            	}               
            }
            if(!empty($account)) {
                $name = $account->firstname." ".$account->middlename." ".$account->lastname;
            }
			
            $arrAccount['prepared_by'] = $account->prepared_by;
            $arrAccount['received_by'] = $account->received_by;
            $arrAccount['payment_status'] = $account->payment_status;
            $arrAccount['policy_no'] = $account->policy_no;
            $arrAccount['remarks'] = $account->remarks;
            $arrAccount['premium'] = 0;
            
            // Get premium
            $policy = MdlPolicyLedger::where('policy_no', $account->policy_no)->first();
            if(!empty($policy)) {
            	$policy->toArray();
            	$arrAccount['premium'] = (!empty($policy['premium']) ? $policy['premium'] : 0);
            }
            //dd($arrAccount);
            return view("pr.lists")->with(['records'=>$records,'name'=>$name,'pr_account_id'=>$id,'total_amount'=>$total_amount, 'account'=>$arrAccount]);
        }       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        $pr_account_id = 0;
        $payment_status = null;
        $records = MdlPR::where("pr_id", $id)->first();              
        if($records != NULL) {
            $records->toArray();
            if(!empty($records['uploaded_file'])) {
                $tmp = $records['uploaded_file'];
                $records['uploaded_file_path'] = url()."/uploads/".$tmp;
            }
            if(!empty($records)) {
                $pr_account = DB::table("tbl_pr_account")->where("pr_id", $records['pr_account_id'])->first();                
                $pr_account_id = $pr_account->id;
                $payment_status = $pr_account->payment_status;
            }

            // Uploaded Files
            $uploaded = DB::table('tbl_pr_uploaded_files')->where('pr_account_id', $records->pr_account_id)->get();            
            $records->uploaded_files = $uploaded;
            $records->payment_status = $payment_status;
            
            //dd($records->toArray());
            return view("pr.edit")->with(["records"=>$records,'pr_account_id'=>$pr_account_id]);
        }       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        
        $inputs = Input::all(); 
        
        if(isset($inputs['uploaded_files']) && !empty($inputs['uploaded_files']) && !empty($inputs['pr_account_id'])) {
        	$files = Input::file("uploaded_files");
        	foreach($files as $file) {
        		if(!empty($file))  {
        			 
        			$ext = $file->getClientOriginalExtension();
        			$name = rand(1111, 9999)."".time().".".$ext;
        			// Upload
        			$file->move("./uploads", $name);
        			 
        			// insert to table
        			$upload_id = DB::table("tbl_pr_uploaded_files")->insertGetId(array(
        					'pr_account_id' => $inputs['pr_account_id'],
        					'uploaded_file' => $name,
        					'created_at' => date('Y-m-d'),
        					'updated_at' => date('Y-m-d')
        			));
        		}
        	}
        }
         
        // Is Bounce Cheque
        if(isset($inputs['bounce_cheque'])) {
        	$inputs['bounce'] = 1;
        	unset($inputs['bounce_cheque']);
        } else {        	
        	unset($inputs['update']);
        }
        
        unset($inputs['_token']);
        unset($inputs['_method']);
        unset($inputs['uploaded_files']);
        	
        // Payment Status
        if(isset($inputs['payment_status'])) {
        	DB::table('tbl_pr_account')->where('pr_id', $inputs['pr_account_id'])
        	->update(array('payment_status'=>$inputs['payment_status']));
        	unset($inputs['payment_status']);
        }
        
        MdlPR::where("pr_id", $id)->update($inputs);
        
        $pr_account = DB::table("tbl_pr_account")->where("pr_id", $inputs['pr_account_id'])->first();
        $pr_account_id = $pr_account->id;
        
        Session::flash("success", "Record has been updated.");
        return redirect("pr/".$pr_account_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        //
    }
    
    
    public function getBounceCheque() {
        $pr_account = array();
        $records = MdlPR::where("bounce", 1)->get();        
        if(!empty($records)) {
            foreach($records as $record) {                                
                $pr_account = DB::table("tbl_pr_account")->where("pr_id", $record->pr_account_id)->first();                
            }
        }        
        
        //$token = csrf_token()
        return view("pr.cheque_bounce")->with(['records'=>$records,'pr_account'=>$pr_account]);
    }
    
    public function addNewCheck($pr_account_id) {
        
        return view("pr.create2")->with(['pr_account_id'=>$pr_account_id]);
    }
    
    public function validateNewCheck($pr_account_id) {
        
        $inputs = Input::all(); 
        
        $validator = Validator::make($inputs, [
            'cur_date' => 'required',
            'bank' => 'required',
            'branch' => 'required',
            'check_no' => 'required',
            'amount' => 'required'                     
        ]);
        if($validator->fails()) {            
            return redirect('pr/addnewcheck/'.$pr_account_id)->withErrors($validator)->withInput();
        } else {
            if(!empty($pr_account_id)) {
                $pr_account = DB::table("tbl_pr_account")->where("id", $pr_account_id)->first();            
                $inputs['pr_account_id'] = (!empty($pr_account) ? $pr_account->pr_id : 0);
            }
            
            // Check Files
            if(isset($inputs['uploaded_file'])) {
                if(Input::file("uploaded_file")->isValid()) {                        
                    $ext  = Input::file("uploaded_file")->getClientOriginalExtension();            
                    $name = time().".".$ext;
                    // Upload            
                    Input::file("uploaded_file")->move("./uploads", $name);

                    $inputs['uploaded_file'] = $name;            
                }
            }            

            unset($inputs['_token']);
            unset($inputs['submit']);
            unset($inputs['uploaded_file']);

            MdlPR::create($inputs);
            Session::flash("success", "New Record has been added.");

            return redirect("pr/".$pr_account_id);
        }        
    }
    
    
    public function updateBounce() {
    	$inputs = Input::all();
    	
    	if(isset($inputs['pr_id'])) {
    		MdlPR::where('pr_id', $inputs['pr_id'])->update(
    			array('bounce' => 0, 'remarks' => $inputs['remarks'])		
    		);
    	}
    	
    	echo json_encode(array('status' => true));
    }
    
    public function login(Request $request) {
    	$inputs = Input::all();
    	
    	$password = $inputs['password'];    	
    	
    	$check = DB::table('users')->where('password', '=', md5($password))->first();
    	if(!empty($check)) {    		
    		
    		$request->session()->put('pr_allow_edit', md5($password));
    		//echo "<html><body><script type='text/javascript'>window.location = '". url('pr/create') ."'</script></body></html>";  		
    		//header('location: '. url('pr/create'));
    		return redirect('pr/create');
    	} else {
    		Session::flash('error', 'Invalid Password, please contact Administrator');
    		return redirect('pr/create');
    	}
    }
    
    private function getRules() {
        return [
            'pr_id' => 'required|unique:tbl_pr_account,pr_id',
            'firstname' => 'required',            
            'bank' => 'required',
            'branch' => 'required',
            'check_no' => 'required',
            'amount' => 'required',
            'payment_in' => 'required',
            'policy_no' => 'required|unique:tbl_pr_account,policy_no',
            'cur_date' => 'required'           
        ];
    }
}
