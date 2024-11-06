<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fine extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'fines';

    protected $fillable = [
        'member_id',
        'amount',
        'paid'
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
