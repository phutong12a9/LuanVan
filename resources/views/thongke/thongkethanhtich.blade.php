@if(session()->has('canbo'))
@extends('quantri')
@section('content')
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
                    <option value="">2015</option>
                    <option value="">2016</option>
                    <option value="">2017</option>
                    <option value="">2018</option>
                    <option value="">2019</option>
                    <option value="">2020</option>
                    <option value="">2021</option>
                    <option value="">2022</option>
                    <option value="">2023</option>
                    <option value="">2024</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-lg-6" style="padding: 0px 0px;">
              <div class="form-group">
                <label class="col-lg-12 control-label">
                  Quý
                </label>
                <div class="col-lg-12">
                  <select class="form-control">
                    <option value="">Quý 1</option>
                    <option value="">Quý 2</option>
                    <option value="">Quý 3</option>
                    <option value="">Quý 4</option>
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
                  Năm
                </label>
                <div class="col-lg-12" >
                  <select class="form-control" style="width: 100%">
                    <option value="">2015</option>
                    <option value="">2016</option>
                    <option value="">2017</option>
                    <option value="">2018</option>
                    <option value="">2019</option>
                    <option value="">2020</option>
                    <option value="">2021</option>
                    <option value="">2022</option>
                    <option value="">2023</option>
                    <option value="">2024</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-lg-6" style="padding: 0px 0px;">
              <div class="form-group">
                <label class="col-lg-12 control-label">
                  Khóa
                </label>
                <div class="col-lg-12">
                  <select class="form-control">
                    <option value="">Lớp Chứng Chỉ</option>
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
  <a type="button" class=" btn btn-default pull-right" href="javascript:void(0)" onclick="In_Content()" style="margin-right: 30px;">
    <i class="glyphicon glyphicon-print"></i>
  </a>
</p>
<div id="content" style="margin-bottom: 90px;">
  <center><h2><b>Thống Kê Học Viên</b></h2></center>
  <div class="container" style="background: white; display: table;">
    <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2" style="padding: 20px;max-height: 260px; display: table-cell;">
      <div class="panel panel-default"style="background: #ded33a; min-height: 150px">
        <div class="panel-body">
          <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
            <center><h1><i class="glyphicon glyphicon-th-large"></i></h1></center>
          </div>
          <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9" style="margin: 0px auto;text-align: center;">
            <h4><b>Khóa</b></h4>
            <marquee behavior ="slide" direction="up" scrolldelay="100"><center><h3><b>350</b></h3></center></marquee>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2" style="padding: 20px;max-height: 260px; display: table-cell ">
      <div class="panel panel-default" style="background: #3dd454; min-height: 150px">
        <div class="panel-body">
          <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
            <center><h1><i class="glyphicon glyphicon-ok"></i></h1></center>
          </div>
          <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9" style="margin: 0px auto;text-align: center;">
            <h4><b>Lớp</b></h4>
            <marquee behavior ="slide" direction="up" scrolldelay="150"><center><h3><b>300</b></h3></center></marquee>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2" style="padding: 20px;max-height: 260px; display: table-cell;" >
      <div class="panel panel-default" style="background: #eb494f; min-height: 150px ">
        <div class="panel-body">
          <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
            <center><h1><i class="glyphicon glyphicon-remove"></i></h1></center>
          </div>
          <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9" style="margin: 0px auto;text-align: center;">
            <h4><b>Học Viên</b></h4>
            <marquee behavior ="slide" direction="up" scrolldelay="200"><center><h3><b>50</b></h3></center></marquee>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2" style="padding: 20px;max-height: 260px; display: table-cell">
      <div class="panel panel-default" style="background:#2e99db; min-height: 150px ">
        <div class="panel-body">
          <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
            <center><h1><i class="glyphicon glyphicon-stats"></i></h1></center>
          </div>
          <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9" style="margin: 0px auto;text-align: center;">
            <h4><b>Đạt</b></h4>
            <marquee behavior ="slide" direction="up" scrolldelay="200"><center><h3><b>50</b></h3></center></marquee>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2" style="padding: 20px;max-height: 260px; display: table-cell;" >
      <div class="panel panel-default" style="background: #eb494f; min-height: 150px ">
        <div class="panel-body">
          <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
            <center><h1><i class="glyphicon glyphicon-remove"></i></h1></center>
          </div>
          <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9" style="margin: 0px auto;text-align: center;">
            <h4><b>Không Đạt</b></h4>
            <marquee behavior ="slide" direction="up" scrolldelay="200"><center><h3><b>50</b></h3></center></marquee>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container" style="padding-top: 20px" >
    <div class=" panel panel-default">
      <div class="panel-body">
        <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
          <center><div id="container" style=" margin-bottom: 20px"></div></center>
          <center><p>Biều đồ cột</p></center>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5" >
          <center><div id="container1" style=" margin-bottom: 20px"></div></center>
          <center><p>Biều đồ tròn</p></center>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="col-lg-12" style="margin-top: 30px;">
          <center><div id="container2" style=" margin-bottom: 20px "></div></center>
          <center><p>Biều đồ đường</p></center>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Kết Thúc Body-->
<script type="text/javascript">
  $(function () {
        Highcharts.chart('container', {
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
        text: 'Thống Kê Học Viên'
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
          '<td style="padding:0"><b>{point.y:.1f} Học viên</b></td></tr>',
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
        data: [40, 0, 25, 0, 0, 30, 32, 36, 26, 42, 0, 45]

      }, {
        name: 'Không Đạt',
        data: [20, 0, 20, 0, 0, 15, 13, 14, 18, 8, 0, 5]

      }]
    });
        Highcharts.chart('container1', {
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
            text: 'Biểu Đồ Tròn'
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
              y: 80.41
            }, {
              name: 'Không Đạt',
              y: 19.59
            }]
          }]
        });
          Highcharts.chart('container2', {
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
              text: 'Biểu Đồ Đường'
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
              data: [40, 0, 25, 0, 0, 30, 32, 36, 26, 42, 0, 45]

            }, {
              name: 'Không Đạt',
              marker: {
                symbol: 'diamond'
              },
              data: [20, 0, 20, 0, 0, 15, 13, 14, 18, 8, 0, 5]
            }]
          });

});
</script>
@endsection
@endif