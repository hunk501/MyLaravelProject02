<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use App\Models\MdlClaimsMonitoring;
use Illuminate\Support\Facades\Validator;

class ClaimsMonitoring extends Controller {
    
    function __construct() {
        //$this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
            
        $records = MdlClaimsMonitoring::all();
        return view("cm.lists")->with(['records'=>$records]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        return view("cm.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        $inputs = Input::all();
        
        $validator = Validator::make($inputs, $this->getRules());
        if($validator->fails()) {
            return redirect('cm/create')->withErrors($validator)->withInput();
        } else {
            
            $files_field = array('cnc','loa','premium_guarantee','police_report','affidavet_report','or_cr','drivers_license','picture_incident','repair_estimate');
            foreach($files_field as $field_name) {
                if(isset($inputs[$field_name])) {            
                    if(($tmp_name = $this->uploadFile($field_name)) != NULL) {
                        $inputs[$field_name] = $tmp_name;
                    }
                }
            }

            unset($inputs['_token']);
            unset($inputs['submit']);

            MdlClaimsMonitoring::create($inputs);

            Session::flash("success", "Success Message");
            return redirect("cm");
        }                       
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
        
        $record = MdlClaimsMonitoring::where('id', $id)->first();
        if(!empty($record)) {
            //dd($record->toArray());
            return view('cm.edit')->with(['record'=>$record,'id'=>$id]);
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
        $rules = $this->getRules();
        unset($rules['claims_no']);
        
        $validator = Validator::make($inputs, $rules);        
        if($validator->fails()) {
            return redirect('cm/create')->withErrors($validator)->withInput();
        } else {
            $files_field = array('cnc','loa','premium_guarantee','police_report','affidavet_report','or_cr','drivers_license','picture_incident','repair_estimate');
            foreach($files_field as $field_name) {
                if(isset($inputs[$field_name])) {            
                    if(($tmp_name = $this->uploadFile($field_name)) != NULL) {
                        $inputs[$field_name] = $tmp_name;
                    }
                }
            }

            unset($inputs['_method']);
            unset($inputs['_token']);
            unset($inputs['submit']);

            MdlClaimsMonitoring::where("id", $id)->update($inputs);

            Session::flash("success", "Record has been updated");
            return redirect("cm");
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
    
    
    private function getRules() {
        return [
            'assured_name' => 'required',
            'policy_no' => 'required',
            'claims_no' => 'required|unique:tbl_claims_monitoring,claims_no',
            'claims_officer' => 'required'            
        ];
    }

}
