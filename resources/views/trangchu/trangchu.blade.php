@extends('master')
@section('content')
<title>Trang Chủ</title>
<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
	<div class="panel panel-default">
		<div class="panel-body">
			@foreach($thongbao as $thongbao)
			<div class="tieude" >
				<a href="{{route('chi-tiet-thong-bao',$thongbao->ID)}}"><b>{{$thongbao->TieuDe}}</b></a>
			</div>
			<div class="tomtat" style="max-width: 90%">
				<p>{{$thongbao->TomTat}}</p>
			</div>
			<div class="ngaydang" style="float: left;">
				<time style="color: #aaa" datetime="{{date('d/m/Y', strtotime($thongbao->NgayDang))}}">Ngày Đăng: {{date('d/m/Y', strtotime($thongbao->NgayDang))}}</time>
			</div>
			<div class="xemthem"style="float: right">
			<a class="btn btn-default btn-xs" href="{{route('chi-tiet-thong-bao',$thongbao->ID)}}">Chi tiết</a>           
			</div>
			<br>
			<hr/>
			@endforeach
		</div>
	</div>
</div>
@endsection