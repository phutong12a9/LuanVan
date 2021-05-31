@if(session()->has('canbo'))
@extends('quantri')
@section('content')
@if(Session::has('xetduyetthanhcong'))
<div class="alert pull-right" id="thongbao" role="alert" style="color: green;font-size: 25px;right: 0px;top:0px;display: block;position: fixed; background: white">
  {{Session::get('xetduyetthanhcong')}}
</div>
@endif
<title>Duyệt Văn Bằng</title>
<!-- Bắt đầu Body-->
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
  <div class="pannel panel-default">
    <div class="panel-heading">
      <center><h3>Duyệt Văn Bằng</h3></center>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-body" style="line-height: 20px;">
      <form class="form-horizontal" action="" method="post" role="form" id="form_chondotcap">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
          <div class="form-group">
            <select class="form-control" id="tenvb" style="width: 90%" name="tenvb">
              <option value="">-- Chọn Tên Chứng Chỉ --</option>
              @foreach($chungchi as $chungchi)
              <option value="{{$chungchi->ID}}">{{$chungchi->TenChungChi}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
          <div class="form-group">
            <select id="lopthi" class="form-control" style="width: 90%" name="lopthi">
            </select>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="panel panel-default">
  <div class="panel-body table-responsive">
    <div id="body_banghocvien">

    </div>
  </div>
</div>
<iframe id="txtArea1" style="display:none"></iframe>
<!--Kết thúc body-->
<script type="text/javascript">
    $(document).ready(function(){
        $("#table_hocvien").DataTable({
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
            "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "Tất cả"]]
        });
});
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#tenvb').change(function(){
      var ID = $(this).val();
      $.get("ajax/tenlopthi/"+ID,   
          function(data) { 
            $('#lopthi').html(data);
          });
    });

    $('#lopthi').change(function(){
      var ID = $(this).val();
      $.get("ajax/bangxetduyethocvien/"+ID,   
          function(data) { 
            $('#body_banghocvien').html(data);
          });
    });
  });
</script>
<script type="text/javascript">
//$('#tenvb').editableSelect();
//$('#dotvb').editableSelect();
  $('#loctrangthai').editableSelect();
  $('#tenvanbang').editableSelect();
  $('#dotcapvanbang').editableSelect();
  $('#gioitinh').editableSelect();
  $('#ngaysinh').datepicker({format: 'dd/mm/yyyy'});
  $('#ngaykt').datepicker({format: 'dd/mm/yyyy'});
  $('#ngayky').datepicker({format: 'dd/mm/yyyy'});
  $('#ct_ngaysinh').datepicker({format: 'dd/mm/yyyy'});
  $('#ct_ngaykt').datepicker({format: 'dd/mm/yyyy'});
  $('#ct_ngayky').datepicker({format: 'dd/mm/yyyy'});
  $("#thongbao").fadeOut(10000);
</script>
  <script type="text/javascript">
    $(document).ready(function(){
      let tenvb = $("#tenvb").val();
      if ( tenvb ="all") {
        $.get("ajax/bangxetduyethocvienchungchi/",function(data){
                  $("#body_banghocvien").html(data);
              });
      }
    });
  </script>

@endsection
@endif