$(document).ready(function(){
	$('.resize').click(function(){
		$("#add-drop").show();
		$('#add-name').html(this.alt);
		document.getElementById('add-image').src = this.src;
	});

});