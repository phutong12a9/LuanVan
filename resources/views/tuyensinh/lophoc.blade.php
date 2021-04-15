@if(session()->has('canbo'))
@extends('quantri')
@section('content')
@if(Session::has('themthanhcong'))
<div class="alert pull-right" id="thongbao" role="alert" style="color: green;font-size: 25px;right: 0px;top:0px;display: block;position: fixed; background: white;z-index: 2">{{Session::get('themthanhcong')}}
</div>
@endif
<title>Sắp Xếp Khóa Học</title>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
  <center><h3>Mở Lớp Học</h3></center>
  <div class="panel panel-default">
    <div class="panel-body" style="line-height: 20px;">
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <div class="form-group">
          <select class="form-control" id="tenkhoa" style="width: 90%">
            <option>-- Chọn Tên Khoá --</option>
            @foreach($khoahoc as $khoahoc)
            <option value="{{$khoahoc->ID}}">{{$khoahoc->TenKhoa}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <div class="form-group">
          <select id="tenlophoc" class="form-control" style="width: 90%">
            <option>-- Chọn Lớp Học --</option>
            @foreach($lophoc as $lop)
            <option value="{{$lop->ID}}">{{$lop->TenLop}}</option>
            @endforeach
          </select>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="panel panel-default">
  <form class="form-horizontal" action="" method="post">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="panel-body">
      <div id="body_banglophoc">
        <div class="btnChucNang" style="padding-bottom: 20px;">
          <button type="button"class="btn btn-primary" id="btn_MoLop" data-toggle="modal" data-target="#Modal_LopHP">Mở Lớp Học</button>
          <button type="button" class="btn btn-warning" id="btn_ADD"><i class="glyphicon glyphicon-plus"></i> Học Phần Học Viên</button>
        </div>
        <div class="col-lg-12" id="ThemVaoLop" hidden="true">
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="form-group">
                <label class="col-lg-4 control-label">Chọn Lớp Học</label>
                <div class="col-lg-6">
                  <select class="form-control" name="tenlophp" id="hocphan">
                    <option value="null">-- Chọn Tên Lớp Học --</option>
                    @foreach($lophoc as $lop)
                    <option value="{{$lop->ID}}">{{$lop->TenLop}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-4"></div>
                <div class="col-lg-6">
                  <input type="submit" formaction="{{route('them-hoc-vien-lop-hoc')}}" name="btn_Them" class="btn btn-success pull-right" id="btn_Them" value="Thêm">
                </div>
              </div>
            </div>
          </div>
        </div>
        <table class="table table-striped" id="bang_lophoc">
          
        </table>
      </div>
    </div>
  </form>
</div>
<!--Kết thúc body-->
<!-- Modal -->
<div id="Modal_LopHP" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <center><h3 class="modal-title">Lớp Học</h3><center>
      </div>
      <div class="modal-body">
        <form method="post" action="{{route('lop-hoc-post')}}" class="form-horizontal">
          <input type="hidden" name="_token" value="{{csrf_token()}}">
          <div class="form-group">
            <label class="col-lg-4 control-label">Khóa</label>
            <div class="col-lg-6">
              <select class="form-control" name="lophoc" id="lophoc">
                <option value="null">-- Chọn Lớp --</option>
                @foreach($kh as $kh)
                <option value="{{$kh->ID}}">{{$kh->TenKhoa}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-4 control-label">Tên Lớp</label>
            <div class="col-lg-6">
              <input type="text" name="tenlop" class="form-control" id="tenlop" readonly>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-4 control-label">Giảng Viên</label>
            <div class="col-lg-6">
              <select class="form-control" name="giangvien" id="giangvien">
                <option value="null">-- Chọn Giảng Viên --</option>
                @foreach($giangvien as $giangvien)
                <option value="{{$giangvien->ID}}">{{$giangvien->HoTenGV}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-4 control-label">Buổi Học</label>
            <div class="col-lg-6">
              <select class="form-control" id="buoihoc" name="buoihoc">
                <option value="2 - 4 - 6">Buổi 2 - 4 - 6</option>
                <option value="3 - 5 - 7">Buổi 3 - 5 - 7</option>
                <option value="2 - 3 - 4">Buổi 2 - 3 - 4</option>
                <option value="3 - 4 - 5">Buổi 3 - 4 - 5</option>
                <option value="4 - 5 - 6">Buổi 4 - 5 - 6</option>
                <option value="5 - 6 - 7">Buổi 5 - 6 - 7</option>
                <option value="6 - 7 - CN">Buổi 6 - 7 -CN</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-4 control-label">Thời Gian Học</label>
            <div class="col-lg-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                <input type="text" name="thoigianhoc" class="form-control" placeholder="Thời gian hoc" id="thoigianhoc">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-4 control-label">Phòng Học</label>
            <div class="col-lg-6">
              <select class="form-control" name="phonghoc" id="phonghoc">
                <option value="null">-- Chọn Phòng Học --</option>
                <option value="C.1.1">C.1.1</option>
                <option value="C.1.2">C.1.2</option>
                <option value="C.1.3">C.1.3</option>
                <option value="C.1.4">C.1.4</option>
                <option value="C.1.5">C.1.5</option>
                <option value="C.1.6">C.1.6</option>
                <option value="C.2.1">C.2.1</option>
                <option value="C.2.2">C.2.2</option>
                <option value="C.2.3">C.2.3</option>
                <option value="C.2.4">C.2.4</option>
                <option value="C.2.5">C.2.5</option>
                <option value="C.2.6">C.2.6</option>
                <option value="C.3.1">C.3.1</option>
                <option value="C.3.2">C.3.2</option>
                <option value="C.3.3">C.3.3</option>
                <option value="C.3.4">C.3.4</option>
                <option value="C.3.5">C.3.5</option>
                <option value="C.3.6">C.3.6</option>
                <option value="C.4.1">C.4.1</option>
                <option value="C.4.2">C.4.2</option>
                <option value="C.4.3">C.4.3</option>
                <option value="C.4.4">C.4.4</option>
                <option value="C.4.5">C.4.5</option>
                <option value="C.4.6">C.4.6</option>
                <option value="C.5.1">C.5.1</option>
                <option value="C.5.2">C.5.2</option>
                <option value="C.5.3">C.5.3</option>
                <option value="C.5.4">C.5.4</option>
                <option value="C.5.5">C.5.5</option>
                <option value="C.5.6">C.5.6</option>
                <option value="C.6.1">C.6.1</option>
                <option value="C.6.2">C.6.2</option>
                <option value="C.6.3">C.6.3</option>
                <option value="C.6.4">C.6.4</option>
                <option value="C.6.5">C.6.5</option>
                <option value="C.6.6">C.6.6</option>
                <option value="Phòng Máy 1">Phòng Máy 1</option>
                <option value="Phòng Máy 2">Phòng Máy 2</option>
                <option value="Phòng Máy 3">Phòng Máy 3</option>
                <option value="Phòng Máy 4">Phòng Máy 4</option>
                <option value="Phòng Máy 5">Phòng Máy 5</option>
                <option value="Phòng Máy 6">Phòng Máy 6</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="col-lg-4"></div>
            <div class="col-lg-6">
              <input type="submit" name="btn_Them" class="btn btn-success pull-right" id="btn_ThemLop" value="Thêm">
            </div>
          </div>
        </form>
      </div>
      
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $("#bang_lophoc").DataTable({
              "language": {
                 "lengthMenu": "Xem _MENU_ mục",
                "zeroRecords": "Không tìm thấy dòng nào phù hợp",
                "info": "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
                "sSearch":       "Tìm kiếm :",
                "infoEmpty": "Đang xem 0 đến 0 trong tổng số 0 mục",
                "infoFiltered": "(được lọc từ _MAX_ mục)",
                "oPaginate":{
                      "sFirst":    "Đầu",
                      "sPrevious": "Trước",
                      "sNext":     "Tiếp",
                      "sLast":     "Cuối",
                }
                          },
                "pagingType": "full_numbers",
                "scrollX": true,
                "displayLength": 25,
                "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "Tất cả"]]
            });
  });
</script>

    <script type="text/javascript">
      $(document).ready(function(){
            $('#btn_ADD').click(function(){
              $('#ThemVaoLop').slideToggle("slow");
            });

             
        });
    </script>
<script type="text/javascript">
   $(document).ready(function(){

    $("#btn_Them").click(function(e){
      let lophp = $("#hocphan").val();
      if (lophp == "null") {
        alert("Bạn chưa chọn lớp học phần.");
        e.preventDefault();
      } 
      if ($(".checkbox:checked").length == 0) {
          alert("Bạn chưa chọn học viên nào.");
          e.preventDefault();
        }
       
      });    
      $("#btn_ThemLop").click(function(e){
      let giangvien = $("#giangvien").val();
      let phonghoc = $("#phonghoc").val();
      let lophoc = $("#lophoc").val();
      if (lophoc == "null") {
        alert("Bạn chưa chọn lớp học.");
        e.preventDefault();
      } 
      if (giangvien == "null") {
        alert("Bạn chưa chọn giảng viên.");
        e.preventDefault();
      } 
      if (phonghoc == "null") {
        alert("Bạn chưa chọn phòng học.");
        e.preventDefault();
      } 
      
       
      });        
    });
</script>
<script type="text/javascript">
  $(document).ready(function(){

      $("#tenlophoc").change(function(){
        let ID = $("#tenlophoc").val();
        $.get("ajax/lophocphan/"+ID,function(data){
                    $("#bang_lophoc").html(data);
                });
      });
      $("#tenkhoa").change(function(){
        let ID = $("#tenkhoa").val();
        $.get("ajax/lophoc/"+ID,function(data){
                    $("#bang_lophoc").html(data);
                });
      });
      $("#lophoc").change(function(){
        $.get("{{ url('api/get_tenlop')}}", 
         { option: $(this).val() },  
          function(data) { 
            var tenlop = data.split('~');
             $('#tenlop').val(tenlop[0] + " lớp " + tenlop[1]);
          });
      });

  });
</script>
@endsection
@endif