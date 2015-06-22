<?php
function orderMail($order, $type) {
	if (isset($type) && isset($order)) {
		switch ($type) {
			case 'confirm':
				$empfaenger = $order['emailadresse'];
				$absender = 'broke@57kkk.tk';
				$reply = 'broke@57kkk.tk';
				$betreff = '[57KKK Store] Deine Bestellung war erfolgreich';
				$text = 'Deine Bestellung im 57KKK Store mit der Bestellnummer <b>' . $order['bestellnummer'] . '</b> war erfolgreich!<br><br>';
				$text .= 'Hier eine Zusammenfassung deiner Bestellung:<br>';
				$text .= $order['produkte'];
				$text .= '<br><br>';
				$text .= 'Zahlungsmethode: ' . $order['zahlungsmethode'] . '<br>';
				$text .= 'Versandmethode: ' . $order['versandmethode'] . '<br>';
				$text .= 'Gesamtpreis: EUR ' . $order['gesamtpreis'] . '<br><br>';
				
				$text .= 'Überweise bitte den Gesamtpreis von <b>EUR ' . $order['gesamtpreis'] . '</b> mit dem Vermerk der Bestellnummer <b>' . $order['bestellnummer'] . '</b>';
				
				if ($order['zahlungsmethode'] == 'PayPal') {
					$text .= 'mit PayPal an folgende Adresse:<br>';
					$text .= 'broke@57kkk.tk<br>';
				} else {
					$text .= 'via Banküberweisung auf folgendes Konto:<br>';
					$text .= 'xZite<br>';
					$text .= 'Kontonummer: XXXXX<br>';
					$text .= 'Bankleitzahl: XXXXX<br>';
					$text .= 'Bank: XXXXX<br>';
					$text .= 'IBAN: XXXX-XXXX-XXXX-XXXX-XXX<br>';
					$text .= 'BIC/SWIFT: XXXXX<br>';
				}
				
				$text .= '<br>';
				$text .= 'Sobald dein Geld eingetroffen ist bekommst du eine Benachrichtiung, eine weitere Benachrichtung erhältst du wenn deine Bestellung verschickt wurde.<br><br>';
				
				$text .= 'Vielen Dank für deine Bestellung!<br>';
				$text .= 'Mit freundlichen Grüßen<br>';
				$text .= '57KKK';
				
				$headers = "From: " . $absender . "\r\n";
				$headers .= "Reply-To: ". $reply . "\r\n";
				$headers .= "MIME-Version: 1.0\r\n";
				$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
				
				$message = '<html><body>';
				$message .= $text;
				$message .= '</body></html>';
				
				if (mail($empfaenger, $betreff, $message, $headers)) {
					return true;
				} else {
					return false;
				}
				
				break;
				
			case 'paid':
				$empfaenger = $order['emailadresse'];
				$absender = 'broke@57kkk.tk';
				$reply = 'broke@57kkk.tk';
				$betreff = '[57KKK Store] Deine Zahlung ist angekommen';
				$text = 'Wir haben deine Zahlung für deine Bestellung erhalten (Bestellnummer <b>' . $order['bestellnummer'] . '</b>)<br>';
				$text .= 'Deine Bestellung wird sobald wie möglich versendet. Du wirst benachrichtigt wenn dies der Fall ist.<br>';
				$text .= '<br>';
				$text .= 'Mit freundlichen Grüßen<br>';
				$text .= '57KKK';

				$headers = "From: " . $absender . "\r\n";
				$headers .= "Reply-To: ". $reply . "\r\n";
				$headers .= "MIME-Version: 1.0\r\n";
				$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
				
				$message = '<html><body>';
				$message .= $text;
				$message .= '</body></html>';
				
				if (mail($empfaenger, $betreff, $message, $headers)) {
					return true;
				} else {
					return false;
				}
				
				break;
				
			case 'sent':
				$empfaenger = $order['emailadresse'];
				$absender = 'broke@57kkk.tk';
				$reply = 'broke@57kkk.tk';
				$betreff = '[57KKK Store] Deine Bestellung wurde versendet';
				$text = 'Deine Bestellung (Bestellnummer <b>' . $order['bestellnummer'] . '</b>) wurde versendet!<br>';
				$text .= 'Du solltest das Paket in den nächsten Tagen erhalten.<br>';
				$text .= '<br>';
				$text .= 'Vielen Dank für deine Bestellung.<br><br>';
				$text .= 'Mit freundlichen Grüßen<br>';
				$text .= '57KKK';

				$headers = "From: " . $absender . "\r\n";
				$headers .= "Reply-To: ". $reply . "\r\n";
				$headers .= "MIME-Version: 1.0\r\n";
				$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
				
				$message = '<html><body>';
				$message .= $text;
				$message .= '</body></html>';
				
				if (mail($empfaenger, $betreff, $message, $headers)) {
					return true;
				} else {
					return false;
				}
				
				break;
		}
		
	} else {
		return false;
	}
}