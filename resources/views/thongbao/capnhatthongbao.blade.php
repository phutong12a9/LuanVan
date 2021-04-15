@if(session()->has('canbo'))
@extends('quantri')
@section('content')
@if(Session::has('capnhatthanhcong'))
<div class="alert alert-success pull-right" id="thongbao" role="alert" style="color: green;font-size: 25px;text-align: center;right: 0px;top:0px;display: block;position: fixed">
  {{Session::get('capnhatthanhcong')}}
</div>
@endif
<script type="text/javascript" src="source/ckeditor/ckeditor.js"> </script> <!--Ckeditor-->
<title>Cập Nhật Thông Báo</title>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
  <div class="panel panel-default">
    <div class="panel-body">
      <form class="form-horizontal" action="{{route('cap-nhat-lai-thong-bao')}}" method='post' id='form-results'>
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <fieldset>
          <legend>
            <center><div>Cập Nhật Thông Báo</div></center>
          </legend>
          <div class="form-group" hidden="true">
            <label  class="col-lg-2 control-label">ID</label>
            <div class="col-lg-10">
              @foreach($thongbao as $thongbao)
              <input type="text" class="form-control" name="id" value="{{$thongbao->ID}}">
              @endforeach
            </div>
          </div>
          <div class="form-group">
            <label for="mshv" class="col-lg-2 control-label">Chuyên Mục</label>
            <div class="col-lg-10">
              <select id="chuyenmuc" name="chuyenmuc" class="form-control">
                @foreach($chuyenmuc as $chuyenmuc)
                <option value="{{$chuyenmuc->ID}}">{{$chuyenmuc->TenCM}}
                </option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="mshv" class="col-lg-2 control-label">Tiêu Đề</label>
            <div class="col-lg-10">
              <input type="text" class="form-control" placeholder="Nhập tiêu đề" name="tieude" value="{{$thongbao->TieuDe}}">
            </div>
          </div>
          <div class="form-group">
            <label for="mshv" class="col-lg-2 control-label">Tóm Tắt</label>
            <div class="col-lg-10">
              <textarea name="tomtat" id="tomtat" class="form-control" rows="4">{{$thongbao->TomTat}}</textarea>
            </div>
          </div>
          <div class="form-group">
            <label for="mshv" class="col-lg-2 control-label">Nội Dung</label>
            <div class="col-lg-10">
              <textarea name="noidung" id="noidung" class="form-control ckeditor" rows="5">{{$thongbao->NoiDung}}</textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="col-lg-12">
              <a href="">
                <button type="submit" class="btn btn-info pull-right" style="font-size: 20px">Cập Nhật
                </button>
              </a>
            </div>
          </div>
        </fieldset>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
CKEDITOR.replace('noidung');
$("#thongbao").fadeOut(10000);
$("#thongbaoloi").fadeOut(10000);
</script>
@endsection
@endif