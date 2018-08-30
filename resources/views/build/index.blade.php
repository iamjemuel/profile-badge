@extends('layouts.build')
@extends('build.content')

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/build.css') }}">
@endpush

@push('scripts')
    <script src="{{asset('js/build.js')}}"></script>
@endpush