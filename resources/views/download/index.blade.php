@extends('layouts.app')
@extends('download.content')

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">
@endpush

@push('scripts')
    <script src="{{asset('js/download.js')}}"></script>
@endpush