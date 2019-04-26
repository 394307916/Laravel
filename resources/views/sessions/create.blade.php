@extends('layouts.other')


@section('content')

  <div class="panel panel-default">
    <div class="panel-heading">
      <h5>登录</h5>
    </div>
    <div class="panel-body">
      @include('shared._errors')

      <form method="POST" action="{{ route('login') }}">
          {{ csrf_field() }}

          <div class="form-group">
            <label for="email">邮箱：</label>
            <input type="text" name="email" class="form-control" value="{{ old('email') }}">
          </div>

          <div class="form-group">
            <label for="password">密码</label>
            <input type="password" name="password" class="form-control" value="{{ old('password') }}">
          </div>


          <button type="submit" class="btn btn-default">登录</button>
      </form>

      <hr>

    </div>
  </div>

@stop