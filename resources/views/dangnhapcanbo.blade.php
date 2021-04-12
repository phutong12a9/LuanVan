<!DOCTYPE html>
<html lang="vi">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đăng Nhập</title>
    <base href="{{asset('')}}">
    <link rel="icon" type="image/png" href="source/img/Logo.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="source/css/styleslogin.css">
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-11"></div>
        <div class="col-1"></div>
      </div>
      <div class="row vh-100">
        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
          <div class="carousel slide" id="slide" data-ride="carousel">
            <!-- Indicators -->
            <ul class="carousel-indicators">
              <li data-target="#slide" data-slide-to="0" class="active"></li>
              <li data-target="#slide" data-slide-to="1"></li>
            </ul>

            <!-- The slideshow -->
            <div class="carousel-inner">
              <div class="item active">
                <img src="source/img/slide-login-1.png">
              </div>
              <div class="item">
                <img src="source/img/slide-login-2.png">
              </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#slide" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#slide" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
          </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 form-dangnhap">
            <div class="img-logo">
              <img src="source/img/Logo.png" width="130" height="130">
            </div>
            <form method="post" action="{{route('dang-nhap-can-bo-nhap-chung-chi')}}" name="" class="form-login" autocomplete="off">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <h1 class="name-lg">Đăng Nhập Hệ Thống</h1>
              <div class="form-group">
                <input type="text" name="taikhoan" class="form-control" placeholder="Nhập Tài Khoản">
              </div>
              <div class="form-group">
                <input type="password" name="matkhau" class="form-control" placeholder="Nhập Mật Khẩu">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-100">Đăng Nhập</button>
              </div>
            </form>
          </div>
                        @if(Session::has('dangnhapthatbai'))
                            <div class="alert pull-right" id="thongbao" role="alert" style="color: red;font-size: 25px;right: 0px;top:0px;display: block;position: fixed; background: white">
                              <i class="glyphicon glyphicon-warning-sign"></i> &nbsp
                            {{Session::get('dangnhapthatbai')}}

                            </div>
                        @endif
      </div>
    </div>
    
  </body>
  <script type="text/javascript">
      let msg = '{{Session::get('dangnhapthatbai')}}';
      let exist = '{{Session::has('dangnhapthatbai')}}';
      if(exist){
        alert(msg);
      }
      $("#thongbao").fadeOut(10000);
    </script>
  </html>