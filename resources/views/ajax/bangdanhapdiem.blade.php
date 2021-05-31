<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalNhapDiem" style="margin-bottom: 20px;">Nhập Điểm</button>
<button type="button" class="btn btn-success" style="margin-bottom: 20px;" id="btn_export">Export</button>
@foreach($loailophoc as $loailophoc)
@if($loailophoc->TenChungChi=="TOEIC")
<table class="table table-striped" id="myTable">
  <thead>
    <tr>
      <th>SBD</th>
      <th>Họ Tên</th>
      <th>Giới Tính</th>
      <th>Ngày Sinh</th>
      <th>Nơi Sinh</th>
      <th>Điểm Nghe</th>
      <th>Điểm Đọc</th>
      <th>Kết Quả</th>
      <th>Ghi Chú</th>
    </tr>
  </thead>
  <tbody>
    @foreach($hocvien as $hocvien)
    <tr>
      <td>{{$hocvien->ID}}</td>
      <td>{{$hocvien->HoTenHV}}</td>
      <td>{{$hocvien->GioiTinh}}</td>
      <td>{{date('d/m/Y', strtotime($hocvien->NgaySinh))}}</td>
      <td>{{$hocvien->NoiSinh}}</td>
      <td>{{$hocvien->DiemNghe}}</td>
      <td>{{$hocvien->DiemDoc}}</td>
      <td>{{$hocvien->KetQua}}</td>
      <td>{{$hocvien->GhiChu}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
@elseif($loailophoc->TenChungChi=="IELTS")
<table class="table table-striped" id="myTable">
  <thead>
    <tr>
      <th>SBD</th>
      <th>Họ Tên</th>
      <th>Giới Tính</th>
      <th>Ngày Sinh</th>
      <th>Nơi Sinh</th>
      <th>Điểm Nghe</th>
      <th>Điểm Nói</th>
      <th>Điểm Đọc</th>
      <th>Điểm Viết</th>
      <th>Kết Quả</th>
      <th>Ghi Chú</th>
    </tr>
  </thead>
  <tbody>
    @foreach($hocvien as $hocvien)
    <tr>
      <td>{{$hocvien->ID}}</td>
      <td>{{$hocvien->HoTenHV}}</td>
      <td>{{$hocvien->GioiTinh}}</td>
      <td>{{date('d/m/Y', strtotime($hocvien->NgaySinh))}}</td>
      <td>{{$hocvien->NoiSinh}}</td>
      <td>{{$hocvien->DiemNghe}}</td>
      <td>{{$hocvien->DiemNoi}}</td>
      <td>{{$hocvien->DiemDoc}}</td>
      <td>{{$hocvien->DiemViet}}</td>
      <td>{{$hocvien->KetQua}}</td>
      <td>{{$hocvien->GhiChu}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
@elseif($loailophoc->TenChungChi=="Tin Học")
<table class="table table-striped">
  <thead>
    <tr>
      <th>SBD</th>
      <th>Họ Tên</th>
      <th>Giới Tính</th>
      <th>Ngày Sinh</th>
      <th>Nơi Sinh</th>
      <th>Điểm Lý Thuyết</th>
      <th>Điểm Thực Hành</th>
      <th>Kết Quả</th>
      <th>Ghi Chú</th>
    </tr>
  </thead>
  <tbody>
    @foreach($hocvien as $hocvien)
    <tr>
      <td>{{$hocvien->ID}}</td>
      <td>{{$hocvien->HoTenHV}}</td>
      <td>{{$hocvien->GioiTinh}}</td>
      <td>{{date('d/m/Y', strtotime($hocvien->NgaySinh))}}</td>
      <td>{{$hocvien->NoiSinh}}</td>
      <td>{{$hocvien->DiemLyThuyet}}</td>
      <td>{{$hocvien->DiemThucHanh}}</td>
      <td>{{$hocvien->KetQua}}</td>
      <td>{{$hocvien->GhiChu}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
@endif
@endforeach
<!-- Modal -->
<div id="modalNhapDiem" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <center><h4 class="modal-title">Nhập Điểm</h4></center>
      </div>
      <div class="modal-body">
        <div class="panel panel-default">
          <div class="panel-body">
            <form method="post" action="{{route('nhap-diem-import')}}" enctype="multipart/form-data" class="form-horizontal">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <div class="form-group">
                <label class="col-lg-2 control-label">Lớp Học</label>
                <div class="col-lg-10">
                  <select class="form-control" name="lophoc" id="lophoc">
                    <option value="null">--Chọn lớp học--</option>
                    @foreach($lopthi as $lt)
                    <option value="{{$lt->ID}}">{{$lt->TenLopThi}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label"></label>
                <div class="col-lg-10">
                  <input type="file" name="file" class="form-control" accept=".xlsx" id="file-excel" required>
                </div>
              </div>
              <div id="table">

              </div>
              <hr>
              <div class="form-group">
                <button type="submit" class="btn btn-success pull-right" id="btnNhapDiem">Nhập Điểm</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script lang="javascript" src=" https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.15.6/xlsx.full.min.js"></script>
<script type="text/javascript" charset="UTF-8" >
      $("#file-excel").change(function(e){

       var reader = new FileReader();
        reader.readAsArrayBuffer(e.target.files[0]);
        reader.onload = function(e) {
        var data = new Uint8Array(reader.result);
        var wb = XLSX.read(data,{type:'array'});
        var htmlstr = XLSX.write(wb,{sheet:"Sheet1", type:'binary',bookType:'html'});
        $('#table')[0].innerHTML += htmlstr;
        }
      });
</script>
<script type="text/javascript">
   $(document).ready(function(){

    $("#btnNhapDiem").click(function(e){
      let lophoc = $("#lophoc").val();
      if (lophoc == "null") {
        alert("Bạn chưa chọn lớp học.");
        e.preventDefault();
      }
      });
    });
</script>
<script type="text/javascript">
  $(document).ready(function(){

     $("#btn_export").click(function () {
              let today = new Date();
              let time = today.getDate()+'_'+(today.getMonth()+1)+'_'+today.getFullYear() + "_" + today.getHours() + "_" + today.getMinutes() + "_" + today.getSeconds();
              let tenfile = "NhapDiemHocVien_"+time ;
                 $("#myTable").table2excel({
                    fileext:".xlsx",
                    preserveColors:true,
                    filename: tenfile,
                 });
            });

  });
</script>