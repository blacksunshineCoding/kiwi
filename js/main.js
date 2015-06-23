$(document).ready(function() {
	
	if ($('article.produktEintrag').length != 0) {
		checkLagerbestaende();
		
		$('select.produktSize').change(function() {
			checkLagerbestaende();
		});
	}
	
	if ($('.katalogWarenkorb').length != 0) {
		checkLagerbestaendeWarenkorb();
	}
	
	moveWarenkorbCount();
	
});

function toggleNav() {
	$('#navigation > ul').slideToggle();
}

function checkLagerbestaende() {
	$('article.produktEintrag').each(function() {
		var produktId = $(this).data('produktid');
		var produktSize = $(this).find('.produktSize').val();
		
		var selector = '#lagerbestaende [data-produktid=' + produktId + '][data-variante=Größe][data-option=' + produktSize + ']';
		var lagerbestand = $(selector).data('lagerbestand');
		
		if (parseInt(lagerbestand) <= 0) {
			var lagerbestandInfo = 'Dieser Artikel ist in der gewünschten Größe zurzeit leider nicht mehr vorrätig.';
			$(this).find('.lagerbestandInfo').html(lagerbestandInfo);
			$(this).find('button').hide();
		} else {
			$(this).find('.lagerbestandInfo').html('');
			$(this).find('button').show();
		}
		
	});
}

function checkLagerbestaendeWarenkorb() {
	if ($('.warenkorbEintrag').length != 0) {
		$('.warenkorbEintrag').each(function() {
			var produktId = $(this).data('produktid');
			var produktLagerbestaende = $('#lagerbestaende input[data-produktid=' + produktId + ']');
			produktLagerbestaende.each(function() {
				if (parseInt($(this).data('lagerbestand')) == 0) {
					var missingSize = $(this).data('option');
					var selector = '.warenkorbEintrag[data-produktid=' + produktId + ']';
					var warenkorbEintrag = $(selector);
					$(selector).find('select.produktSize option[value="' + missingSize + '"]').remove();
				}
			});
		});
	};
}

function moveWarenkorbCount() {
	if ($('#navigation .warenkorbCount').length != 0) {
		$('#navigation .warenkorbCount').appendTo('#navigation li.warenkorb');
	}
}