'use strict'


function recup(){

	$.post('misyDonnees.php',{},function(data){

		var $donnejson;
		console.log(data);
		$donnejson = JSON.parse(data);
		console.log($donnejson);

		var $tab0 = [];
		var $tab1 = [];

		for (var i = 0; i < $donnejson.length; i++) {
			$tab0[i] = $donnejson[i].temperature;
			$tab1[i] = $donnejson[i].heure;
		}

		chart($tab0,$tab1);

		$('#ito').append('<p>' + $donnejson[0].temperature + '</p><hr>');
		// console.log($donnejson);
    });
};

function chart($d0,$d1)
{

	var ctx = $("#myChart");
	var myChart = new Chart(ctx, {
		type: 'line', 
		data: {
	        labels: ["Red", "Blue", "Yellow"],
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
	            label: 'heure',
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
	                    beginAtZero:true,
	                    suggestedMax :10,
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
