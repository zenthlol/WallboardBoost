@extends('template.template')

@section('head')
@endsection

@section('body')
<section id="header">
    <h1 style="font-family: Poppins;">Welcome page</h1>
</section>

<ul class="list-group">
    <li class="list-group-item"><a href="{{ route('agentAsuransi') }}">Wallboard Agent Asuransi</a></li>
    <li class="list-group-item"><a href="{{ route('agentCC') }}">Wallboard Agent CC</a></li>
    <li class="list-group-item"><a href="{{ route('spvAsuransi') }}">Wallboard SPV Asuransi</a></li>
    <li class="list-group-item"><a href="{{ route('spvCC') }}">Wallboard SPV CC</a></li>
    <li class="list-group-item"><a href="{{ route('campaignAsuransi') }}">Wallboard Campaign Asuransi</a></li>
    <li class="list-group-item"><a href="{{ route('campaignCC') }}">Wallboard Campaign CC</a></li>
  </ul>


@endsection

