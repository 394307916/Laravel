@extends('layouts.other')

@section('content')
	@include('shared._message')

	@if(Auth::check())
        <p>你已经登录</p>
        	<form action="{{ route('logout') }}" method="POST">
        		{{ csrf_field() }}
        		{{ method_field('DELETE') }}
        		<button class="btn btn-block btn-danger" type="submit" name="button">退出</button>
        	</form>
    @endif
@stop