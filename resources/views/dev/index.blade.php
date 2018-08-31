@extends('layouts.app')
@extends('dev.content')

@push('styles')
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('lib/data-tables/css/dataTables.bootstrap4.css') }}"> --}}
@endpush
@push('scripts')
    <script src="{{asset('js/dev.js')}}"></script>
@endpush