@if(session()->has('canbo'))
@extends('quantri')
@section('content')
<script type="text/javascript" src="source/ckeditor/ckeditor.js"> </script> <!--Ckeditor-->
<title>Đăng Thông Báo</title>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
  <div class="panel panel-default">
    <div class="panel-body">
      <form class="form-horizontal" action="{{route('dang-thong-bao-moi')}}" method='post' id='form-results'>
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <fieldset>
          <legend>
            <center><div>Đăng Thông Báo</div></center>
          </legend>
          <div class="form-group">
            <label for="mshv" class="col-lg-2 control-label">Chuyên Mục</label>
            <div class="col-lg-10">
              <select id="chuyenmuc" name="chuyenmuc" class="form-control">
                @foreach($chuyenmuc as $chuyenmuc)
                <option value="{{$chuyenmuc->ID}}">{{$chuyenmuc->TenCM}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="mshv" class="col-lg-2 control-label">Tiêu Đề</label>
            <div class="col-lg-10">
              <input type="text" class="form-control" placeholder="Nhập tiêu đề" name="tieude">
            </div>
          </div>
          <div class="form-group">
            <label for="mshv" class="col-lg-2 control-label">Tóm Tắt</label>
            <div class="col-lg-10">
              <textarea id="tomtat" name="tomtat" rows="3" class="form-control"></textarea>
            </div>
          </div>
          <div class="form-group">
            <label for="mshv" class="col-lg-2 control-label">Nội Dung</label>
            <div class="col-lg-10">
              <textarea name="noidung" id="noidung" class="form-control ckeditor" rows="5"></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="col-lg-12">
              <a href="{{route('dang-thong-bao-moi')}}">
                <button type="submit" class="btn btn-primary pull-right" style="font-size: 20px">Đăng
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
</script>
@endsection
@endif