<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\MdlPolicy;
use App\Models\MdlPolicyLedger;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class Policy extends Controller {

    public function __construct() {
        //$this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
    	$records = MdlPolicyLedger::all();
        if(!empty($records)) {
            foreach($records as $key => $rec) {

                $tmp = (int) $rec->income;
                $records[$key]['income'] = $tmp;

                $tmp2 = (int) $rec->commission;
                $records[$key]['commission'] = $tmp2;

                // Policy
                $policy = $rec->getPolicy()->first();
                if(!empty($policy)) {
                    $policy->toArray();
                    $records[$key]['policy_id'] = $policy['id'];
                }

                // PR
                if(!empty($rec->pr_no)) {
                    $pr_account = DB::table("tbl_pr_account")->where("pr_id", $rec->pr_no)->first();                
                    if(!empty($pr_account)) {
                        $pr_account_id = $pr_account->id; 
                        if(!empty($pr_account_id)) {                        
                            $records[$key]['pr_no_url'] = url('pr/'. $pr_account_id);
                        }
                    }                   
                }
                
                // CV
                $cv = DB::table("tbl_check_voucher")->where("ledger_id", $rec->id)->get();
                $records[$key]['cv_no'] = (!empty($cv)) ? $cv : "";
                
                // Endorsement
                $endorsement = DB::table("tbl_endorsement")->where("ledger_id", $rec->id)->get();
                $records[$key]['endorsement'] = (!empty($endorsement)) ? $endorsement : "";
                
                // TPL
                $tpl = DB::table("tbl_tpl")->where("ledger_id", $rec->id)->get();
                $records[$key]['tpl'] = (!empty($tpl)) ? $tpl : "";
            }
        }
        
        return view('account.lists')->with(['records' => $records]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        return view('account.demo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {

        $input = Input::all();
        $validator = Validator::make($input, $this->getRules());               
        
        if ($validator->fails()) {
            Session::flash("error", "Please check error below");
            return redirect('policy/create')->withErrors($validator)->withInput();
        } else {

            unset($input['_token']);
            unset($input['submit']);
            
            
            
            $this->formUpload("cv_uploaded_files", "cv_no", $ledger_id, $table_name, $input);
            
            // Upload Files
            if(isset($input['uploaded_files']) && !empty($input['uploaded_files'])) {
                $files = Input::file("uploaded_files");
                foreach($files as $file) {                
                    if(!empty($file))  {
                        $ext = $file->getClientOriginalExtension();
                        $name = $input['policy_no']."_".rand(1111, 9999)."".time().".".$ext;
                        // Upload
                        $file->move("./uploads", $name);

                        // insert to table
                        $upload_id = DB::table("tbl_policy_upload")->insertGetId(array(
                            'policy_id' => $input['policy_no'],
                            'uploaded_file' => $name,
                            'created_at' => date('Y-m-d'),
                            'updated_at' => date('Y-m-d')
                        ));
                    }
                }
                unset($input['uploaded_files']);
            }
        
            //$input['inception_date_from'] = date('Y-m-d', strtotime($input['inception_date']));
            //$input['inception_date_to'] = date('Y-m-d', strtotime("+1 year", strtotime($input['inception_date'])));
            unset($input['inception_date']);

            //MdlPolicy::create($input);                        
            MdlPolicyLedger::create($input);
            
            dd($input);
            Session::flash("success", "Success Message");
            return redirect("policy");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        $records = MdlPolicyLedger::where("id", $id)->first();
        
        if (!empty($records)) {
        	        	
        	$tmp = (int) $records->income;
        	$records->income = $tmp;
        	
        	$tmp2 = (int) $records->commission;
        	$records->commission = $tmp2;
        	
        	// Policy
        	$policy = $records->getPolicy()->first();
        	if(!empty($policy)) {
        		$policy->toArray();
        		$records->policy_id = $policy['id'];
        	}
        	
        	// PR
        	if(!empty($records->pr_no)) {
        		$arrPr = array();
        		$pr_account = DB::table("tbl_pr_account")->where("pr_id", $records->pr_no)->first();   
        		
        		if(!empty($pr_account)) {
        			$pr = DB::table("tbl_pr")->where('pr_account_id', $pr_account->pr_id)->where('bounce', 0)->get();
        			
        			/*
        			 * 
        			*/
        			$arrPr['pr_no'] = $records->pr_no;
        			$prepared_by = null;
        			$received_by = null;        			
        			$total_amount = 0;
        			foreach($pr as $p) {
        				$total_amount += (int)$p->amount;
        				if(!empty($p->prepared_by)) {
        					$prepared_by = $p->prepared_by;
        				}
        				if(!empty($p->received_by)) {
        					$received_by = $p->received_by;
        				}
        			}
        			$arrPr['total_amount'] = $total_amount;
        			$arrPr['prepared_by'] = $prepared_by;
        			$arrPr['received_by'] = $received_by;
        			$arrPr['payment_status'] = $pr_account->payment_status;
        			$pr_account_id = $pr_account->id;
        			if(!empty($pr_account_id)) {
        				$records->pr_no_url = url('pr/'. $pr_account_id);
        				$arrPr['url'] = url('pr/'. $pr_account_id);
        			}
        		}
        		$records->pr_no = $arrPr;
        	}
        	
        	// CV
        	$cv = DB::table("tbl_check_voucher")->where("ledger_id", $records->id)->get();
        	$records->cv_no = (!empty($cv)) ? $cv : "";
        	
        	// Endorsement
        	$endorsement = DB::table("tbl_endorsement")->where("ledger_id", $records->id)->get();
        	$records->endorsement = (!empty($endorsement)) ? $endorsement : "";
        	
        	// TPL
        	$tpl = DB::table("tbl_tpl")->where("ledger_id", $records->id)->get();
        	$records->tpl = (!empty($tpl)) ? $tpl : "";  
        	
        	// PLC
        	$plc = DB::table("tbl_policy_upload")->where('policy_id', $records->policy_no)->get();
        	$records->plc = (!empty($plc)) ? $plc : "";
                    	        
        	//dd($records->toArray());
            return view("account.show")->with(['record'=>$records->toArray()]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        $results = MdlPolicy::findOrFail($id)->toArray();

        return view('account.policy_edit')->with([ 'records' => $results]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {

        $input = Input::all();
        $rules = $this->getRules();
        $rules['policy_no'] = 'required';
        
        $validator = Validator::make($input, $rules);
        if($validator->fails()) {
            return redirect('policy/'.$id)->withErrors($validator)->withInput();
        } else {
            unset($input['_method']);
            unset($input['_token']);
            unset($input['submit']);
            
            // Upload Files
            if(isset($input['uploaded_files']) && !empty($input['uploaded_files'])) {
                $files = Input::file("uploaded_files");
                foreach($files as $file) {                
                    if(!empty($file))  {
                        $ext = $file->getClientOriginalExtension();
                        $name = $input['policy_no']."_".rand(1111, 9999)."".time().".".$ext;
                        // Upload
                        $file->move("./uploads", $name);

                        // insert to table
                        $upload_id = DB::table("tbl_policy_upload")->insertGetId(array(
                            'policy_id' => $input['policy_no'],
                            'uploaded_file' => $name,
                            'created_at' => date('Y-m-d'),
                            'updated_at' => date('Y-m-d')
                        ));
                    }
                }
                unset($input['uploaded_files']);
            }
            
            $input['inception_date_from'] = date('Y-m-d', strtotime($input['inception_date']));
            $input['inception_date_to'] = date('Y-m-d', strtotime("+1 year", strtotime($input['inception_date'])));
            unset($input['inception_date']);
            
            MdlPolicy::where('id', $id)->update($input);
        }
        
        Session::flash("success", "Record has been updated.");
        return redirect("policy");
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

    private function getRules() {
        return [
            'date_issue' => 'required',
            'policy_no' => 'required|unique:tbl_policy,policy_no',                        
            'assured_name' => 'required',            
            'inception_date_from' => 'required',
            'inception_date_to' => 'required'
        ];
    }
    
    private function uploadFile($field_name) {
        $filename = null;
        if(!empty($field_name)) {
            if(Input::file($field_name)->isValid()) {
                $ext = Input::file($field_name)->getClientOriginalExtension();
                $name = $field_name."_".rand(1111, 9999)."".time().".".$ext;
                // Upload
                Input::file($field_name)->move("./uploads", $name);
                
                $filename = $name;
            }
        }
        
        return $filename;
    }
    
    private function formUpload($field_name, $field_no, $ledger_id, $table_name, $input) {
    	
    	if(isset($input[$field_name]) && isset($input[$field_no])) {
   			
    		$fields = $input[$field_no];
    		$files = Input::file($field_name);
    		foreach($files as $key => $file) {
    			if(!empty($file))  {
    				$ext = $file->getClientOriginalExtension();
    				$name = "end_".$fields[$key]."_".rand(1111, 9999)."".time().".".$ext;
    				// Upload
    				$file->move("./uploads", $name);
    		
    				// insert to table
    				$upload_id = DB::table($table_name)->insertGetId(array(
    						'end_no' => $fields[$key],
    						'ledger_id' => $ledger_id,
    						'uploaded_file' => $name,
    						'created_at' => date('Y-m-d'),
    						'updated_at' => date('Y-m-d')
    				));
    			}
    		}		
    	}    	
    }
    
    private function getRecords($data = array()) {
    	$check = null;
    	
    	if(isset($data['banks'])) {
    		if($data['value'] == 1) {    			
    			$check = DB::table('tbl_policy_ledger')->where("banks_file", "!=", "")->get();
    		} else {    			
    			$check = DB::table('tbl_policy_ledger')->where("banks_file", "=", "")->get();
    		}    	
    	} else {
    		if($data['cols'] == 'pr_no') {
    			$check = MdlPolicyLedger::where($data['cols'], '=', $data['value'])->get();
    		} else {
    			$check = MdlPolicyLedger::where($data['cols'], 'LIKE', '%'.$data['value'].'%')->get();
    		}    	
    	}
    	
    	return $check;
    }
    
    private function getCV($data = array()) {
    	$check = DB::table('tbl_check_voucher')
    	->join('tbl_policy_ledger', 'tbl_check_voucher.ledger_id', '=', 'tbl_policy_ledger.id')
    	->select('tbl_policy_ledger.*')
    	->where('tbl_check_voucher.cv_no', 'LIKE', '%'.$data['value'].'%')
    	->get();
    	//dd($check);
    	return $check;
    }
    private function getEndorsement($data = array()) {
    	$check = DB::table('tbl_endorsement')
    	->join('tbl_policy_ledger', 'tbl_endorsement.ledger_id', '=', 'tbl_policy_ledger.id')
    	->select('tbl_policy_ledger.*')
    	->where('tbl_endorsement.end_no', 'LIKE', '%'.$data['value'].'%')
    	->get();
    	//dd($check);
    	return $check;
    }
    private function getPRPaymentStatus($data = array()) {    	
    	$arrPrNo = array();
    	//  Get PR Details
   		$check = DB::table('tbl_pr_account')->where('payment_status', 'LIKE', '%'.$data['value'].'%')->get();   	   		
   		if(!empty($check)) {
   			foreach($check as $res) {
   				$arrPrNo[] = $res->pr_id;
   			}
   		}
   		
   		// Get Policy Details
   		if(!empty($arrPrNo)) {
   			$check = MdlPolicyLedger::whereIn('pr_no', $arrPrNo)->get();
   		}
   		
   		return $check;
    }
    
    public function search() {
    	$inputs = Input::all();
    
    	//dd($inputs);
    	$records = NULL;
    	switch ($inputs['search_name']) {
    		case "policy_no" :
    			$records = $this->getRecords(array('cols'=>'policy_no','value'=>$inputs['search_value']));
    			break;
    		case "assured_name" :
    			$records = $this->getRecords(array('cols'=>'assured_name','value'=>$inputs['search_value']));
    			break;
    		case "contact_no" :
    			$records = $this->getRecords(array('cols'=>'contact_no','value'=>$inputs['search_value']));
    			break;
    		case "address" :
    			$records = $this->getRecords(array('cols'=>'address','value'=>$inputs['search_value']));
    			break;
    		case "agent" :
    			$records = $this->getRecords(array('cols'=>'agent','value'=>$inputs['search_value']));
    			break;
    		case "pr_no" :
    			$records = $this->getRecords(array('cols'=>'pr_no','value'=>$inputs['search_value']));
    			break;
    		case "remarks" :
    			$records = $this->getRecords(array('cols'=>'remarks','value'=>$inputs['search_value']));
    			break;
    		case "cv_no" :
    			$records = $this->getCV(array('cols'=>'remarks','value'=>$inputs['search_value']));
    			break;
    		case "endorsement_no" :
    			$records = $this->getEndorsement(array('cols'=>'remarks','value'=>$inputs['search_value']));
    			break;
    		case "bank" :
    			$txt = null;    		
    			$records = $this->getRecords(array('cols'=>'banks_file','value'=>$inputs['search_value'],'banks'=>true));
    			if($inputs['search_value'] == 1) {
    				$inputs['search_value'] = "Yes, Submitted";
    			} else {
    				$inputs['search_value'] = "No";
    			}    			
    			break;
    		case "pr_status_payment" :
    			if($inputs['search_value'] == 'unpaid') {
    				$records = $this->getRecords(array('cols'=>'pr_no','value'=>''));
    			} else {
    				$records = $this->getPRPaymentStatus(array('cols'=>'remarks','value'=>$inputs['search_value']));
    			}
    			break;
    	}
    	
    	if(!empty($records)) {
    		foreach($records as $key => $rec) {
    
    			$tmp = (int) $rec->income;
    			$records[$key]->income = $tmp;
    
    			$tmp2 = (int) $rec->commission;
    			$records[$key]->commission = $tmp2;
    
    			// PR
    			if(!empty($rec->pr_no)) {
    				$pr_account = DB::table("tbl_pr_account")->where("pr_id", $rec->pr_no)->first();
    				if(!empty($pr_account)) {
    					$pr_account_id = $pr_account->id;
    					if(!empty($pr_account_id)) {
    						$records[$key]->pr_no_url = url('pr/'. $pr_account_id);
    					}
    				}
    			}
    
    			// CV
    			$cv = DB::table("tbl_check_voucher")->where("ledger_id", $rec->id)->get();
    			$records[$key]->cv_no = (!empty($cv)) ? $cv : "";
    
    			// Endorsement
    			$endorsement = DB::table("tbl_endorsement")->where("ledger_id", $rec->id)->get();
    			$records[$key]->endorsement = (!empty($endorsement)) ? $endorsement : "";
    
    			/*
    			 // TPL
    			 $tpl = DB::table("tbl_tpl")->where("ledger_id", $rec->id)->get();
    			 $records[$key]['tpl'] = (!empty($tpl)) ? $tpl : "";
    			 */
    		}
    	}
    
    	$output['search_name'] = $inputs['search_name'];
    	$output['search_value'] = $inputs['search_value'];
    	$output['records'] = $records;
    	//dd($output);
    	return view("account.search")->with($output);
    }
    
}
