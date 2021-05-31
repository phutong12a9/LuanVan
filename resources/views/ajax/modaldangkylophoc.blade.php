<!-- Bắt đầu Modal chi tiết học viên-->
<div class="modal-dialog modal-md">
  <div class="modal-content">
    <!-- Bắt đầu moadl header chi tiết học viên-->
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    <!-- Kết thúc modal header  chi tiết học viên -->
    <!-- Bắt đầu Modal Body chi tiết học viên -->
    <div class="modal-body" id="">
      <div class="panel panel-default">
        <div class="panel-body">
          <form class="form-horizontal" method="post" role="form" id="form_xetduyethocvien" action="{{route('dang-ky-lop-hoc-post')}}">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group">
              <label class="col-lg-4 control-label">Tên đơn vị quản lý</label>
              <label class="col-lg-8 "> Trung Tâm Ngoại Ngữ - Tin Học</label>
            </div>
            @foreach($lophoc as $lh)
            <div class="form-group">
              <label class="col-lg-4 control-label">Tên Khóa</label>
              <div class="col-lg-8">
                <select id="khoa" name="khoa" class="form-control">
                  <option>{{$lh->TenKhoa}}</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-4 control-label">Tên Lớp</label>
              <div class="col-lg-8">
                <select id="lop" name="lop" class="form-control">      
                  <option value="{{$lh->ID}}">{{$lh->TenLop}}</option>
                </select>
              </div>
            </div>
            @endforeach
            <div class="form-group">
              <label class="col-lg-4 control-label">Họ Tên</label>
              <div class="col-lg-8">
                <input type="text" name="hoten" class="form-control" placeholder="Nhập họ tên" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-4 control-label">Giới tính</label>
              <div class="col-lg-8">
                <select id="gioitinh" name="gioitinh" class="form-control" style="width: 40%" required>
                  <option value="Nam">Nam</option>
                  <option value="Nữ">Nữ</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-4 control-label">Ngày sinh</label>
              <div class="col-lg-8">
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-calendar" for="ngaysinh"></i></span>
                  <input type="text" name="ngaysinh" id="ngaysinh" class="form-control" style="width: 40%" placeholder="Nhập ngày sinh" required>
                </div>
              </div>
            </div>
             <div class="form-group">
            <label class="col-lg-4 control-label">SĐT</label>
            <div class="col-lg-8 ">
              <input type="text" name="sdt" class="form-control"  required placeholder='Số điện thoại'>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-4 control-label">Email</label>
            <div class="col-lg-8 ">
              <input type="email" name="email" class="form-control"  required   placeholder='Email'>
            </div>
          </div>
            <div class="form-group">
              <label class="col-lg-4 control-label">Nơi sinh</label>
              <div class="col-lg-8 ">
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                   <select name= "noisinh" class="form-control" id="noisinh" >
                    <option value="An Giang">An Giang</option>
                    <option value="Bà Rịa - Vũng Tàu">Bà Rịa - Vũng Tàu</option>
                    <option value="Bắc Giang">Bắc Giang</option>
                    <option value="Bắc Kạn">Bắc Kạn</option>
                    <option value="Bạc Liêu">Bạc Liêu</option>
                    <option value="Bắc Ninh">Bắc Ninh</option>
                    <option value="Bến Tre">Bến Tre</option>
                    <option value="Bình Định">Bình Định</option>
                    <option value="Bình Dương">Bình Dương</option>
                    <option value="Bình Phước">Bình Phước</option>
                    <option value="Bình Thuận">Bình Thuận</option>
                    <option value="Bình Thuận">Bình Thuận</option>
                    <option value="Cà Mau">Cà Mau</option>
                    <option value="Cao Bằng">Cao Bằng</option>
                    <option value="Đắk Lắk">Đắk Lắk</option>
                    <option value="Đắk Nông">Đắk Nông</option>
                    <option value="Điện Biên">Điện Biên</option>
                    <option value="Đồng Nai">Đồng Nai</option>
                    <option value="Đồng Tháp">Đồng Tháp</option>
                    <option value="Gia Lai">Gia Lai</option>
                    <option value="Hà Giang">Hà Giang</option>
                    <option value="Hà Nam">Hà Nam</option>
                    <option value="Hà Tĩnh">Hà Tĩnh</option>
                    <option value="Hải Dương">Hải Dương</option>
                    <option value="Hậu Giang">Hậu Giang</option>
                    <option value="Hòa Bình">Hòa Bình</option>
                    <option value="Hưng Yên">Hưng Yên</option>
                    <option value="Khánh Hòa">Khánh Hòa</option>
                    <option value="Kiên Giang">Kiên Giang</option>
                    <option value="Kon Tum">Kon Tum</option>
                    <option value="Lai Châu">Lai Châu</option>
                    <option value="Lâm Đồng">Lâm Đồng</option>
                    <option value="Lạng Sơn">Lạng Sơn</option>
                    <option value="Lào Cai">Lào Cai</option>
                    <option value="Long An">Long An</option>
                    <option value="Nam Định">Nam Định</option>
                    <option value="Nghệ An">Nghệ An</option>
                    <option value="Ninh Bình">Ninh Bình</option>
                    <option value="Ninh Thuận">Ninh Thuận</option>
                    <option value="Phú Thọ">Phú Thọ</option>
                    <option value="Quảng Bình">Quảng Bình</option>
                    <option value="Quảng Ngãi">Quảng Ngãi</option>
                    <option value="Quảng Ninh">Quảng Ninh</option>
                    <option value="Quảng Trị">Quảng Trị</option>
                    <option value="Sóc Trăng">Sóc Trăng</option>
                    <option value="Sơn La">Sơn La</option>
                    <option value="Tây Ninh">Tây Ninh</option>
                    <option value="Thái Bình">Thái Bình</option>
                    <option value="Thái Nguyên">Thái Nguyên</option>
                    <option value="Thanh Hóa">Thanh Hóa</option>
                    <option value="Thừa Thiên Huế">Thừa Thiên Huế</option>
                    <option value="Tiền Giang">Tiền Giang</option>
                    <option value="Trà Vinh">Trà Vinh</option>
                    <option value="Tuyên Quang">Tuyên Quang</option>
                    <option value="Vĩnh Long">Vĩnh Long</option>
                    <option value="Vĩnh Phúc">Vĩnh Phúc</option>
                    <option value="Yên Bái">Yên Bái</option>
                    <option value="Phú Yên">Phú Yên</option>
                    <option value="Tp.Cần Thơ">Tp.Cần Thơ</option>
                    <option value="Tp.Đà Nẵng">Tp.Đà Nẵng</option>
                    <option value="Tp.Hải Phòng">Tp.Hải Phòng</option>
                    <option value="Tp.Hà Nội">Tp.Hà Nội</option>
                    <option value="TP.HCM">TP.HCM</option>
                  </select>
                </div>
              </div>
            </div>          
            <div class="form-group pull-right">
              <button type="submit" class="btn btn-primary" >Đăng Ký</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Kết thúc Modal Body chi tiết học viên -->
  </div>
</div>
<!-- Kết Thúc Modal Chi tiết học viên-->
<!-- <script type="text/javascript">
$(document).ready(function(){
$("#xd_tenvanbang").change(function(){
let ID = $("#xd_tenvanbang").val();
$.get("ajax/dotcap/"+ID,function(data){
$("#xd_dotcapvanbang").html(data);
});

});
});
</script> -->