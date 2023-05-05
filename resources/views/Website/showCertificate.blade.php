@extends('Website/master')
@section('title', 'Buy page | '.env('APP_NAME'))
@section('content')

<embed src="{{ asset('Certificats/'.$name) }}" style="width: 100% ; height: 100%;">





@endsection
