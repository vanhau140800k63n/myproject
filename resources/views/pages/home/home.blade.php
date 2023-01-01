@extends('layouts.master')
@section('meta')
@endsection
@section('content')

<div id=editor></div>
<script type=module src="{{ asset('js/code-mirror.js') }}"></script>
@endsection