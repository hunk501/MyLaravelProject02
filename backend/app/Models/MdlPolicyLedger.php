<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MdlPolicyLedger extends Model {
    
    protected $table = 'tbl_policy_ledger';
    
    protected $guarded = ['id'];
    

    public function getPolicy() {
    	return $this->hasMany('App\Models\MdlPolicy', 'policy_no', 'policy_no');
    }

    public function getPR() {
    	return $this->hasMany('App\Models\MdlPR', 'pr_account_id', 'pr_no');
    }
    
}
