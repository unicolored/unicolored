<?php

$fichiers = file_get_contents($_FILES['file']['tmp_name']);

//var_dump($_GET['From']);
$array = array(
'From' => $_GET['From'],
'To' => $_GET['To'],
'HtmlBody' => $_GET['HtmlBody'],
'Subject' => $_GET['Subject'],
'TextBody' => $_GET['TextBody'],
'Attachments' => array(
            "Name" => $_FILES['file']['name'],
            "Content" => base64_encode($fichiers),
            "ContentType" => $_FILES['file']['type'] 
      )
/*
'Attachments' => array(
            "Name" => "readme.txt",
            "Content" => base64_encode($_GET['Attachment']),
            "ContentType" => $_GET['Attachment'][]
      )*/
);
$data_string = json_encode($array);

$ch = curl_init("http://api.postmarkapp.com/email"); // Initialisation avec l'url

$headers = array(
    "Accept: application/json",
    "Content-Type: application/json",
    "X-Postmark-Server-Token: 1360a0b0-ca87-4d2b-82ee-00a863be3aa7"
    //"X-Postmark-Server-Token: POSTMARK_API_TEST"
    );
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); // Définition des headers

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST"); // Méthode d'envoi
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string); // Envoie les données JSON
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // Invoque un retour 

// Impression de la réponse
print curl_exec($ch);
?>