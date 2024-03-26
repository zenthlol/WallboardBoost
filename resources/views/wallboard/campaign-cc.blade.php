@extends('template.template')


@section('head')
{{-- Connect to css --}}
    <link rel="stylesheet" href="assets/css/stylesCampaignWB.css">


@endsection


@section('body')

<section id="header">
    Campaign Credit Card Data
</section>


<section id="body_content">
    {{-- BODY SEBELAH KIRI --}}
    <div class="body-left shadowed-element">
        <div class="body-left-up">
            <span>
                Top 5 Campaign
            </span>

            {{-- Navigation Timestamp --}}
            {{-- <div class="btn-group btn-group-lg" id="nav-timestamp">
                <button type="button" id="nav-button-1" class="btn {{ $sortOption === 'byDeals' ? 'active' : '' }}" id="btn_today_agent_asuransi" onclick="window.location='{{ route('campaignCC', ['sort' => 'byDeals']) }}'">by Deals</button>

                <button type="button" id="nav-button-2" class="btn {{ $sortOption === 'byPremi' ? 'active' : '' }}" id="btn_tweek_agent_asuransi" onclick="window.location='{{ route('campaignCC', ['sort' => 'byPremi']) }}'">by Premi</button>
            </div> --}}
        </div>

        <div class="body-left-down">
            {{-- PIE CHART --}}

            <div id="chartDiv" style="">
                <canvas id="myChart"></canvas>
            </div>

            <script>
                let campaignArray = @json($campaignDataPie);
                let dealArray = @json($dealDataPie);

                // TEMP
                console.log(campaignArray);
                console.log(dealArray);
                // console.log(campaignArray);


                // nama kampanye
                const xValues = campaignArray;


                // deals kampannye
                // const yValues = dealArray;
                const yValues = dealArray;

                const barColors = [
                "#b91d47",
                "#00aba9",
                "#2b5797",
                "#e8c3b9",
                "#1e7145"
                ];

                new Chart("myChart", {
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
                        text: "World Wide Wine Production 2018"
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
            </script>
        </div>

    </div>



    {{-- BODY SEBELAH KANAN --}}
    <div class="body-right">
        {{-- TABLE LEADERBOARDS --}}
        <table class="table table-striped" id="table_wb" style="width: 100%; margin-bottom: 10px">


            <thead>
            <tr class="table-secondary">
                <th scope="col">Rank</th>
                <th scope="col">Campaign</th>
                <th scope="col">Deals</th>
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
                            <td>{{ $leaderboardData->PARTNER }}</td>
                        </tr>
                @endif
                @endforeach

                {{-- @for ($i = 0; $i<5; $i++)
                    <tr>
                        <th scope="row">{{ $i + 1 }}</th>
                        <td>{{ $campaignData[$i] }}</td>
                        <td>{{ $dealData[$i] }}</td>
                        <td>{{ $premiData[$i] }}</td>
                    </tr>
                @endfor --}}
            @endif
            </tbody>
        </table>
    </div>

</section>







@endsection

