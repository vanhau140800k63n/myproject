@extends('layouts.master')
@section('content')
{!! $content !!}
<script>
    alert($('.md-contents').html());
</script>
@endsection
