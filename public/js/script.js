var actuators;

$(document).ready(function(){
	actuators_btn = $('.actuator_btn');
	actuators_btn.click(function(){
		
		var s = this.id.split('_');
		var id_node = s[1];
		var childId = s[2];
		var value = $('#range_'+id_node+'_'+childId).val();
		console.log("Node : " + id_node + ", child : " + childId + ", value : " + value);

		$.post(
			"../app/actuator.php", 
			{
				id_node : id_node,
				childId: childId, 
				value: value
			}, 
			function (data){
				console.log(data);
			}
		);

	});

	// $(".sam").click(function(){
	// 	console.log("Sam");
	// });
	// 
	var actuators_switch = $('.actuator_switch');
	actuators_switch.change(function() {
		console.log("Je change");
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

		console.log(element.attr('checked'));

		var value = element.attr('checked');
	
		$.post(
			"../app/actuator.php", 
			{
				id_node : id_node,
				childId: childId, 
				value: value
			}, 
			function (data){
				console.log(data);
			}
		);

	});
});