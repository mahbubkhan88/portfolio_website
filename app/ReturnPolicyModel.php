<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReturnPolicyModel extends Model
{
    public $table = 'return_policy';
    public $primaryKey = 'id';
    public $incrementing = true;
    public $keyType = 'int';
    public $timestamps = false;
}
