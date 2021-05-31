@if(session()->has('canbo'))
@extends('quantri')
@section('content')
<title>Lớp Học</title>
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
  <center><h3>Danh Sách Học Viên Lớp học</h3></center>
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
          <select class="form-control" id="tenlop" style="width: 90%">

          </select>
        </div>
      </div>
      <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
        <div class="form-group">
          <select class="form-control" id="lophp" style="width: 90%">

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
        <table class="table table-striped" id="bang_lophoc">
          
        </table>
      </div>
    </div>
  </form>
</div>
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
        // $.get("ajax/khoahoc/"+ID,function(data){
        //   $("#bang_lophoc").html(data);
        //   });
        $.get("ajax/tenlop/"+ID,   
          function(data) { 
            $('#tenlop').html(data);
          });
      });
       $("#tenlop").change(function(){
        let ID = $("#tenlop").val();
        $.get("ajax/tenlophp/"+ID,function(data){
          $("#lophp").html(data);
          });
      });
        $("#lophp").change(function(){
        let ID = $("#lophp").val();
        $.get("ajax/lophocchinhthuc/"+ID,function(data){
          $("#bang_lophoc").html(data);
          });
      });
  });
</script>
@endsection
@endif