<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    protected $table = 'balance_history';

    protected $guarded = ['id', 'created_at', 'updated_at'];
}
