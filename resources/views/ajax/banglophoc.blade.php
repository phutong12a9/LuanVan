
  <tbody id="myTable">
    @foreach($lophoc as $lh)
    <tr>
      <td></td>
      <td>{{$lh->TenLop}}</td>
      <td>Thứ {{$lh->NgayHoc}}</td>
      <td>{{$lh->BuoiHoc}}</td>
      <td>{{$lh->ThoiGianHoc}}</td>
      <td></td>
    </tr>
    @endforeach
  </tbody>