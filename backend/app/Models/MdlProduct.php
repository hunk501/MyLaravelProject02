<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MdlProduct extends Model {

	protected $table = "products";
		
	protected $fillable = [
			'product_name',
			'product_price',
			'product_qty'
	];
	
	/**
	 * Get Orders
	 */
	public function getOrders() {
		return $this->hasMany("App\Models\MdlOrder", "product_id", "id");
	}
	
	public function hasOrder() {
		$res = $this->hasOne("App\Models\MdlOrder", "product_id", "id");
		return $res;
	}
}