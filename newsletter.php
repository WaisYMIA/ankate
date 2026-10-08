<?php
$to='info@ankateconsulting.co.ke'; $from='no-reply@ankateconsulting.co.ke';
if($_SERVER['REQUEST_METHOD']!=='POST'){header('Location: insights.html');exit;}
if(!empty($_POST['website'])){header('Location: insights.html?status=subscribed');exit;}
$email=trim((string)($_POST['email']??''));
if(!filter_var($email,FILTER_VALIDATE_EMAIL)||strlen($email)>160||empty($_POST['consent'])){header('Location: insights.html?status=suberror');exit;}
$row=fputcsv($f=fopen(__DIR__.'/data/subscribers.csv','a'),[$email,date('c'),'consent=yes']);fclose($f);
@mail($to,'New Ankate Insights subscriber',"Subscriber: $email\nDate: ".date('c')."\nConsent: yes\n","From: Ankate Website <$from>\r\nContent-Type: text/plain; charset=UTF-8\r\n");
header('Location: insights.html?status=subscribed');exit;
