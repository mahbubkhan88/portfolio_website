<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrivacyPolicyModel extends Model
{
    public $table = 'privacy_policy';
    public $primaryKey = 'id';
    public $incrementing = true;
    public $keyType = 'int';
    public $timestamps = false;
}
