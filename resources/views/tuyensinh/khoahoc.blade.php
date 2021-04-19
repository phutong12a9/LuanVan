@if(session()->has('canbo'))
@extends('quantri')
@section('content')
<title>Khóa Học</title>
@if (Session::has('error'))
    <div class="alert pull-right" id="thongbao" role="alert" style="color: red;font-size: 25px;right: 0px;top:0px;display: block;position: fixed; background: white;z-index: 2">
      <i class="glyphicon glyphicon-remove"></i>{{Session::get('error')}}
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
      <center><h3>Khóa Học</h3></center>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-body" style="line-height: 20px;">
      <form class="form-horizontal" action="" method="post" role="form" id="form_lopchungchi">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <button type="button" class="btn btn-success" style="width: 120px;" id="btn_themmoi">
          <i class="glyphicon glyphicon-plus-sign"></i> Mở khóa học
          </button>
        </div>
        <div class="col-lg-12" id="themkhoa" hidden="true">
          <div class="panel panel-default">
            <div class="panel-body">
              <form class="form-horizontal" role="form" method="POST" id="form_themlopchungchi">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-group">
                  <label class="col-lg-4 control-label">Tên chứng chỉ</label>
                  <div class="col-lg-6">
                    <select class="form-control" id="tenchungchi" name="tenchungchi">
                      <option>-- Chọn tên chứng chỉ --</option>
                      @foreach($chungchi as $chungchi)
                      <option value="{{$chungchi->ID}}">{{$chungchi->TenChungChi}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                 <div class="form-group" id="tt">
                  <label class="col-lg-4 control-label">Khoá</label>
                  <div class="col-lg-2" id="khoa">
                    <select class="form-control" name="khoa" required style="width: 70%">
                      @foreach($khoa as  $khoa)
                      <option value="{{$khoa->ID}}">{{$khoa->Ten}}</option>
                      @endforeach
                    </select>
                  </div>
                  <label class="col-lg-2 control-label">Cấp độ</label>
                  <div class="col-lg-2" id="capdo">
    
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-4 control-label">Ngày khai giảng</label>
                  <div class="col-lg-6">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                      <input type="text" name="ngaykhaigiang" class="form-control" placeholder="Ngày khai giảng" id="ngaykhaigiang" autocomplete="off">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-4 control-label">Thời gian thi (dự kiến)</label>
                  <div class="col-lg-6">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                      <input type="text" name="thoigianthi" class="form-control" placeholder="Thời gian thi" id="thoigianthi" autocomplete="off">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-4 control-label">Học phí</label>
                  <div class="col-lg-6">
                    <input type="text" name="hocphi" class="form-control" placeholder="Học phí">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-lg-4"></div>
                  <div class="col-lg-6">
                    <input type="submit" name="btn-Them" formaction="{{route('mo-khoa')}}" class="btn btn-success pull-right" id="btn_Them" value="Thêm">
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
              <th>Khóa</th>
              <th>Tên Khóa Học</th>
              <th>Khai Giảng</th>
              <th>Thi (dự kiến)</th>
              <th>Học Phí</th>
              <th>Trạng Thái</th>
              <th>Thao Tác</th>
            </tr>
          </thead>
          <tbody id="myTable">
            @foreach ($khoahoc as $khoahoc)
            <tr>
              <td></td>
              <td>{{$khoahoc->Ten}}</td>
              <td>{{$khoahoc->TenKhoa}}</td>
              <td>{{date('d/m/Y', strtotime($khoahoc->NgayKhaiGiang))}}</td>
              <td>{{date('d/m/Y', strtotime($khoahoc->ThoiGianThi))}}</td>
              <td>{{number_format($khoahoc->HocPhi)}} VND</td>
              <td>{{$khoahoc->TrangThai}}</td>
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
  <script type="text/javascript">
    $(document).ready(function(){
        $("#bang_lophoc").DataTable({
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
            "displayLength": 25,
            "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "Tất cả"]]
        });
        $('.chitiethocvien').click(function(event){
            event.preventDefault();
            let $this = $(this);
            let URL = $this.attr('href');
            $.ajax({
                url: URL

            }).done(function(results){
                                console.log(results);
              $('#modalchitiet').html(results.html);
              $('#modalchitiet').modal({
                show: true
               });

            });

        });

    });
</script>
<script type="text/javascript">
  $('#ngaythi').datepicker({format: 'dd/mm/yyyy'});
  $('#ngaykhaigiang').datepicker({format: 'dd/mm/yyyy'});
  $('#thoigianthi').datepicker({format: 'dd/mm/yyyy'});
</script>
<script type="text/javascript">
  $(document).ready(function(){
        $('#btn_themmoi').click(function(){
          $('#themkhoa').slideToggle("slow");
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
<script type="text/javascript">
  $(document).ready(function() {
    $('#tt').hide();
    $('#tenchungchi').change(function(){
       $('#tt').show();
       var tencc = $(this).val();
      if (tencc == "1") {
        $('#capdo').html('<select class="form-control"  name="capdo">'
                      +'<option value="350">350</option>'
                      +'<option value="450">450</option>'
                      +'<option value="650">650</option>'
                      +'<option value="850">850</option>'
                    +'</select>');
      }
      else if(tencc == "2"){
         $('#capdo').html('<select class="form-control" name="capdo">'
                      +'<option value="3.5">3.5</option>'
                      +'<option value="4.5">4.5</option>'
                      +'<option value="5.5">5.5</option>'
                      +'<option value="6.5">6.5</option>'
                      +'<option value="6.5+">6.5+</option>'
                    +'</select>');
      }
      else if(tencc == "3"){
         $('#capdo').html('<select class="form-control" name="capdo">'
                      +'<option value="căn bản">Căn bản</option>'
                      +'<option value="nâng cao">Nâng cao</option>'
                    +'</select>');
      }
      else{
         $('#capdo').html('<p></p>');
         $('#tt').hide();
      }

    })
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    var str = "Khóa 1"
    var tenkhoa = str.slice(str.indexOf('Khóa')+1);
    console.log(tenkhoa);
  });
</script>
@endsection
@endif
