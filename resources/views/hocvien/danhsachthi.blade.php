@if(session()->has('canbo'))
@extends('quantri')
@section('content')
<title>Danh Sách Thi</title>
<form class="form-horizontal" action="" method="post">
<input type="hidden" name="_token" value="{{csrf_token()}}">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
  <center><h3>Danh Sách Thi</h3></center>
  <div class="panel panel-default">
    <div class="panel-body" style="line-height: 20px;">
      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
        <div class="form-group">
          <select id="khoahoc" class="form-control" style="width: 90%">
            <option>--Chọn Khóa --</option>
            @foreach($khoa as $kh)
            <option value="{{$kh->ID}}">{{$kh->Ten}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
        <div class="form-group">
          <select class="form-control" id="tenkhoa" style="width: 90%" name="tenkhoa">

          </select>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="panel panel-default">
    <div class="panel-body">
      <div id="body_banglophoc">
        <div class="btnChucNang" style="padding-bottom: 20px;">
          <button type="button" class="btn btn-warning" id="btn_ADD"><i class="glyphicon glyphicon-plus"></i>Thêm Vào Lớp Thi</button>
        </div>
        <div class="col-lg-12" id="ThemVaoLop" hidden="true">
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="form-group">
                <label class="col-lg-4 control-label">Chọn Lớp Thi</label>
                <div class="col-lg-6">
                  <select class="form-control" name="tenlopthi" id="tenlopthi">
                   
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-4"></div>
                <div class="col-lg-6">
                  <input type="submit" formaction="{{route('them-hoc-vien-lop-thi')}}" name="btn_Them" class="btn btn-success pull-right" id="btn_Them" value="Thêm">
                </div>
              </div>
            </div>
          </div>
        </div>
        <table class="table table-striped" id="bang_lophoc">
          
        </table>
      </div>
    </div>
</div>
</form>
<!--Kết thúc body-->
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
    });
</script>
<script type="text/javascript">
  $(document).ready(function(){
       $("#khoahoc").change(function(){
        let ID = $(this).val();
        $.get("ajax/tenkhoahoc/"+ID, function(data){
          $('#tenkhoa').html(data);
        });
      });

      $("#tenkhoa").change(function(){
        let ID = $("#tenkhoa").val();
        $.get("ajax/khoahoc/"+ID,function(data){
          $("#bang_lophoc").html(data);
          });
        $.get("ajax/lopthi/"+ID,function(data){
          $("#tenlopthi").html(data);
          });
      });
  });
</script>
@endsection
@endif