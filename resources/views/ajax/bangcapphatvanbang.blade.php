<link rel="stylesheet" type="text/css" href="source/css/sttTable.css">
<table class="table table-striped table-responsive" id="table_hocvien">

  <thead >
    <tr>
      <th id="chitiet"></th>
      <th id="tt">TT</th>
      <th>Trạng Thái</th>
      <th>Họ Tên</th>
      <th>Giới Tính</th>
      <th>Ngày Sinh</th>
      <th>Nơi Sinh</th>
      <th>Ngày Kiểm Tra</th>
      <th>Xếp Loại</th>
      <th>Ngày Ký</th>
      <th>Số Hiệu</th>
      <th>Số Vào Sổ</th>
    </tr>
  </thead>
  <tbody id="myTable">
    @foreach($xetduyet as $xetduyet)
    <tr>
      <td id="chitiet">
        <a href="{{route('cap-phat-van-bang-hoc-vien',$xetduyet->ID)}}" type="button" class="btn btn-default chitiethocvien">
          <i class="glyphicon glyphicon-eye-open"></i>
        </a>
      </td>
      <td></td>
      <td id="tt"><br>
        @if($xetduyet->XetDuyet == 'Chờ duyệt')
        <span class="fa fa-circle" style="color: yellow"> {{$xetduyet->XetDuyet}}</span>
        @elseif($xetduyet->XetDuyet == 'Đã duyệt')
        <span class="fa fa-circle" style="color: green"> {{$xetduyet->XetDuyet}}</span>
        @elseif($xetduyet->XetDuyet == 'Không duyệt')
        <span class="fa fa-circle" style="color: red"> {{$xetduyet->XetDuyet}}</span>
        @endif
      </td>
      <td>{{$xetduyet->HoTenHV}}</td>
      <td>{{$xetduyet->GioiTinh}}</td>
      <td>{{date('d/m/Y', strtotime($xetduyet->NgaySinh))}}</td>
      <td>{{$xetduyet->NoiSinh}}</td>
      <td>{{date('d/m/Y', strtotime($xetduyet->ThoiGianThi))}}</td>
      <td>{{$xetduyet->XepLoai}}</td>
      <td>{{date('d/m/Y', strtotime($xetduyet->NgayKy))}}</td>
      <td>{{$xetduyet->SoHieu}}</td>
      <td>{{$xetduyet->SoVaoSo}}</td>
    </tr>
    @endforeach
  </tbody>
</table>

<!-- Bắt đầu Modal chi tiết học viên-->
<div class="modal fade" id="modalchitiet" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

  <!-- Kết Thúc Modal Chi tiết học viên-->
</div>
  <script type="text/javascript">
    $(document).ready(function(){
        $("#table_hocvien").DataTable({
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
            "scrollX": true,
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
              console.log(results)
              $('#modalchitiet').html(results.html);
              $('#modalchitiet').modal({
                show: true
               });

            });

        });

    });
    </script>

