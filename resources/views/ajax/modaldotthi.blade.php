<!-- Modal Header -->
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h3 class="modal-title">Cập Nhật Đợt Thi</h3>
    <!-- Modal body -->
    <div class="modal-body">
        <form class="form-horizontal" method="post" role="form" id='form_capnhatdotthi'>
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group">
                <label class="col-lg-4 control-label">Đợt Thi</label>
                <div class="col-lg-8 ">
                    <div class="input-group">
                        @foreach($dotthi as $dotthi)
                        <input type="text" name="capnhatthoigianthi" id="capnhatthoigianthi" class="form-control" value="{{$dotthi->TG_Thi}}">
                        @endforeach
                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar" for="tendotthi"></i></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <input type="text" name="id" value="{{$dotthi->ID}}">
            </div>
            <div class="form-group pull-right">
                <input type="submit" name="capnhat" formaction="{{route('cap-nhat-dot-thi')}}" value="Cập Nhật" class="btn btn-primary">
            </div>
        </form>
        <br/>
    </div>
</div>