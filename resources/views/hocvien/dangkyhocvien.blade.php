@extends('master')
@section('content')
<title>Đăng Ký Học Viên</title>
@if(Session::has('themthanhcong'))
<div class="alert pull-right" id="thongbao" role="alert" style="color: green;font-size: 25px;right: 0px;top:0px;display: block;position: fixed; background: white;z-index: 2">
{{Session::get('themthanhcong')}}
</div>
@endif
        
        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
            <h3><center>Đăng Ký Học Viên<center></h3>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <div class="panel panel-default">
                    <div class="panel-body">
                        <form class="form-horizontal" action="{{route('dang-ky-hoc-vien')}}" method="POST" role="form" id='login_form'>
                             <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group" hidden="true">
                                <label class="col-lg-3 control-label">ID</label>
                                <div class="col-lg-9 ">
                                    @foreach($id as $id)
                                    <input type="text" name="id" class="form-control" value="{{$id->maxID+1}}" >
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Tài khoản </label>
                                <div class="col-lg-9 ">
                                    <input type="text" name="taikhoan"  class="form-control"  required="required"   placeholder='Tài Khoản'>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Họ và Tên</label>
                                <div class="col-lg-9 ">
                                    <input type="text" name="hoten" class="form-control"  required="required"   placeholder='Họ và Tên'>
                                </div>
                            </div>
                            <div class="form-group">
                              <label class="col-lg-3 control-label">Ngày sinh</label>
                              <div class="col-lg-9">
                                <div class="input-group">
                                  <input type="text" name="ngaysinh" id="ngaysinh" class="form-control" placeholder="Ngày sinh">
                                  <span class="input-group-addon"><label class="glyphicon glyphicon-calendar" for="ngaysinh"></label></span>
                                </div>
                              </div>
                            </div>
                             <div class="form-group">
                                <label class="col-lg-3 control-label">Giới Tính</label>
                                <div class="col-lg-9 ">
                                    <select class="form-control" name="gioitinh">
                                        <option value="Nam">Nam</option>
                                        <option value="Nữ">Nữ</option>
                                    </select>
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="col-lg-3 control-label">SĐT</label>
                                <div class="col-lg-9 ">
                                    <input type="text" name="sdt" class="form-control"  required="required" placeholder='Số điện thoại'>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Email</label>
                                <div class="col-lg-9 ">
                                    <input type="text" name="email" class="form-control"  required="required"   placeholder='Email'>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Nơi Sinh</label>
                                <div class="col-lg-9 ">
                                    <select name= "noisinh" class="form-control" id="noisinh" placeholder='Chọn nơi sinh'>
                                        <option value="An Giang">An Giang</option>
                                        <option value="Bà Rịa - Vũng Tàu">Bà Rịa - Vũng Tàu</option>
                                        <option value="Bắc Giang">Bắc Giang</option>
                                        <option value="Bắc Kạn">Bắc Kạn</option>
                                        <option value="Bạc Liêu">Bạc Liêu</option>
                                        <option value="Bắc Ninh">Bắc Ninh</option>
                                        <option value="Bến Tre">Bến Tre</option>
                                        <option value="Bình Định">Bình Định</option>
                                        <option value="Bình Dương">Bình Dương</option>
                                        <option value="Bình Phước">Bình Phước</option>
                                        <option value="Bình Thuận">Bình Thuận</option>
                                        <option value="Bình Thuận">Bình Thuận</option>
                                        <option value="Cà Mau">Cà Mau</option>
                                        <option value="Cao Bằng">Cao Bằng</option>
                                        <option value="Đắk Lắk">Đắk Lắk</option>
                                        <option value="Đắk Nông">Đắk Nông</option>
                                        <option value="Điện Biên">Điện Biên</option>
                                        <option value="Đồng Nai">Đồng Nai</option>
                                        <option value="Đồng Tháp">Đồng Tháp</option>
                                        <option value="Gia Lai">Gia Lai</option>
                                        <option value="Hà Giang">Hà Giang</option>
                                        <option value="Hà Nam">Hà Nam</option>
                                        <option value="Hà Tĩnh">Hà Tĩnh</option>
                                        <option value="Hải Dương">Hải Dương</option>
                                        <option value="Hậu Giang">Hậu Giang</option>
                                        <option value="Hòa Bình">Hòa Bình</option>
                                        <option value="Hưng Yên">Hưng Yên</option>
                                        <option value="Khánh Hòa">Khánh Hòa</option>
                                        <option value="Kiên Giang">Kiên Giang</option>
                                        <option value="Kon Tum">Kon Tum</option>
                                        <option value="Lai Châu">Lai Châu</option>
                                        <option value="Lâm Đồng">Lâm Đồng</option>
                                        <option value="Lạng Sơn">Lạng Sơn</option>
                                        <option value="Lào Cai">Lào Cai</option>
                                        <option value="Long An">Long An</option>
                                        <option value="Nam Định">Nam Định</option>
                                        <option value="Nghệ An">Nghệ An</option>
                                        <option value="Ninh Bình">Ninh Bình</option>
                                        <option value="Ninh Thuận">Ninh Thuận</option>
                                        <option value="Phú Thọ">Phú Thọ</option>
                                        <option value="Quảng Bình">Quảng Bình</option>
                                        <option value="Quảng Ngãi">Quảng Ngãi</option>
                                        <option value="Quảng Ninh">Quảng Ninh</option>
                                        <option value="Quảng Trị">Quảng Trị</option>
                                        <option value="Sóc Trăng">Sóc Trăng</option>
                                        <option value="Sơn La">Sơn La</option>
                                        <option value="Tây Ninh">Tây Ninh</option>
                                        <option value="Thái Bình">Thái Bình</option>
                                        <option value="Thái Nguyên">Thái Nguyên</option>
                                        <option value="Thanh Hóa">Thanh Hóa</option>
                                        <option value="Thừa Thiên Huế">Thừa Thiên Huế</option>
                                        <option value="Tiền Giang">Tiền Giang</option>
                                        <option value="Trà Vinh">Trà Vinh</option>
                                        <option value="Tuyên Quang">Tuyên Quang</option>
                                        <option value="Vĩnh Long">Vĩnh Long</option>
                                        <option value="Vĩnh Phúc">Vĩnh Phúc</option>
                                        <option value="Yên Bái">Yên Bái</option>
                                        <option value="Phú Yên">Phú Yên</option>
                                        <option value="Tp.Cần Thơ">Tp.Cần Thơ</option>
                                        <option value="Tp.Đà Nẵng">Tp.Đà Nẵng</option>
                                        <option value="Tp.Hải Phòng">Tp.Hải Phòng</option>
                                        <option value="Tp.Hà Nội">Tp.Hà Nội</option>
                                        <option value="TP.HCM">TP.HCM</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Mật khẩu</label>
                                <div class="col-lg-9 ">
                                    <input type="password" name="matkhau" class="form-control"  required="required"   placeholder='Mật khẩu'>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Nhập lại mật khẩu</label>
                                <div class="col-lg-9 ">
                                    <input type="password" name="nhaplaimatkhau" class="form-control"  required="required"   placeholder='Nhập lại mật khẩu'>
                                </div>
                            </div>
                            <div class="form-group pull-right" style="padding-right: 20px">
                                <button type="submit" class="btn btn-primary" >Đăng Ký</button>
                            </div>
                        </form>
                        <br/>     
                    </div>
                  </div>
             </div>
          </div>
  <script type="text/javascript">
       $('#ngaysinh').datepicker({format: 'dd/mm/yyyy'});
       $('#thongbaoloi').fadeOut(10000);
       $("#thongbao").fadeOut(10000);
  </script>
@endsection