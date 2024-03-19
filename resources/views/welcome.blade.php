@extends('template.template')

@section('head')
@endsection

@section('body')
<section id="header">
    <h1 style="font-family: Poppins;">WALLBOARD PAGE</h1>
</section>

<ul class="list-group">
    <li class="list-group-item"><a href="{{ route('agentAsuransi') }}">Wallboard Agent Asuransi</a></li>
    <li class="list-group-item"><a href="{{ route('agentCC') }}">Wallboard Agent CC</a></li>
    <li class="list-group-item"><a href="{{ route('spvAsuransi') }}">Wallboard SPV Asuransi</a></li>
    <li class="list-group-item"><a href="{{ route('spvCC') }}">Wallboard SPV CC</a></li>
    <li class="list-group-item"><a href="{{ route('campaignAsuransi') }}">Wallboard Campaign Asuransi</a></li>
    <li class="list-group-item"><a href="{{ route('campaignCC') }}">Wallboard Campaign CC</a></li>
</ul>

<section id="header">
    <h1 style="font-family: Poppins;">DASHBOARD PAGE</h1>
</section>

<ul class="list-group">
    <li class="list-group-item"><a href="{{ route('agentAsuransi') }}">Dashboard System Admin Asuransi</a></li>
    <li class="list-group-item"><a href="{{ route('agentCC') }}">Dashboard System Administrator Credit Card </a></li>
    <li class="list-group-item"><a href="{{ route('spvAsuransi') }}">Dashboard Supervisor Asuransi </a></li>
    <li class="list-group-item"><a href="{{ route('spvCC') }}">Dashboard Supervisor Credit Card</a></li>
    <li class="list-group-item"><a href="{{ route('campaignAsuransi') }}">Dashboard Manager Asuransi </a></li>
    <li class="list-group-item"><a href="{{ route('campaignCC') }}">Dashboard Manager Credit Card/Assitant Credit Card</a></li>
</ul>


@endsection

