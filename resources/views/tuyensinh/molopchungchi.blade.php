@if(session()->has('canbo'))
@extends('quantri')
@section('content')
<title>Mở Lớp Chứng Chỉ</title>
@if(Session::has('themthanhcong'))
<div class="alert pull-right" id="thongbao" role="alert" style="color: green;font-size: 25px;right: 0px;top:0px;display: block;position: fixed; background: white">{{Session::get('themthanhcong')}}
</div>
@endif
@if(Session::has('thanhcong'))
<div class="alert pull-right" id="thongbao" role="alert" style="color: green;font-size: 25px;right: 0px;top:0px;display: block;position: fixed; background: white;z-index: 2">
  <i class="glyphicon glyphicon-ok"></i>{{Session::get('thanhcong')}}
</div>
@endif
<style type="text/css">
  #bang_lophoc {
  counter-reset: row-num;
}
#bang_lophoc tbody tr {
  counter-increment: row-num;
}
#bang_lophoc tr td:nth-child(1)::before {
    content: counter(row-num);
}
</style>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="pannel panel-default">
                    <div class="panel-heading">
                        <center><h3>Lớp Chứng Chỉ</h3></center>
                    </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-body" style="line-height: 20px;">
                    <form class="form-horizontal" action="" method="post" role="form" id="form_lopchungchi">
                      <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                      <button type="button" class="btn btn-success" style="width: 120px;" id="btn_themmoi">
                        <i class="glyphicon glyphicon-plus-sign"></i> Mở Lớp
                      </button>
                    </div>
                      <div class="col-lg-12" id="themlophoc" hidden="true">
                         <div class="panel panel-default">
                          <div class="panel-body">
                            <form class="form-horizontal" role="form" method="POST" id="form_themlopchungchi">
                              <input type="hidden" name="_token" value="{{csrf_token()}}">
                              <div class="form-group">
                                <label class="col-lg-4 control-label">Tên Văn bằng</label>
                                <div class="col-lg-6">
                                   <select class="form-control" id="tenchungchi" name="tenchungchi">
                                     <option>-- Chọn Tên Chứng Chỉ --</option>
                                      @foreach($chungchi as $chungchi)
                                      <option value="{{$chungchi->ID}}">{{$chungchi->TenChungChi}}</option> 
                                      @endforeach
                                  </select>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-lg-4 control-label">Đợt Cấp</label>
                                <div class="col-lg-6">
                                  <select id="dotcapchungchi" class="form-control" name="dotcapchungchi">
                                    <option>-- Chọn Đợt Cấp --</option>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-lg-4 control-label">Tên Lớp</label>
                                <div class="col-lg-6">
                                 <input type="text" name="tenlop" class="form-control" placeholder="Tên lớp">
                                </div>
                              </div>
                               <div class="form-group">
                                <label class="col-lg-4 control-label">Ngày Khai Giảng</label>
                                <div class="col-lg-6">
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                    <input type="text" name="ngaykhaigiang" class="form-control" placeholder="Ngày khai giảng" id="ngaykhaigiang" autocomplete="off"> 
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-lg-4 control-label">Buổi Học</label>
                                <div class="col-lg-6">
                                  <select class="form-control" id="buoihoc" name="buoihoc">
                                    <option value="Thứ 2 - 4 - 6">Thứ 2 - 4 - 6</option>
                                    <option value="Thứ 3 - 5 - 7">Thứ 3 - 5 - 7</option>
                                    <option value="Thứ 2 - 3 - 4">Thứ 2 - 3 - 4</option>
                                    <option value="Thứ 3 - 4 - 5">Thứ 3 - 4 - 5</option>
                                    <option value="Thứ 4 - 5 - 6">Thứ 4 - 5 - 6</option>
                                    <option value="Thứ 5 - 6 - 7">Thứ 5 - 6 - 7</option>
                                    <option value="Thứ 6 - 7 - CN">Thứ 6 - 7 -CN</option>
                                  </select>
                                </div>
                              </div>
                               <div class="form-group">
                                <label class="col-lg-4 control-label">Thời Gian Học</label>
                                <div class="col-lg-6">
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                                    <input type="text" name="thoigianhoc" class="form-control" placeholder="Thời Gian Học" id="thoigianhoc">
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-lg-4 control-label">Thời Gian Thi</label>
                                <div class="col-lg-6">
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                    <input type="text" name="thoigianthi" class="form-control" placeholder="Thời Gian Thi" id="thoigianthi" autocomplete="off">
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-lg-4 control-label">Học Phí</label>
                                <div class="col-lg-6">
                                 <input type="text" name="hocphi" class="form-control" placeholder="Học phí">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col-lg-4"></div>
                                <div class="col-lg-6">
                                  <input type="submit" name="btn-Them" formaction="{{route('mo-lop')}}" class="btn btn-success pull-right" id="btn_Them" value="Thêm">
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      </form>
                      </div>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-body ">
                      <div class="form-group col-lg-12">
                        <div class="filler" style="margin-bottom: 20px;">
                          <select class="filler-table" id="filler-table">
                            <option value="all">Tất cả</option>
                            <option value="Đang Mở">Đang Mở</option>
                            <option value="Đã Đóng">Đã Đóng</option>
                          </select>
                        </div>
                        <div id="table_lophoc">
                          <table class="table table-striped" id="bang_lophoc">
                            <thead >
                              <tr>
                                <th>STT</th>
                                <th>Tên Lớp</th>
                                <th>Khai Giảng</th>
                                <th>Thời Gian Học</th>
                                <th>Buổi Học</th>
                                <th>Thời Gian Thi</th>
                                <th>Học Phí</th>
                                <th>Trạng Thái</th>
                                <th>Thao Tác</th>
                              </tr>
                            </thead>
                            <tbody id="myTable">
                               @foreach ($lophocchungchi as $lophoc)
                              <tr>
                                <td></td>
                                <td>{{$lophoc->TenLop}}</td>
                                <td>{{date('d/m/Y', strtotime($lophoc->NgayKhaiGiang))}}</td>
                                <td>{{$lophoc->ThoiGianHoc}}</td>
                                <td>{{$lophoc->BuoiHoc}}</td>
                                <td>{{date('d/m/Y', strtotime($lophoc->ThoiGianThi))}}</td>
                                <td>{{number_format($lophoc->HocPhi)}} VND</td>
                                <td>{{$lophoc->TrangThai}}</td>
                                <td>
                                  <center>
                                    <a href=""><i class="glyphicon glyphicon-pencil"></i>&nbsp;</a> &nbsp
                                    <a href="" onclick="return confirm ('Bạn chắc chắn muốn xóa?')"><i class="glyphicon glyphicon-trash"></i>&nbsp;</a>
                                  </center>
                                </td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div>
                    </div>
                  </div>
             </div>
           </div>
         </div>
    <script type="text/javascript">
      $('#ngaythi').datepicker({format: 'dd/mm/yyyy'});
      $('#ngaykhaigiang').datepicker({format: 'dd/mm/yyyy'});
      $('#thoigianthi').datepicker({format: 'dd/mm/yyyy'});
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
           $("#tenchungchi").change(function(){
                let ID = $("#tenchungchi").val();
                $.get("ajax/dotcap/"+ID,function(data){
                    $("#dotcapchungchi").html(data);
                });
              });
      });
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
            $('#btn_themmoi').click(function(){
              $('#themlophoc').slideToggle("slow");
            });

             
        });
    </script>
    <script type="text/javascript">
      $(document).ready(function($) {
        //Lọc bảng lớp học
          $("#filler-table").on("change", function () {
            searchterm = $(this).val();                 
            $('#bang_lophoc tbody tr').each(function () {                    
                var sel = $(this);
                var txt = sel.find('td:eq(7)').text();
                if (searchterm != 'all') {
                    if (txt.indexOf(searchterm) === -1) {
                        $(this).hide();
                    }
                    else {
                        $(this).show();
                    }
                }
                else
                {                       
                    $('#bang_lophoc tbody tr').show();
                }
            });
        });
      });
    </script>
@endsection
@endif
