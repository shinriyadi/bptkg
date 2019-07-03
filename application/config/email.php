<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');  
/* 
| ------------------------------------------------------------------- 
| EMAIL CONFIG 
| ------------------------------------------------------------------- 
| Konfigurasi email keluar melalui mail server
| */  
$config['protocol']='smtp';  
$config['smtp_host']='inalgosystem.com';  
$config['smtp_port']='587';  
$config['smtp_timeout']='30';  
$config['smtp_user']='indoglow@inalgosystem.com';  
$config['smtp_pass']='indoglow123';  
$config['charset']='iso-8859-1';  
$config['newline']="\r\n";  
$config['mailtype']="html";
   
/* End of file email.php */ 
/* Location: ./system/application/config/email.php */

?>