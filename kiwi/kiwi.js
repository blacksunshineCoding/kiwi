$(document).ready(function() {
	
	setHeight();
	prepareRichtextAreas();
	
	$('textarea.richtextarea').on('click', function() {
		$(this).val($(this).data('original'));
		var textareaId = '#' + $(this).attr('id');
		initTinyMce(textareaId);
	});

	$('a.action.delete').on('click', function(e) {
		var link = this;
		e.preventDefault();
	
		$('<div class="dialogDelete">Wollen Sie den Eintrag wirklich löschen?</div>').dialog({
	    	buttons: {
	        	'Löschen': function() {
	            	window.location = link.href;
	            },
	            'Abbrechen': function() {
	            	$(this).dialog('close');
	            }
	        }
		});
	});
	
	$('h4.newChildtableAdd').click(function() {
		$('.newChildtable').slideToggle();
	})

});

$(window).resize(function() {
	setHeight();
})

function setHeight() {
	$('#content').height($(document).height());
	$('#side').height($(document).height());
}

function initTinyMce(textarea) {
	tinymce.init({
		selector: textarea,
		language: 'de',
		skin: 'charcoal'
	});
}

function prepareRichtextAreas() {
	$('textarea.richtextarea').each(function() {
		var originalText = $(this).val();
		$(this).attr('data-original', originalText);
		$(this).val(originalText.replace(/(<([^>]+)>)/ig,""))
	});
}