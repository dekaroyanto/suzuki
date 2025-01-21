<?php

namespace App\Models;

use App\Models\DetailTransaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'total_amount', 'tax', 'admin_fee'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function details()
    {
        return $this->hasMany(DetailTransaction::class);
    }
}
