$(document).ready(function() {

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

});