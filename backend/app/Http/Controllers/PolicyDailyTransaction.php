<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MdlPolicyLedger;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class PolicyDailyTransaction extends Controller {

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
        //dd($records);
        return view('policy_daily_transaction.lists')->with(['records'=>$records]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        $record = MdlPolicyLedger::where('id', $id)->first();
        if(!empty($record)) { 
        	
        	//dd($record->toArray());
        	$record->toArray();
        	$receiving_copy = DB::table("tbl_receiving_copy")->where('ledger_id', $record['id'])->get();        	
        	$record['receiving_copy'] = $receiving_copy;
        	        	
            return view('policy_daily_transaction.edit')->with(['id'=>$id,'record'=>$record->toArray()]);
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
        
        unset($inputs['_method']);
        unset($inputs['_token']);
        unset($inputs['submit']);
        
        
        // Upload Files
        if(isset($inputs['uploaded_files']) && !empty($inputs['uploaded_files'])) {
        	$files = Input::file("uploaded_files");
        	foreach($files as $file) {
        		if(!empty($file))  {
        			$ext = $file->getClientOriginalExtension();
        			$name = "receiving_copy_".rand(1111, 9999)."".time().".".$ext;
        			// Upload
        			$file->move("./uploads", $name);
        
        			// insert to table        			
        			$upload_id = DB::table("tbl_receiving_copy")->insertGetId(array(
        					'ledger_id' => $id,
        					'receiving_copy_file' => $name
        			));
        		}
        	}
        	unset($inputs['uploaded_files']);
        }
        
        MdlPolicyLedger::where('id', $id)->update($inputs);
        Session::flash('success', 'Record has been updated');
        
        return redirect('policy_daily_transaction');
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

}
