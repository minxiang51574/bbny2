<?php


$GLOBALS['C']['UrlRewrite']=1;
$GLOBALS['C']['Debug']=1;
$GLOBALS['C']['AdminDir']='admin';
$GLOBALS['C']['SiteHash']='85397e0d2f240f3c';
$GLOBALS['C']['DbInfo']=array('host'=>'101.35.93.118','dbname'=>'bbny','user'=>'bbny','password'=>'123456','prefix'=>'bbny','engine'=>'InnoDB','charset'=>'utf8mb4','kind'=>'mysqlpdo',);


require('class/cms/cms.php');
ClassCMS_init();