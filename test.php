<?php
	$empfaenger = "stefan_gruber2@gmx.at";
	$betreff = "Test des Mailversand";
	$text = "Der Test scheint geklappt zu haben";
	$extra = "From: Info <info@domainname.de>\r\n";
	if(mail($empfaenger, $betreff, $text, $extra)) {
		echo 'E-Mail versendet';
	}
?>