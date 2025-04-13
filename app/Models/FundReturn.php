<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FundReturn extends Model
{
    use HasFactory;

    protected $fillable = ['fund_id', 'return_type', 'is_compound', 'percentage', 'effective_date'];

    public function fund()
    {
        return $this->belongsTo(\App\Models\Fund::class);
    }
}
