<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\MdlProduct;

class Products extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$products = MdlProduct::find(1)->get();
		
		foreach($products as $key => $product) {
			
			echo "<pre>"; print_r($product->toArray()); echo "</pre>";
			
			$orders = $product->getOrders()->get()->toArray();

			echo "<pre>";
			print_r($orders);
			echo "</pre><br>";
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//$product = MdlProduct::find($id)->get();
		$product = MdlProduct::where("id", "=", $id)->get();
		
		foreach($product as $prod) {
			$res = $prod->hasOrder;
			echo "<pre>";
			print_r($res);
			echo"</pre>";
		}
		
		/*
		foreach ($product as $prod) {
			// Get orders for current products
			$orders = $prod->getOrders()->get()->toArray();
			
			echo "<pre>";
			print_r($orders);
			echo"</pre>";
		}
		*/
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
