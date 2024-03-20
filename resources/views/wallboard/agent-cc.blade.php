@extends('template.template')


@section('head')
{{-- Connect to css --}}
    <link rel="stylesheet" href="assets/css/stylesWBAgentAssuransi.css">
@endsection


@section('body')

<section id="header">
    Top Agent Credit Card
</section>


<section id="body_content">

    {{-- Navigation Timestamp --}}
    <div class="btn-group btn-group-lg" id="nav-timestamp">
        <button type="button" class="btn {{ $sortOption === 'today' ? 'active' : '' }}" id="btn_today_agent_cc" onclick="window.location='{{ route('agentCC', ['sort' => 'today']) }}'">Today</button>

        <button type="button" class="btn {{ $sortOption === 'thisWeek' ? 'active' : '' }}" id="btn_tweek_agent_cc" onclick="window.location='{{ route('agentCC', ['sort' => 'thisWeek']) }}'">This Week</button>

        <button type="button" class="btn {{ $sortOption === 'thisMonth' ? 'active' : '' }}" id="btn_tmonth_agent_cc" onclick="window.location='{{ route('agentCC', ['sort' => 'thisMonth']) }}'">This Month</button>

        <button type="button" class="btn {{ $sortOption === 'default' ? 'active' : '' }}" id="btn_tmonth_agent_cc" onclick="window.location='{{ route('agentCC', ['sort' => 'default']) }}'">Show All</button>
    </div>


    {{-- CARD TOP RANK --}}
    <div class="row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="card shadowed-element">
                <div class="card-body-img">
                    <img src="{{ asset('assets/images/rank-1.png') }}" alt="">
                </div>
                <div class="kartu-konten">
                    @if ($wallboards->isEmpty())
                        <h5 class="card-title">No Data is Available</h5>
                    @else
                        @foreach ($wallboards->sortByDesc('deal')->take(1) as $wallboard)
                        <h5 class="card-title">{{ $wallboard->AGENT_NAME }}</h5>
                        <p class="card-tulisan">
                            <span class="card-badan">{{ $wallboard->DEAL }}</span>
                            <span class="card-buntut">Deals</span>
                        </p>
                        @endforeach
                    @endif


                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="card shadowed-element">
                <div class="card-body-img">
                    <img src="{{ asset('assets/images/rank-2.png') }}" alt="">
                </div>

                <div class="kartu-konten">
                    @if ($wallboards->isEmpty())
                        <h5 class="card-title">No Data is Available</h5>
                    @else
                        @foreach ($wallboards->sortByDesc('deal')->slice(1,1) as $wallboard)
                        <h5>{{ $wallboard->AGENT_NAME }}</h5>
                        <p class="card-tulisan">
                            <span class="card-badan">{{ $wallboard->DEAL }}</span>
                            <span class="card-buntut">Deals</span>
                        </p>
                        {{-- <p class="card-text">
                            <span class="card-badan">{{ $wallboard->deal }}</span>
                            <span class="card-buntut">Deals</span>
                        </p> --}}
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>


    {{-- TABLE LEADERBOARDS --}}
    <table class="table table-striped" id="table_wb" style="width: 100%; margin-bottom: 10px">
        <thead>
        <tr class="table-secondary">
            <th scope="col">Rank</th>
            <th scope="col">Username</th>
            <th scope="col">Deals</th>
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
            @foreach ($wallboards as $wallboard)
            @if ($i < 10)
                    <tr>
                        <th scope="row">{{ ++$i }}</th>
                        <td>{{ $wallboard->USER_NAME }}</td>
                        <td>{{ $wallboard->DEAL }}</td>
                    </tr>
            @endif
            @endforeach
        @endif



        </tbody>
    </table>
</section>

@endsection

