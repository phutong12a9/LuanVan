@extends('quantri')
@section('content')

<div class="panel panel-default">
  <form class="form-horizontal" action="" method="post">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="panel-body">
      <div id="body_banglophoc">
        <div class="" style="padding-bottom: 20px;">
           <center><h1>Lớp học Phần: TOEIC 450 Sáng Thứ 4,5,6 lớp 1</h1></center>
        </div>
        <div class="pull-right" style="padding-bottom: 15px">
        		<input type="hidden" name="IDLHP" value="{{$ID_LHP}}">
	          <input type="number" name="Themdong" id="Themdong" value="1">
	          <input type="submit" name="btnThemdong" value="Thêm dòng" formaction="{{route('them-dong')}}">
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                   <th hidden="true"></th>
                   <th></th>
                   <th>Phòng</th>
                   <th>Giảng Viên</th>
                   <th>Trợ Giảng</th>
                </tr>
            </thead>
            <tbody id="test">
            	@foreach($lhp as $lhp)
                <tr>
                	<td hidden="true"><input type="text" name="lhp[]" class="checkbox" value="{{$lhp->ID}}"></td>
                    <td>Buổi {{$lhp->Buoi}}</td>
                    <td>
                        <select class="form-control" name="p[]">
                        	@if(empty($lhp->ID_Phong))
                        		<option value=""></option>
                        		@foreach($phonghoc as $ph)
                            	<option value="{{$ph->ID}}">{{$ph->TenPhong}}</option>
                            	@endforeach
                        	@else
                        		<option value=""></option>
                        		@foreach($phonghoc as $ph)
                            	<option value="{{$ph->ID}}" 
                            		@if($lhp->ID_Phong == $ph->ID)  selected @endif>{{$ph->TenPhong}}</option>
                            	@endforeach
                            @endif
                        </select>
                    </td>
                    <td>
                        <select class="form-control" name="gv[]">
                           @if(empty($lhp->ID_GiangVien))
                        		<option value=""></option>
                        		@foreach($giangvien as $gv)
                            	<option value="{{$gv->ID}}">{{$gv->HoTenGV}}</option>
                            	@endforeach
                        	@else
                        		<option value=""></option>
                        		@foreach($giangvien as $gv)
                            	<option value="{{$gv->ID}}" 
                            		@if($lhp->ID_GiangVien == $gv->ID)  selected @endif>{{$gv->HoTenGV}}</option>
                            	@endforeach
                            @endif
                        </select>
                    </td>
                    <td>
                        <select class="form-control" name="tg[]">
                           @if(empty($lhp->ID_TroGiang))
                        		<option value=""></option>
                        		@foreach($giangvien as $tg)
                            	<option value="{{$tg->ID}}">{{$tg->HoTenGV}}</option>
                            	@endforeach
                        	@else
                        		<option value=""></option>
                        		@foreach($giangvien as $tg)
                            	<option value="{{$tg->ID}}" 
                            		@if($lhp->ID_TroGiang== $tg->ID)  selected @endif>{{$tg->HoTenGV}}</option>
                            	@endforeach
                            @endif
                        </select>
                    </td>
                    <td><center><a href="{{route('xoa-dong',$lhp->ID)}}"><i class="glyphicon glyphicon-trash"></i></a></center></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pull-right">
        	<input type="submit" name="btnLuu" class="btn btn-primary" formaction="{{route('sap-xep-lop-post')}}" value="Lưu">
        </div>
      </div>
    </div>
  </form>

</div>
{{-- <script type="text/javascript">
    $(document).ready(function(){
        $('#btnThemdong').click(function(){
            var valThemdong = $('#Themdong').val();
            for(var i = 1 ; i <= valThemdong; i++){
               var html = "<tr>"
                            +"<td>Buổi</td>"
                            +"<td>"
                                +"<select class='form-control'>"
                                    +"<option>C.1.1</option>"
                                +"</select>"
                            +"</td>"
                            +"<td>"
                                +"<select class='form-control'>"
                                    +"<option>Nguyễn Xuân Hà Giang</option>"
                                +"</select>"
                            +"</td>"
                            +"<td>"
                                +"<select class='form-control'>"
                                    +"<option>Đinh Thành Nhân</option>"
                                +"</select>"
                            +"</td>"
                        +"</tr>"
                $('#test').append(html);
            }
        });
    });
</script> --}}
@endsection