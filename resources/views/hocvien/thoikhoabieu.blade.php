@extends('master')
@section('content')
<title>Thời Khóa Biểu</title>
<style type="text/css">
.table>tbody>tr>td {
    text-align: center;
    vertical-align: middle;
  }
.table thead tr th {
    text-align: center;
    vertical-align: middle;
  }
.table tbody tr>td:nth-child(1){
  font-weight: bold;
}
</style>
<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
  <div class="panel panel-default">
    <div class="panel-heading"><center><h2>Thời Khóa Biểu</h2></center></div>
    @if(session()->has('users'))
    <div class="panel-body">
      <div class="col-xs-6 col-sm-6 col-md-4 col-lg-14">
        <select style="margin-bottom: 20px;" class="form-control">
          <option>Lớp Tiếng Anh Trình Độ A</option>
          <option>Lớp Tiếng Anh Trình Độ B</option>
          <option>Lớp Tiếng Anh Trình Độ C</option>
        </select>
      </div>
      <table class="table table-striped ">
        <thead>
          <tr>
            <th>Thứ</th>
            <th>Lớp</th>
            <th>Phòng Học</th>
            <th>Giờ Học</th>
            <th>Giảng Viên</th>
            <th>Ngày Học</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Thứ 2</td>
            <td id="tenlop1"></td>
            <td id="phong1"></td>
            <td id="gio1"></td>
            <td id="giangvien1"></td>
            <td id="ngayhoc1"></td>
          </tr>
          <tr>
            <td>Thứ 3</td>
            <td id="tenlop2"></td>
            <td id="phong2"></td>
            <td id="gio2"></td>
            <td id="giangvien2"></td>
            <td id="ngayhoc2"></td>
          </tr>
          <tr>
            <td>Thứ 4</td>
            <td id="tenlop3"></td>
            <td id="phong3"></td>
            <td id="gio3"></td>
            <td id="giangvien3"></td>
            <td id="ngayhoc3"></td>
          </tr>
          <tr>
            <td>Thứ 5</td>
            <td id="tenlop4"></td>
            <td id="phong4"></td>
            <td id="gio4"></td>
            <td id="giangvien4"></td>
            <td id="ngayhoc4"></td>
          </tr>
          <tr>
            <td>Thứ 6</td>
            <td id="tenlop5"></td>
            <td id="phong5"></td>
            <td id="gio5"></td>
            <td id="giangvien5"></td>
            <td id="ngayhoc5"><p></p></td>
          </tr>
          <tr>
            <td>Thứ 7</td>
            <td id="tenlop6"></td>
            <td id="phong6"></td>
            <td id="gio6"></td>
            <td id="giangvien6"></td>
            <td id="ngayhoc6"></td>
          </tr>
          <tr>
            <td>Chủ Nhật</td>
            <td id="tenlop0"></td>
            <td id="phong0"></td>
            <td id="gio0"></td>
            <td id="giangvien0"></td>
            <td id="ngayhoc0"></td>
          </tr>
        </tbody>
      </table>
    </div>
    @endif
  </div>
</div>
<script type="text/javascript">
    // sắp thời khóa biểu
    $(document).ready(function(){
      var now = new Date();
      // mảng ngày tháng năm
      var arrBuoiHoc =[];
      var arr = <?php echo json_encode($arr) ?>;
      var arr2 ='{ '
  + ' "TenLop": "Tiếng Anh Trình Độ A", '
  + ' "PhongHoc" : "C.3.1", '
  + ' "GioHoc" : "7h - 9h30",'
  + ' "GiangVien" : "Nguyễn Xuân Hà Giang"'
  + '}';
      arr.forEach(function(item){
          arrBuoiHoc.push(new Date(item));
      });
      var obj = JSON.parse(arr2);
      // lặp duyệt mảng
      arrBuoiHoc.forEach(function(item) {
      var day = item.getDay();
      // nếu ngày nhỏ hơn 10 thì thêm số 0
      if (item.getDate() < 10) {
        var formatted_date = "0"+item.getDate() + "/" + (item.getMonth() + 1) + "/" + item.getFullYear();
      }
      else{
        var formatted_date = item.getDate() + "/" + (item.getMonth() + 1) + "/" + item.getFullYear();
      }

        // xác định thứ trong tuần
        if (day == 1) {
          $("#tenlop1").text(obj.TenLop);
          $("#phong1").text(obj.PhongHoc);
          $("#gio1").text(obj.GioHoc);
          $("#giangvien1").text(obj.GiangVien);
          if (now > item) {
            $("#ngayhoc1").append("<p>"+formatted_date+"<br/><i style = 'color:red'>(Đã Kết Thúc)</i>"+"</p>");
          }
          else{
            $("#ngayhoc1").append("<p>"+formatted_date+ "</p>");
          }

        }
        if (day == 2) {
          $("#tenlop2").text(obj.TenLop);
          $("#phong2").text(obj.PhongHoc);
          $("#gio2").text(obj.GioHoc);
          $("#giangvien2").text(obj.GiangVien);
          if (now > item) {
            $("#ngayhoc2").append("<p>"+formatted_date+"<br/><i style = 'color:red'>(Đã Kết Thúc)</i>"+"</p>");
          }
          else{
            $("#ngayhoc2").append("<p>"+formatted_date+ "</p>");
          }
        }
        if (day == 3) {
          $("#tenlop3").text(obj.TenLop);
          $("#phong3").text(obj.PhongHoc);
          $("#gio3").text(obj.GioHoc);
          $("#giangvien3").text(obj.GiangVien);
          if (now > item) {
            $("#ngayhoc3").append("<p>"+formatted_date+"<br/><i style = 'color:red'>(Đã Kết Thúc)</i>"+"</p>");
          }
          else{
            $("#ngayhoc3").append("<p>"+formatted_date+ "</p>");
          }
        }
        if (day == 4) {
          $("#tenlop4").text(obj.TenLop);
          $("#phong4").text(obj.PhongHoc);
          $("#gio4").text(obj.GioHoc);
          $("#giangvien4").text(obj.GiangVien);
          if (now > item) {
            $("#ngayhoc4").append("<p>"+formatted_date+"<br/><i style = 'color:red'>(Đã Kết Thúc)</i>"+"</p>");
          }
          else{
            $("#ngayhoc4").append("<p>"+formatted_date+ "</p>");
          }
        }
        if (day == 5) {
          $("#tenlop5").text(obj.TenLop);
          $("#phong5").text(obj.PhongHoc);
          $("#gio5").text(obj.GioHoc);
          $("#giangvien5").text(obj.GiangVien);
          if (now > item) {
            $("#ngayhoc5").append("<p>"+formatted_date+"<br/><i style = 'color:red'>(Đã Kết Thúc)</i>"+"</p>");
          }
          else{
            $("#ngayhoc5").append("<p>"+formatted_date+ "</p>");
          }
        }
        if (day == 6) {
          $("#tenlop6").text(obj.TenLop);
          $("#phong6").text(obj.PhongHoc);
          $("#gio6").text(obj.GioHoc);
          $("#giangvien6").text(obj.GiangVien);
          if (now > item) {
            $("#ngayhoc6").append("<p>"+formatted_date+"<br/><i style = 'color:red'>(Đã Kết Thúc)</i>"+"</p>");
          }
          else{
            $("#ngayhoc6").append("<p>"+formatted_date+ "</p>");
          }
        }
        if (day == 0) {
          $("#tenlop0").text(obj.TenLop);
          $("#phong0").text(obj.PhongHoc);
          $("#gio0").text(obj.GioHoc);
          $("#giangvien0").text(obj.GiangVien);
          if (now > item) {
            $("#ngayhoc0").append("<p>"+formatted_date+"<br/><i style = 'color:red'>(Đã Kết Thúc)</i>"+"</p>");
          }
          else{
            $("#ngayhoc0").append("<p>"+formatted_date+ "</p>");
          }
        }
      });


  });

  </script>
@endsection