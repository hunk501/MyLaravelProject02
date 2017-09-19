<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\MdlAccount;
use Illuminate\Support\Facades\Auth;
use App\Models\MdlPolicyLedger;
use App\Models\MdlIR;
use App\Models\MdlPolicy;
use Illuminate\Support\Facades\DB;

class Account extends Controller {
	
	public function __construct() {
		//$this->middleware('auth');
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		$start = date("Y")."-".date("m")."-01";
		$end = date("Y-m-t");
		
		
		// Policy
		/*
		$policy = MdlPolicyLedger::where('date_issue' ,'>=', $start)
					->where('date_issue' ,'<=', $end)->get();
		*/
		$unpaid = 0;
		$partial = 0;
		$policy_per_month = 0;
		$ir_per_month = 0;
		
		$policy = MdlPolicyLedger::all();
		if(!empty($policy)) {
			$policy->toArray();
			foreach($policy as $k => $val) {
				
				// PR
				if(!empty($val['pr_no'])) {

					$pr = DB::table('tbl_pr_account')->where('pr_id', $val['pr_no'])->get();
					if(!empty($pr)) {
						foreach($pr as $p) {
							if($p->payment_status == 'partial') {
								$partial++;
							}
						}
					}
				} else {
					$unpaid++;
				}
				
				if(strtotime($val['date_issue']) >= strtotime($start) && strtotime($val['date_issue']) <= strtotime($end)) {
					$policy_per_month++;
				}
			}
		}
		
		// IR
		$ir = MdlIR::where('created_at', '>=', $start)->where('created_at', '<=', $end)->get();
		$ir_per_month = count($ir);
		/*
		echo "Unpaid: ". $unpaid."<br>";
		echo "partial: ". $partial."<br>";
		echo "Policy: ". $policy_per_month."<br>";
		echo "IR: ". count($ir_per_month) ."<br>";
		//dd($policy->toArray());
		//die();
		*/
		$output['unpaid'] = $unpaid;
		$output['partial'] = $partial;
		$output['policy'] = $policy_per_month;
		$output['ir'] = $ir_per_month;
		return view("account.dashboard")->with($output);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view("sample");
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		dd( $request->all() );
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
