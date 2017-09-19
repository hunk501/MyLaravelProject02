<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MdlPolicyLedger;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class PolicyLedger extends Controller {
	
	private $code = "CIS";
	
    public function __construct() {
        //$this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $records = MdlPolicyLedger::where('id', '>=', 1)->orderBy('date_issue', 'desc')->get();
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
		//dd($records);        
        return view('policy_ledger.lists')->with(['records'=>$records]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        return view('policy_ledger.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        $inputs = Input::all();
        //dd($inputs);
        unset($inputs['optionsRadios']);
        $validator = Validator::make($inputs, $this->getRules());
        if($validator->fails()) {
        	Session::flash('error', 'Please check error below');
            return redirect('policy/create')->withErrors($validator)->withInput();
        } else {
            unset($inputs['_token']);
            unset($inputs['submit']);            

            if(Input::hasFile("banks_file")){
                $file = Input::file("banks_file");
                if(!empty($file))  {
                    $ext = $file->getClientOriginalExtension();
                    $name = "banks_file_".rand(1111, 9999)."".time().".".$ext;
                    // Upload
                    $file->move("./uploads", $name);                  
                    
                    $inputs['banks_file'] = $name;
                }                               
            }            
            
            //$inputs['inception_date_from'] = date("Y-m-d", strtotime($inputs['inception_date']));
            //$inputs['inception_date_to'] = date("Y-m-d", strtotime("+1 year", strtotime($inputs['inception_date'])));                      
            
            // Check Voucher
            $cv_no = $inputs['cv_no'];
            $myfiles["cv_uploaded_files"] = $inputs['cv_uploaded_files'];
            
            // Endorsement
            $end_no = $inputs["end_no"];
            $endorsement_files["end_uploaded_files"] = $inputs['end_uploaded_files'];
            
            // TPL
            $tpl_no = $inputs["tpl_no"];
            $tpl_files["tpl_uploaded_files"] = $inputs['tpl_uploaded_files'];
            
            // Policy
            //$plc_no = $inputs["plc_no"];
            $plc_files["plc_uploaded_files"] = $inputs['plc_uploaded_files'];
            
            unset($inputs['inception_date']);
            unset($inputs['cv_no']);
            unset($inputs['cv_uploaded_files']);
            unset($inputs['end_no']);
            unset($inputs['end_uploaded_files']);
            unset($inputs['tpl_no']);
            unset($inputs['tpl_uploaded_files']);
            
            //unset($inputs['plc_no']);
            unset($inputs['plc_uploaded_files']);
            
            $ledger_id = DB::table("tbl_policy_ledger")->insertGetId($inputs);
            if(!empty($ledger_id)) {
                
                // Upload Files
                if(!empty($myfiles)) {                                       
                    $files = Input::file("cv_uploaded_files");
                    foreach($files as $key => $file) {                
                        if(!empty($file))  {
                            $ext = $file->getClientOriginalExtension();
                            $name = "cv_".$cv_no[$key]."_".rand(1111, 9999)."".time().".".$ext;
                            // Upload
                            $file->move("./uploads", $name);

                            // insert to table
                            $upload_id = DB::table("tbl_check_voucher")->insertGetId(array(
                                'cv_no' => $cv_no[$key],
                                'ledger_id' => $ledger_id,
                                'uploaded_file' => $name,
                                'created_at' => date('Y-m-d'),
                                'updated_at' => date('Y-m-d')
                            ));
                        }
                    }
                }
                // Upload Files Endorsement
                if(!empty($endorsement_files)) {                                       
                    $files = Input::file("end_uploaded_files");
                    foreach($files as $key => $file) {                
                        if(!empty($file))  {
                            $ext = $file->getClientOriginalExtension();
                            $name = "end_".$end_no[$key]."_".rand(1111, 9999)."".time().".".$ext;
                            // Upload
                            $file->move("./uploads", $name);

                            // insert to table
                            $upload_id = DB::table("tbl_endorsement")->insertGetId(array(
                                'end_no' => $end_no[$key],
                                'ledger_id' => $ledger_id,
                                'uploaded_file' => $name,
                                'created_at' => date('Y-m-d'),
                                'updated_at' => date('Y-m-d')
                            ));
                        }
                    }
                }
                // Upload Files TPL
                if(!empty($tpl_files)) {                                       
                    $files = Input::file("tpl_uploaded_files");
                    foreach($files as $key => $file) {                
                        if(!empty($file))  {
                            $ext = $file->getClientOriginalExtension();
                            $name = "end_".$tpl_no[$key]."_".rand(1111, 9999)."".time().".".$ext;
                            // Upload
                            $file->move("./uploads", $name);

                            // insert to table
                            $upload_id = DB::table("tbl_tpl")->insertGetId(array(
                                'tpl_no' => $tpl_no[$key],
                                'ledger_id' => $ledger_id,
                                'uploaded_file' => $name,
                                'created_at' => date('Y-m-d'),
                                'updated_at' => date('Y-m-d')
                            ));
                        }
                    }
                }
                
                // Upload Files PLC               
                if(!empty($plc_files)) {
                	$files = Input::file("plc_uploaded_files");
                	foreach($files as $key => $file) {
                		if(!empty($file))  {
                			$ext = $file->getClientOriginalExtension();
                			$name = "plc_".$inputs['policy_no']."_".rand(1111, 9999)."".time().".".$ext;
                			// Upload
                			$file->move("./uploads", $name);
                			
                			// insert to table
                			$upload_id = DB::table("tbl_policy_upload")->insertGetId(array(
                					'policy_id' => $inputs['policy_no'],
                					'uploaded_file' => $name,
                					'created_at' => date('Y-m-d'),
                					'updated_at' => date('Y-m-d')
                			));
                		}
                	}
                }
                
                $ledger_tmp_id = "CIS-".date('Y')."-".$ledger_id;
                DB::table('tbl_policy_ledger')->where('id', $ledger_id)->update(array('ledger_id'=>$ledger_tmp_id));
            } else {
                die("Unable to Save Policy Ledger");
            }
            
            Session::flash('success', 'Records has been created');            
            return redirect('policy');
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
    		 
    		//dd($records->toArray());
    		return view("policy_ledger.show")->with(['record'=>$records->toArray()]);
    	}
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        
        $record = MdlPolicyLedger::where("id", $id)->first();
        if(!empty($record)) {
            //dd($record);
            // CV
            $cv = DB::table("tbl_check_voucher")->where("ledger_id", $record->id)->get();
            $record['cv_no'] = (!empty($cv)) ? $cv : "";
            //dd($record->toArray());
            return view('account.policy_edit')->with(['record'=>$record->toArray(),'id'=>$id]);
        }       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        
    	$policy_no_temp = 0;
        $inputs = Input::all();
        unset($inputs['optionsRadios']);
        $rules = $this->getRules();
        $policy_no_temp = $inputs['policy_no'];
        unset($rules['policy_no']);  
       	
        //dd($inputs);
       	 
        $validator = Validator::make($inputs, $rules);
        if($validator->fails()) {
            return redirect('policy_ledger/'.$id.'/edit')->withErrors($validator)->withInput();
        } else {
            unset($inputs['_method']);
            unset($inputs['_token']);
            unset($inputs['submit']);
			
            if(Input::hasFile("banks_file")){
            	$file = Input::file("banks_file");
            	if(!empty($file))  {
            		$ext = $file->getClientOriginalExtension();
            		$name = "banks_file_".rand(1111, 9999)."".time().".".$ext;
            		// Upload
            		$file->move("./uploads", $name);
            
            		$inputs['banks_file'] = $name;
            	}
            }
            
            //$inputs['inception_date_from'] = date("Y-m-d", strtotime($inputs['inception_date']));
            //$inputs['inception_date_to'] = date("Y-m-d", strtotime("+1 year", strtotime($inputs['inception_date'])));                       
            
            // Check Voucher
            $cv_no = $inputs['cv_no'];
            $myfiles["cv_uploaded_files"] = $inputs['cv_uploaded_files'];
            
            // Endorsement
            $end_no = $inputs["end_no"];
            $endorsement_files["end_uploaded_files"] = $inputs['end_uploaded_files'];
            
            // TPL
            $tpl_no = $inputs["tpl_no"];
            $tpl_files["tpl_uploaded_files"] = $inputs['tpl_uploaded_files'];
            
            // PLC            
            $plc_files["plc_uploaded_files"] = $inputs['plc_uploaded_files'];
            
            unset($inputs['inception_date']);
            unset($inputs['cv_no']);
            unset($inputs['cv_uploaded_files']);
            unset($inputs['end_no']);
            unset($inputs['end_uploaded_files']);
            unset($inputs['tpl_no']);
            unset($inputs['tpl_uploaded_files']);
            unset($inputs['plc_uploaded_files']);
            
            // Upload Files CV
            if(!empty($myfiles)) {
            	$files = Input::file("cv_uploaded_files");
            	foreach($files as $key => $file) {
            		if(!empty($file))  {
            			$ext = $file->getClientOriginalExtension();
            			$name = "cv_".$cv_no[$key]."_".rand(1111, 9999)."".time().".".$ext;
            			// Upload
            			$file->move("./uploads", $name);
            
            			// insert to table
            			$upload_id = DB::table("tbl_check_voucher")->insertGetId(array(
            					'cv_no' => $cv_no[$key],
            					'ledger_id' => $id,
            					'uploaded_file' => $name,
            					'created_at' => date('Y-m-d'),
            					'updated_at' => date('Y-m-d')
            			));
            		}
            	}
            }
            // Upload Files Endorsement
            if(!empty($endorsement_files)) {
            	$files = Input::file("end_uploaded_files");
            	foreach($files as $key => $file) {
            		if(!empty($file))  {
            			$ext = $file->getClientOriginalExtension();
            			$name = "end_".$end_no[$key]."_".rand(1111, 9999)."".time().".".$ext;
            			// Upload
            			$file->move("./uploads", $name);
            
            			// insert to table
            			$upload_id = DB::table("tbl_endorsement")->insertGetId(array(
            					'end_no' => $end_no[$key],
            					'ledger_id' => $id,
            					'uploaded_file' => $name,
            					'created_at' => date('Y-m-d'),
            					'updated_at' => date('Y-m-d')
            			));
            		}
            	}
            }
            // Upload Files TPL
            if(!empty($tpl_files)) {
            	$files = Input::file("tpl_uploaded_files");
            	foreach($files as $key => $file) {
            		if(!empty($file))  {
            			$ext = $file->getClientOriginalExtension();
            			$name = "end_".$tpl_no[$key]."_".rand(1111, 9999)."".time().".".$ext;
            			// Upload
            			$file->move("./uploads", $name);
            
            			// insert to table
            			$upload_id = DB::table("tbl_tpl")->insertGetId(array(
            					'tpl_no' => $tpl_no[$key],
            					'ledger_id' => $id,
            					'uploaded_file' => $name,
            					'created_at' => date('Y-m-d'),
            					'updated_at' => date('Y-m-d')
            			));
            		}
            	}
            }
            
            // Upload Files PLC
            if(!empty($plc_files)) {
            	$files = Input::file("plc_uploaded_files");
            	foreach($files as $key => $file) {
            		if(!empty($file))  {
            			$ext = $file->getClientOriginalExtension();
            			$name = "end_".$policy_no_temp."_".rand(1111, 9999)."".time().".".$ext;
            			// Upload
            			$file->move("./uploads", $name);
            
            			// insert to table
                			$upload_id = DB::table("tbl_policy_upload")->insertGetId(array(
                					'policy_id' => $policy_no_temp,
                					'uploaded_file' => $name,
                					'created_at' => date('Y-m-d'),
                					'updated_at' => date('Y-m-d')
                			));
            		}
            	}
            }
            
            MdlPolicyLedger::where('id', $id)->update($inputs);
            
            Session::flash('success', 'Record has been updated');
            return redirect('policy');
        }
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
            'assured_name' => 'required',                       
            'policy_no' => 'required|unique:tbl_policy_ledger,policy_no',                   
            'inception_date_from' => 'required',
            'inception_date_to' => 'required'
        ];
    }
    
    private function getRecords($data = array()) {
        
    	if(isset($data['inception_date_from']) && isset($data['inception_date_to'])) {    		
    		$check = MdlPolicyLedger::where('inception_date_from','>=',$data['inception_date_from'])->where('inception_date_from','<=',$data['inception_date_to'])->get();    		
    	} else {    		
    		$check = MdlPolicyLedger::where($data['cols'], 'LIKE', '%'.$data['value'].'%')->get();
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
    
    public function search() {
        $inputs = Input::all();              
        
        $records = $this->getRecords($inputs);
        
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
                
        $output['inception_date_from'] = $inputs['inception_date_from'];
        $output['inception_date_to'] = $inputs['inception_date_to'];
        $output['records'] = $records;
        
        $output['url'] = url() ."/policy_ledger/report/print?start=". urlencode($inputs['inception_date_from']) ."&end=". urlencode($inputs['inception_date_to']);
        
        return view("policy_ledger.search")->with($output);
    }
    
    public function report() {
    	$inputs = Input::all();
    	
    	if(isset($inputs['start']) && isset($inputs['end'])) {
    		$check = MdlPolicyLedger::where('inception_date_from','>=',$inputs['start'])->
    			where('inception_date_from','<=',$inputs['end'])->orderBy('date_issue', 'desc')->get();
    		
    	} else {
    		$check = MdlPolicyLedger::where('id', '>', 0)->orderBy('date_issue', 'desc')->get();    		
    	}    	
    	
    	foreach($check as $key => $rec) {
    		// CV
    		$cv = DB::table("tbl_check_voucher")->where("ledger_id", $rec->id)->get();
    		$check[$key]['cv'] = $cv;
    	}
    	
    	//dd($check->toArray());
    	return view("policy_ledger.report")->with(['records' => $check->toArray(),'inputs'=>$inputs]);
    }
    
}
