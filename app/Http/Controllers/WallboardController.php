<?php

namespace App\Http\Controllers;

use App\Models\vTM_WALLBOARD;
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

        $query = vTM_WALLBOARD::orderBy('DEAL', 'desc');

        if($sortOption === 'today'){
            $query->whereDate('Tm_Created_Date', Carbon::today());
        } elseif ($sortOption === 'thisWeek') {
            $query->whereBetween('Tm_Created_Date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
        } elseif ($sortOption === 'thisMonth') {
            $query->whereMonth('Tm_Created_Date', Carbon::now()->month);
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
        $wallboards = vTM_WALLBOARD::All();
        return view('wallboard.agent-cc', compact('wallboards'));
    }

    public function spvAsuransi(){
        return view('wallboard.spv-asuransi');
    }

    public function spvCC(){
        return view('wallboard.spv-cc');
    }

    public function campaignAsuransi(Request $request){
        $sortOption = $request->query('sort');

        $query = vTM_WALLBOARD::orderBy('DEAL', 'desc');

        if($sortOption === 'today'){
            $query->whereDate('Tm_Created_Date', Carbon::today());
        } elseif ($sortOption === 'thisWeek') {
            $query->whereBetween('Tm_Created_Date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
        } elseif ($sortOption === 'thisMonth') {
            $query->whereMonth('Tm_Created_Date', Carbon::now()->month);
        }

        if ($sortOption === null || $sortOption === 'default') {

        }

        $wallboards = $query->get();


        // for sending data for areaChart
        $data = [
            'labels' => ['January', 'February', 'March', 'April', 'May'],
            'data' => [65, 59, 80, 81, 56],
        ];

        return view('wallboard.campaign-asuransi', compact('wallboards', 'sortOption', 'data'));
    }

    // public function areaChart(){
    //     // Replace this with your actual data retrieval logic
    //     $data = [
    //         'labels' => ['January', 'February', 'March', 'April', 'May'],
    //         'data' => [65, 59, 80, 81, 56],
    //     ];
    //     return view('wallboard.campaign-asuransi', compact('data'));
    // }

    public function campaignCC(){
        return view('wallboard.campaign-cc');
    }
}
