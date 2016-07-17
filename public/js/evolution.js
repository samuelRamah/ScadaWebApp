'use strict'

var min = 11;
var max = 13;
var stepSize = 0.5;
var division = 20;
var node = {
	id: undefined,
	description: undefined
};
var child = {
	id: undefined, 
	description: undefined
};
var tab0 = [];
var tab1 = [];
var donnejson;

function recup(){
	node.id = $("#id_node option:selected").val();
	node.description = $("#id_node option:selected").text();

	child.id = $("#id_capteur option:selected").val();
	child.description = $("#id_capteur option:selected").text();

	$.post(
		'../app/getChartData.php',
		{
			id_node: node.id,
			childId: child.id
		},
		function(data){
			
			console.log(data);
			donnejson = JSON.parse(data);
			console.log(donnejson);

			min = Math.floor(donnejson.infos[0].min);
			max = Math.ceil(donnejson.infos[0].max);
			// max = (max == "nan" ? 0 : max);

			stepSize = (max - min) / division;

			for (var i = 0; i < donnejson.messages.length; i++) {
				tab0[i] = donnejson.messages[(donnejson.messages.length-1) - i].payload;
				tab1[i] = donnejson.messages[(donnejson.messages.length-1) - i].receivedAt;
			}

			chart(tab0,tab1);

			$("#min_val").val(min);
			$("#max_val").val(max);

			// $('#ito').append('<p>' + $donnejson[0].temperature + '</p><hr>');
			// console.log($donnejson);
    	}
    );
}

function chart(d0,d1)
{

	var ctx = $("#myChart");
	var myChart = new Chart(ctx, {
		type: 'line', 
		data: {
	        labels: d1,
	        datasets: [{
	            label: child.description,
	            data: d0,
	            backgroundColor: [
	                'rgba(255, 99, 132, 0.2)',
	                // 'rgba(54, 162, 235, 0.2)'
	            ],
	            borderColor: [
	                'rgba(255,99,132,1)',
	                // 'rgba(54, 162, 235, 1)'
	            ],
	            borderWidth: 1
	        },
	        {
	            label: 'not defined',
	            data: d1,
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
	                    min : min,
	                    max : max,
	                    stepSize : stepSize
	                }
	            }]
	        }
	    }
	});
	// var chartInstance = new Chart(ctx, {
	//     type: 'line',
	//     data: data,
	//     options: {
	//         responsive: false
	//     }
	// });

}


$(document).ready(function(){
	
	$("#id_capteur option:first").attr('selected', true);

	recup();

	$("#see_chart").click(function(){
		console.log("node.id : " + node.id + ", .. : " + $("#id_node").val());
		console.log("child.id : " + child.id + ", .. : " + $("#id_capteur").val())
		if (node.id != $("#id_node").val() || child.id != $("#id_capteur").val()){
			recup();
		}
		else {
			min = Number($("#min_val").val());
			max = Number($("#max_val").val());
			stepSize = (max - min) / division;
			chart(tab0, tab1);
		}
	});

	$("#id_node").change(function(event) {
		var id_node = $(this).val();

		$.post(
			'../app/getSensors.php', 
			{
				id_node: id_node
			}, 
			function(data) {
				var sensors = JSON.parse(data);
				// console.log(sensors);
				
				$("#id_capteur").children().remove();

				for (var i = 0; i < sensors.length; i++){
					$("#id_capteur").append("<option value="+ sensors[i].childId + 
						">" + sensors[i].description +"</option>")
				}
			}
		);	
	});
});
