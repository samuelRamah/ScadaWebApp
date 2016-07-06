var actuators;
var textElement;
var textBgc;

$(document).ready(function(){
	actuators_btn = $('.actuator_btn');
	actuators_btn.click(function(){
		var s = this.id.split('_');
		var id_node = s[1];
		var childId = s[2];
		var value = $('#range_'+id_node+'_'+childId).val();
		// console.log("Node : " + id_node + ", child : " + childId + ", value : " + value);

		$.post(
			"../app/actuator.php", 
			{
				id_node : id_node,
				childId: childId, 
				value: value
			}, 
			function (data){
				//console.log(data);
			}
		);

	});

	var actuators_switch = $('.actuator_switch');
	actuators_switch.change(function() {
		// console.log("Je change");
		var s = this.id.split('_');
		var id_node = s[1];
		var childId = s[2];
		var element = $('#switch_'+id_node+'_'+childId);

		if (element.attr('checked')){
			element.attr('checked', false);
		}
		else {
			element.attr('checked', true);
		}

		// console.log(element.attr('checked'));

		var value = element.attr('checked');
	
		$.post(
			"../app/actuator.php", 
			{
				id_node : id_node,
				childId: childId, 
				value: value
			}, 
			function (data){
				// console.log(data);
			}
		);

	});

	$("[id*=range_]").on("change", function(){
		$(this).prev("[id*=text_]").val($(this).val());
		$(this).prev("[id*=text_]").change();
	});

	$("[id*=range_]").prev("[id*=text_]").change(function(){
		$(this).next("[id*=range_]").val($(this).val());
	});

	$("[id*=text_]").on("change", function(){
		// console.log($(this));
		textBgc = $(this).css("background-color");
		var newColor = "#D5EF2E";
		$(this).css("background-color", newColor);
		textElement = $(this);

		setTimeout(function(){
			textElement.css('background-color', textBgc);
		}, 300);
		
	});

	var actualiseData = function(){
		$.post(
			"../app/lastSensorsValue.php", 
			{}, 
			function(data){
				var sensors = JSON.parse(data);
				console.log(sensors);
				
				for (var i = 0; i < sensors.length; i++){
					var s = "" + sensors[i].id_node + "_" + sensors[i].childId + " ";
					var cible = "";
					var oldValue;
					if (sensors[i].type == "ACTUATOR"){
						if (sensors[i].valueType == "ANALOG"){
							cible = "#range_" + sensors[i].id_node + "_" + sensors[i].childId;
							oldValue = $(cible).val();
							if (oldValue != sensors[i].payload){
								// $(cible).val(sensors[i].payload);
								// $(cible).change(); //Trigger change event
								// $("#text_" + sensors[i].id_node + "_" + sensors[i].childId ).change();
							}
							// console.log(s + " is actuator analog " + $(cible).val());
						}
						else if (sensors[i].valueType == "NUMERIC") {
							cible = "#switch_" + sensors[i].id_node + "_" + sensors[i].childId;
							oldValue = $(cible).attr('checked');
							if (oldValue != sensors[i].payload){
								$(cible).attr('checked', (sensors[i].payload == 'checked' ? true : false))
							}
							// console.log(s + " is actuator numeric " + $(cible).attr('checked'));
						}
					}
					else if (sensors[i].type == "SENSOR"){
						cible = "#text_" + sensors[i].id_node + "_" + sensors[i].childId;
						oldValue = $(cible).val();
						if (oldValue != sensors[i].payload){
							$(cible).val(sensors[i].payload);	
							$(cible).change();
						}
						// console.log(s + " is sensor");
					}
				}
			}
		);
	};

	actualiseData();
	setInterval(actualiseData, 2000);

});