<?php 
include_once 'anketyonet/dbthings/conn.php';
include_once 'anketyonet/dbthings/ipal.php';
include_once 'anketyonet/languages/common.php';
error_reporting(0);
session_start();

?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8"/>
	<title><?php echo $lang['SITE_NAME']; ?> | </title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<meta content="" name="description"/>
	<meta content="" name="author"/>
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css">
	<link href="anketyonet/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="anketyonet/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css">
	<link href="anketyonet/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="anketyonet/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css">
	<!-- END GLOBAL MANDATORY STYLES -->
	<!-- BEGIN THEME STYLES -->
	<link href="anketyonet/assets/global/css/components.css" rel="stylesheet" type="text/css">
	<link href="anketyonet/assets/global/css/plugins.css" rel="stylesheet" type="text/css">
	<link href="anketyonet/assets/admin/layout3/css/layout.css" rel="stylesheet" type="text/css">
	<link href="anketyonet/assets/admin/layout3/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color">
	<link href="anketyonet/assets/admin/layout3/css/custom.css" rel="stylesheet" type="text/css">
	<!-- END THEME STYLES -->
	<link rel="shortcut icon" href="anketyonet/assets/admin/layout3/img/basf-kucuk.png"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-menu-fixed" class to set the mega menu fixed  -->
<!-- DOC: Apply "page-header-top-fixed" class to set the top menu fixed  -->
<body>
	<!-- BEGIN HEADER -->
	<div class="page-header">
		<!-- BEGIN HEADER TOP -->
		<div class="page-header-top" style="background-color: #65AC1E;">
			<div class="container" style="padding-bottom: 33px;">
				<!-- BEGIN LOGO -->
				<div class="page-logo" style="margin-top: -35px;">
					<a href="index.php"><img style="width: 200px; height: 100px;" src="anketyonet/assets/admin/layout3/img/basf.png" alt="logo" class="logo-default"></a>
				</div>
				<!-- END LOGO -->
				<!-- BEGIN RESPONSIVE MENU TOGGLER -->
				<div class="top-menu">
					
				</div>

				<!-- END RESPONSIVE MENU TOGGLER -->
				<!-- BEGIN TOP NAVIGATION MENU -->
				<div class="top-menu">
				</div>
				<!-- END TOP NAVIGATION MENU -->
			</div>
		</div>
		<!-- END HEADER TOP -->
		<!-- BEGIN HEADER MENU 
			<div class="page-header-menu">-->

			<!-- BEGIN HEADER SEARCH BOX 
			<form class="search-form" action="extra_search.html" method="GET">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Search" name="query">
					<span class="input-group-btn">
					<a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
					</span>
				</div>
			</form>-->
			<!-- END HEADER SEARCH BOX 
			</div>-->
			<!-- END HEADER -->
			<!-- BEGIN PAGE CONTAINER -->
			