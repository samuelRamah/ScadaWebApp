var oldMessage = {
	receivedAt: undefined,
	content: undefined	
};

var refreshTime = 100;


$(document).ready(function(){
	$("#log").css('height', $(window).height() - ($(".navbar").height() + $(".page-header").height()) - 120);

	refresh	();


});

var refresh = function () {
	$.post("../app/getLogMessage.php", 
		{}, 
		function (data) {
			var message = JSON.parse(data);

			console.log(data);
			console.log(message	);

			if (oldMessage.receivedAt != message.receivedAt	&& oldMessage.content != message.content){
				$("#log").append("\t" + message.receivedAt + " : " + message.content);
				if ($("#autoscroll").prop('checked')){
					$('#log').scrollTop($('#log')[0].scrollHeight);
				}
				oldMessage.receivedAt = message.receivedAt;
				oldMessage.content = message.content;
			}
		}
	);

	setTimeout(refresh, refreshTime);
};