<table class="table table-striped" id="banghocvien">
  <thead >
    <th>STT</th>
    <th>Họ Tên</th>
    <th>Giới Tính</th>
    <th>Ngày Sinh</th>
    <th>Nơi Sinh</th>
    <th>SĐT</th>
    <th>Email</th>
    <th>Thao tác</th>
  </thead>
  <tbody>
    @foreach($lophoc as $lh)
    <tr>
      <td></td>
      <td>{{$lh->HoTenHV}}</td>
      <td>{{$lh->GioiTinh}}</td>
      <td>{{date('d/m/Y', strtotime($lh->NgaySinh))}}</td>
      <td>{{$lh->NoiSinh}}</td>
      <td>{{$lh->SDT}}</td>
      <td>{{$lh->Email}}</td>
      <td><center><a href="" title="Xóa" onclick="return confirm ('Bạn chắc chắn muốn xóa?')"><i class="glyphicon glyphicon-trash"></i>&nbsp;</a></center></td>
    </tr>
    @endforeach
  </tbody>
</table>