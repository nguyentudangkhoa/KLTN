@extends('master.master')
@section('title')
Đăng ký thành công
@endsection
@section('content')
<style>
    .report-success-sign-up{
        text-align: center;
        margin-top: 20px;
        margin-bottom: 20px;
    }
    .index-link{
        font-size: 30px;
    }
</style>
<div class="report-success-sign-up">
<h1>Cảm ơn đã đăng ký thành viên tại trang web của hàng bách hóa</h1>
<p>Đăng ký thành công tài khoản {{ $email }} chúc bạn một ngày mua sắm vui vẻ</p>
<a class="index-link" href="{{ route('index') }}">>>Về trang chủ</a>
</div>
@endsection