<?php
/*
 * Postmarkapp Contact & Attachment uploader
 * 12/11/2014
 * v.0.1.0
 * by Gilles Hoarau
 * */

// Récupération du contenu du fichier uploadé temporairement
$file_content = file_get_contents($_FILES['file']['tmp_name']);

// Création du tableau de données à envoyer à Postmarkapp
$array = array(
	'From' => $_POST['From'],
	'To' => $_POST['To'],
	'HtmlBody' => $_POST['HtmlBody'],
	'Subject' => $_POST['Subject'],
	'TextBody' => $_POST['TextBody'],
	'Attachments' => array( array(
			"Name" => $_FILES['file']['name'],
			"Content" => base64_encode($file_content),
			"ContentType" => $_FILES['file']['type']
		))
);
// Conversion en json
$data_string = json_encode($array);

/*
 * Initialisation de l'api
 */
$ch = curl_init("http://api.postmarkapp.com/email");
// Initialisation avec l'url

$headers = array(
	"Accept: application/json",
	"Content-Type: application/json",
	"X-Postmark-Server-Token: 1360a0b0-ca87-4d2b-82ee-00a863be3aa7"
	//"X-Postmark-Server-Token: POSTMARK_API_TEST"
);
// Définition des headers
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
// Méthode d'envoi
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
// Envoie les données JSON
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
// Invoque un retour
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// Impression de la réponse
print curl_exec($ch);
?>