<?php

namespace App\Http\Controllers;

use App\Models\vTM_WALLBOARD;
use App\Models\Wallboard;
use App\Models\Wallboard_Kenneth2;
use App\Models\Wallboard_Kenneth3;
use App\Models\Wallboard_Kenneth_Agent;
use App\Models\Wallboard_Kenneth_SPV;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WallboardController extends Controller
{


    public function welcome(){
        return view('welcome');
    }

    // Wallboard Agent Asuransi
    public function agentAsuransi(Request $request){
        $sortOption = $request->query('sort');

        $query = Wallboard_Kenneth_Agent::orderBy('PREMI', 'desc');

        $query->where('PARTNER', 'like', 'INS%');

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


    // Wallboard Agent CC
    public function agentCC(Request $request){
        $sortOption = $request->query('sort');

        $query = Wallboard_Kenneth_Agent::orderBy('DEAL', 'desc');

        $query->where('PARTNER', 'like', 'CC%');

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

        return view('wallboard.agent-cc', compact('wallboards', 'sortOption'));
    }

    public function spvAsuransi(Request $request){
        $sortOption = $request->query('sort');

        $query = Wallboard_Kenneth_SPV::orderBy('PREMI', 'desc');

        $query->where('PARTNER', 'like', 'INS%');

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

        return view('wallboard.spv-asuransi', compact('wallboards', 'sortOption'));
    }

    public function spvCC(Request $request){
        $sortOption = $request->query('sort');

        $query = Wallboard_Kenneth_SPV::orderBy('DEAL', 'desc');

        $query->where('PARTNER', 'like', 'CC%');

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

        return view('wallboard.spv-cc', compact('wallboards', 'sortOption'));
    }

    public function campaignAsuransi(Request $request){
        // VARIALE for pie chart
        $sortOption = $request->query('sort');
        $query = Wallboard_Kenneth_Agent::query();

        $query->where('PARTNER', 'like', 'INS%');

        if ($sortOption === 'byDeals') {
            $query->orderBy('DEAL', 'desc');
        } else if ($sortOption === 'byPremi') {
            $query->orderBy('PREMI', 'desc');
        } else{
            $query->orderBy('DEAL', 'desc');
        }

        $campaignDataPie = $query->pluck('CAMPAIGN_NAME')->take(5);
        $dealDataPie = $query->pluck('DEAL')->take(5);
        $premiDataPie = $query->pluck('PREMI')->take(5);

        // buat leaderboard
        $leaderboardDatas = $query->get();

        return view('wallboard.campaign-asuransi', compact('sortOption', 'campaignDataPie', 'dealDataPie', 'premiDataPie','leaderboardDatas'));
    }

    public function campaignCC(Request $request){
        // VARIALE for pie chart
        $sortOption = $request->query('sort');
        $query = Wallboard_Kenneth_Agent::query();

        $query->where('PARTNER', 'like', 'CC%');

        if ($sortOption === 'byDeals') {
            $query->orderBy('DEAL', 'desc');
        } else if ($sortOption === 'byPremi') {
            $query->orderBy('PREMI', 'desc');
        } else{
            $query->orderBy('DEAL', 'desc');
        }

        $campaignDataPie = $query->pluck('CAMPAIGN_NAME')->take(5);
        $dealDataPie = $query->pluck('DEAL')->take(5);
        $premiDataPie = $query->pluck('PREMI')->take(5);

        // buat leaderboard
        $leaderboardDatas = $query->get();

        return view('wallboard.campaign-cc', compact('sortOption', 'campaignDataPie', 'dealDataPie', 'premiDataPie','leaderboardDatas'));
    }


    // public function areaChart(){
    //     // Replace this with your actual data retrieval logic
    //     $data = [
    //         'labels' => ['January', 'February', 'March', 'April', 'May'],
    //         'data' => [65, 59, 80, 81, 56],
    //     ];
    //     return view('wallboard.campaign-asuransi', compact('data'));
    // }


}
