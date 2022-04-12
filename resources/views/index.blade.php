@extends('layouts.master')
@section('content')
    <h1>Welcome {{ Auth::user()->role }} </h1>
@endsection
