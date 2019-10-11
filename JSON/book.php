<?php 
if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="Biblioteca Login"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Text to send if user hits Cancel button';
    exit;
} else {
    $user       = $_SERVER['PHP_AUTH_USER'];
    $password   = $_SERVER['PHP_AUTH_PW'];
}
?>
{
 "Title"	: "The Cuckoo's Calling",
 "Author" 	: "Robert Galbraith",
 "Genere" 	: "classic crime novel",
 "Detail" 	: {
 	"Publisher" : "Little Brown",
 	"Publication_Year": 2013,
 	"ISBN-13" : 9781408704004,
 	"Language" : "English",
 	"Pages" : 494
 },
 "Price" : [
 	{
 		"type" : "Hardcover",
 		"price" : 16.65,
 		"iva"   : 0.21
 	},
 	{
 		"type" : "Kidle Edition",
 		"price" : 7.03,
 		"iva"	: null
	}
 ],
 "User" : "<?= $user ?>",
 "Password : "<?= $password ?>"
}