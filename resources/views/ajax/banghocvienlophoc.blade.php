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
<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 " style="margin-bottom: 20px;">
  <select class="form-control" id="filler-table">
    <option value="all">Tất cả</option>
    <option value="Đã Đóng Học Phí">Đã Đóng Học Phí</option>
    <option value="Chưa Đóng Học Phí">Chưa Đóng Học Phí</option>
  </select>
</div>
<table class="table table-striped" id="banghocvien">
  <thead >
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
    @foreach($lophoc as $lh)
    <tr>
      <td>@if($lh->TrangThai == "Chưa Đóng Học Phí")
        <input type="checkbox" name="hocvien[]" class="checkbox" value="{{$lh->ID}}">
        @endif
      </td>
      <td></td>
      <td>{{$lh->TenLop}}</td>
      <td>{{$lh->HoTenHV}}</td>
      <td>{{$lh->GioiTinh}}</td>
      <td>{{date('d/m/Y', strtotime($lh->NgaySinh))}}</td>
      <td>{{$lh->NoiSinh}}</td>
      <td>{{$lh->SDT}}</td>
      <td>{{$lh->TrangThai}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
<script type="text/javascript">
        $(document).ready(function(){
  
             // thay dổi trạng thái checkbox all
             $("#CheckBoxAll").change(function(){
                  var status = this.checked;
                  $('.checkbox').each(function(){ 
                    this.checked = status; 
                });

             });
             // kết thúc thay đổi trạng thái check all
             // checkbox lớp thay đổi thì checkbox all thay đổi
             $(".checkbox").change(function(){
                  if (this.checked == false) {
                    $("#CheckBoxAll")[0].checked = false;
                  }
                  // so sánh chiều dài check box để thay dổi trạng thái check box all
                  if ($('.checkbox:checked').length == $('.checkbox').length ){ 
                    $("#CheckBoxAll")[0].checked = true;  
                  }
             });
        });
    </script>
<script type="text/javascript">
$(document).ready(function($) {
  //Lọc bảng lớp học
    $("#filler-table").on("change", function () {
      searchterm = $(this).val();
      $('#banghocvien tbody tr').each(function () {
          var sel = $(this);
          var txt = sel.find('td:eq(8)').text();
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
              $('#banghocvien tbody tr').show();
          }
      });
  });
});
    </script>