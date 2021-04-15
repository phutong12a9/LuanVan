@extends('master')
@section('content')
<title>Chi Tiết Thông Báo</title>
<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
    <div class="panel panel-default">
        <div class="panel-heading" style="font-size: 18px;">
            @foreach($chitietthongbao as $chitietthongbao)
            {{$chitietthongbao->TieuDe }}
            @endforeach
        </div>
        <div class="panel-body">
            <time style="color: #aaa" datetime="{{date('d/m/Y', strtotime($chitietthongbao->NgayDang))}}">Ngày Đăng: {{date('d/m/Y', strtotime($chitietthongbao->NgayDang))}}</time>
            <p>{!!$chitietthongbao->NoiDung!!}</p>
        </div>
    </div>
</div>
@endsection