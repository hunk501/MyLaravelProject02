<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MdlPR extends Model {
    
    protected $table = "tbl_pr";
    
    protected $guarded = ['pr_id'];
    /*
    protected $fillable = [
        'received_from',
        'bank',
        'branch',
        'amount',
        'check_no',
        'prepared_by',
        'received_by',
        'payment_in',
        'uploaded_file'
    ];
    */
}
