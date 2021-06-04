
@if($tenchungchi->TenChungChi=="TOEIC")
<table class="table table-striped" id="myTable">
  <thead>
  	<tr>
		<th colspan="4"  style="height: 50px; font-weight: bold; font-size: 14px;" align="center">UBND THÀNH PHỐ CẦN THƠ<br>TRƯỜNG ĐẠI HỌC KT - CN CẦN THƠ</th>
		<th colspan="5"  style="height: 50px; font-weight: bold; font-size: 14px;" align="center">CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM<br>Độc lập - Tự do - Hạnh phúc</th>
	</tr>
	<tr>
		<th colspan="9"style="font-weight: bold; font-size: 14px;" align="center">{{$tenlopthi->TenLopThi}}</th>
	</tr>
    <tr>
      <th style="font-weight: bold;font-size: 14px;">SBD</th>
      <th style="font-weight: bold;font-size: 14px;">Họ Tên</th>
      <th style="font-weight: bold;font-size: 14px;">Giới Tính</th>
      <th style="font-weight: bold;font-size: 14px;">Ngày Sinh</th>
      <th style="font-weight: bold;font-size: 14px;">Nơi Sinh</th>
      <th style="font-weight: bold;font-size: 14px;">Điểm Nghe</th>
      <th style="font-weight: bold;font-size: 14px;">Điểm Đọc</th>
      <th style="font-weight: bold;font-size: 14px;">Kết Quả</th>
      <th style="font-weight: bold;font-size: 14px;">Ghi Chú</th>
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
      @if($trangthai == "Chưa Nhập Điểm")
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      @else
      <td>{{$hocvien->DiemNghe}}</td>
      <td>{{$hocvien->DiemDoc}}</td>
      <td>{{$hocvien->KetQua}}</td>
      <td>{{$hocvien->GhiChu}}</td>
      @endif
    </tr>
    @endforeach
  </tbody>
</table>
@elseif($tenchungchi->TenChungChi=="IELTS")
<table class="table table-striped" id="myTable">
  <thead>
    <tr>
      <th style="font-weight: bold;font-size: 14px;">SBD</th>
      <th style="font-weight: bold;font-size: 14px;">Họ Tên</th>
      <th style="font-weight: bold;font-size: 14px;">Giới Tính</th>
      <th style="font-weight: bold;font-size: 14px;">Ngày Sinh</th>
      <th style="font-weight: bold;font-size: 14px;">Nơi Sinh</th>
      <th style="font-weight: bold;font-size: 14px;">Điểm Nghe</th>
      <th style="font-weight: bold;font-size: 14px;">Điểm Nói</th>
      <th style="font-weight: bold;font-size: 14px;">Điểm Đọc</th>
      <th style="font-weight: bold;font-size: 14px;">Điểm Viết</th>
      <th style="font-weight: bold;font-size: 14px;">Kết Quả</th>
      <th style="font-weight: bold;font-size: 14px;">Ghi Chú</th>
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
       @if($trangthai == "Chưa Nhập Điểm")
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      @else
      <td>{{$hocvien->DiemNghe}}</td>
      <td>{{$hocvien->DiemNoi}}</td>
      <td>{{$hocvien->DiemDoc}}</td>
      <td>{{$hocvien->DiemViet}}</td>
      <td>{{$hocvien->KetQua}}</td>
      <td>{{$hocvien->GhiChu}}</td>
      @endif
    </tr>
    @endforeach
  </tbody>
</table>
@elseif($tenchungchi->TenChungChi=="Tin Học")
<table class="table table-striped">
  <thead>
    <tr>
      <th style="font-weight: bold;font-size: 14px;">SBD</th>
      <th style="font-weight: bold;font-size: 14px;">Họ Tên</th>
      <th style="font-weight: bold;font-size: 14px;">Giới Tính</th>
      <th style="font-weight: bold;font-size: 14px;">Ngày Sinh</th>
      <th style="font-weight: bold;font-size: 14px;">Nơi Sinh</th>
      <th style="font-weight: bold;font-size: 14px;">Điểm Lý Thuyết</th>
      <th style="font-weight: bold;font-size: 14px;">Điểm Thực Hành</th>
      <th style="font-weight: bold;font-size: 14px;">Kết Quả</th>
      <th style="font-weight: bold;font-size: 14px;">Ghi Chú</th>
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
       @if($trangthai == "Chưa Nhập Điểm")
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      @else
      <td>{{$hocvien->DiemLyThuyet}}</td>
      <td>{{$hocvien->DiemThucHanh}}</td>
      <td>{{$hocvien->KetQua}}</td>
      <td>{{$hocvien->GhiChu}}</td>
      @endif
    </tr>
    @endforeach
  </tbody>
</table>
@endif