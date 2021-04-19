
@foreach($lop as $l)
<tr>
  <td hidden="true">{{$l->ID}}</td>
  <td colspan=3>{{$l->TenLop}}</td>
  <td>{{$l->BuoiHoc}}</td>
  <td>Thứ {{$l->NgayHoc}}</td>
  <td>{{$l->ThoiGianHoc}}</td>
  <td> <a href="{{route('dang-ky-lop',$l->ID)}}" class="dangkylop">Đăng ký</a></td>
</tr>
@endforeach
