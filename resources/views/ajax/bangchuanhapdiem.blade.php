
<style type="text/css">
  #table table{
    width: 100%;
  }
  #table table tr{
    border: 1px solid;
    text-align: center;
  }
  #table table tr td{
    border: 1px solid;
  }
</style>
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalImportDiem" style="margin-bottom: 20px;">Nhập Điểm</button>
<button type="button" class="btn btn-success" style="margin-bottom: 20px;" id="btn_export">Export</button>
                    @foreach($loailophoc as $loailophoc)
                    @if($loailophoc->TenDanhMuc=="Chứng Chỉ Tiếng Anh" || $loailophoc->TenDanhMuc=="Chứng Chỉ Tiếng Nhật" || $loailophoc->TenDanhMuc=="Chứng Chỉ Tiếng Pháp")
                      <table class="table table-striped" id="myTable">
                      	<thead>
                      		<tr>
                      			<th>SBD</th>
                      			<th>Họ Tên</th>
                      			<th>Giới Tính</th>
                      			<th>Ngày Sinh</th>
                      			<th>Nơi Sinh</th>
                      			<th>Điểm Nghe</th>
                      			<th>Điểm Nói</th>
                      			<th>Điểm Đọc</th>
                      			<th>Điểm Viết</th>
                      			<th>Kết Quả</th>
                      			<th>Ghi Chú</th>
                            <th>Thao Tác</th>
                      		</tr>
                      	</thead>
                      	<tbody>
                          @foreach($hocvien as $hocvien)
                      		<tr>
                      			<td class="sbd">{{$hocvien->ID}}</td>
                      			<td class="hoten">{{$hocvien->HoTenHV}}</td>
                      			<td class="gioitinh">{{$hocvien->GioiTinh}}</td>
                      			<td class="ngaysinh">{{date('d/m/Y', strtotime($hocvien->NgaySinh))}}</td>
                      			<td class="noisinh">{{$hocvien->NoiSinh}}</td>
                      			<td></td>
                      			<td></td>
                      			<td></td>
                      			<td></td>
                      			<td></td>
                      			<td></td>
                            <td><button class="btn btn-success btnSelect">Nhập Điểm</button></td>
                      		</tr>
                          @endforeach
                      	</tbody>
                      </table>
                      @elseif($loailophoc->TenDanhMuc=="Chứng Chỉ Tin Học Căn Bản" || $loailophoc->TenDanhMuc=="Chứng Chỉ Tin Học Nâng Cao")
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>SBD</th>
                            <th>Họ Tên</th>
                            <th>Giới Tính</th>
                            <th>Ngày Sinh</th>
                            <th>Nơi Sinh</th>
                            <th>Điểm Lý Thuyết</th>
                            <th>Điểm Thực Hành</th>
                            <th>Kết Quả</th>
                            <th>Ghi Chú</th>
                            <th>Thao Tác</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($hocvien as $hocvien)
                          <tr>
                            <td class="sbd">{{$hocvien->ID}}</td>
                            <td class="hoten">{{$hocvien->HoTenHV}}</td>
                            <td class="gioitinh">{{$hocvien->GioiTinh}}</td>
                            <td class="ngaysinh">{{date('d/m/Y', strtotime($hocvien->NgaySinh))}}</td>
                            <td class="noisinh">{{$hocvien->NoiSinh}}</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><button class="btn btn-success btnSelect">Nhập Điểm</button></td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                      @endif
                      @endforeach
<!-- Modal Import Điểm -->
<div id="modalImportDiem" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <center><h3 class="modal-title">Nhập Điểm</h3></center>
      </div>
      <div class="modal-body">
       <div class="panel panel-default">
         <div class="panel-body">
            <form method="post" action="{{route('nhap-diem-import')}}" enctype="multipart/form-data" class="form-horizontal">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <div class="form-group">
                <label class="col-lg-2 control-label">Lớp Học</label>
                <div class="col-lg-10">
                  <select class="form-control" name="lophoc" id="lophoc">
                    <option value="null">--Chọn lớp học--</option>
                    @foreach($lophocphan as $lhp)
                    <option value="{{$lhp->ID}}">{{$lhp->TenLop}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label"></label>
                <div class="col-lg-10">
                  <input type="file" name="file" class="form-control" accept=".xlsx" id="file-excel" required>
                </div>
              </div>
              <div id="table">
                
              </div>
              <hr>
              <div class="form-group">
                <button type="submit" class="btn btn-success pull-right" id="btnImportDiem">Nhập Điểm</button>
              </div>
            </form>
         </div>
       </div>
      </div>
    </div>

  </div>
</div>
<!-- Modal Nhập Điểm -->
<div id="modalNhapDiem" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <center><h3 class="modal-title">Nhập Điểm</h3></center>
      </div>
      <div class="modal-body">
       <div class="panel panel-default">
         <div class="panel-body">
            <form method="post" action="{{route('post-nhap-diem')}}" enctype="multipart/form-data" class="form-horizontal" id="form-nhapdiem">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <div class="form-group" hidden="true">
                <label class="col-lg-4 control-label">SBD</label>
                <div class="col-lg-6">
                  <input type="text" name="sbd" class="form-control md_sbd">
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-4 control-label">Họ Tên</label>
                <div class="col-lg-6">
                  <input type="text" name="hoten" class="form-control md_hoten" disabled="true">
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-4 control-label">Giới Tính</label>
                <div class="col-lg-6">
                  <input type="text" name="gioitinh" class="form-control md_gioitinh" disabled="true">
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-4 control-label">Ngày Sinh</label>
                <div class="col-lg-6">
                  <input type="text" name="ngaysinh" class="form-control md_ngaysinh" disabled="true">
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-4 control-label">Nơi Sinh</label>
                <div class="col-lg-6">
                  <input type="text" name="noisinh" class="form-control md_noisinh" disabled="true">
                </div>
              </div>
              @if($loailophoc->TenDanhMuc=="Chứng Chỉ Tiếng Anh" || $loailophoc->TenDanhMuc=="Chứng Chỉ Tiếng Nhật" || $loailophoc->TenDanhMuc=="Chứng Chỉ Tiếng Pháp")
              <div class="form-group">
                <label class="col-lg-4 control-label">Điểm Nghe</label>
                <div class="col-lg-6">
                  <input type="text" name="diemnghe" class="form-control md_diemnghe" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-4 control-label">Điểm Nói</label>
                <div class="col-lg-6">
                  <input type="text" name="diemnoi" class="form-control md_diemnoi" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-4 control-label">Điểm Đọc</label>
                <div class="col-lg-6">
                  <input type="text" name="diemdoc" class="form-control md_diemdoc" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-4 control-label">Điểm Viết</label>
                <div class="col-lg-6">
                  <input type="text" name="diemviet" class="form-control md_diemviet" required>
                </div>
              </div>
               @elseif($loailophoc->TenDanhMuc=="Chứng Chỉ Tin Học Căn Bản" || $loailophoc->TenDanhMuc=="Chứng Chỉ Tin Học Nâng Cao")
               <div class="form-group">
                <label class="col-lg-4 control-label">Điểm Lý Thuyết</label>
                <div class="col-lg-6">
                  <input type="text" name="diemlythuyet" class="form-control md_diemlythuyet" required>
                </div>
              </div>
               <div class="form-group">
                <label class="col-lg-4 control-label">Điểm Thực Hành</label>
                <div class="col-lg-6">
                  <input type="text" name="diemthuchanh" class="form-control md_diemthuchanh" required>
                </div>
              </div>
              @endif
              <div class="form-group">
                <label class="col-lg-4 control-label">Ghi Chú</label>
                <div class="col-lg-6">
                  <input type="text" name="ghichu" class="form-control md_ghichu">
                </div>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-success pull-right" id="btnNhapDiem">Nhập Điểm</button>
              </div>
            </form>
         </div>
       </div>
      </div>
    </div>

  </div>
</div>
<script lang="javascript" src=" https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.15.6/xlsx.full.min.js"></script>
<script type="text/javascript" charset="UTF-8" >


      $("#file-excel").change(function(e){

       var reader = new FileReader();
        reader.readAsArrayBuffer(e.target.files[0]);
        reader.onload = function(e) {
        var data = new Uint8Array(reader.result);
        var wb = XLSX.read(data,{type:'array'});
        var htmlstr = XLSX.write(wb,{sheet:"Sheet1", type:'string',bookType:'html'});
        console.log(htmlstr);
        $('#table').empty();
        $('#table')[0].innerHTML += htmlstr;
        console.log($('#table')[0]);
        }
      });
</script>
<script type="text/javascript">
   $(document).ready(function(){

    $("#btnImportDiem").click(function(e){
      let lophoc = $("#lophoc").val();
      if (lophoc == "null") {
        alert("Bạn chưa chọn lớp học.");
        e.preventDefault();
      }    
      });          
    });
</script>
<script type="text/javascript">
    
    $(document).ready(function(){

      $('.btnSelect').click(function(){

          $('.md_sbd').val($(this).parents("tr").find(".sbd").text()); 
          $('.md_hoten').val($(this).parents("tr").find(".hoten").text());
          $('.md_gioitinh').val($(this).parents("tr").find(".gioitinh").text());
          $('.md_ngaysinh').val($(this).parents("tr").find(".ngaysinh").text());
          $('.md_noisinh').val($(this).parents("tr").find(".noisinh").text());  
          $('#modalNhapDiem').modal();

      });

    });
</script>
<script>
  $(document).ready(function() {
    $("#form-nhapdiem").validate({
      rules: {
        diemnghe: {   
          required: true, 
          number : true, 
          min :  0,
          max : 10
        },
        diemnoi: {
          required: true, 
          number : true, 
          min :  0,
          max : 10
        },
        diemdoc: { 
         required: true, 
          number : true, 
          min :  0,
          max : 10
        },
        diemviet : { 
          required: true, 
          number : true, 
          min :  0,
          max : 10
        },
        diemlythuyet : {
          required: true, 
          number : true, 
          min :  0,
          max : 10

        },
        diemthuchanh : {
          required: true, 
          number : true, 
          min :  0,
          max : 10

        },
      },
      messages: {
        diemnghe: {
          required: "Xin vui lòng nhập điểm nghe ",
          number: "Điểm nghe phải là kiểu số",
          min: "Điểm nghe phải lớn hơn 0",
          max: "Điểm nghe phải nhỏ hơn 10"
          },
        diemnoi: {
          required: "Xin vui lòng nhập điểm nói ",
          number: "Điểm nói phải là kiểu số",
          min: "Điểm nói phải lớn hơn 0",
          max: "Điểm nói phải nhỏ hơn 10"
          },
        diemdoc: {
          required: "Xin vui lòng nhập điểm đọc ",
          number: "Điểm đọc phải là kiểu số",
          min: "Điểm đọc phải lớn hơn 0",
          max: "Điểm đọc phải nhỏ hơn 10"
          },
        diemviet: {
          required: "Xin vui lòng nhập điểm viết",
          number: "Điểm viết phải là kiểu số",
          min: "Điểm viết phải lớn hơn 0",
          max: "Điểm viết phải nhỏ hơn 10"
          },
        diemlythuyet: {
          required: "Xin vui lòng nhập điểm lý thuyết ",
          number: "Điểm lý thuyết phải là kiểu số",
          min: "Điểm lý thuyết phải lớn hơn 0",
          max: "Điểm lý thuyết phải nhỏ hơn 10"
          },
        diemthuchanh: {
          required: "Xin vui lòng nhập điểm thực hành ",
          number: "Điểm thực hành phải là kiểu số",
          min: "Điểm thực hành phải lớn hơn 0",
          max: "Điểm thực hành phải nhỏ hơn 10"
          },
      }
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){

     $("#btn_export").click(function () {
              let today = new Date();
              let time = today.getDate()+'_'+(today.getMonth()+1)+'_'+today.getFullYear() + "_" + today.getHours() + "_" + today.getMinutes() + "_" + today.getSeconds();
              let tenfile = "NhapDiemHocVien_"+time ;
                 $("#myTable").table2excel({
                    fileext:".xlsx",
                    preserveColors:true,
                    filename: tenfile,
                 });
            });

  });
</script>
