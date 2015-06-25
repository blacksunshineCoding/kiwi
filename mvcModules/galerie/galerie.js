function galerieCountViews(id) {
	$.ajax({
		url: 'mvcModules/galerie/galerieCountAjax.php?id=' + id
	}).done(function() {
	});
}