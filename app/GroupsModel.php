<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupsModel extends Model
{
    //
    public $timestamps = false;
    protected $table = 'groups';
    protected $fillable = array('group_id', 'user_id','group_name');
    protected $primaryKey = 'group_id';

}
