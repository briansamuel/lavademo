@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
                @if(Auth::check())
                    Xin chào, {{Auth::user()->name}}!
                    <a href="auth/logout">Đăng xuất</a>
                 <h3>Thông tin người dùng</h3>
                    <ul>
                        <li>Tên:{{Auth::user()->name}}</li>
                        <li>Email:{{Auth::user()->email}}</li>
                    </ul>
                @else
                    Chào bạn, vui lòng <a href="/auth/login">Đăng nhập </a>
                    hoặc <a href="/auth/register">Đăng ký</a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
