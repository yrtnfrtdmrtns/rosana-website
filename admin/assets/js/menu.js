$(document).ready(function() {
	$(".menu").on("click", function() {
		$("#menu-overlay").slideToggle();
	});

	$("#menu-overlay .menu-close").on("click", function() {
		$("#menu-overlay").slideToggle();
	});
})