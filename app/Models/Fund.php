<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fund extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'initial_balance'];

    public function returns()
    {
        return $this->hasMany(\App\Models\FundReturn::class);
    }
}
