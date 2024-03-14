@extends('template.template')


@section('head')
{{-- Connect to css --}}
    <link rel="stylesheet" href="assets/css/stylesCampaignAsuransi.css">
@endsection


@section('body')

<section id="header">
    Campaign Asuransi Data
</section>


<section id="body_content">
    {{-- BODY SEBELAH KIRI --}}
    <div class="body-left">
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
            pie chart
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
                @foreach ($wallboards->sortByDesc('deal') as $wallboard)
                @if ($i < 10)
                        <tr>
                            <th scope="row">{{ ++$i }}</th>
                            <td>{{ $wallboard->campaign_name }}</td>
                            <td>{{ $wallboard->deal }}</td>
                            <td>{{ $wallboard->premi }}</td>
                        </tr>
                @endif
                @endforeach
            @endif
            </tbody>
        </table>
    </div>

</section>







@endsection

