$(document).ready(function(){

	$(".roster-img").hover(function(){
		var source = this.src;
		this.src = "../assets/images/other/bench.png";
		this.id = "hovering";

		$("#hovering").mouseout(function(){
			this.src = source;
			this.id = "";
		});

		$('.roster-img').click(function(){
		});
	});

});