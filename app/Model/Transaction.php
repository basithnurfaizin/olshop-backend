<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;

    protected $table = 'transactions';

    protected $fillable = ['uuid', 'name', 'email', 'number', 'address', 'transaction_total', 'status'];

    public function details()
    {
        return $this->hasMany(TransactionDetail::class,'transaction_id', 'id');
    }
}
