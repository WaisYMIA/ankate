<?php
// Ankate contact handler. Requires PHP mail() or replace send step with SMTP/PHPMailer.
$to='info@ankateconsulting.co.ke'; $from='no-reply@ankateconsulting.co.ke';
if($_SERVER['REQUEST_METHOD']!=='POST'){header('Location: contact.html');exit;}
function clean($v,$max=2000){$v=trim((string)$v);$v=str_replace(["\r","\n"],' ',$v);return mb_substr($v,0,$max);}
if(!empty($_POST['website'])){header('Location: contact.html?status=sent');exit;} // honeypot
$name=clean($_POST['name']??'',120);$email=clean($_POST['email']??'',160);$phone=clean($_POST['phone']??'',40);
$org=clean($_POST['company']??'',160);$service=clean($_POST['service']??'',120);$team=clean($_POST['team_size']??'',40);
$msg=mb_substr(trim((string)($_POST['message']??'')),0,4000);$src=clean($_POST['source']??'contact',20);
if($name===''||!filter_var($email,FILTER_VALIDATE_EMAIL)||$msg===''||empty($_POST['consent'])){header('Location: contact.html?status=error');exit;}
$body="Name: $name\nEmail: $email\nPhone: $phone\nOrganisation: $org\nService: $service\nTeam size: $team\nSource: $src\n\nMessage:\n$msg\n";
$h="From: Ankate Website <$from>\r\nReply-To: $email\r\nContent-Type: text/plain; charset=UTF-8\r\n";
$ok=@mail($to,'New Ankate website enquiry',$body,$h);
@file_put_contents(__DIR__.'/data/enquiries.log',date('c')."\t".($ok?'mailed':'MAIL-FAILED')."\t".str_replace("\n",' | ',$body)."\n",FILE_APPEND|LOCK_EX);
if($ok){@mail($email,'We received your enquiry - Ankate Consulting',"Hello $name,\n\nThank you for contacting Ankate Consulting. We have received your enquiry and will reply within one business day.\n\nAnkate Consulting Ltd\ninfo@ankateconsulting.co.ke | +254 705 914 714\n","From: Ankate Consulting <$from>\r\nReply-To: $to\r\nContent-Type: text/plain; charset=UTF-8\r\n");}
header('Location: contact.html?status='.($ok?'sent':'error'));exit;
