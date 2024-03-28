@extends('template.template2')


@section('head')
{{-- Connect to css --}}
    <link rel="stylesheet" href="assets/css/stylesDashboard.css">




@endsection


@section('body')

<section id="header">
    <span>
        Campaign Asuransi Data
    </span>

    <div class="my-dropdown">
        <p>Show data : </p>

        {{-- dropdown without form --}}

        {{-- dropdown menu --}}
        <div class="dropdown">
            <button id="dropdownMenuButton" class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
                {{ request()->query('filter', 'All') }}
            </button>
            <ul id="the-dropdown-menu" class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                @foreach ($partners as $partner)
                    <?php
                    $filterUrl = route('sysAdminAsuransi', ['filter' => $partner]);

                    ?>


                    <li>
                        <a class="dropdown-item" href="#" data-partner="{{ $partner }}" onclick="window.location='<?= $filterUrl ?>'">
                            {{ $partner }}
                        </a>
                    </li>
                @endforeach

                <li>
                    <a class="dropdown-item" href="{{ route('sysAdminAsuransi') }}">
                        All
                    </a>
                </li>

            </ul>
        </div>




        {{-- dropdown menu --}}
        {{-- <form action="{{ route('sysAdminAsuransi') }}" method="POST">
            @csrf



            <div class="dropdown">
                <button id="dropdownMenuButton" class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
                  Partners
                </button>

                <ul id="the-dropdown-menu" class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    @foreach ($partners as $partner)
                        <li><button type="submit" class="dropdown-item" name="selectedPartner" value="{{ $partner }}">{{ $partner }}</button></li>
                    @endforeach
                </ul>
            </div>
        </form> --}}

    </div>




</section>


<section id="body_content">
    {{-- BODY SEBELAH KIRI --}}
    <div class="body-left">
        {{-- TABLE LEADERBOARDS --}}
        <table class="table table-striped" id="table_dashboard" style="width: 100%;">
            <thead>
            <tr class="table-secondary">
                <th scope="col">USERNAME</th>
                <th scope="col">STATUS</th>
                <th scope="col">LOGIN TIME</th>
                <th scope="col">TOTAL CALL</th>
                <th scope="col">TALK TIME</th>
                <th scope="col">DEAL</th>
                <th scope="col">TOTAL PREMI</th>
                <th scope="col">PARTNER</th>
            </tr>
            </thead>
            <tbody>
            @php
                $i = 0
            @endphp

            @if ($leaderboardDatas->isEmpty())
                <tr>
                    <td colspan="4">No Data is Available</td>
                </tr>

            @else
                @foreach ($leaderboardDatas as $leaderboardData)
                        <tr>
                        <td>{{ $leaderboardData->USER_NAME }}</td>
                        <td>{{ $leaderboardData->STATUS }}</td>
                        <td>{{ $leaderboardData->LOGIN_TIME }}</td>
                        <td>{{ $leaderboardData->Total_Call }}</td>
                        <td>{{ $leaderboardData->Talks_Time }}</td>
                        <td>{{ $leaderboardData->DEAL }}</td>
                        <td>{{ $leaderboardData->PREMI }}</td>
                        <td>{{ $leaderboardData->PARTNER }}</td>
                        </tr>
                @endforeach

            @endif
            </tbody>
        </table>
        <div class="pagination-div">
            {{ $leaderboardDatas->links() }}
        </div>



        <div class="body-campaign-data shadowed-element">
            <div class="pie-chart-header">
                <span>
                    Campaign Data
                </span>
                {{-- Navigation Timestamp --}}
                <div class="btn-group btn-group-lg" id="nav-timestamp">
                    <button type="button" id="nav-button-1" class="btn {{ $sortOption === 'byDeals' ? 'active' : '' }}" id="btn_today_agent_asuransi" onclick="window.location='{{ route('sysAdminAsuransi', ['sort' => 'byDeals']) }}'">by Deals</button>

                    <button type="button" id="nav-button-2" class="btn {{ $sortOption === 'byPremi' ? 'active' : '' }}" id="btn_tweek_agent_asuransi" onclick="window.location='{{ route('sysAdminAsuransi', ['sort' => 'byPremi']) }}'">by Premi</button>
                </div>
            </div>

            <div class="pie-chart-content">
                {{-- PIE CHART --}}
                <div id="chartDiv" style="">
                    <canvas id="myChart" style=""></canvas>
                </div>



                <script>
                    let campaignArray = @json($campaignDataPie);
                    let dealArray = @json($dealDataPie);
                    let premiArray = @json($premiDataPie);

                    // TEMP
                    console.log("campaign array :");
                    console.log(campaignArray);

                    console.log("deal array :");
                    console.log(dealArray);

                    console.log("premi array :");
                    console.log(premiArray);
                    // console.log(campaignArray);


                    // nama kampanye
                    const xValues = campaignArray;

                    // isi pie chart/data pie chart.
                    const yValues = premiArray

                    // untuk mengganti data pada pie chart tergantung sortingnya ketika button di klik.


                    // const zValues = premiArray;
                    const barColors = [
                    "#b91d47",
                    "#00aba9",
                    "#2b5797",
                    "#e8c3b9",
                    "#1e7145"
                    ];

                    let chart = new Chart("myChart", {
                        type: "pie",
                        data: {
                            labels: xValues,
                            datasets: [{
                            backgroundColor: barColors,
                            data: yValues
                            }]
                        },
                        options: {
                            title: {
                            display: true,
                            text: "Top 5 Campaign"
                            },
                            // Disable hover functionality
                            hover: {
                            mode: null
                            },
                            // Optionally, disable tooltips as well
                            tooltips: {
                            enabled: false
                            }
                        }
                    });


                    const buttonDeals = document.getElementById("nav-button-1");
                    const buttonPremi = document.getElementById("nav-button-2");

                    let updatedYValues;
                    buttonDeals.addEventListener("click", function(){
                        updatedYValues = dealArray;
                        updateChart();
                    });

                    buttonPremi.addEventListener("click", function(){
                        updatedYValues = premiArray;
                        updateChart();
                    });

                    // Update logic (assuming updatedYValues holds the new data)
                    function updateChart() {
                        chart.data.datasets[0].data = updatedYValues;
                        chart.update();
                    }



                </script>
            </div>
        </div>


    </div>



    {{-- BODY SEBELAH KANAN --}}
    <div class="body-right">
        {{-- CARD HEADER --}}
        <div class="card-row">
            <div class="card shadowed-element">
                <span>{{ $totalCampaign }}</span>
                Total Campaign
            </div>
            <div class="card shadowed-element">
                <span>{{ $totalDeal }}</span>
                Total Deals
            </div>
            <div class="card shadowed-element">
                <span>{{ $totalPremi }}</span>
                Total Premi
            </div>
        </div>

        {{-- TOP AGENT --}}
        <div class="top-agent-header">
            <span>
                Top Agent
            </span>
            {{-- Navigation Timestamp --}}
            <div class="btn-group btn-group-lg" id="nav-timestamp">
                <button type="button" id="nav-button-1" class="btn {{ $sortOption === 'byDeals' ? 'active' : '' }}" id="btn_today_agent_asuransi" onclick="window.location='{{ route('sysAdminAsuransi', ['sort' => 'byDeals']) }}'">by Deals</button>

                <button type="button" id="nav-button-2" class="btn {{ $sortOption === 'byPremi' ? 'active' : '' }}" id="btn_tweek_agent_asuransi" onclick="window.location='{{ route('sysAdminAsuransi', ['sort' => 'byPremi']) }}'">by Premi</button>
            </div>
        </div>



        {{-- TABLE TOP AGENT --}}
        <table class="table table-striped" id="table_wb" style="width: 100%; margin-bottom: 15px; margin-top: 15px">
            <thead>
                <tr class="table-secondary">
                    <th scope="col">Rank</th>
                    <th scope="col">Username</th>
                    <th scope="col">Deals</th>
                    <th scope="col">Premi</th>
                    <th scope="col">Partner</th>
                </tr>
            </thead>

            <tbody>
            @php
                $i = 0
            @endphp

            @if ($leaderboardDatas->isEmpty())
                <tr>
                    <td colspan="4">No Data is Available</td>
                </tr>

            @else

                @foreach ($leaderboardDatas as $leaderboardData)
                @if ($i < 5)
                        <tr>
                            <th scope="row">{{ ++$i }}</th>
                            <td>{{ $leaderboardData->CAMPAIGN_NAME }}</td>
                            <td>{{ $leaderboardData->DEAL }}</td>
                            <td>{{ $leaderboardData->PREMI }}</td>
                            <td>{{ $leaderboardData->PARTNER }}</td>
                        </tr>
                @endif
                @endforeach
            @endif
            </tbody>
        </table>

        {{-- TOP SPV --}}
        <div class="top-agent-header">
            <span>
                Top Supervisor
            </span>
            {{-- Navigation Timestamp --}}
            <div class="btn-group btn-group-lg" id="nav-timestamp">
                <button type="button" id="nav-button-1" class="btn {{ $sortOption === 'byDeals' ? 'active' : '' }}" id="btn_today_agent_asuransi" onclick="window.location='{{ route('sysAdminAsuransi', ['sort' => 'byDeals']) }}'">by Deals</button>

                <button type="button" id="nav-button-2" class="btn {{ $sortOption === 'byPremi' ? 'active' : '' }}" id="btn_tweek_agent_asuransi" onclick="window.location='{{ route('sysAdminAsuransi', ['sort' => 'byPremi']) }}'">by Premi</button>
            </div>
        </div>



        {{-- TABLE TOP SUPERVISOR --}}
        <table class="table table-striped" id="table_wb" style="width: 100%; margin-bottom: 15px; margin-top: 15px">
            <thead>
                <tr class="table-secondary">
                    <th scope="col">Rank</th>
                    <th scope="col">Username</th>
                    <th scope="col">Deals</th>
                    <th scope="col">Premi</th>
                    <th scope="col">Partner</th>
                </tr>
            </thead>

            <tbody>
            @php
                $i = 0
            @endphp

            @if ($leaderboardDatas->isEmpty())
                <tr>
                    <td colspan="4">No Data is Available</td>
                </tr>

            @else

                @foreach ($leaderboardDatas as $leaderboardData)
                @if ($i < 5)
                        <tr>
                            <th scope="row">{{ ++$i }}</th>
                            <td>{{ $leaderboardData->CAMPAIGN_NAME }}</td>
                            <td>{{ $leaderboardData->DEAL }}</td>
                            <td>{{ $leaderboardData->PREMI }}</td>
                            <td>{{ $leaderboardData->PARTNER }}</td>
                        </tr>
                @endif
                @endforeach
            @endif
            </tbody>
        </table>




    </div>


</section>


@endsection

