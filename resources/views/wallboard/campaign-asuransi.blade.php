@extends('template.template')


@section('head')
{{-- Connect to css --}}
    <link rel="stylesheet" href="assets/css/stylesCampaignAsuransi.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection


@section('body')

<section id="header">
    Campaign Asuransi Data
</section>


<section id="body_content">
    {{-- BODY SEBELAH KIRI --}}
    <div class="body-left shadowed-element  ">
        <div class="body-left-up">
            <span>
                Top 5 Campaign
            </span>
            {{-- Navigation Timestamp --}}
            <div class="btn-group btn-group-lg" id="nav-timestamp">
                <button type="button" class="btn {{ $sortOption === 'today' ? 'active' : '' }}" id="btn_today_agent_asuransi" onclick="window.location='{{ route('campaignAsuransi', ['sort' => 'today']) }}'">by Deals</button>

                <button type="button" class="btn {{ $sortOption === 'thisWeek' ? 'active' : '' }}" id="btn_tweek_agent_asuransi" onclick="window.location='{{ route('campaignAsuransi', ['sort' => 'thisWeek']) }}'">by Premi</button>
            </div>
        </div>

        <div class="body-left-down">
            {{-- PIE CHART --}}

            <div id="chart-container" style="width: 400px; height: 400px;">
                <canvas id="myChart"></canvas>
            </div>

            <script>
                var ctx = document.getElementById('myChart').getContext('2d');

                var data = {
                    labels: ['Data 1', 'Data 2', 'Data 3', 'Data 4', 'Data 5'],
                    datasets: [{
                        label: 'Total Deals',
                        data: [50, 20, 30, 15, 10], // Replace with your actual data values

                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)'
                        ],
                        borderWidth: 1,

                        // Additional Chart.js options for each data point:
                        hoverBackgroundColor: [ // Background color on hover
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)'
                        ],
                        hoverBorderColor: [ // Border color on hover (optional)
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)'
                        ]
                    },

                ]
                };

                var myChart = new Chart(ctx, {
                    type: 'pie',
                    data: data,
                    options: {
                        responsive: true
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
                <th scope="col">Premi</th>
            </tr>
            </thead>
            <tbody>
            @php
                $i = 0
            @endphp

            @if ($wallboards->isEmpty())
                <tr>
                    <td colspan="4">No Data is Available</td>
                </tr>
            @else
                @foreach ($wallboards->sortByDesc('DEAL') as $wallboard)
                @if ($i < 10)
                        <tr>
                            <th scope="row">{{ ++$i }}</th>
                            <td>{{ $wallboard->CAMPAIGN_NAME }}</td>
                            <td>{{ $wallboard->DEAL }}</td>
                            <td>{{ $wallboard->PREMI }}</td>
                        </tr>
                @endif
                @endforeach
            @endif
            </tbody>
        </table>
    </div>

</section>







@endsection

