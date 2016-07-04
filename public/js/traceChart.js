'use strict'


function recup(){

	$.post('../app/getChartData.php',{},function(data){

		var $donnejson;
		console.log(data);
		$donnejson = JSON.parse(data);
		console.log($donnejson);

		var $tab0 = [];
		var $tab1 = [];

		for (var i = 0; i < $donnejson.length; i++) {
			$tab0[i] = $donnejson[($donnejson.length-1) - i].payload;
			$tab1[i] = $donnejson[($donnejson.length-1) - i].receivedAt;
		}

		chart($tab0,$tab1);

		// $('#ito').append('<p>' + $donnejson[0].temperature + '</p><hr>');
		// console.log($donnejson);
    });
};

function chart($d0,$d1)
{

	var ctx = $("#myChart");
	var myChart = new Chart(ctx, {
		type: 'line', 
		data: {
	        labels: $d1,
	        datasets: [{
	            label: 'température',
	            data: $d0,
	            backgroundColor: [
	                'rgba(255, 99, 132, 0.2)',
	                'rgba(54, 162, 235, 0.2)'
	            ],
	            borderColor: [
	                'rgba(255,99,132,1)',
	                'rgba(54, 162, 235, 1)'
	            ],
	            borderWidth: 1
	        },
	        {
	            label: 'not defined',
	            data: $d1,
	            backgroundColor: [
	                'rgba(54, 162, 235, 0.2)'
	            ],
	            borderColor: [
	                'rgba(54, 162, 235, 1)'
	            ],
	            borderWidth: 1
	        }]
	    },
	    options: {
	        scales: {
	            yAxes: [{
	                ticks: {
	                    beginAtZero:false,
	                    min : 11,
	                    max : 13,
	                    stepSize : 0.1
	                }
	            }]
	        }
	    }
	});
	var chartInstance = new Chart(ctx, {
	    type: 'line',
	    data: data,
	    options: {
	        responsive: false
	    }
	});

}


$(document).ready(function(){
	recup();
});
