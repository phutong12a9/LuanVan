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
                              @foreach($lophocphan as $lhp)
                              <tr>
                                <td></td>
                                <td>{{$lhp->TenLop}}</td>
                                <td>{{$lhp->HoTenHV}}</td>
                                <td>{{$lhp->GioiTinh}}</td>
                                <td>{{date('d/m/Y', strtotime($lhp->NgaySinh))}}</td>
                                <td>{{$lhp->NoiSinh}}</td>
                                <td>{{$lhp->SDT}}</td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>