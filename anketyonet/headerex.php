
<!DOCTYPE html> 
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8"/>
	<title>Anket | Yönetim Paneli</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<meta content="" name="description"/>
	<meta content="" name="author"/>
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css">
	<link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css">
	<link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css">
	<!-- END GLOBAL MANDATORY STYLES -->
	<!-- BEGIN THEME STYLES -->
	<link href="assets/global/css/components.css" rel="stylesheet" type="text/css">
	<link href="assets/global/css/plugins.css" rel="stylesheet" type="text/css">
	<link href="assets/admin/layout3/css/layout.css" rel="stylesheet" type="text/css">
	<link href="assets/admin/layout3/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color">
	<link href="assets/admin/layout3/css/custom.css" rel="stylesheet" type="text/css">
	<link href="assets/admin/pages/css/pricing-table.css" rel="stylesheet" type="text/css"/>
	<!-- END THEME STYLES -->
	<link rel="shortcut icon" href="assets/admin/layout3/img/basf-kucuk.png"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-menu-fixed" class to set the mega menu fixed  -->
<!-- DOC: Apply "page-header-top-fixed" class to set the top menu fixed  -->
<body>
	<!-- BEGIN HEADER -->
	<div class="page-header">
		<!-- BEGIN HEADER TOP -->
		<div class="page-header-top">
			<div class="container" style="padding-bottom: 20px;">
				<!-- BEGIN LOGO -->
				<div class="page-logo" style="margin-top: -40px;">
					<a href="index.php"><img style="width: 200px; height: 100px;" src="assets/admin/layout3/img/basf.png" alt="basf" class="logo-default"></a>
				</div>
				<!-- END LOGO -->
				<!-- BEGIN TOP NAVIGATION MENU -->
				<div class="top-menu">

					<ul class="nav navbar-nav pull-right">
						<!-- BEGIN USER LOGIN DROPDOWN -->

						<div class="btn-group ">
							<a class="btn btn-primary" href="#"><i class="fa fa-user fa-fw"></i> <span class="hidden-xs"><?php echo $_SESSION['kullanici']; ?></span></a>
							<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">
								<span class="fa fa-caret-down" title="Toggle dropdown menu"></span>
							</a>
							<ul class="dropdown-menu">

								<li>
									<a href="logout.php">
										<i class="icon-key"></i> Çıkış </a>
									</li>
								</ul>
							</div>
							<!-- END USER LOGIN DROPDOWN -->
						</ul>
					</div>
					<!-- END TOP NAVIGATION MENU -->
				</div>
			</div>
			<!-- END HEADER TOP -->

			<!-- BEGIN PAGE CONTAINER -->
			<div class="page-container">
				<div class="page-content">
					<div class="container">
						<!-- BEGIN PAGE CONTENT INNER -->
						<div class="row" style="margin-top: 15px;">