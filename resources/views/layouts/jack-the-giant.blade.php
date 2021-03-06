@extends('layouts.master')

@include('nav.jack-the-giant')

@include('css.main')
@include('css.google-material-icons')
@include('css.bootstrap4')

@include('scripts.jack-the-giant')
@include('scripts.bootstrap4')
@include('scripts.ko')
@include('scripts.jquery')

@section('body')
<body id="jack-the-giant-body">
	@include('header')
	@yield('body-content')
	@stack('scripts')
</body>
@endsection