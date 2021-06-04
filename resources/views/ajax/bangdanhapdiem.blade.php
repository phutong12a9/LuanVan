
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

<script lang="javascript" src=" https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.15.6/xlsx.full.min.js"></script>
<script type="text/javascript" charset="UTF-8" >
      $("#file-excel").change(function(e){
        $('#table').empty();
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