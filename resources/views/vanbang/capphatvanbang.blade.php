@if(session()->has('canbo'))
@extends('quantri')
@section('content')
@if(Session::has('xetduyetthanhcong'))
<div class="alert pull-right" id="thongbao" role="alert" style="color: green;font-size: 25px;right: 0px;top:0px;display: block;position: fixed; background: white;z-index: 2">{{Session::get('xetduyetthanhcong')}}
</div>
@endif
<title>Cấp phát văn bằng</title>
<!-- Bắt đầu Body-->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="pannel panel-default">
                    <div class="panel-heading">
                        <center><h3>Cấp Phát Văn Bằng</h3></center>
                    </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-body" style="line-height: 20px;">
                    <form class="form-horizontal" action="" method="post" role="form" id="form_chondotcap">
                      <input type="hidden" name="_token" value="{{csrf_token()}}">
                      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                      <div class="form-group">
                        <select class="form-control" id="tenvb" style="width: 90%">
                          <option>-- Chọn Tên Chứng Chỉ --</option>
                          @foreach($chungchi as $chungchi)
                          <option value="{{$chungchi->ID}}">{{$chungchi->TenChungChi}}</option> 
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                      <div class="form-group">
                        <select id="dotvb" class="form-control" style="width: 90%">
                          <option>-- Chọn Đợt Cấp --</option>
                        </select>
                      </div>
                    </div>
                    </form>
                  </div>
                </div>
                </div>
                  <div class="panel panel-default">
                    <div class="panel-body table-responsive">
                      <div id="body_banghocvien">
                        
                      </div>
                    </div>
                  </div>
             </div>
           </div>
         </div>
            <!--Kết thúc body-->
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
                "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "Tất cả"]]
            });
            $("#tenvb").change(function(){
                let ID = $("#tenvb").val();
                 $("#body_banghocvien").html('<img src="http://www.cit.ctu.edu.vn/chungchitinhoc/public/images/loading46.gif" width="5%" style="margin-left: 50%;">');

                $.get("ajax/dotcap/"+ID,function(data){
                    $("#dotvb").html(data);
                });

                 $.get("ajax/bangcapphatvanbang/"+ID,function(data){
                    $("#body_banghocvien").html(data);
                });

                 $("#dotvb").change(function(){

                   $("#body_banghocvien").html('<img src="http://www.cit.ctu.edu.vn/chungchitinhoc/public/images/loading46.gif" width="5%" style="margin-left: 50%;">');

                let IDdotcap = $("#dotvb").val();

                 $.get("ajax/bangcapphatvanbang/"+ID +"/"+IDdotcap,function(data){

                    $("#body_banghocvien").html(data);

                  });
                         
                });
              
                         
              });
             
        });
    </script>
    <script type="text/javascript">
      $("#thongbao").fadeOut(10000);
    </script>
   
@endsection
@endif