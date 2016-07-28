<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpendingsModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $timestamps = false;
    protected $table = 'spendings';
    protected $fillable = array('created_at', 'created_by','group_id','total_amount');
}
