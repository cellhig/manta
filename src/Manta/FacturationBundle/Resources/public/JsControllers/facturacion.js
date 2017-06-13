/**
 * Created by higom on 12/06/2017.
 */
$(document).ready(function() {
    $.ajax({
        type: 'GET',
        dataType: 'JSON',
        url: "{{ path('') }}"
    }).done(function (data) {
        if(data.status) {
            var chart = null;
            chart = new Highcharts.chart('container', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'productos  mas vendidos'
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                            style: {
                                color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                            }
                        }
                    }
                },
                series: [{
                    name: 'Brands',
                    colorByPoint: true,
                    data: data.dataArray
                }]
            });
        } else {

        }

    }).fail(function () {

    });

});



