/*-----------------------------------------------------------------------------------

    Template Name: Sp Portal
    Author:
    Author URI:

-----------------------------------------------------------------------------------

    Javascript INDEX
    ===================

    1.  User Registration:

-----------------------------------------------------------------------------------*/

/*----------------------------------------*/

/*  1.  User Registration:
/*----------------------------------------*/


function inputNumber() {
    let name = $('#inputPhoneNumber').val();
    if (name === "") {
        $("#inputPhoneNumberAlert").css({"visibility": "visible"}).html("Enter your Phone Number");
        $("#inputPhoneNumber").css({"border": "2px solid red"});
        $("#passDisplayBlock").css({"display": "none"});
        return false;
    } else if (name.length < 8 || name.length > 20) {
        $("#inputPhoneNumberAlert").css({"visibility": "visible"}).html("Your number must be 8 to 20");
        $("#inputPhoneNumber").css({"border": "2px solid red"});
        $("#passDisplayBlock").css({"display": "none"});
        return false;
    } else {
        $("#inputPhoneNumberAlert").css({"visibility": "hidden"}).html("");
        $("#inputPhoneNumber").css({"border": "1px solid #8c5858"});
        $("#passDisplayBlock").css({"display": "block"});
        return true;
    }
}

function inputCheck() {
    if ($('#checkboxTerms').prop('checked') == true) {
        return true;
    } else {
        alert("Checked agree to terms & condition");
        return false;
    }
}

function inputPassword() {
    let name = $('#inputPassword').val();
    if (name === "") {
        $("#inputPasswordAlert").css({"visibility": "visible"}).html("Enter your password");
        $("#inputPassword").css({"border": "2px solid red"});
        return false;
    } else if (name.length < 8 || name.length > 20) {
        $("#inputPasswordAlert").css({"visibility": "visible"}).html("Your Password must be 8 to 20");
        $("#inputPassword").css({"border": "2px solid red"});
        return false;
    } else {
        $("#inputPasswordAlert").css({"visibility": "hidden"}).html("");
        $("#inputPassword").css({"border": "1px solid #8c5858"});
        return true;
    }
}

$("#userRegister").submit(function (event) {
    inputNumber();
    inputPassword();
    inputCheck();


    if (inputCheck() !== true) {

    } else if (inputNumber() !== true) {

    } else if (inputPassword() !== true) {

    } else {
        return;
    }
    event.preventDefault();
});


$('#select_id').change(function () {

    if ($(this).val() == 1) {
        $("#selectList").html("y").append(
            new Option("Select Subcategory ", ""),
            new Option("Refrigerator Servicing ", "2"),
            new Option("Microwave Oven Repair", "3")
        );
    } else {
        $("#selectList").html("g").append(
            new Option("Select Subcategory ", ""),
            new Option("Moving Homes", "4"),
            new Option("Moving Offices", "5")
        );
    }

});


// ========================================================================= //
//  Google Map add
// ========================================================================= //
/*$(document).ready(function () {

    var myLatLng = {lat: 34.397, lng: 80.644};
    map = new google.maps.Map(document.getElementById('map'), {
        center: myLatLng,
        zoom: 8
    });

    var markers = new google.maps.Marker({
       position: myLatLng,
       map: map,
       title: "Hello"
    });

    var request ={
      location: myLatLng,
      radious: '1500',
        types: ['school']
    };

    service = new google.maps.places.PlacesService(map);
    service.nearbySearch(request, callback);
    
    function callback(results, status) {
        console.log(results);
    }
});
*/

function resourceAdd(e) {
    if (e == "show") {
        $('#resourceList').show(1000);
        $('#spSubmitButton').show();
    } else {
        $('#resourceList').hide(1000);
        $('#spSubmitButton').hide();
    }
}


$('.sa-remove').click(function () {
    var postId = $(this).data('id');
    swal({
            title: "are u sure?",
            text: "lorem lorem lorem",
            type: "error",
            showCancelButton: true,
            confirmButtonClass: 'btn-danger waves-effect waves-light',
            confirmButtonText: "Delete",
            cancelButtonText: "Cancel",
            closeOnConfirm: true,
            closeOnCancel: true
        },
        function(){
            window.location.href = "ok";
        });
});




jQuery(document).ready(function($) {
    "use strict";

    // Pie chart flotPie1
    var piedata = [
        { label: "Desktop visits", data: [[1,32]], color: '#5c6bc0'},
        { label: "Tab visits", data: [[1,33]], color: '#ef5350'},
        { label: "Mobile visits", data: [[1,35]], color: '#66bb6a'}
    ];

    $.plot('#flotPie1', piedata, {
        series: {
            pie: {
                show: true,
                radius: 1,
                innerRadius: 0.65,
                label: {
                    show: true,
                    radius: 2/3,
                    threshold: 1
                },
                stroke: {
                    width: 0
                }
            }
        },
        grid: {
            hoverable: true,
            clickable: true
        }
    });
    // Pie chart flotPie1  End
    // cellPaiChart
    var cellPaiChart = [
        { label: "Direct Sell", data: [[1,65]], color: '#5b83de'},
        { label: "Channel Sell", data: [[1,35]], color: '#00bfa5'}
    ];
    $.plot('#cellPaiChart', cellPaiChart, {
        series: {
            pie: {
                show: true,
                stroke: {
                    width: 0
                }
            }
        },
        legend: {
            show: false
        },grid: {
            hoverable: true,
            clickable: true
        }

    });
    // cellPaiChart End
    // Line Chart  #flotLine5
    var newCust = [[0, 3], [1, 5], [2,4], [3, 7], [4, 9], [5, 3], [6, 6], [7, 4], [8, 10]];

    var plot = $.plot($('#flotLine5'),[{
            data: newCust,
            label: 'New Data Flow',
            color: '#fff'
        }],
        {
            series: {
                lines: {
                    show: true,
                    lineColor: '#fff',
                    lineWidth: 2
                },
                points: {
                    show: true,
                    fill: true,
                    fillColor: "#ffffff",
                    symbol: "circle",
                    radius: 3
                },
                shadowSize: 0
            },
            points: {
                show: true,
            },
            legend: {
                show: false
            },
            grid: {
                show: false
            }
        });
    // Line Chart  #flotLine5 End
    // Traffic Chart using chartist
    if ($('#traffic-chart').length) {
        var chart = new Chartist.Line('#traffic-chart', {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            series: [
                [0, 18000, 35000,  25000,  22000,  0],
                [0, 33000, 15000,  20000,  15000,  300],
                [0, 15000, 28000,  15000,  30000,  5000]
            ]
        }, {
            low: 0,
            showArea: true,
            showLine: false,
            showPoint: false,
            fullWidth: true,
            axisX: {
                showGrid: true
            }
        });

        chart.on('draw', function(data) {
            if(data.type === 'line' || data.type === 'area') {
                data.element.animate({
                    d: {
                        begin: 2000 * data.index,
                        dur: 2000,
                        from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
                        to: data.path.clone().stringify(),
                        easing: Chartist.Svg.Easing.easeOutQuint
                    }
                });
            }
        });
    }
    // Traffic Chart using chartist End
    //Traffic chart chart-js
    if ($('#TrafficChart').length) {
        var ctx = document.getElementById( "TrafficChart" );
        ctx.height = 150;
        var myChart = new Chart( ctx, {
            type: 'line',
            data: {
                labels: [ "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul" ],
                datasets: [
                    {
                        label: "Visit",
                        borderColor: "rgba(4, 73, 203,.09)",
                        borderWidth: "1",
                        backgroundColor: "rgba(4, 73, 203,.5)",
                        data: [ 0, 2900, 5000, 3300, 6000, 3250, 0 ]
                    },
                    {
                        label: "Bounce",
                        borderColor: "rgba(245, 23, 66, 0.9)",
                        borderWidth: "1",
                        backgroundColor: "rgba(245, 23, 66,.5)",
                        pointHighlightStroke: "rgba(245, 23, 66,.5)",
                        data: [ 0, 4200, 4500, 1600, 4200, 1500, 4000 ]
                    },
                    {
                        label: "Targeted",
                        borderColor: "rgba(40, 169, 46, 0.9)",
                        borderWidth: "1",
                        backgroundColor: "rgba(40, 169, 46, .5)",
                        pointHighlightStroke: "rgba(40, 169, 46,.5)",
                        data: [1000, 5200, 3600, 2600, 4200, 5300, 0 ]
                    }
                ]
            },
            options: {
                responsive: true,
                tooltips: {
                    mode: 'index',
                    intersect: false
                },
                hover: {
                    mode: 'nearest',
                    intersect: true
                }

            }
        } );
    }
    //Traffic chart chart-js  End
    // Bar Chart #flotBarChart
    $.plot("#flotBarChart", [{
        data: [[0, 18], [2, 8], [4, 5], [6, 13],[8,5], [10,7],[12,4], [14,6],[16,15], [18, 9],[20,17], [22,7],[24,4], [26,9],[28,11]],
        bars: {
            show: true,
            lineWidth: 0,
            fillColor: '#ffffff8a'
        }
    }], {
        grid: {
            show: false
        }
    });
    // Bar Chart #flotBarChart End
});








