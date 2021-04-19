@extends('master')
@section('content')
<title>Đăng ký lớp học</title>
@if(Session::has('dangkythanhcong'))
<div class="alert pull-right" id="thongbao" role="alert" style="color: green;font-size: 25px;right: 0px;top:0px;display: block;position: fixed; background: white;z-index: 2">  {{Session::get('dangkythanhcong')}}
</div>
@endif
@if(Session::has('dangkythatbai'))
<div class="alert pull-right" id="thongbao" role="alert" style="color: red;font-size: 25px;right: 0px;top:0px;display: block;position: fixed; background: white;z-index: 2">  {{Session::get('dangkythatbai')}}
</div>
@endif
<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
  <div class="panel panel-default">
    <div class="panel-heading">
      <center><h3>THÔNG BÁO MỞ CÁC LỚP CHỨNG CHỈ</h3></center>
    </div>
    <div class="panel-body" style="padding: 0px !important;font-size: 12px">
      <br/>
      <form action="" method="post" role="form">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <table class="table table-striped" style="font-size: 18px">
          <thead >
            <tr style="background-color:#337ab7;color: white; font-size: 12px">
              <th hidden="true">ID</th>
              <th>Khóa</th>
              <th>Tên Khóa</th>
              <th>Khai Giảng</th>
              <th>Thời Gian Thi</th>
              <th>Học Phí</th>
              <th>Thao Tác</th>
            </tr>
          </thead>
          <tbody id="myTable">
            @foreach ($khoahoc as $khoahoc)
            <tr for="{{$khoahoc->IDKhoa}}">
              <td style="border: 2px solid rgba(192,192,192,0.8)" hidden="true">{{$khoahoc->IDKhoa}}</td>
              <td style="border: 2px solid rgba(192,192,192,0.8)">{{$khoahoc->Ten}}</td>
              <td style="border: 2px solid rgba(192,192,192,0.8)">{{$khoahoc->TenKhoa}}</td>
              <td style="border: 2px solid rgba(192,192,192,0.8)">{{date('d/m/Y', strtotime($khoahoc->NgayKhaiGiang))}}</td>
              <td style="border: 2px solid rgba(192,192,192,0.8)">{{date('d/m/Y', strtotime($khoahoc->ThoiGianThi))}}</td>
              <td style="border: 2px solid rgba(192,192,192,0.8);font-weight: bold; color: red">{{number_format($khoahoc->HocPhi)}} VND</td>
              <td style="border: 2px solid rgba(192,192,192,0.8)">
                <center>
                <button type="button" class="btn btn-info" data-toggle="collapse" data-target=".{{$khoahoc->IDKhoa}}" id="{{$khoahoc->IDKhoa}}">Xem Lớp</button>
                </center>
              </td>
            </tr>
            {{--  <tr class="collapse {{$khoahoc->IDKhoa}}">
              <th hidden="true">ID</th>
              <th colspan="3">Tên lớp</th>
              <th>Buổi</th>
              <th>Ngày học</th>
              <th>Thời gian học</th>
              <th></th>
            </tr> --}}
            <tr class="collapse alert alert-info {{$khoahoc->IDKhoa}}">
              <td colspan="7">
                <table width="100%" class="table" style="font-size: 16px">
                  {{--  <thead>
                    <tr>
                      <th hidden="true">ID</th>
                      <th colspan="3">Tên lớp</th>
                      <th>Buổi</th>
                      <th>Ngày học</th>
                      <th>Thời gian học</th>
                      <th></th>
                    </tr>
                  </thead> --}}
                  <tbody id="tt{{$khoahoc->IDKhoa}}" style="color: black">
                   
                  </tbody>
                </table>
              </td>
            </tr>
            <script type="text/javascript">
              $(document).ready(function(){

                  $('#{{$khoahoc->IDKhoa}}').click(function(){
                  var ID = {{$khoahoc->IDKhoa}};
                    $.get("ajax/lop/"+ID,function(data){

                      $('#tt{{$khoahoc->IDKhoa}}').html(data);
                
                  });
                });
              });
            </script>

            @endforeach
          </tbody>
        </table>
      </form>
    </div>
  </div>

</div>

@endsection