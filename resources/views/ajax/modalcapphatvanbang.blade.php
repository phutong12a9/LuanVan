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
                             <form class="form-horizontal" method="POST" role="form" id="form_xetduyethocvien">
                              <input type="hidden" name="_token" value="{{csrf_token()}}">
                              <div class="form-group">
                                <label class="col-lg-4 control-label">Tên đơn vị quản lý</label>
                                <label class="col-lg-8 "> Trung Tâm Ngoại Ngữ - Tin Học</label>
                              </div>
                              <div class="form-group">
                                <label class="col-lg-4 control-label">Tên văn bằng</label>
                                <div class="col-lg-8">
                                  <select id="xd_tenvanbang" name="xd_tenvanbang" class="form-control" disabled="true">
                                   @foreach($lophoc as $lophoc)
                                   <option value="{{$chitiethocvien->ID}}">{{$chitiethocvien->TenLop}}</option>
                                   @endforeach
                                  </select>
                                </div>
                              </div>
                               <div class="form-group" hidden="true">
                                <label class="col-lg-4 control-label">ID</label>
                                <div class="col-lg-8">
                                  @foreach($hocvien as $hocvien)
                                  <input type="text" name="xd_id" class="form-control" value="{{$hocvien->ID}}">
                                  @endforeach
                                </div>
                              </div>
                              <div class="form-group">
                              <label class="col-lg-4 control-label">Họ tên người được cấp</label>
                              <div class="col-lg-8">
                                <input type="text" name="xd_hoten" class="form-control" placeholder="Nhập họ tên" value="{{$chitiethocvien->HoTenHV}}" disabled="true">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-lg-4 control-label">Giới tính</label>
                              <div class="col-lg-8">
                               <select id="xd_gioitinh" name="xd_gioitinh" class="form-control" style="width: 40%" disabled="true">
                                <option value="{{$chitiethocvien->GioiTinh}}">{{$chitiethocvien->GioiTinh}}</option>
                               </select>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-lg-4 control-label">Ngày sinh</label>
                              <div class="col-lg-8">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="glyphicon glyphicon-calendar" for="xd_ngaysinh"></i></span>
                                  <input type="text" name="xd_ngaysinh" id="xd_ngaysinh" class="form-control" style="width: 40%" placeholder="Nhập ngày sinh" value="{{date('d/m/Y', strtotime($chitiethocvien->NgaySinh))}}" disabled="true">
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-lg-4 control-label">Nơi sinh</label>
                              <div class="col-lg-8 ">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                                  <select name= "xd_noisinh" class="form-control" id="chitietnoisinh" disabled="true">
                                  <option value="{{$chitiethocvien->NoiSinh}}" >{{$chitiethocvien->NoiSinh}}</option>
                                    </select>
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-lg-4 control-label">Ngày kiểm tra</label>
                              <div class="col-lg-8">
                                <div class="input-group">
                                   <span class="input-group-addon"><i class="glyphicon glyphicon-calendar" for="xd_ngaykt"></i></span>
                                   <input type="text" name="xd_ngaykt" id="xd_ngaykt" class="form-control" style="width: 40%"value="{{date('d/m/Y', strtotime($chitiethocvien->ThoiGianThi))}}" disabled="true">
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-lg-4 control-label">Xếp loại</label>
                              <div class="col-lg-8">
                                <input type="text" name="xd_xeploai" class="form-control" placeholder="Xếp loại" value="{{$chitiethocvien->XepLoai}}" disabled="true">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-lg-4 control-label">Ngày ký</label>
                              <div class="col-lg-8">
                                <div class="input-group">
                                   <span class="input-group-addon"><i class="glyphicon glyphicon-calendar" for="xd_ngayky"></i></span>
                                   <input type="text" name="xd_ngayky" id="xd_ngayky" class="form-control"style="width: 40%"value="{{date('d/m/Y', strtotime($chitiethocvien->NgayKy))}}" disabled="true">
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-lg-4 control-label">Số hiệu</label>
                              <div class="col-lg-8">
                                <input type="text" name="xd_sohieu" class="form-control" placeholder="Số hiệu" value="{{$chitiethocvien->SoHieu}}" disabled="true">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-lg-4 control-label">Số vào sổ</label>
                              <div class="col-lg-8">
                                <input type="text" name="xd_sovaoso" class="form-control" placeholder="Số vào sổ" value="{{$chitiethocvien->SoVaoSo}}" disabled="true">
                              </div>
                            </div>
                            </form>
                            <div class="pull-right">
                              <a href="{{route('in-van-bang',$hocvien->ID)}}" type="button" class="btn btn-info">Cấp Phát</a>
                              <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                            </div>
                          </div>
                      </div>
                    </div>
                    <!-- Kết thúc Modal Body chi tiết học viên -->
                    </div>
                  </div>
             <!-- Kết Thúc Modal Chi tiết học viên-->
