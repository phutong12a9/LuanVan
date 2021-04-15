@extends('master')
@section('content')
<title>Trang Chủ</title>
<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
	<div class="panel panel-default">
		<div class="panel-body">
			@foreach($chuyenmucthongbao as $chuyenmucthongbao)
			<div class="tieude">
				<a href="{{route('chi-tiet-thong-bao',$chuyenmucthongbao->ID)}}"><b>{{$chuyenmucthongbao->TieuDe}}</b></a>
			</div>
			<div class="tomtat" style="max-width: 90%">
				<p>{{$chuyenmucthongbao->TomTat}}</p>
			</div>
			<div class="ngaydang" style="float: left;">
				<time style="color: #aaa" datetime="{{date('d/m/Y', strtotime($chuyenmucthongbao->NgayDang))}}">Ngày Đăng: {{date('d/m/Y', strtotime($chuyenmucthongbao->NgayDang))}}</time>
			</div>
			<div class="xemthem"style="float: right">
				<a class="btn btn-default btn-xs" href="{{route('chi-tiet-thong-bao',$chuyenmucthongbao->ID)}}">Chi tiết</a>
			</div>
			<br>
			<hr/>
			@endforeach
		</div>
	</div>
</div>
@endsection