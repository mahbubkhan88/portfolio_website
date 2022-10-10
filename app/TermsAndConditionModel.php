<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TermsAndConditionModel extends Model
{
    public $table = 'terms_condition';
    public $primaryKey = 'id';
    public $incrementing = true;
    public $keyType = 'int';
    public $timestamps = false;
}
