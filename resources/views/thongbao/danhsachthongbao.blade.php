@if(session()->has('canbo'))
@extends('quantri')
@section('content')
<title>Danh Sách Thông Báo</title>
@if(Session::has('dangthanhcong'))
<div class="alert alert-success pull-right" id="thongbao" role="alert" style="color: green;font-size: 25px;text-align: center;right: 0px;top:0px;display: block;position: fixed">
{{Session::get('dangthanhcong')}}
</div>
@endif
@if(Session::has('xoathongbao'))
<div class="alert alert-success pull-right" id="thongbao" role="alert" style="color: green;font-size: 25px;text-align: center;right: 0px;top:0px;display: block;position: fixed">
{{Session::get('xoathongbao')}}
</div>
@endif
<h3><center>Danh Sách Thông Báo<center></h3>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <div class="panel panel-default">
                    <div class="panel-body">
                        @foreach($thongbao as $thongbao)
                        <div class="tieude">
                            <a href="{{route('cap-nhat-thong-bao',$thongbao->ID)}}"><b>{{$thongbao->TieuDe}}</b></a><br>
                        </div><br>
                        <div class="tomtat" style="max-width: 90%;">
                            {{$thongbao->TomTat}}        
                        </div><br>
                        <div class="ngaydang" style="float: left;">
                            <time style="color: #aaa" datetime="{{date('d/m/Y', strtotime($thongbao->NgayDang))}}">Ngày Đăng: {{date('d/m/Y', strtotime($thongbao->NgayDang))}}</time>
                        </div>
                        <div class="xoa">
                            <a href="{{route('xoa-thong-bao',$thongbao->ID)}}" class="btn btn-default btn-xs"style="float: right" onclick="return confirm ('Bạn chắc chắn muốn xóa?')">Xóa</a>
                        </div>
                        <br>
                        <hr/> 
                        @endforeach   
                  </div>
             </div>
        </div>
    </div>
    <script type="text/javascript">
        $("#thongbao").fadeOut(8000);
    </script>
@endsection
@endif