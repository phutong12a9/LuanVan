@extends('master')
@section('content')
<title>Tra cứu kết quả thi</title>
<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
    <div class="panel panel-default">
        <div class="panel-body">
            <form class="form-horizontal" action="" method='post' id='form-results'>
                <fieldset>
                    <legend>
                        <center>
                        <div>Tra cứu kết quả thi </div>
                        </center>
                    </legend>

                    <div class="form-group">
                        <label for="mshv" class="col-lg-2 control-label">Số báo danh</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="sbd" name="sbd" placeholder="Nhập số báo danh">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="mshv" class="col-lg-2 control-label">Mã khoá thi</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="makt" name="makt" placeholder="Nhập khóa thi">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="mshv" class="col-lg-2 control-label">Ngày thi</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="ngaythi" name="ngaythi" placeholder="Nhập ngày thi">
                        </div>
                    </div>
                    <center><div class="form-group">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                            <button type='reset' class="btn btn-default" id="btn-reset"><i class="glyphicon glyphicon-refresh"></i>  Nhập lại</button>
                            <button type="button" class="btn btn-success " data-toggle="modal" data-target="#huong_dan">Xem hướng dẫn tra cứu</button>
                        </div>
                    </div></center>
                </fieldset>
            </form>
        </div>
    </div>
    <div class="panel panel-default" id="panel_ketqua" hidden="true">
        <div class="panel-body" id="body_ketqua">

        </div>
    </div>
</div>
<div class="modal fade" id="huong_dan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding-right: 16px;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"><h3><b>Phiếu Báo Dự Thi</b></h3></div>
            <div class="modal-body" id="body_modal_phieu">
                <img src="http://www.cit.ctu.edu.vn/chungchitinhoc/public/images/phieu_du_thi.png" style="width: 100%">
            </div>
            <div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button></div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('#ngaythi').datepicker({format: 'dd/mm/yyyy'});
    $('#form-results').submit(function(event) {
    $('#panel_ketqua').show();
    var sbd = document.getElementById('sbd').value;
    var makt = document.getElementById('makt').value;
    var ngaythi = document.getElementById('ngaythi').value;
    if (sbd == '' || makt == '' || ngaythi == '') {
        $('#body_ketqua').html('<center>Không có kết quả nào</center>');
    } /*else {
        $.ajax({
            url: this.action,
            type: 'post',
            dataType: 'html',
            data: {
                sbd: sbd,
                makt: makt,
                ngaythi: ngaythi
            },
        })
                .done(function(data) {
                    $('#body_ketqua').html(data);
                })
                .fail(function() {
                    console.log("error");
                })
                .always(function() {
                    console.log("complete");
                });
    }*/
    return false;
    });
    $('#btn-reset').click(function(event) {
    $('#panel_ketqua').hide();
    $("#sbd").empty();
    $("#makt").empty();
    $("#ngaythi").empty();
    });
</script>
@endsection
