@extends('template.template')

@section('head')
@endsection

@section('body')
<section id="header">
    <h1 style="font-family: Poppins;">Welcome page</h1>
</section>

<ul class="list-group">
    <li class="list-group-item"><a href="{{ route('agentAsuransi') }}">Wallboard Agent Asuransi</a></li>
    <li class="list-group-item">A second item</li>
    <li class="list-group-item">A third item</li>
    <li class="list-group-item">A fourth item</li>
    <li class="list-group-item">And a fifth one</li>
  </ul>


@endsection

