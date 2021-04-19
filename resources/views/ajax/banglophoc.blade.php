<style type="text/css">
  table {
  counter-reset: row-num;
}
  table tbody tr {
  counter-increment: row-num;
}
  table tr td:nth-child(1)::before {
    content: counter(row-num);
}

</style>
<table class="table table-striped">
  <thead >
    <th>STT</th>
    <th>Tên Lớp</th>
    <th>Họ Tên</th>
    <th>Giới Tính</th>
    <th>Ngày Sinh</th>
    <th>Nơi Sinh</th>
    <th>SĐT</th>
  </thead>
  <tbody>
    @foreach($lophoc as $lh)
    <tr>
      <td></td>
      <td>{{$lh->TenLop}}</td>
      <td>{{$lh->HoTenHV}}</td>
      <td>{{$lh->GioiTinh}}</td>
      <td>{{date('d/m/Y', strtotime($lh->NgaySinh))}}</td>
      <td>{{$lh->NoiSinh}}</td>
      <td>{{$lh->SDT}}</td>
    </tr>
    @endforeach
  </tbody>
</table>