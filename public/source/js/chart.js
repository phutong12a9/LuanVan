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