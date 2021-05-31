@if(session()->has('canbo'))
@extends('quantri')
@section('content')
<title>Giảng Viên</title>
<link rel="stylesheet" type="text/css" href="source/css/sttTable.css">
@if(Session::has('themthanhcong'))
<div class="alert pull-right" id="thongbao" role="alert" style="color: green;font-size: 25px;right: 0px;top:0px;display: block;position: fixed; background: white">{{Session::get('themthanhcong')}}
</div>
@endif
@if(Session::has('capnhatthanhcong'))
<div class="alert pull-right" id="thongbao" role="alert" style="color: green;font-size: 25px;right: 0px;top:0px;display: block;position: fixed; background: white;z-index: 2">
  {{Session::get('capnhatthanhcong')}}
</div>
@endif
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="background: white">
  <div class="pannel panel-default">
    <div class="panel-heading">
      <center><h3>Giảng Viên</h3></center>
    </div>
  </div>
  <button type="button" class="btn btn-primary" style="margin-bottom: 20px; margin-top: 20px;" data-toggle="modal" data-target="#themgiangvien">
  <i class="glyphicon glyphicon-plus-sign"></i> Thêm
  </button>
  <div class="panel panel-default">
    <div class="panel-body">
      <table class="table table-striped" id="table_giangvien">
        <thead >
          <tr style="background-color:#337ab7;color: white; font-size: 12px">
            <th hidden="true"></th>
            <th>STT</th>
            <th>Tên Giảng Viên</th>
            <th>Học Vị</th>
            <th>Giới Tính</th>
            <th>Ngày Sinh</th>
            <th>Địa Chỉ</th>
            <th>SĐT</th>
            <th>Email</th>
            <th>Thao Tác</th>
          </tr>
        </thead>
        <tbody id="myTable">
          @foreach($giangvien as $gv)
          <tr class="onRow">
            <td style="border: 2px solid rgba(192,192,192,0.8)" hidden="true">{{$gv->ID}}</td>
            <td style="border: 2px solid rgba(192,192,192,0.8)"></td>
            <td style="border: 2px solid rgba(192,192,192,0.8)">{{$gv->HoTenGV}}</td>
            <td style="border: 2px solid rgba(192,192,192,0.8)">{{$gv->TenHocVi}}</td>
            <td style="border: 2px solid rgba(192,192,192,0.8)">{{$gv->GioiTinh}}</td>
            <td style="border: 2px solid rgba(192,192,192,0.8)">{{date('d/m/Y', strtotime($gv->NgaySinh))}}</td>
            <td style="border: 2px solid rgba(192,192,192,0.8)">{{$gv->DiaChi}}</td>
            <td style="border: 2px solid rgba(192,192,192,0.8)">{{$gv->SDT}}</td>
            <td style="border: 2px solid rgba(192,192,192,0.8)">{{$gv->Email}}</td>
            <td style="border: 2px solid rgba(192,192,192,0.8)">
              <center>
                <a href=""><i class="glyphicon glyphicon-edit"></i>&nbsp;</a> &nbsp
                <a href="" onclick="return confirm ('Bạn chắc chắn muốn xóa?')"><i class="glyphicon glyphicon-trash"></i>&nbsp;</a>
                </center>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <!--                   <div style="border-bottom: 2px solid lightgray;font-size: 18px; color: blue; background: white" > Thông Tin Chung</div>
  <div class="pannel pannel-default" style="background: white">
    <div class="panel-body">
      <form class="form-horizontal" action="" method="post" role="form" id="thongtin">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group" hidden="true">
          <label class="col-lg-2 control-label">ID</label>
          <div class="col-lg-4">
            <input type="text" name="thongtin_id_dotcap" id="idcc" class="form-control id_chungchi">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-2 control-label">Tên Giảng Viên</label>
          <div class="col-lg-4" >
            <div class="col-lg-4">
              <input type="text" name="tengiangvien" id="tdc" class="form-control">
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-2 control-label">Giới Tính</label>
          <div class="col-lg-4">
            <input type="text" name="gioitinh" id="tdc" class="form-control">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-2 control-label">Ngày Sinh</label>
          <div class="col-lg-4">
            <input type="text" name="ngaysinh" id="tdc" class="form-control">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-2 control-label">Địa Chỉ</label>
          <div class="col-lg-4">
            <input type="text" name="diachi" id="tdc" class="form-control">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-2 control-label">SĐT</label>
          <div class="col-lg-4">
            <input type="text" name="sdt" id="tdc" class="form-control">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-2 control-label">Email</label>
          <div class="col-lg-4">
            <input type="text" name="email" id="tdc" class="form-control">
          </div>
        </div>
        <div class="form-group pull-right">
          <input type="submit" formaction="{{route('cap-nhat-dot-cap')}}" value="Lưu" class="btn btn-primary">
          <input type="submit" formaction="{{route('xoa-dot-cap')}}" value="Xóa" class="btn btn-danger" onclick=" return confirm('Bạn có chắc chắn muốn xóa?');">
          <button type="reset" class="btn btn-default" id="btn_Huybo">Hủy Bỏ</button>
        </div>
      </form>
    </div>
  </div> -->
</div>
<!-- Bắt đầu modal-->
<div class="modal fade" id="themgiangvien">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">Thêm Giảng Viên</h3>
        <!-- Modal body -->
        <div class="modal-body">
          <form class="form-horizontal" action="{{route('post-giang-vien')}}" method="post" role="form" id='form-giang-vien'>
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group">
              <label class="col-lg-4 control-label">Tên Giảng Viên</label>
              <div class="col-lg-8 ">
                <input type="text" name="tengiangvien" class="form-control"  required="required"   placeholder='Tên Giảng Viên'>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-4 control-label">Học Vị</label>
              <div class="col-lg-8 ">
                <select class="form-control" name="hocvi">
                  <option value="Thực Tập Sinh">Thực Tập Sinh</option>
                  <option value="Thạc Sỹ">Thạc Sỹ</option>
                  <option value="Tiến Sỹ">Tiến Sỹ</option>
                  <option value="Giáo Sư">Giáo Sư</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-4 control-label">Giới Tính</label>
              <div class="col-lg-8 ">
                <select name="gioitinh" class="form-control" >
                  <option value="Nam">Nam</option>
                  <option value="Nữ">Nữ</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-4 control-label">Ngày Sinh</label>
              <div class="col-lg-8 ">
                <input type="text" name="ngaysinh" class="form-control"  required="required"   placeholder='Ngày sinh'>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-4 control-label">Địa Chỉ</label>
              <div class="col-lg-8 ">
                <input type="text" name="diachi" class="form-control"  required="required"   placeholder='Địa chỉ'>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-4 control-label">SĐT</label>
              <div class="col-lg-8 ">
                <input type="number" name="sdt" class="form-control"  required="required"   placeholder='Số điện thoại'>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-4 control-label">Email</label>
              <div class="col-lg-8 ">
                <input type="email" name="email" class="form-control"  required="required"   placeholder='Email'>
              </div>
            </div>
            <div class="form-group pull-right">
              <button type="submit" class="btn btn-primary">Thêm</button>
            </div>
          </form>
          <br/>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Kết Thúc Modal-->
<script type="text/javascript">
        $(document).ready(function(){
            $("#myTable tr").click(function(){
                var id = $(this).closest('.onRow').find('td:nth-child(1)').text();
                var tenvanbang = $(this).closest('.onRow').find('td:nth-child(3)').text();
                var tendotcap = $(this).closest('.onRow').find('td:nth-child(4)').text();
                $("#idcc").val(id);
                $("#tencc").val(tenvanbang);
                $("#tdc").val(tendotcap);
            });
            $("#tencc").editableSelect();

        });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#btn_Huybo").click(function(event){
      $("#idcc").val().empty();
      $("#tencc").val().empty();
      $("#tdc").val().empty();
    });
    
  });
</script>
<script type="text/javascript">
  $("#thongbao").fadeOut(10000);
    $("#thongbaoloi").fadeOut(10000);
     $("#table_giangvien").DataTable({
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
                 "displayLength": 10,
                "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "Tất cả"]]
            });
</script>
@endsection
@endif