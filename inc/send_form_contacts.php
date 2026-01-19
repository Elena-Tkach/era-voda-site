<?php
error_reporting( E_ERROR );   //Отключение предупреждений и нотайсов (warning и notice) на сайте
header('Content-Type: text/html; charset=UTF-8'); 
mb_internal_encoding('UTF-8'); 

// создание переменных из полей формы		
if (isset($_POST['name']))			{$name			= $_POST['name'];		if ($name == '')	{unset($name);}}
if (isset($_POST['email']))		{$email		= $_POST['email'];		if ($email == '')	{unset($email);}}
if (isset($_POST['phone']))			{$phone			= $_POST['phone'];		if ($phone == '')	{unset($phone);}}
if (isset($_POST['message']))			{$sab			= $_POST['message'];		if ($sab == '')		{unset($sab);}}


if (isset($name) ) {
$name=stripslashes($name);
$name=htmlspecialchars($name);
}
if (isset($email) ) {
$email=stripslashes($email);
$email=htmlspecialchars($email);
}
if (isset($phone) ) {
$phone=stripslashes($phone);
$phone=htmlspecialchars($phone);
}

// if (isset($sab) ) {
//   $sab=stripslashes($sab);
//   $sab=htmlspecialchars($sab);
//   }
// адрес почты куда придет письмо
$address="info@era-voda.kz";
// текст письма 
$title="Эра-Вода. Поставка и монтаж фильтров и систем очистки воды";
$title= "=?utf-8?B?".base64_encode($title)."?=";

$message = "Добрый день! \nИмя: $name;\nEmail: $email;\nТелефон: $phone;\nСообщение: $sab;";

if (isset($name) ) {
mail($address, $title,  $message, "Content-type: text/plain; charset=\"utf-8\"\n From: $address"); 
}

?>