@extends('quantri')
@section('content')
<title>Tra cứu văn bằng</title>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="panel panel-default">
        <div class="panel-body">
            <form class="form-horizontal" action="" method='post' id='form-results'>
                <fieldset>
                    <legend>
                        <center><h3>Tra cứu văn bằng </h3></center>
                    </legend>
                    <div class="form-group">
                        <label for="mshv" class="col-lg-2 control-label">Tên văn bằng *</label>
                        <div class="col-lg-10" class="form-control">
                            <select id="tenvb">
                                <option>Chứng chỉ tiếng Anh trình độ A</option>
                                <option>Chứng chỉ tiếng Anh trình độ B</option>
                                <option>Chứng chỉ tiếng Anh trình độ C</option>
                                <option>Chứng chỉ tiếng tin học căn bản</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="mshv" class="col-lg-2 control-label">Họ tên</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="hoten" name="hoten" placeholder="Nhập họ tên">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="mshv" class="col-lg-2 control-label">Số hiệu</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="sohieu" name="sohieu" placeholder="Nhập số hiệu">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="mshv" class="col-lg-2 control-label">Số vào sổ</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="sovaoso" name="sovaoso" placeholder="Nhập số vào sổ">
                        </div>
                    </div>
                    <center><div class="form-group">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                            <button type='reset' class="btn btn-default" id="btn-reset"><i class="glyphicon glyphicon-refresh"></i>  Làm lại</button>
                        </div>
                    </div>
                    </center>
                </fieldset>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
 $(document).ready(function(){
    $("#tenvb").attr("placeholder","Chọn tên văn bằng");
    $("#btn-reset").click(function(){
        $("#tenvb").empty();
        $("#hoten").empty();
        $("#sohieu").empty();
        $("#sovaoso").empty();
    });
 });
 $("#tenvb").editableSelect();
</script>
@endsection