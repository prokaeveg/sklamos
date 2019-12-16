$(document).ready(function() {

	$("#form").submit(function() {
		$.ajax({
			type: "POST",
			url: "../php/lead.php",
			data: $(this).serialize()
		});
		return false;
	});
});
