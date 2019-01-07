$(".cat-link.active").click(function() {
	var color = $(this).attr("name");

	$('.cat-link.active').css({
		"background-color": "",
		"color": "#000000",
	});

	$(this).css({
		"background-color": "#"+color+"",
		"color": "#ffffff",
	});

	$category = $(this).val();
	$("#category").val($category);
});

// alert($(window).width());