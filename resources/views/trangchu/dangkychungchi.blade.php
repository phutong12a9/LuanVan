@extends('master')
@section('content')
<title>Đăng ký chứng chỉ</title>
@if(Session::has('dangkythanhcong'))
<div class="alert pull-right" id="thongbao" role="alert" style="color: green;font-size: 25px;right: 0px;top:0px;display: block;position: fixed; background: white;z-index: 2">  {{Session::get('dangkythanhcong')}}
</div>
@endif
@if(Session::has('dangkythatbai'))
<div class="alert pull-right" id="thongbao" role="alert" style="color: red;font-size: 25px;right: 0px;top:0px;display: block;position: fixed; background: white;z-index: 2">  {{Session::get('dangkythatbai')}}
</div>
@endif
<style type="text/css">
  table {
  counter-reset: row-num;
}
table tbody tr {
  counter-increment: row-num;
}
table tr td:nth-child(1)::before {
    content: counter(row-num);
}
</style>
<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
  <div class="panel panel-default">
    <div class="panel-heading">
      <center><h3>THÔNG BÁO MỞ CÁC LỚP CHỨNG CHỈ</h3></center>
    </div>
    <div class="panel-body" style="padding: 0px !important;font-size: 12px">

      <br/>
      <form action="" method="post" role="form">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <table class="table table-striped">
          <thead >
            <tr style="background-color:#337ab7;color: white; font-size: 12px">
              <th>STT</th>
              <th>Tên Lớp</th>
              <th>Khai Giảng</th>
              <th>Thời Gian Học</th>
              <th>Buổi Học</th>
              <th>Thời Gian Thi</th>
              <th>Học Phí</th>
              <th>Thao Tác</th>
            </tr>
          </thead>
          <tbody id="myTable">
            @foreach ($lophoc as $lophoc)
            <tr>
              <td style="border: 2px solid rgba(192,192,192,0.8)"></td>
              <td style="border: 2px solid rgba(192,192,192,0.8)">{{$lophoc->TenLop}}</td>
              <td style="border: 2px solid rgba(192,192,192,0.8)">{{date('d/m/Y', strtotime($lophoc->NgayKhaiGiang))}}</td>
              <td style="border: 2px solid rgba(192,192,192,0.8); font-weight: bold;">{{$lophoc->ThoiGianHoc}}</td>
              <td style="border: 2px solid rgba(192,192,192,0.8)">{{$lophoc->BuoiHoc}}</td>
              <td style="border: 2px solid rgba(192,192,192,0.8)">{{date('d/m/Y', strtotime($lophoc->ThoiGianThi))}}</td>
              <td style="border: 2px solid rgba(192,192,192,0.8);font-weight: bold; color: red">{{number_format($lophoc->HocPhi)}} VND</td>
              <td style="border: 2px solid rgba(192,192,192,0.8)">
                <center>
                <button type="submit" formaction="{{route('dang-ky-chung-chi-post',$lophoc->IDLopHoc)}}">Đăng ký</button>
                </center>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </form>
    </div>
  </div>
  @if(session()->has('users'))
  <div class="panel panel-default" style="margin-top: 50px;">
    <div class="panel-heading" style="font-size: 18px; background: none; color: black">
      <h3>Bạn Đã Đăng Ký Các Lớp Chứng Chỉ</h3>
    </div>
    <div class="panel-body" style="padding: 0px !important;font-size: 12px">
      <table class="table table-striped">
        <thead >
          <tr style="background-color:#337ab7;color: white; font-size: 12px">
            <th>STT</th>
            <th>Tên Lớp</th>
            <th>Buổi Học</th>
            <th>Thời Gian Học</th>
            <th>Khai Giảng</th>
            <th>Học Phí</th>
            <th>Thu</th>
            <th>Thao Tác</th>
          </tr>
        </thead>
        <tbody>
          @foreach($lopdadangky as $lop)
          <tr>
            <td></td>
            <td>{{$lop->TenLop}}</td>
            <td>{{$lop->BuoiHoc}}</td>
            <td>{{$lop->ThoiGianHoc}}</td>
            <td>{{date('d/m/Y', strtotime($lop->NgayKhaiGiang))}}</td>
            <td style="font-weight: bold; color: red">{{number_format($lop->HocPhi)}} VND</td>
            <td>@if($lop->TrangThai == "Đã Đóng Học Phí")
              <i class="glyphicon glyphicon-ok" style="color: green"></i>
              @elseif($lop->TrangThai == "Chưa Đóng Học Phí")
              <i class="glyphicon glyphicon-remove" style="color: red"></i>
              @endif
            </td>
            <td>@if($lop->TrangThai == "Đã Đóng Học Phí")
              <a hidden="true">Hủy</a>
              @elseif($lop->TrangThai == "Chưa Đóng Học Phí")
              <center><a href="{{route('huy-dang-ky-chung-chi',$lop->ID)}}" onclick=" return confirm('Bạn có chắc chắn muốn hủy lớp ?');">Hủy</a></center>
              @endif
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <h5><b>* Vui lòng đóng học phí đúng hạn</b></h5>
    </div>
  </div>
  @endif
</div>
<script type="text/javascript"></script>
@endsection