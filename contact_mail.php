<?php
$toEmail = "admin@mydomain.com";
$mailHeaders = "From: <". $_POST["userEmail"] .">\r\n";


if(mail($toEmail, $_POST["subject"], $_POST["content"], $mailHeaders)) {
print "<p class='success'> Poruka poslata! </p>";
} else {
print "<p class='Error'>Greška! Poruka nije poslata! </p>";
}
?>