@extends('layouts.main')

@section('title')
    {{__('string.list_title')}}
@endsection

@section('content')
<form>
    <input type="text" name="nombre" id="nombre">
    <input type="password" name="password" id="password">
</form>

@endsection