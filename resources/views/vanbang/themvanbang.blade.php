@if(session()->has('canbo'))
@extends('quantri')
@section('content')
<!-- Bắt đầu Body-->
<title>Nhập Văn Bằng</title>
@if(Session::has('themthanhcong'))
<div class="alert pull-right" id="thongbao" role="alert" style="color: green;font-size: 25px;right: 0px;top:0px;display: block;position: fixed; background: white">
{{Session::get('themthanhcong')}}
</div>
@endif

@if(Session::has('capnhatthanhcong'))
<div class="alert pull-right" id="thongbao" role="alert" style="color: green;font-size: 25px;right: 0px;top:0px;display: block;position: fixed; background: white;z-index: 2">
{{Session::get('capnhatthanhcong')}}
</div>
@endif

@if(Session::has('xoathanhcong'))
<div class="alert pull-right" id="thongbao" role="alert" style="color: green;font-size: 25px;right: 0px;top:0px;display: block;position: fixed; background: white;z-index: 2">
{{Session::get('xoathanhcong')}}
</div>
@endif
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
  <center><h3>Nhập Văn Bằng</h3></center>
  <div class="panel panel-default">
    <div class="panel-body" style="line-height: 20px;">
      <form class="form-horizontal" action="{{route('export-van-bang')}}" method="post" role="form" id="form_chondotcap">
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
        <button type="button" class="btn btn-success" style="width: 120px;" data-toggle="modal" data-target="#import" id="btn_import">
        <i class="glyphicon glyphicon-upload"></i> Nhập Excel
        </button>
        <button type="submit" class="btn btn-info" id="export" style="width: 120px;" >
        <i class="glyphicon glyphicon-download"></i> Xuất Excel
        </button>
      </form>
    </div>
  </div>
</div>
<div class="panel panel-default">
  <div class="panel-body">
    <div id="body_banghocvien">
      
    </div>
  </div>
</div>
<!-- Bắt đầu modal import văn bằng bằng excel -->
<div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding-right: 16px;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <!-- Bắt đầu moadl header  import văn bằng bằng excel-->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Kết thúc modal header  import văn bằng bằng excel -->
      <!-- Bắt đầu Modal Body import văn bằng bằng excel -->
      <div class="modal-body" id="">
        <div class="panel panel-default">
          <div class="panel-body">
            <form class="form-horizontal" action="{{route('import-van-bang')}}" method="POST" role="form" id="form_import" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <div class="form-group">
                <label class=" col-lg-4 control-label">Tên đơn vị quản lý</label>
                <label class="col-lg-8 "> Trung Tâm Ngoại Ngữ - Tin Học CTUT</label>
              </div>
              <div class="form-group">
                  <label class="col-lg-4 control-label">
                    File Excel
                  </label>
                <div class="col-lg-8">
                  <input type="file" name="file" accept=".xlsx" required="true" id="file-excel">
                </div>
              </div>
              <div id="table">
                
              </div>
              <button type="{{route('import-van-bang')}}" class="btn btn-success pull-right" style="width: 120px;" id="btn_import_vb">
              <i class="glyphicon glyphicon-upload"></i> Nhập
              </button>
            </form>
          </div>
        </div>
      </div>
      <!-- Kết thúc modal body import văn bằng bằng excel-->
    </div>
  </div>
</div>
<!-- Kết thút modal import văn bằng bằng excel-->
</div>
</div>
<!--Kết thúc body-->
<script type="text/javascript">
    $(document).ready(function(){
         $("#thongbao").fadeOut(10000);
         $("#thongbaoloi").fadeOut(10000);
    });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#btn_import_vb").click(function(e){
      let id_vb = $("#md_tenvanbang").val();
      let id_dc = $("#md_dotcapvanbang").val();
      if (id_vb =="") {
        $("#err_tenvb").show();
        $("#err_tenvb").text("Vui lòng chọn tên văn bằng.");
        $("#err_tenvb").css({"color": "red", "font-size": "15px","font-weight":"bold"});
        e.preventDefault();
      }
      else{
        $("#err_tenvb").hide();
       
      }
      if (id_dc =="") {
        $("#err_dotvb").show();
        $("#err_dotvb").text("Vui lòng chọn đợt cấp văn bằng.");
        $("#err_dotvb").css({"color": "red", "font-size": "15px","font-weight":"bold"});
       e.preventDefault();
      }
      else{
        $("#err_dotvb").hide();
        
      }
      
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
      $.get("ajax/banghocvien/"+ID,   
          function(data) { 
            $('#body_banghocvien').html(data);
          });
    });
  });
</script>
<script lang="javascript" src=" https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.15.6/xlsx.full.min.js"></script>
<script type="text/javascript" charset="UTF-8" >
      $("#file-excel").change(function(e){
       var reader = new FileReader();
        reader.readAsArrayBuffer(e.target.files[0]);
        reader.onload = function(e) {
        var data = new Uint8Array(reader.result);
        var wb = XLSX.read(data,{type:'array'});
        var htmlstr = XLSX.write(wb,{sheet:"Sheet1", type:'string',bookType:'html'});
        $('#table').empty();
        $('#table')[0].innerHTML += htmlstr;
        }
      });
</script>
@endsection
@endif