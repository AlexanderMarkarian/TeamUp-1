$(document).ready(function(){
	$("#my-team").hide();

	$(".resize").hover(function(){

		var source = this.src;
		this.src = "../assets/images/other/trade.png";
		this.id = "hovering";

		$("#hovering").mouseout(function(){
			this.src = source;
			this.id = "";
		});

		$(".resize").click(function(){
			$("#other-team").hide();
			$("#my-team").show();
		});
	});



	$("#back").click(function(){
		$("#other-team").show();
		$("#my-team").hide();
	});
});