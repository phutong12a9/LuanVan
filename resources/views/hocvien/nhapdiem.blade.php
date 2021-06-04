@if(session()->has('canbo'))
@extends('quantri')
@section('content')
<title>Nhập Điểm</title>
<style type="text/css">
  #table table{
    width: 100%;
  }
  #table table tr{
    border: 1px solid;
    text-align: center;
  }
  #table table tr td{
    border: 1px solid
  }
</style>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<center><h3>Nhập Điểm Học Viên</h3></center>
	<form class="form-horizontal" method="post" action="{{route('nhap-diem-export')}}">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
	<div class="panel panel-default">
		<div class="panel-body" style="line-height: 20px;">
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
		        <div class="form-group">
		          <select id="chungchi" class="form-control" style="width: 90%" name="chungchi">
		           <option>--Chọn Chứng Chỉ --</option>
		            @foreach($chungchi as $cc)
		            <option value="{{$cc->ID}}">{{$cc->TenChungChi}}</option>
		            @endforeach
		          </select>
		        </div>
		      </div>
		      <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
		        <div class="form-group">
		          <select class="form-control" id="lopthi" style="width: 90%" name="lopthi">

		          </select>
		        </div>
		      </div>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" hidden id="tt">
				<div class="form-group" >
					<select class="form-control" id="trangthai" name="trangthai">
						<option value="Chưa Nhập Điểm">Chưa Nhập Điểm</option>
						<option value="Đã Nhập Điểm">Đã Nhập Điểm</option>
					</select>
				</div>
			</div>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" hidden id="Nhapdiemexport">
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<input type="submit" name="Nhapdiemexport"  value="Xuất Excel" class="btn btn-md btn-success" >
				</div>
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalNhapDiemExcel" style="margin-bottom: 20px;">Nhập Điểm Excel</button>
				</div>
				
			</div>
		</div>
	</div>
</form>
</div>
<div class="panel panel-default">
	<div class="panel-body">
		<div id="banghocvien"></div>
	</div>
</div>
<!-- Modal -->
<div id="modalNhapDiemExcel" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <center><h4 class="modal-title">Nhập Điểm</h4></center>
      </div>
      <div class="modal-body">
        <div class="panel panel-default">
          <div class="panel-body">
            <form method="post" action="{{route('nhap-diem-import')}}" enctype="multipart/form-data" class="form-horizontal">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <div class="form-group">
                <label class="col-lg-2 control-label">Tên Chứng Chỉ</label>
                <div class="col-lg-10">
                  <select class="form-control" name="tenchungchi" id="tenchungchi" required>
                    <option value="">--Chọn chứng chỉ--</option>
                    @foreach($chungchi as $cc)
                    <option value="{{$cc->TenChungChi}}">{{$cc->TenChungChi}}</option>
                    @endforeach
                  </select>
                  <div class="err" style="color: red;" hidden>
                  	
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label"></label>
                <div class="col-lg-10">
                  <input type="file" name="file" class="form-control" accept=".xlsx" id="file-excel" required>
                </div>
              </div>
              <div id="table">

              </div>
              <hr>
              <div class="form-group">
                <button type="submit" class="btn btn-success pull-right" id="btnNhapDiemExcel">Nhập Điểm</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
{{-- <script type="text/javascript">
	$(document).ready(function(){

      $("#tenlop").change(function(){

      	$('#trangthai option').prop('selected', function() {
        return this.defaultSelected;
    	});

        let ID = $("#tenlop").val();
        $.get("ajax/hocvienchuanhapdiem/"+ID,function(data){
                    $("#banghocvien").html(data);
                });
        $("#trangthai").change(function(){
        let trangthai = $("#trangthai").val();
	        if (trangthai == "Chưa Nhập Điểm") {
	        	$.get("ajax/hocvienchuanhapdiem/"+ID,function(data){
	                    $("#banghocvien").html(data);
	                });
	        }
	        if(trangthai == "Đã Nhập Điểm"){
	        	$.get("ajax/hocvienlophoc/"+ID,function(data){
	                    $("#banghocvien").html(data);
	                });
	        }

	      });
      });


  });
</script>
 --}}<script type="text/javascript">
  $(document).ready(function(){
       $("#chungchi").change(function(){
        let ID = $(this).val();
        $.get("ajax/tenlopthi/"+ID, function(data){
          $('#lopthi').html(data);
          $('#tt').hide();
          $('#Nhapdiemexport').hide();
        });
      });
        $("#lopthi").change(function(){
        	$('#tt').show();
        	$('#Nhapdiemexport').show();
	        let ID = $("#lopthi").val();
	        $('#trangthai option').prop('selected', function() {
	        return this.defaultSelected;
	    	});

    	$.get("ajax/hocvienchuanhapdiem/"+ID,function(data){
                    $("#banghocvien").html(data);
                });

        $("#trangthai").change(function(){
        let trangthai = $("#trangthai").val();
	        if (trangthai == "Chưa Nhập Điểm") {
	        	$.get("ajax/hocvienchuanhapdiem/"+ID,function(data){
	                    $("#banghocvien").html(data);
	                });
	        }
	        if(trangthai == "Đã Nhập Điểm"){
	        	$.get("ajax/hocviendanhapdiem/"+ID,function(data){
	                    $("#banghocvien").html(data);
	                });
	        }

	      });
      });
  });
</script>
@endsection
@endif