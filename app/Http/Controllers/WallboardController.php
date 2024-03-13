<?php

namespace App\Http\Controllers;

use App\Models\Wallboard;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WallboardController extends Controller
{
    public function welcome(){
        return view('welcome');
    }

    public function agentAsuransi(Request $request){
        $sortOption = $request->query('sort');

        $query = Wallboard::orderBy('deal', 'desc');

        if($sortOption === 'today'){
            $query->whereDate('tm_created_date', Carbon::today());
        } elseif ($sortOption === 'thisWeek') {
            $query->whereBetween('tm_created_date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
        } elseif ($sortOption === 'thisMonth') {
            $query->whereMonth('tm_created_date', Carbon::now()->month);
        }

        if ($sortOption === null || $sortOption === 'default') {

        }

        $wallboards = $query->get();

        return view('wallboard.agent-asuransi', compact('wallboards', 'sortOption'));
    }

    // public function agentAsuransi(){
    //     $wallboards = Wallboard::all();

    //     // Return Data based on today's date only
    //     $todayRecords = Wallboard::whereDate('tm_created_date', Carbon::today())->get();

    //     // Return Data based on This week's date
    //     $startWeekDate = Carbon::now()->startOfWeek();
    //     $endWeekDate = Carbon::now()->endOfWeek();
    //     $thisWeekRecords = Wallboard::whereBetween('tm_created_date', [$startWeekDate, $endWeekDate])->get();

    //     // Return Data based on This month's date
    //     $startMonthDate = Carbon::now()->startOfMonth();
    //     $endMonthDate = Carbon::now()->endOfMonth();
    //     $thisMonthRecords = Wallboard::whereBetween('tm_created_date', [$startMonthDate, $endMonthDate])->get();

    //     return view('wallboard.agent-asuransi', compact('wallboards', 'todayRecords', 'thisWeekRecords', 'thisMonthRecords'));
    // }

    public function agentCC(){
        return view('wallboard.agent-cc');
    }

    public function spvAsuransi(){
        return view('wallboard.spv-asuransi');
    }

    public function spvCC(){
        return view('wallboard.spv-cc');
    }

    public function campaignAsuransi(Request $request){
        $sortOption = $request->query('sort');

        $query = Wallboard::orderBy('deal', 'desc');

        if($sortOption === 'today'){
            $query->whereDate('tm_created_date', Carbon::today());
        } elseif ($sortOption === 'thisWeek') {
            $query->whereBetween('tm_created_date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
        } elseif ($sortOption === 'thisMonth') {
            $query->whereMonth('tm_created_date', Carbon::now()->month);
        }

        if ($sortOption === null || $sortOption === 'default') {

        }

        $wallboards = $query->get();

        return view('wallboard.campaign-asuransi', compact('wallboards', 'sortOption'));
    }

    public function campaignCC(){
        return view('wallboard.campaign-cc');
    }
}
