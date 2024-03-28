<?php

namespace App\Http\Controllers;

use App\Models\Wallboard_Kenneth_Agent;
use App\Models\Wallboard_Kenneth_SPV;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Services\PartnerFilterService;
use Psy\Input\FilterOptions;

class DashboardController extends Controller
{
    private $partnerFilterService;

    public function __construct(PartnerFilterService $partnerFilterService)
    {
        $this->partnerFilterService = $partnerFilterService;
    }



    public function sysAdminAsuransi(Request $request){
        // VARIAbLE for pie chart
        $sortOption = $request->query('sort');
        $filterOption = $request->query('filter','all');
        $query = Wallboard_Kenneth_Agent::query();


        // FILTER BY PARTNER FROM DROPDOWN MENU
        if ($filterOption !== 'all'){
            $query->where('PARTNER', 'like', '%' . $filterOption . '%');
        }


        // SORTING DEALS/PREMI BUTTON
        if ($sortOption === 'byDeals') {
            $query->orderBy('DEAL', 'desc');
        } else if ($sortOption === 'byPremi') {
            $query->orderBy('PREMI', 'desc');
        } else{
            $query->orderBy('DEAL', 'desc');
        }

        // PIE CHART DATAS
        $campaignDataPie = $query->pluck('CAMPAIGN_NAME')->take(5);
        $dealDataPie = $query->pluck('DEAL')->take(5);
        $premiDataPie = $query->pluck('PREMI')->take(5);


        // dropdown menu
        $partners = DB::table('Wallboard_Kenneth_SPV')->select('PARTNER')->distinct()->pluck('PARTNER');

        // buat leaderboard
        $leaderboardDatas = $query->paginate(5);


        // FETCH TOTAL CAMPAIGN, DEALS, PREMI


        if ($filterOption !== 'all'){
            $totalCampaign = DB::table('Wallboard_Kenneth_Agent')->where('PARTNER', 'like', '%' . $filterOption . '%')->select('CAMPAIGN_NAME')->distinct()->get()->count();
            $totalDeal = Wallboard_Kenneth_Agent::where('PARTNER', 'like', '%' . $filterOption . '%')->sum('DEAL');
            $totalPremi = Wallboard_Kenneth_Agent::where('PARTNER', 'like', '%' . $filterOption . '%')->sum('PREMI');
        }
        else{
            $totalCampaign = DB::table('Wallboard_Kenneth_Agent')->select('CAMPAIGN_NAME')->distinct()->get()->count();
            $totalDeal = Wallboard_Kenneth_Agent::sum('DEAL');
            $totalPremi = Wallboard_Kenneth_Agent::sum('PREMI');
        }



        return view('dashboard.sys-admin-asuransi', compact('sortOption', 'campaignDataPie', 'dealDataPie', 'premiDataPie','leaderboardDatas', 'partners', 'totalCampaign', 'totalDeal', 'totalPremi'));
    }

    public function sysAdminAsuransiPost(Request $request)
    {

        $selectedPartner = $request->input('selectedPartner');

        $query = Wallboard_Kenneth_Agent::query();

        if ($selectedPartner != 'all') {
            $query->where('PARTNER', $selectedPartner);
        }

        //pass query to another controller

        return redirect('sys-admin-asuransi');
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
