<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="{{asset('')}}">
    <link rel="icon" type="image/png" href="source/img/Logo.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    <link rel="stylesheet" type="text/css" href="source/css/style.css">
    
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-0 col-sm-2 col-md-1 col-lg-1">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
          <!-- Bắt đầu banner-->
          <div class="col-lg-12" style="background: #e5e5e5">
            <div class="panel panel-default">
              <div class="panel-body" style="padding: 4px !important;">
                <img src="source/img/banner1.jpg" style="width:100%;">
              </div>
            </div>
          </div>
          <!-- Kết thúc banner-->
          <!-- Bắt đầu Navbar-->
          <div class="col-lg-12"  style="background: #e5e5e5;margin-top:-20px;">
            <div class="panel panel-default ">
              <div class="panel-body" style="padding: 4px !important;font-size: 16px; height: 60px;">
                <div class="navbar navbar-inverse">
                  <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{route('trang-chu')}}" title="Trang Chủ">Trang chủ</a>
                  </div>
                  <div class="navbar-collapse navbar-inverse-collapse collapse">
                    <ul class="nav navbar-nav">
                      <li>
                        <a href="{{route('tra-cuu-ket-qua-thi')}}" title="Tra Cứu Kết Quả Thi">Tra cứu kết quả thi</a>
                      </li>
                      <li>
                        <a href="{{route('tra-cuu-van-bang')}}" target="_blank" title="Tra Cứu Văn Bằng">Tra cứu văn bằng</a>
                      </li>
                      <li>
                        <a href="{{route('dang-ky-chung-chi')}}" title="Tra Cứu Văn Bằng">Đăng ký chứng chỉ</a>
                      </li>
                      <li>
                        <a href="{{route('lien-he')}}" title="Liên Hệ">Liên hệ</a>
                      </li>
                    </ul>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
          <!-- Kết thúc Navbar-->
          <!-- Bắt đầu Body-->
          <div class="col-lg-12"  style="background: #e5e5e5">
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                @if(session()->has('users'))
                <div class="panel panel-default">
                  <div class="panel-heading">Tài Khoản</div>
                  <div class="panel-body">
                    <div>Xin Chào! &nbsp<span style="color: red">@foreach($HoTenHV as $HT){{$HT->HoTenHV}}@endforeach</span></div>
                    
                    <button type="submit"style="width:49%;float:left; background-color: #FF6715;color: white;border: none; margin: 10px 0px 0px 0px;" >Đổi Mật Khẩu</button>
                    <a href="{{route('dang-xuat')}}">
                      <button type="button"style="width:49%;float:right;background-color: #FF6715; color: white;border: none;margin: 10px 0px 0px 0px">Đăng Xuất</button>
                    </a>
                  </div>
                </div>
                <div class="panel panel-default Chucnang">
                  <div class="panel-heading">Chức Năng</div>
                  <div class="panel-body" style="padding: 4px !important;font-size: 16px">
                    <ul style="line-height: 40px; display: block; list-style-type: none; padding: 10px 15px">
                      <li style="border-bottom: 1px dotted"><a href="">Thông Tin Tài Khoản</a></li>
                      <li style="border-bottom: 1px dotted"><a href="{{route('thoi-khoa-bieu')}}">Thời Khóa Biểu</a></li>
                      <li style="border-bottom: 1px dotted"><a href="">Lịch Thi</a></li>
                      <li style="border-bottom: 1px dotted"><a href="{{route('dang-ky-chung-chi')}}">Đăng Ký Chứng Chỉ</a></li>
                    </ul>
                  </div>
                </div>
                @else
                <!--Bắt dầu Panel Đăng Nhập-->
                <div class="panel panel-default">
                  <div class="panel-heading"> Đăng Nhập</div>
                  <div class="panel-body">
                    <form action="{{route('dang-nhap-hoc-vien')}}" method="POST" role="form" id='login_form'>
                      <input type="hidden" name="_token" value="{{csrf_token()}}">
                      <input type="text" name="taikhoan" id="ipt-username" class="form-control"  required="required"   placeholder='Tài Khoản'>
                      <br/>
                      <input type="password" name="matkhau" id="ipt-pw" class="form-control" required="required"   placeholder='Mật Khẩu'>
                      <br/>
                      <a href="{{route('dang-ky-hoc-vien')}}" type="button" class="btn btn-default" style="width:49%;float:left">Đăng ký</a>
                      <button type="submit" class="btn btn-success" style="width:49%;float:right" title="Đăng Nhập">Đăng nhập</button>
                    </form>
                  </div>
                </div>
                <!-- Kết Thúc Panel Đăng Nhập-->
                @endif
                <!--Bắt Đầu Panel Chuyên Mục-->
                <div class="panel panel-default">
                  <div class="panel-heading" title="Chuyên Mục">
                    Chuyên Mục
                  </div>
                  <div class="panel-body" style="padding: 4px !important;">
                    <div class="list-group">
                      <a href="{{route('chuyen-muc-thong-bao',1)}}" class="list-group-item" title="Chiêu Sinh">Chiêu Sinh</a>
                      <a href="{{route('chuyen-muc-thong-bao',2)}}" class="list-group-item" title="Lịch Thi">Lịch Thi</a>
                      <a href="{{route('chuyen-muc-thong-bao',3)}}" class="list-group-item" title="Thông Báo">Thông Báo</a>
                    </div>
                  </div>
                </div>
                <!-- Kết Thúc Panel Chuyên Mục-->
              </div>
              <!-- Bắt đầu Panel Nội dung -->
              @yield('content')
              
              @if(Session::has('dangnhapthanhcong'))
              <div class="alert pull-right" id="thongbao" role="alert" style="color: green;font-size: 25px;right: 0px;top:0px;display: block;position: fixed; background: white">
                <i class="glyphicon glyphicon-ok"> </i>
                {{Session::get('dangnhapthanhcong')}}
              </div>
              @endif
              @if(Session::has('dangnhapthatbai'))
              <div class="alert pull-right" id="thongbao" role="alert" style="color: red;font-size: 25px;right: 0px;top:0px;display: block;position: fixed ; background: white">
                <i class="glyphicon glyphicon-warning-sign"></i> &nbsp
                {{Session::get('dangnhapthatbai')}}
              </div>
              @endif
              @if(count($errors)>0)
              <div class="alert" style="color: red;font-size: 20px;right: 0px;top:0px;display: block;position: fixed; background: white;" id="thongbaoloi">
                
                {{$errors->first()}}
              </div>
              @endif
              @if(Session::has('loi'))
              <div class="alert pull-right" id="thongbao" role="alert" style="color: red;font-size: 25px;right: 0px;top:0px;display: block;position: fixed; background: white">
                <i class="glyphicon glyphicon-warning-sign"> </i>
                {{Session::get('loi')}}
              </div>
              @endif
              <!-- Kết thúc Panel Nội Dung-->
            </div>
          </div>
          <!--Kết Thúc Body-->
          
        </div>
      </div>
    </div>
    <!--Bắt đầu Footer-->
    <div class="container footer" style="width: 82%">
      <div class="row">
        <div class="col-lg-12">
          <p>Trung Tâm Ngoại Ngữ - Tin Học Đại Học Kỹ Thuật Công Nghệ Cần Thơ</p>
          <p>Địa Chỉ: Số 256, Nguyễn Văn Cừ, phường An Hòa, quận Ninh Kiều, TP.Cần Thơ</p>
          <p>Email:  ttnnth@ctuet.edu.vn</p>
        </div>
      </div>
    </div>
    <!--Kết thúc Footer-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap4/js/bootstrap.js"></script>
    <script type="text/javascript">
    $("#thongbaoloi").fadeOut(10000);
    $("#thongbao").fadeOut(10000);
    </script>
    <script type="text/javascript">
    var msg = '{{Session::get('dangnhapthatbai')}}';
    var exist = '{{Session::has('dangnhapthatbai')}}';
    if(exist){
    alert(msg);
    }
    </script>
  </body>
</html>