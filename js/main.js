$(document).ready(function() {
	
	if ($('article.produktEintrag').length != 0) {
		console.log('produktListe');
		checkLagerbestaende();
		
		$('select.produktSize').change(function() {
			checkLagerbestaende();
		});
	}
	
	if ($('.katalogWarenkorb').length != 0) {
		console.log('warenkorb');
		checkLagerbestaendeWarenkorb();
	}
	
//	$('.katalogWarenkorb select.produktSize').change(function() {
//		checkLagerbestaendeWarenkorb()
//	});
	
});

//$('input.produktAnzahl').on('click change', function () {
//	console.log(11);
//	checkLagerbestaendeWarenkorb()            
//});

function toggleNav() {
	$('#navigation > ul').slideToggle();
}

function checkLagerbestaende() {
	$('article.produktEintrag').each(function() {
		var produktId = $(this).data('produktid');
		var produktSize = $(this).find('.produktSize').val();
		console.log(produktId);
		console.log(produktSize);
		
		var selector = '#lagerbestaende [data-produktid=' + produktId + '][data-variante=Größe][data-option=' + produktSize + ']';
		console.log(selector);
		var lagerbestand = $(selector).data('lagerbestand');
		console.log(lagerbestand);
		
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
//			console.log(produktLagerbestaende);
			produktLagerbestaende.each(function() {
				console.log(this);
				if (parseInt($(this).data('lagerbestand')) == 0) {
					console.log('produkt kein lagerbestand');
					var missingSize = $(this).data('option');
					var selector = '.warenkorbEintrag[data-produktid=' + produktId + ']';
					var warenkorbEintrag = $(selector);
					$(selector).find('select.produktSize option[value="' + missingSize + '"]').remove();
					console.log(warenkorbEintrag);
					console.log('##' + missingSize);
				}
			});
		});
	};
}