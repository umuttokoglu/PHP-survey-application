<?php 
$sifrelenecek='basf1307';
$sifre=md5(sha1(md5($sifrelenecek)));
echo $sifre;
 ?>