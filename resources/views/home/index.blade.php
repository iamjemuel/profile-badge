@extends('layouts.app')
@extends('home.content')

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('lib/croppie/croppie.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('lib/croppie/croppie.min.js') }}"></script>
    <script src="{{asset('js/home.js')}}"></script>
@endpush