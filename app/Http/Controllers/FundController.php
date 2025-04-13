<?php

namespace App\Http\Controllers;

use App\Models\Fund;
use App\Models\FundReturn;
use Illuminate\Http\Request;
use Carbon\Carbon;

class FundController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'initial_balance' => 'required|numeric'
        ]);
        return Fund::create($data);
    }

    public function addReturn(Request $request, Fund $fund)
    {
        $data = $request->validate([
            'return_type' => 'required|in:monthly,quarterly,yearly',
            'is_compound' => 'required|boolean',
            'percentage' => 'required|numeric',
            'effective_date' => 'required|date'
        ]);
        return $fund->returns()->create($data);
    }

    public function revertReturn(FundReturn $return)
    {
        return $return->delete();
    }

    public function getValueAt(Fund $fund, Request $request)
    {
        $date = Carbon::parse($request->query('date'));
        $returns = $fund->returns()->where('effective_date', '<=', $date)->orderBy('effective_date')->get();

        $value = $fund->initial_balance;

        foreach ($returns as $ret) {
            $base = $ret->is_compound ? $value : $fund->initial_balance;
            $value += ($base * ($ret->percentage / 100));
        }

        return response()->json(['value' => round($value, 2)]);
    }
}
