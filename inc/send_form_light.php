<?php
error_reporting( E_ERROR );   //Отключение предупреждений и нотайсов (warning и notice) на сайте
// создание переменных из полей формы		
if (isset($_POST['name']))			{$name			= $_POST['name'];		if ($name == '')	{unset($name);}}
if (isset($_POST['email']))		{$email		= $_POST['email'];		if ($email == '')	{unset($email);}}
if (isset($_POST['phone']))			{$phone			= $_POST['phone'];		if ($phone == '')	{unset($phone);}}
// if (isset($_POST['sab']))			{$sab			= $_POST['sab'];		if ($sab == '')		{unset($sab);}}
if (isset($_POST['message']))			{$sab			= $_POST['message'];		if ($sab == '')		{unset($sab);}}

//стирание треугольных скобок из полей формы
/* комментарий */
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
// адрес почты куда придет письмо
$address="info@era-voda.kz";
// текст письма 
$title="Ера-Вода. Поставка и монтаж фильтров и систем очистки воды";

$message = "Здравствуйте!\nИмя: $name;\nEmail: $email;\nТелефон: $phone; \nСообщение: $sab;";

if (isset($name) ) {
mail($address, $title,  $message, "Content-type: text/plain; charset=\"utf-8\"\n From: $address"); 
}

?>