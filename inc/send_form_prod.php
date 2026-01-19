<?php
error_reporting( E_ERROR );   
header('Content-Type: text/html; charset=UTF-8'); 
mb_internal_encoding('UTF-8'); 

if (isset($_POST['name']))			{$name			= $_POST['name'];		if ($name == '')	{unset($name);}}
if (isset($_POST['email']))		{$email		= $_POST['email'];		if ($email == '')	{unset($email);}}
if (isset($_POST['phone']))			{$phone			= $_POST['phone'];		if ($phone == '')	{unset($phone);}}

$source = "";
$purpose_use = "";
$installation = "";
$kind_water = "";
if(!empty($_POST["source"]) && is_array($_POST["source"])) {$source = implode(" ", $_POST['source']);}
if(!empty($_POST["purposeUse"]) && is_array($_POST["purposeUse"])) {$purpose_use = implode(" ", $_POST['purposeUse']);}
if(!empty($_POST["installation"]) && is_array($_POST["installation"])) {$installation = implode(" ", $_POST['installation']);}
if(!empty($_POST["consumption"]) && is_array($_POST["consumption"])) {$consumption = implode(" ", $_POST['consumption']);}

if (isset($_POST['day']))	{$day			= $_POST['day'];		if ($day == '')		{unset($day);}}
if (isset($_POST['clock']))	{$clock			= $_POST['clock'];		if ($clock == '')		{unset($clock);}}

if (isset($_POST['analysis_ph']))	{$analysis_ph			= $_POST['analysis_ph'];		if ($analysis_ph == '')		{unset($analysis_ph);}}
if (isset($_POST['analysis_marganetc'])) {$analysis_marganetc = $_POST['analysis_marganetc']; if ($analysis_marganetc == ''){unset($analysis_marganetc);}}
if (isset($_POST['analysis_iron']))	{$analysis_iron			= $_POST['analysis_iron'];		if ($analysis_iron == '')		{unset($analysis_iron);}}
if (isset($_POST['analysis_zhestkos']))	{$analysis_zhestkos			= $_POST['analysis_zhestkos'];		if ($analysis_zhestkos == '')	{unset($analysis_zhestkos);}}
if (isset($_POST['analysis_shcheloch']))	{$analysis_shcheloch			= $_POST['analysis_shcheloch'];		if ($analysis_shcheloch == '')	{unset($analysis_shcheloch);}}
if (isset($_POST['analysis_sukhoy-ostatok']))	{$analysis_sukhoy_ostatok			= $_POST['analysis_sukhoy-ostatok'];if ($analysis_sukhoy_ostatok == '')	{unset($analysis_sukhoy_ostatok);}}
if (isset($_POST['analysis_okislyayemost']))	{$analysis_okislyayemost			= $_POST['analysis_okislyayemost'];if ($analysis_okislyayemost == '')	{unset($analysis_okislyayemost);}}
if (isset($_POST['analysis_mutnost']))	{$analysis_mutnost			= $_POST['analysis_mutnost']; if ($analysis_mutnost == '')	{unset($analysis_mutnost);}}
if (isset($_POST['analysis_tsvetnost']))	{$analysis_tsvetnost			= $_POST['analysis_tsvetnost']; if ($analysis_tsvetnost == '')	{unset($analysis_tsvetnost);}}
if (isset($_POST['analysis_zapakh']))	{$analysis_zapakh			= $_POST['analysis_zapakh']; if ($analysis_zapakh == '')	{unset($analysis_zapakh);}}

if (isset($_POST['anal_iron']))			{$anal_iron			= $_POST['anal_iron'];		if ($anal_iron == '')		{unset($anal_iron);}}
if (isset($_POST['anal_natriy']))			{$anal_natriy			= $_POST['anal_natriy'];		if ($anal_natriy == '')		{unset($anal_natriy);}}
if (isset($_POST['anal_kaltcyy']))			{$anal_kaltcyy			= $_POST['anal_kaltcyy'];		if ($anal_kaltcyy == '')		{unset($anal_kaltcyy);}}
if (isset($_POST['anal_magnyy']))			{$anal_magnyy			= $_POST['anal_magnyy'];		if ($anal_magnyy == '')		{unset($anal_magnyy);}}
if (isset($_POST['anal_kremnyy']))			{$anal_kremnyy			= $_POST['anal_kremnyy'];		if ($anal_kremnyy == '')		{unset($anal_kremnyy);}}
if (isset($_POST['anal_bor']))			{$anal_bor	= $_POST['anal_bor'];		if ($anal_bor == '')		{unset($anal_bor);}}
if (isset($_POST['anal_amonyy']))			{$anal_amonyy	= $_POST['anal_amonyy'];		if ($anal_amonyy == '')		{unset($anal_amonyy);}}
if (isset($_POST['anal_nitraty']))			{$anal_nitraty = $_POST['anal_nitraty'];		if ($anal_nitraty == '')		{unset($anal_nitraty);}}
if (isset($_POST['anal_ftor']))			{$anal_ftor	= $_POST['anal_ftor'];		if ($anal_ftor == '')		{unset($anal_ftor);}}
if (isset($_POST['anal_hlorid']))			{$anal_hlorid			= $_POST['anal_hlorid'];		if ($anal_hlorid == '')		{unset($anal_hlorid);}}
if (isset($_POST['anal_sulfaty']))			{$anal_sulfaty			= $_POST['anal_sulfaty'];		if ($anal_sulfaty == '')		{unset($anal_sulfaty);}}
if (isset($_POST['anal_strontcyy']))			{$anal_strontcyy			= $_POST['anal_strontcyy'];		if ($anal_strontcyy == '')		{unset($anal_strontcyy);}}
if (isset($_POST['anal_baryy']))			{$anal_baryy			= $_POST['anal_baryy'];		if ($anal_baryy == '')		{unset($anal_baryy);}}
if (isset($_POST['anal_koly']))			{$anal_koly			= $_POST['anal_koly'];		if ($anal_koly == '')		{unset($anal_koly);}}

if (isset($_POST['param_davleni']))			{$param_davleni			= $_POST['param_davleni'];		if ($param_davleni == '')		{unset($param_davleni);}}
if (isset($_POST['param_proizvoditelinosti']))			{$param_proizvoditelinosti			= $_POST['param_proizvoditelinosti'];		if ($param_proizvoditelinosti == '')		{unset($param_proizvoditelinosti);}}
if (isset($_POST['param_pik_vodopotr']))			{$param_pik_vodopotr			= $_POST['param_pik_vodopotr'];		if ($param_pik_vodopotr == '')		{unset($param_pik_vodopotr);}}
if (isset($_POST['param_voda_v_sutki']))			{$param_people			= $_POST['param_people'];		if ($param_people == '')		{unset($param_people);}}
if (isset($_POST['param_trubi']))			{$param_trubi			= $_POST['param_trubi'];		if ($param_trubi == '')		{unset($param_trubi);}}
if (isset($_POST['param_emkosty']))			{$param_emkosty			= $_POST['param_emkosty'];		if ($param_emkosty == '')		{unset($param_emkosty);}}
if (isset($_POST['param_ploshadi']))			{$param_ploshadi			= $_POST['param_ploshadi'];		if ($param_ploshadi == '')		{unset($param_ploshadi);}}
if (isset($_POST['pojelaniya']))			{$pojelaniya_water			= $_POST['pojelaniya'];		if ($pojelaniya_water == '')		{unset($pojelaniya_water);}}

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
// тema письма 
$title="Ера-Вода. Поставка и монтаж фильтров и систем очистки воды";
$title= "=?utf-8?B?".base64_encode($title)."?=";
//сообщение письма с данными из формы
$message = "Здравствуйте! \nИмя: $name;\nEmail: $email;\nТелефон: $phone;\n
\nВодоисточник: $source;
\nНазначение водопотребления: $purpose_use;
\nОбъект установки: $installation;
\nРежим водопотребления: $consumption;
\n если выбран режим потребления посменный: 
\nсмен в сутки:  $day;
\nдлительность смены /час: $clock; 
\n\nИСХОДНЫЕ ДАННЫЕ:
\nАнализ воды (обязательные показатели):
\nрН (водородный показатель): $analysis_ph;
\nМарганец,: $analysis_marganetc;
\nЖелезо: $analysis_iron;
\nЖесткость общая: $analysis_zhestkos;
\nЩелочность общая: $analysis_shcheloch;
\nСухой остаток: $analysis_sukhoy_ostatok;
\nОкисляемость: $analysis_okislyayemost;
\nМутность: $analysis_mutnost;
\nЦветность: $analysis_tsvetnost;
\nЗапах: $analysis_zapakh;
\n\nАнализ воды (дополнительные показатели):
\nЖелезо: $anal_iron;
\nNa+K: $anal_natriy;
\nCa: $anal_kaltcyy;
\nMg: $anal_magnyy;
\nSi: $anal_kremnyy;
\nБор: $anal_bor;
\nNH4+: $anal_amonyy;
\nNO3–: $anal_nitraty;
\nФтор: $anal_ftor;
\nХлориды: $anal_hlorid;
\nСульфаты: $anal_sulfaty;
\nСтронций: $anal_strontcyy;
\nБарий: $anal_baryy;
\nКоли–индекс: $anal_koly;
\n\nУстановочные параметры:
\nДавление в системе : $param_davleni;
\nПроизводительность: $param_proizvoditelinosti;
\nПиковое водопотребление: $param_pik_vodopotr;
\nСреднее водопотребление: $param_people;
\nМатериал и диаметр водопр: $param_trubi;
\nПлощадь и высота: $param_ploshadi;
\nНаличие емкости: $param_emkosty;
\nПожелания: $pojelaniya_water;";

if (isset($name) ) {
mail($address, $title,  $message, "Content-type: text/plain; charset=\"utf-8\"\n From: $address"); 
}

?>