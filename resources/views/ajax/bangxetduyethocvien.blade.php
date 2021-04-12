 <link rel="stylesheet" type="text/css" href="source/css/sttTable.css">
  <div class="filler" style="margin-bottom: 20px;">
                          <select class="filler-table" id="filler-table">
                            <option value="all">Tất cả</option>
                            <option value="Đã duyệt">Đã duyệt</option>
                            <option value="Chờ duyệt">Chờ duyệt</option>
                            <option value="Không duyệt">Không duyệt</option>
                          </select>
                        </div>
   <table class="table table-striped table-responsive" id="table_hocvien">
                        
                      <thead >
                        <tr>
                          <th></th>
                          <th>TT</th>
                          <th>Trạng Thái</th>
                          <th>Họ Tên</th>
                          <th>Giới Tính</th>
                          <th>Ngày Sinh</th>
                          <th>Nơi Sinh</th>
                          <th>Ngày Kiểm Tra</th>
                          <th>Xếp Loại</th>
                          <!-- <th>Ngày Ký</th>
                          <th>Số Hiệu</th>
                          <th>Số Vào Sổ</th> -->
                        </tr>
                      </thead>
                      <tbody id="myTable">
                        @foreach($xetduyet as $xetduyet)
                        <tr>
                          <td id="chitiet">                    
                                <a href="{{route('xet-duyet-hoc-vien',$xetduyet->ID)}}" type="button" class="btn btn-default chitiethocvien">
                                  <i class="glyphicon glyphicon-eye-open"></i>
                                </a>
                          </td>
                          <td></td>
                          <td id="tt" style="font-weight: bold"><br>
                            @if($xetduyet->XetDuyet == 'Chờ duyệt')
                            <span class="fa fa-circle" style="color: yellow"></span> &nbsp {{$xetduyet->XetDuyet}}
                            @elseif($xetduyet->XetDuyet == 'Đã duyệt')
                            <span class="fa fa-circle" style="color: green"></span> &nbsp {{$xetduyet->XetDuyet}}
                            @elseif($xetduyet->XetDuyet == 'Không duyệt')
                            <span class="fa fa-circle" style="color: red"></span> &nbsp {{$xetduyet->XetDuyet}}
                            @endif
                          </td>
                          <td>{{$xetduyet->HoTenHV}}</td>
                          <td>{{$xetduyet->GioiTinh}}</td>
                          <td>{{date('d/m/Y', strtotime($xetduyet->NgaySinh))}}</td>
                          <td>{{$xetduyet->NoiSinh}}</td>
                          <td>{{date('d/m/Y', strtotime($xetduyet->ThoiGianThi))}}</td>
                          <td>{{$xetduyet->XepLoai}}</td>
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
               dom: 'Bfrtip',
               buttons: [
            {
                extend: 'excelHtml5',
                text: 'Excel',
                exportOptions: {
                    columns: [3, 4, 5, 6, 7],
                },
                customize: function (xlsx) {
                  console.log(xlsx);
                  var sheet = xlsx.xl.worksheets['sheet1.xml'];
                  var downrows = 3;
                  var clRow = $('row', sheet);
                  //update Row
                  clRow.each(function () {
                      var attr = $(this).attr('r');
                      var ind = parseInt(attr);
                      ind = ind + downrows;
                      var a = $(this).attr("r",ind);
                  });

                  // Update  row > c
                  $('row c ', sheet).each(function () {
                      var attr = $(this).attr('r');
                      var pre = attr.substring(0, 1);
                      var ind = parseInt(attr.substring(1, attr.length));
                      ind = ind + downrows;
                      $(this).attr("r", pre + ind);
                  });

                  function Addrow(index,data) {
                      msg='<row r="'+index+'">'
                      for(i=0;i<data.length;i++){
                          var key=data[i].k;
                          var value=data[i].v;
                          msg += '<c t="inlineStr" r="' + key + index + '" s="42">';
                          msg += '<is>';
                          msg +=  '<t>'+value+'</t>';
                          msg+=  '</is>';
                          msg+='</c>';
                      }
                      msg += '</row>';
                      return msg;
                  }

                  //insert
                  var r1 = Addrow(1, [{ k: 'A', v: 'ColA' }, { k: 'B', v: 'aaa' }, { k: 'C', v: '' }]);
                  var r2 = Addrow(2, [{ k: 'A', v: 'ajax' }, { k: 'B', v: 'ColB' }, { k: 'C', v: '' }]);
                  var r3 = Addrow(3, [{ k: 'A', v: 'aaa' }, { k: 'B', v: 'aaa' }, { k: 'C', v: 'ColC' }]);

                  sheet.childNodes[0].childNodes[1].innerHTML = r1 + r2+ r3+ sheet.childNodes[0].childNodes[1].innerHTML;
              }
            }
        ]
              // language: {
              //    lengthMenu: 'Xem _MENU_ mục',
              //   zeroRecords: 'Không tìm thấy dòng nào phù hợp',
              //   info: 'Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục',
              //   sSearch:       'Tìm kiếm :',
              //   infoEmpty: 'Đang xem 0 đến 0 trong tổng số 0 mục',
              //   infoFiltered: '(được lọc từ _MAX_ mục)',
              //   oPaginate:{
              //         sFirst:    'Đầu',
              //         sPrevious: 'Trước',
              //         sNext:     'Tiếp',
              //         sLast:     'Cuối',
              //   }
              //             },
              //   pagingType: 'full_numbers',
              //   scrollX: true,
              //   displayLength: 25,
              //   lengthMenu: [[5,10, 25, 50, -1], [5,10, 25, 50, 'Tất cả']]
            });
            $('.chitiethocvien').click(function(event){
                event.preventDefault();
                let $this = $(this);
                let URL = $this.attr('href');
                $.ajax({
                    url: URL

                }).done(function(results){
                  $('#modalchitiet').html(results.html);
                  $('#modalchitiet').modal({
                    show: true
                   });

                });
              
            });
          
        });
    </script>   
    <script type="text/javascript">
      $(document).ready(function() {
        //Lọc bảng lớp học
          $("#filler-table").on("change", function () {
            searchterm = $(this).val();                 
            $('#table_hocvien tbody tr').each(function () {                    
                var sel = $(this);
                var txt = sel.find('td:eq(2)').text();
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
                    $('#table_hocvien tbody tr').show();
                }
            });
        });
      });
    </script>                           
<script type="text/javascript">
 function fnExcelReport(tableID)
{
    var tab_text="<table border='2px solid'>";
    tab_text+="<caption>";
    tab_text+= "<span style='float:right;height:500px'>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM <br> Độc lập - Tự do - Hạnh phúc<br>----------------------------<br></span>";
    tab_text+= "<b style='float:right'>THÔNG TIN HỌC VIÊN</b>";
    tab_text+="</caption>";
    tab_text+="<thead>";
    tab_text+="<tr>";
    tab_text+="<th>Trạng Thái</th>";
    tab_text+="<th>Họ Tên</th>";
    tab_text+="<th>Giới Tính</th>";
    tab_text+="<th>Ngày Sinh</th>";
    tab_text+="<th>Nơi Sinh</th>";
    tab_text+="<th>Ngày Kiểm Tra</th>";
    tab_text+="<th>Xếp Loại</th>";
    tab_text+="<th>Xếp Loại</th>";
    tab_text+="</tr>";
    tab_text+="</thead>";
    tab_text+="<tbody>";
    var textRange; var j=0;
    tab = document.getElementById(tableID); // id of table
    console.log(tab)
    for(j = 0 ; j < tab.rows.length ; j++) 
    {    
        tab_text+="<tr>";
        for (var i = 2; i < document.getElementById(tableID).rows[j].cells.length ; i++) {
           tab_text+= document.getElementById(tableID).rows[j].cells[i].outerHTML;
         } 
        tab_text+="</tr>";
        //tab_text=tab_text+"</tr>";
    }

    tab_text=tab_text+"</tbody>";
    tab_text=tab_text+"</table>";
    tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
    tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
    tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params
    console.log(tab_text);
    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE "); 

    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
    {
        txtArea1.document.open("txt/html","replace");
        txtArea1.document.write(tab_text);
        txtArea1.document.close();
        txtArea1.focus(); 
        sa=txtArea1.document.execCommand("SaveAs",true,"Say Thanks to Sumit.xls");
    }  
    else                 //other browser not tested on IE 11
        sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  

    return (sa);
}
</script>
