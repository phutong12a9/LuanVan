@if(session()->has('canbo'))
@extends('quantri')
@section('content')
<style type="text/css">
  .thongke{
    padding: 20px;
  }
  .solieu{
    margin: 0px auto;
    text-align: center;
  }
  @media only screen and (min-width: 992px) {
    .noidung{
      height: 228px;
    }
    .title{
      height: 39px;
    }
  }
}
</style>
<script src="source/js/print.js"></script>
<!-- Bắt đầu Body-->
            <div class="container">
              <div class="row" style="background: white">
                <div class="col-xs-6 col-md-6 col-md-6 col-lg-6">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <center><h4>Thống Kê Theo Năm</h4></center>
                    </div>
                    <div class="panel-body">
                     <form>
                        <div class="col-lg-6" style="padding: 0px 0px;">
                          <div class="form-group" >
                            <label class="col-lg-12 control-label">
                              Năm
                            </label>
                            <div class="col-lg-12">
                              <select class="form-control" >
                                 @foreach ($ListYear as $value)
                                <option value="{{$value}}">{{$value}}</option>
                               @endforeach
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6" style="padding: 0px 0px;">
                            <div class="form-group">
                              <label class="col-lg-12 control-label">
                                Lọc theo
                              </label>
                              <div class="col-lg-12">
                                <label class="radio-inline">
                                  <input type="radio" name="radio" value="0" checked>Theo Tháng
                                </label>
                                <label class="radio-inline">
                                  <input type="radio" name="radio" value="1">Theo Quý
                                </label>
                              </div>
                            </div>
                      </div>
                      <div class="col-lg-12">
                        <button type="button" class="btn btn-default">Lọc</button>
                      </div>
                     </form>
                    </div>
                  </div>
                </div>
                <div class="col-xs-6 col-md-6 col-md-6 col-lg-6">
                  <div class="panel panel-info">
                    <div class="panel-heading">
                      <center><h4>Thống Kê Theo Khóa</h4></center>
                    </div>
                    <div class="panel-body">
                     <form>
                        <div class="col-lg-6" style="padding: 0px 0px;">
                          <div class="form-group">
                            <label class="col-lg-12 control-label">
                              Khóa
                            </label>
                            <div class="col-lg-12" >
                              <select class="form-control" style="width: 100%">
                                <option></option>
                                <option value="">Lớp Chứng Chỉ Tiếng Anh Tháng 9</option>
                                <option value="">Lớp Chứng Chỉ</option>
                                <option value="">Lớp Chứng Chỉ</option>
                                <option value="">Lớp Chứng Chỉ</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6" style="padding: 0px 0px;">
                            <div class="form-group">
                              <label class="col-lg-12 control-label">
                                Lớp
                              </label>
                              <div class="col-lg-12">
                                <select class="form-control">
                                  <option></option>
                                  <option value="">Lớp Chứng Chỉ Tiếng Anh tháng 9-1</option>
                                  <option value="">Lớp Chứng Chỉ</option>
                                  <option value="">Lớp Chứng Chỉ</option>
                                  <option value="">Lớp Chứng Chỉ</option>
                                </select>
                              </div>
                            </div>
                      </div>
                       <div class="col-lg-12">
                          <button type="button" class="btn btn-default">Lọc</button>
                      </div>
                     </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <p>
              <a type="button" class=" btn btn-default pull-right" href="javascript:void(0)" onclick="In_Content('content')" style="margin-right: 30px;">
                <i class="glyphicon glyphicon-print"></i>
              </a>
            </p>

            <div id="content" style="margin-bottom: 90px;">
              <center><h2><b>Thống Kê Học Viên</b></h2></center>
              <div class="container" style="background: white;">
               <div class="col-lg-12">
                  <div class="col-xs-0 col-sm-0 col-md-1 col-lg-1"></div>
                  <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2 thongke" >
                    <div class="panel panel-default"style="background: rgb(124, 181, 236); min-height: 150px">
                      <div class="panel-body noidung">
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                          <center><h1><i class="glyphicon glyphicon-th-large"></i></h1></center>
                        </div>
                        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 solieu" style="margin: 0px auto;text-align: center;">
                          <div class="title"><h4><b>Khóa</b></h4></div>
                          <marquee behavior ="slide" direction="up" scrolldelay="100"><center><h3><b>50</b></h3></center></marquee>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2 thongke" >
                    <div class="panel panel-default"style="background:rgb(255, 188, 117); min-height: 150px">
                      <div class="panel-body noidung">
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                          <center><h1><i class="fas fa-users"></i></h1></center>
                        </div>
                        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 solieu" style="margin: 0px auto;text-align: center;">
                          <div class="title"><h4><b>Lớp</b></h4></div>
                          <marquee behavior ="slide" direction="up" scrolldelay="100"><center><h3><b></b></h3></center></marquee>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2 thongke" >
                    <div class="panel panel-default"style="background:rgb(128, 133, 233); min-height: 150px">
                      <div class="panel-body noidung">
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                          <center><h1><i class="fas fa-user-graduate"></i></h1></center>
                        </div>
                        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 solieu" style="margin: 0px auto;text-align: center;">
                          <div class="title"><h4><b>Học Viên</b></h4></div>
                          <marquee behavior ="slide" direction="up" scrolldelay="100"><center><h3><b>50</b></h3></center></marquee>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2 thongke" >
                    <div class="panel panel-default"style="background:rgb(169, 255, 150); min-height: 150px">
                      <div class="panel-body noidung">
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                          <center><h1><i class="fas fa-check"></i></i></h1></center>
                        </div>
                        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 solieu" style="margin: 0px auto;text-align: center;">
                          <div class="title"><h4><b>Đạt</b></h4></div>
                          <marquee behavior ="slide" direction="up" scrolldelay="100"><center><h3><b>{{$TongDat}}</b></h3></center></marquee>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2 thongke" >
                    <div class="panel panel-default"style="background: rgb(237, 95, 95); min-height: 150px">
                      <div class="panel-body noidung">
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                          <center><h1><i class="fas fa-times"></i></i></h1></center>
                        </div>
                        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 solieu" style="margin: 0px auto;text-align: center;">
                          <div class="title"><h4><b>Không Đạt</b></h4></div>
                          <marquee behavior ="slide" direction="up" scrolldelay="100"><center><h3><b>{{$TongKhongDat}}</b></h3></center></marquee>
                        </div>
                      </div>
                    </div>
                  </div>
               </div>
                <div class="col-lg-12">
                  <div class="col-xs-0 col-sm-0 col-md-1 col-lg-1"></div>
                  <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2 thongke">
                    <div class="panel panel-default" style="background: rgb(124, 181, 236); min-height: 150px">
                      <div class="panel-body noidung">
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                          <center><h1><i class="fas fa-trophy"></i></i></h1></center>
                        </div>
                        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 solieu">
                           <div class="title"><h4><b>Xuất Sắc</b></h4></div>
                            <marquee behavior ="slide" direction="up" scrolldelay="150"><center><h3><b>{{$TongXS}}</b></h3></center></marquee>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2 thongke">
                    <div class="panel panel-default" style="background:rgb(255, 188, 117); min-height: 150px ">
                      <div class="panel-body noidung">
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                          <center><h1><i class="fas fa-trophy"></i></i></h1></center>
                        </div>
                        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 solieu">
                          <div class="title"><h4><b>Giỏi</b></h4></div>
                          <marquee behavior ="slide" direction="up" scrolldelay="200"><center><h3><b>{{$TongG}}</b></h3></center></marquee>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2 thongke">
                    <div class="panel panel-default" style="background:rgb(128, 133, 233); min-height: 150px ">
                      <div class="panel-body noidung">
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                          <center><h1><i class="fas fa-trophy"></i></i></h1></center>
                        </div>
                        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 solieu">
                         <div class="title"><h4><b>Khá</b></h4></div>
                          <marquee behavior ="slide" direction="up" scrolldelay="250"><center><h3><b>{{$TongK}}</b></h3></center></marquee>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2 thongke">
                    <div class="panel panel-default" style="background:rgb(169, 255, 150); min-height: 150px ">
                      <div class="panel-body noidung">
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                          <center><h1><i class="fas fa-trophy"></i></h1></center>
                        </div>
                        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 solieu">
                         <div class="title"><h4><b>Trung Bình</b></h4></div>
                          <marquee behavior ="slide" direction="up" scrolldelay="300"><center><h3><b>{{$TongTB}}</b></h3></center></marquee>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2 thongke">
                    <div class="panel panel-default" style="background: rgb(237, 95, 95); min-height: 150px ">
                      <div class="panel-body noidung">
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                          <center><h1><i class="fas fa-trophy"></i></i></h1></center>
                        </div>
                        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 solieu">
                         <div class="title"><h4><b>Yếu</b></h4></div>
                          <marquee behavior ="slide" direction="up" scrolldelay="350"><center><h3><b>{{$TongY}}</b></h3></center></marquee>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                </div>
                <div class="bieudo_tt">
                   <div class="container" style="padding-top: 20px">
                    <div class=" panel panel-default"> 
                      <div class="panel-body">
                        <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7" id="bieudocot">
                          <div id="bieudocot_tt" style=" margin-bottom: 20px;"></div>
                          <center><p>Biều đồ cột</p></center>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5" id="bieudotron">
                          <div id="bieudotron_tt" style=" margin-bottom: 20px"></div>
                          <center><p>Biều đồ tròn</p></center>
                        </div>
                         <div class="col-lg-12" style="margin-top: 30px;" id="bieudoduong">
                          <div id="bieudoduong_tt" style=" margin-bottom: 20px "></div>
                          <center><p>Biều đồ đường</p></center>
                      </div>
                      </div>
                    </div>
                  </div> 
                </div>
                <div class="bieudo_xl">
                  <div class="container" style="padding-top: 20px">
                    <div class=" panel panel-default"> 
                      <div class="panel-body">
                        <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                          <div id="bieudocot_xl" style=" margin-bottom: 20px;"></div>
                          <center><p>Biều đồ cột</p></center>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
                          <div id="bieudotron_xl" style=" margin-bottom: 20px"></div>
                          <center><p>Biều đồ tròn</p></center>
                        </div>
                         <div class="col-lg-12" style="margin-top: 30px;">
                          <div id="bieudoduong_xl" style=" margin-bottom: 20px "></div>
                          <center><p>Biều đồ đường</p></center>
                      </div>
                      </div>
                    </div>
                  </div> 
                </div>
              </div>
                        
            <!-- Kết Thúc Body-->
<script type="text/javascript">
    $(function () {


        Highcharts.chart('bieudocot_tt', {
      chart: {
        backgroundColor: {
               linearGradient: [0, 0, 500, 500],
               stops: [
                 [0, 'rgba(255, 128, 53, 0.7)'],
                 [1, 'rgb(106, 90, 255)']
               ]
             },
        polar: true,
        type: 'column'

      },
      title: {
        text: 'Biểu Đồ Cột Thành Tích Học Viên'
      },
      xAxis: {
        categories: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6',
                    'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
        crosshair: true,
        labels:{
                style:{
                  color: "black"
                }
              }
      },
      yAxis: {
        min: 0,
        title: {
          text: 'Học Viên'
        }
      },
      tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
          '<td style="padding:0"><b>{point.y:.f} Học viên</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
      },
      plotOptions: {
        column: {
          pointPadding: 0.2,
          borderWidth: 0
        }
      },
      series: [{
        name: 'Đạt',
        data: <?php echo json_encode($Dat); ?>

      }, {
        name: 'KhongDat',
        data: <?php echo json_encode($KhongDat); ?>

      }]
    });


        Highcharts.chart('bieudotron_tt', {
          chart: {
            backgroundColor: {
               linearGradient: [0, 0, 500, 500],
               stops: [
                 [0, 'rgba(255, 128, 53, 0.7)'],
                 [1, 'rgb(106, 90, 255)']
               ]
             },
            polar: true,
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
          },
          title: {
            text: 'Biểu Đồ Tròn Thành Tích Học Viên'
          },
          tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.2f}%</b>'
          },
          accessibility: {
            point: {
              valueSuffix: '%'
            }
          },
          plotOptions: {
            pie: {
              allowPointSelect: true,
              cursor: 'pointer',
              dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.2f} %'
              }
            }
          },
          series: [{
            name: 'Phần Trăm',
            colorByPoint: true,
            data: [{
              name: 'Đạt',
              y: <?php echo $pt_D ; ?>
            }, {
              name: 'Không Đạt',
              y: <?php echo $pt_KD ; ?>
            }]
          }]
        });
          Highcharts.chart('bieudoduong_tt', {
            chart: {
              backgroundColor: {
               linearGradient: [0, 0, 500, 500],
               stops: [
                 [0, 'rgba(255, 128, 53, 0.7)'],
                 [1, 'rgb(106, 90, 255)']
               ]
             },
              polar: true,
              type: 'spline'
            },
            title: {
              text: 'Biểu Đồ Đường Thành Tích Học Viên'
            },
            xAxis: {
              categories: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6',
                    'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
              crosshair: true,
              labels:{
                style:{
                  color: "black"
                }
              }

            },

            yAxis: {
              title: {
                text: 'Học Viên'
              },
              labels: {
                formatter: function () {
                  return this.value;
                }
              },
              crosshair: true
            },
            tooltip: {
              crosshairs: true,
              shared: true
            },
            plotOptions: {
              spline: {
                marker: {
                  radius: 4,
                  lineColor: '#666666',
                  lineWidth: 1
                }
              }
            },
            series: [{
              name: 'Đạt',
              marker: {
                symbol: 'square'
              },
              data: <?php echo json_encode($Dat); ?>

            }, {
              name: 'Không Đạt',
              marker: {
                symbol: 'diamond'
              },
              data: <?php echo json_encode($KhongDat); ?>
            }]
          });

});
</script>            
<script type="text/javascript">
		$(function () {


        Highcharts.chart('bieudocot_xl', {
      chart: {
        backgroundColor: {
               linearGradient: [0, 0, 500, 500],
               stops: [
                 [0, 'rgba(255, 128, 53, 0.7)'],
                 [1, 'rgb(106, 90, 255)']
               ]
             },
        polar: true,
        type: 'column'

      },
      title: {
        text: 'Biểu Đồ Cột Xếp Loại Học Viên'
      },
      xAxis: {
        categories: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6',
                    'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
        crosshair: true,
        labels:{
                style:{
                  color: "black"
                }
              }
      },
      yAxis: {
        min: 0,
        title: {
          text: 'Học Viên'
        }
      },
      tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
          '<td style="padding:0"><b>{point.y:.f} Học viên</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
      },
      plotOptions: {
        column: {
          pointPadding: 0.2,
          borderWidth: 0
        }
      },
      series: [{
        name: 'Xuất Sắc',
        data: <?php echo json_encode($XuatSac); ?>

      }, {
        name: 'Giỏi',
        data: <?php echo json_encode($Gioi); ?>

      },{
        name: 'Khá',
        data: <?php echo json_encode($Kha); ?>
      },{
        name: 'Trung Bình',
        data: <?php echo json_encode($TB); ?>
      },{
        name: 'Yếu',
        data: <?php echo json_encode($Yeu); ?>
      }]
    });


        Highcharts.chart('bieudotron_xl', {
          chart: {
            backgroundColor: {
               linearGradient: [0, 0, 500, 500],
               stops: [
                 [0, 'rgba(255, 128, 53, 0.7)'],
                 [1, 'rgb(106, 90, 255)']
               ]
             },
            polar: true,
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
          },
          title: {
            text: 'Biểu Đồ Tròn Xếp Loại Học Viên'
          },
          tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.2f}%</b>'
          },
          accessibility: {
            point: {
              valueSuffix: '%'
            }
          },
          plotOptions: {
            pie: {
              allowPointSelect: true,
              cursor: 'pointer',
              dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.2f} %'
              }
            }
          },
          series: [{
            name: 'Phần Trăm',
            colorByPoint: true,
            data: [{
              name: 'Xuất Sắc',
              y: <?php echo $pt_XS ; ?>
            }, {
              name: 'Giỏi',
              y: <?php echo $pt_G ; ?>
            },{
              name: 'Khá',
              y: <?php echo $pt_K ; ?>
            },{
              name: 'Trung Bình',
              y: <?php echo $pt_TB ; ?>	
            },{
              name: 'Yếu',
              y: <?php echo $pt_Y ; ?>
            }]
          }]
        });
          Highcharts.chart('bieudoduong_xl', {
            chart: {
              backgroundColor: {
               linearGradient: [0, 0, 500, 500],
               stops: [
                 [0, 'rgba(255, 128, 53, 0.7)'],
                 [1, 'rgb(106, 90, 255)']
               ]
             },
              polar: true,
              type: 'spline'
            },
            title: {
              text: 'Biểu Đồ Đường Xếp Loại Học Viên'
            },
            xAxis: {
              categories: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6',
                    'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
              crosshair: true,
              labels:{
                style:{
                  color: "black"
                }
              }

            },

            yAxis: {
              title: {
                text: 'Học Viên'
              },
              labels: {
                formatter: function () {
                  return this.value;
                }
              },
              crosshair: true
            },
            tooltip: {
              crosshairs: true,
              shared: true
            },
            plotOptions: {
              spline: {
                marker: {
                  radius: 4,
                  lineColor: '#666666',
                  lineWidth: 1
                }
              }
            },
            series: [{
              name: 'Xuất Sắc',
              marker: {
                symbol: 'square'
              },
              data: <?php echo json_encode($XuatSac); ?>

            }, {
              name: 'Giỏi',
              marker: {
                symbol: 'diamond'
              },
              data: <?php echo json_encode($Gioi); ?>
            },{
              name: 'Khá',
              marker: {
                symbol: 'circle'
              },
              data: <?php echo json_encode($Kha); ?>
            },{
              name: 'Trung Bình',
              marker: {
                symbol: 'triangle'
              },
              data: <?php echo json_encode($TB); ?>
            },{
              name: 'Yếu',
              marker: {
                symbol: 'triangle-down'
              },
              data: <?php echo json_encode($Yeu); ?>
            }]
          });

});
</script>
@endsection
@endif