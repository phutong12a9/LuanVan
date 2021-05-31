@if(session()->has('canbo'))
@extends('quantri')
@section('content')
<title>Nhập Điểm</title>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<center><h3>Nhập Điểm Học Viên</h3></center>
	<div class="panel panel-default">
		<div class="panel-body" style="line-height: 20px;">
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
		        <div class="form-group">
		          <select id="chungchi" class="form-control" style="width: 90%">
		           <option>--Chọn Chứng Chỉ --</option>
		            @foreach($chungchi as $cc)
		            <option value="{{$cc->ID}}">{{$cc->TenChungChi}}</option>
		            @endforeach
		          </select>
		        </div>
		      </div>
		      <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
		        <div class="form-group">
		          <select class="form-control" id="lopthi" style="width: 90%">

		          </select>
		        </div>
		      </div>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" hidden id="tt">
				<div class="form-group" >
					<select class="form-control" id="trangthai">
						<option value="Chưa Nhập Điểm">Chưa Nhập Điểm</option>
						<option value="Đã Nhập Điểm">Đã Nhập Điểm</option>
					</select>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="panel panel-default">
	<div class="panel-body">
		<div id="banghocvien"></div>
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
        });
      });
        $("#lopthi").change(function(){
        	$('#tt').show();
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