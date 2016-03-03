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
			$('#add-name').html(this.alt);
			document.getElementById('add-image').src = source;
			document.getElementById('overlay').style.visibility = "visible";
			document.getElementById('add-area').style.visibility = "visible";

			$("#close").click(function(){
				document.getElementById('overlay').style.visibility = "hidden";
				document.getElementById('add-area').style.visibility = "hidden";	
				$('#add-name').html("");
				document.getElementById('add-image').src = "";
			});
		});
	});

});