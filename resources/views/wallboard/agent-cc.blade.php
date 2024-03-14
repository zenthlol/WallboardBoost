@extends('template.template')


@section('head')
{{-- Connect to css --}}
    <link rel="stylesheet" href="assets/css/styles.css">
@endsection


@section('body')
    @foreach ($wallboards as $wallboard)
        {{ $wallboard->Tm_Trx_Id }}
    @endforeach
    <h1></h1>
@endsection
