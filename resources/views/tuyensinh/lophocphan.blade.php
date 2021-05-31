@if(session()->has('canbo'))
@extends('quantri')
@section('content')
<title>Lớp Học Phần</title>
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
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
  <center><h3>Lớp Học Phần</h3></center>
</div>
<div class="panel panel-default">
  <form class="form-horizontal" action="" method="post">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="panel-body">
      <div id="body_banglophoc">
        <div class="btnChucNang" style="padding-bottom: 20px;">
          <button type="button"class="btn btn-primary" id="btn_MoLop" data-toggle="modal" data-target="#Modal_LopHP">Mở Lớp Học Phần</button>
        </div>
        <table class="table table-striped" id="bang_lophocphan">
          <thead >
            <tr>
              <th></th>
              <th>Tên Lớp</th>
              <th>Giảng Viên</th>
              <th>Thao Tác</th>
            </tr>
          </thead>
          <tbody id="myTable">
            @foreach($lophocphan as $lhp)
            <tr>
              <td></td>
              <td>{{$lhp->TenLop}}</td>
              <td>{{$lhp->HoTenGV}}</td>
             <td>
                <center>
                <a href="{{route('sap-xep-lop',$lhp->ID)}}" title="Chi tiết"><i class="glyphicon glyphicon-list"></i>&nbsp;</a> &nbsp
                <a href="" title="Chỉnh sửa"><i class="glyphicon glyphicon-edit"></i>&nbsp;</a> &nbsp
                <a href="" title="Xóa" onclick="return confirm ('Bạn chắc chắn muốn xóa?')"><i class="glyphicon glyphicon-trash"></i>&nbsp;</a>
                </center>
              </td>
            </tr>
            @endforeach
          </tbody>
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
        <center><h3 class="modal-title">Mở Lớp Học Phần</h3><center>
      </div>
      <div class="modal-body">
        <form method="post" action="{{route('post-lop-hoc-phan')}}" class="form-horizontal">
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
            <label class="col-lg-4 control-label">Tên Lớp</label>
            <div class="col-lg-6">
              <select class="form-control" name="tenlop" id="tenlop">
                <option></option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-4 control-label">Tên Lớp Phần</label>
            <div class="col-lg-6">
              <input type="text" name="tenlophp" class="form-control" id="tenlophp">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-4 control-label">Giảng Viên</label>
            <div class="col-lg-6">
              <select class="form-control" name="giangvien" id="giangvien">
                @foreach($giangvien as $gv)
                <option value="{{$gv->ID}}">{{$gv->HoTenGV}}</option>
                @endforeach
              </select>
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
        $("#trangthai").show();
      });

      $("#tenkhoahoc").change(function(){
        let ID = $("#tenkhoahoc").val();

        $.get("ajax/tenlop/"+ID,   
          function(data) { 
            $('#tenlop').html(data);
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