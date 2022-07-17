<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HighchartController extends Controller
{
    public function handleChart(){
        $userData = User::select(DB::raw("COUNT(*) as count"))
                            ->whereYear('created_at', date('Y'))
                            ->groupBy(DB::raw("Month(created_at)"))
                            ->pluck('count');

        
        return view('highchart', compact('userData'));

    }
}
