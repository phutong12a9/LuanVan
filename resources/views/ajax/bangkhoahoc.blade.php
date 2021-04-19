<style type="text/css">
  table {
    counter-reset: row-num;
  }

  table tbody tr {
    counter-increment: row-num;
  }

  table tr td:nth-child(2)::before {
    content: counter(row-num);
  }
</style>
<table class="table table-striped">
  <thead>
    <th width="40">Tất Cả<br><input type="checkbox" name="CheckBoxAll" id="CheckBoxAll"></th>
    <th>STT</th>
    <th>Tên Lớp</th>
    <th>Họ Tên</th>
    <th>Giới Tính</th>
    <th>Ngày Sinh</th>
    <th>Nơi Sinh</th>
    <th>SĐT</th>
    <th>Trạng Thái</th>
  </thead>
  <tbody>
    @foreach($khoahoc as $kh)
    <tr>
      <td><input type="checkbox" name="hocvien[]" class="checkbox" value="{{$kh->ID}}"></td>
      <td></td>
      <td>{{$kh->TenLop}}</td>
      <td>{{$kh->HoTenHV}}</td>
      <td>{{$kh->GioiTinh}}</td>
      <td>{{date('d/m/Y', strtotime($kh->NgaySinh))}}</td>
      <td>{{$kh->NoiSinh}}</td>
      <td>{{$kh->SDT}}</td>
      <td>{{$kh->TrangThai}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
<script type="text/javascript">
  $(document).ready(function() {

    // thay dổi trạng thái checkbox all
    $("#CheckBoxAll").change(function() {
      var status = this.checked;
      $('.checkbox').each(function() {
        this.checked = status;
      });

    });
    // kết thúc thay đổi trạng thái check all
    // checkbox lớp thay đổi thì checkbox all thay đổi
    $(".checkbox").change(function() {
      if (this.checked == false) {
        $("#CheckBoxAll")[0].checked = false;
      }
      // so sánh chiều dài check box để thay dổi trạng thái check box all
      if ($('.checkbox:checked').length == $('.checkbox').length) {
        $("#CheckBoxAll")[0].checked = true;
      }
    });
  });
</script>