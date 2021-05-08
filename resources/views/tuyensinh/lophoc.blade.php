@if(session()->has('canbo'))
@extends('quantri')
@section('content')
<title>Lớp Học</title>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
  <center><h3>Mở Lớp Học</h3></center>
  <div class="panel panel-default">
    <div class="panel-body" style="line-height: 20px;">
      <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
        <div class="form-group">
          <select id="khoahoc" class="form-control" style="width: 90%">
            <option>--Chọn Khóa --</option>
            @foreach($khoa as $kh)
            <option value="{{$kh->ID}}">{{$kh->Ten}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
        <div class="form-group">
          <select class="form-control" id="tenkhoa" style="width: 90%">

          </select>
        </div>
      </div>
      <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
        <div class="form-group">
          <select id="tenlophoc" class="form-control" style="width: 90%">
          
          </select>
        </div>
      </div>
      <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
        <div class="form-group">
          <select id="tenlophocphan" class="form-control" style="width: 90%">
          
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
          <button type="button" class="btn btn-info" id="btn_lophp"><i class="glyphicon glyphicon-plus"></i>Thêm Lớp Học Phần</button>
          <button type="button" class="btn btn-warning" id="btn_ADD"><i class="glyphicon glyphicon-plus"></i>Thêm Học Viên Lớp Học Phần</button>
        </div>
        <div class="col-lg-12" id="ThemVaoLop" hidden="true">
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="form-group">
                <label class="col-lg-4 control-label">Chọn Lớp Học</label>
                <div class="col-lg-6">
                  <select class="form-control" name="tenlophp" id="tenlophp">
                   
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
            <label class="col-lg-4 control-label">Khóa *</label>
            <div class="col-lg-2">
              <select class="form-control" name="khoa" id="khoa">
                <option value=""></option>
                @foreach($khoa as $k)
                <option value="{{$k->ID}}">{{$k->Ten}}</option>
                @endforeach
              </select>
            </div>
            <label class="col-lg-2 control-label">Khóa Học *</label>
            <div class="col-lg-2">
              <select class="form-control" name="tenkhoahoc" id="tenkhoahoc">
                
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-4 control-label">Ngày Học *</label>
            <div class="col-lg-6">
              <select class="form-control" id="ngayhoc" name="ngayhoc">
                <option value=""></option>
                <option value="2,4,6">Thứ 2,4,6</option>
                <option value="3,5,7">Thứ 3,5,7</option>
                <option value="2,3,4">Thứ 2,3,4</option>
                <option value="3,4,5">Thứ 3,4,5</option>
                <option value="4,5,6">Thứ 4,5,6</option>
                <option value="5,6,7">Thứ 5,6,7</option>
                <option value="6,7,CN">Thứ 6,7,CN</option>
                <option value="2,3">Thứ 2,3</option>
                <option value="2,4">Thứ 2,4</option>
                <option value="2,5">Thứ 2,5</option>
                <option value="2,6">Thứ 2,6</option>
                <option value="2,7">Thứ 2,7</option>
                <option value="2,CN">Thứ 2,CN</option>
                <option value="3,4">Thứ 3,4</option>
                <option value="3,5">Thứ 3,5</option>
                <option value="3,6">Thứ 3,6</option>
                <option value="3,7">Thứ 3,7</option>
                <option value="3,CN">Thứ 3,CN</option>
                <option value="4,5">Thứ 4,5</option>
                <option value="4,6">Thứ 4,6</option>
                <option value="4,7">Thứ 4,7</option>
                <option value="4,CN">Thứ 4,CN</option>
                <option value="5,6">Thứ 5,6</option>
                <option value="5,7">Thứ 5,7</option>
                <option value="5,CN">Thứ 5,CN</option>
                <option value="6,7">Thứ 6,7</option>
                <option value="6,CN">Thứ 6,CN</option>
                <option value="7,CN">Thứ 7,CN</option>
              </select>
            </div>
          </div>
           <div class="form-group">
            <label class="col-lg-4 control-label">Buổi Học *</label>
            <div class="col-lg-6">
              <select class="form-control" id="buoihoc" name="buoihoc">
                <option value=""></option>
                <option value="Sáng">Sáng</option>
                <option value="Tối">Tối</option>
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
            <label class="col-lg-4 control-label">Thời Gian Học *</label>
            <div class="col-lg-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                <input type="text" name="thoigianhoc" class="form-control" placeholder="Thời gian học" id="thoigianhoc">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-lg-4"></div>
            <div class="col-lg-6">
              <input type="submit" name="btn_Them" class="btn btn-success pull-right" id="btn_ThemLop" value="Thêm">
            </div>
          </div>
          <p><b>* Các trường bắt buộc</b></p>
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
  $('#btn_ThemLop').click(function(){
    var khoa = $('#khoa').val();
    var tenkhoa = $('#tenkhoahoc').val();
    var ngayhoc = $('#ngayhoc').val();
    var buoihoc = $('#buoihoc').val();
    var thoigianhoc = $('#thoigianhoc').val();

    if (khoa == "") {
      $('#khoa').css("border","2px solid red");
      event.preventDefault()
    }
    else {
      $('#khoa').css("border","none");
    }

    if (tenkhoa == "") {
      $('#tenkhoahoc').css("border","2px solid red");
      event.preventDefault()
    }
    else {
      $('#tenkhoahoc').css("border","none");
    }

    if (ngayhoc == "") {
      $('#ngayhoc').css("border","2px solid red");
      event.preventDefault()
    }
    else {
       $('#ngayhoc').css("border","none");
    }

    if (buoihoc == "") {
      $('#buoihoc').css("border","2px solid red");
      event.preventDefault()
    }
    else {
       $('#buoihoc').css("border","none");
    }

    if (thoigianhoc == "") {
      $('#thoigianhoc').css("border","2px solid red");
      event.preventDefault()
    }
    else{
       $('#thoigianhoc').css("border","none");
    }
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){

       $("#khoahoc").change(function(){
        let ID = $(this).val();
        $.get("ajax/tenkhoahoc/"+ID, function(data){
          $('#tenkhoa').html(data);

        });
        $('#tenlophoc').empty();
      });
      $("#khoa").change(function(){
        let ID = $(this).val();
        $.get("ajax/tenkhoahoc/"+ID, function(data){
          $('#tenkhoahoc').html(data);

        });
      });

      $("#tenlophoc").change(function(){
        let ID = $("#tenlophoc").val();
        $.get("ajax/lophoc/"+ID,function(data){
                    $("#bang_lophoc").html(data);
          });
      });

      $("#tenkhoa").change(function(){
        let ID = $("#tenkhoa").val();
        $.get("ajax/khoahoc/"+ID,function(data){
                    $("#bang_lophoc").html(data);
          });

        $.get("ajax/tenlop/"+ID,   
          function(data) { 
            $('#tenlophoc').html(data);
             $('#tenlophp').html(data);
          });
      });

      $("#tenkhoahoc").change(function(){
        $("#ngayhoc").change(function(){
          var ngayhoc = $(this).val();
          $("#buoihoc").change(function(){
             var buoihoc = $(this).val();
             $.get("{{ url('api/get_tenlop')}}", 
             { option: $("#tenkhoahoc").val() },  
              function(data) { 
                 $('#tenlop').val(data +" " + buoihoc + " " + ngayhoc);
              });
          });
        });
      });
  });
</script>
@endsection
@endif