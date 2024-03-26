<?php

namespace App\Http\Controllers;

use App\Models\Wallboard_Kenneth_Agent;
use App\Models\Wallboard_Kenneth_SPV;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function sysAdminAsuransi(Request $request){
        // VARIALE for pie chart
        $sortOption = $request->query('sort');
        $query = Wallboard_Kenneth_Agent::query();

        // $query->where('PARTNER', 'like', 'INS%');

        // FILTER BY PARTNER FROM DROPDOWN MENU

        $selectedPartner = $request->query('partner','all');


        if ($selectedPartner != 'all'){
            $query->where('PARTNER', $selectedPartner);
        }




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


        // dropdown menu
        $partners = DB::table('Wallboard_Kenneth_SPV')->select('PARTNER')->distinct()->pluck('PARTNER');

        // buat leaderboard
        $leaderboardDatas = $query->paginate(5);

        return view('dashboard.sys-admin-asuransi', compact('sortOption', 'campaignDataPie', 'dealDataPie', 'premiDataPie','leaderboardDatas', 'partners', 'selectedPartner'));
    }

    public function sysAdminAsuransi2(Request $request){

    }

    public function sysAdminCC(){
        return view('dashboard.sys-admin-cc');
    }

    public function spvAsuransi(){
        return view('dashboard.spv-asuransi');
    }

    public function spvCC(){
        return view('dashboard.spv-cc');
    }

    public function managerAsuransi(){
        return view('dashboard.manager-asuransi');
    }

    public function managerCC(){
        return view('dashboard.manager-cc');
    }
}
