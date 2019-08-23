<?php 
include 'header.php';
$Sayfa   = @intval($_GET['sayfa']); if(!$Sayfa) $Sayfa = 1;
$Say   = $db->query("select Id from anket");
$ToplamVeri   = $Say->rowCount();
$Limit	= 8;
$Sayfa_Sayisi	= ceil($ToplamVeri/$Limit); if($Sayfa > $Sayfa_Sayisi){$Sayfa = 1;}
$Goster   = $Sayfa * $Limit - $Limit;
$GorunenSayfa   = 10;

$anketsor=$db->prepare("SELECT Id, Anket_Ad, Anket_Tarih, Anket_Onay,Anket_Ad_en,Anket_Tarih_Son FROM anket ORDER BY Anket_Tarih_Son DESC LIMIT $Goster,$Limit");
$anketsor->execute();


?>

<!-- BEGIN PAGE HEAD -->
<div class="page-head">
	<div class="container">
		<!-- BEGIN PAGE TITLE -->
		<div class="page-title">
			<h1><?php echo $lang['PAGE_TITLE'];  if ($_GET['submit']=='ok'){ ?><br>
				<small style="color:green;"><?php echo $lang['PAGE_TITLE_UYARI_1']; ?></small>
				<?php }else if($_GET['dolu']=='ok'){?><br>
				<small style="color:red;"><?php echo $lang['PAGE_TITLE_UYARI_2']; ?></small>
				<?php }else { ?><br>
				<small><?php echo $lang['PAGE_TITLE_UYARI_3']; ?></small>
				<?php } ?></h1>
			</div>
			<!-- END PAGE TITLE -->
			<!-- BEGIN PAGE TOOLBAR -->
			<div class="page-toolbar">
				<!-- BEGIN LANGUAGE DROPDOWN -->
				<div style="margin-top: -50px;color: #65AC1E;">
					<li class="dropdown dropdown-language dropdown-dark">
						<a href="index.php?lang=tr" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" style="color:white;">
							<span class="langname"><?php echo $lang['LANGUAGE']; ?></span>
							<i class="fa fa-angle-down" aria-hidden="true"></i>
						</a>
						<ul class="dropdown-menu dropdown-menu-default">
							<li>
								<a href="index.php?lang=tr" >
									<img alt="" src="anketyonet/assets/global/img/flags/tr.png"> Türkçe </a>
								</li>
								<li>
									<a href="index.php?lang=en">
										<img alt="" src="anketyonet/assets/global/img/flags/en.png"> English </a>
									</li>
								</ul>
							</li>
						</div>
						<!-- END LANGUAGE DROPDOWN -->
					</div>
					<!-- END PAGE TOOLBAR -->
				</div>
			</div>
			<!-- END PAGE HEAD -->

			<!-- BEGIN PAGE CONTENT -->
			<div class="page-content">
				<div class="container">
					<!-- BEGIN PAGE CONTENT INNER -->
					<div class="row">



						<div class="col-md-12">
							<h3 style="margin-top:0"><?php echo $lang['HEADING']; ?></h3>
							<div class="top-news">

								<?php 

								while ($anketcek=$anketsor->fetch(PDO::FETCH_ASSOC)) {
									
									$tarih_son = date("j F Y, H:i:s", strtotime($anketcek['Anket_Tarih_Son']));
									$tarihturkce_son=turkcetarih_formati('j F Y, H:i:s',$tarih_son);

									$tarih = date("j F Y, H:i:s", strtotime($anketcek['Anket_Tarih']));
									$tarihturkce=turkcetarih_formati('j F Y, H:i:s',$tarih);

									if ($_SESSION['lang']=='en') {								
										if ($anketcek['Anket_Onay']==1) { ?>
										<div class="col-md-6">				
											<a href="anket.php?Id=<?php echo $anketcek['Id']; ?>" class="btn green" >
												<span>
													<?php echo $anketcek['Anket_Ad_en']; ?></span>
													<em><?php echo $lang['INDEX_ANKET_TARIH'].' '.$tarih.'.'; ?></em>
													<em><?php echo $lang['INDEX_ANKET_TARIH_SON'].' '.$tarih_son.'.'; ?></em>
													<em><?php echo $lang['INDEX_ANKET_DURUM_1']; ?></em>
													<i class="fa fa-mail-forward top-news-icon"></i>
												</a>
											</div>
											<?php }
											else{ ?>
											<div class="col-md-6">				
												<a href="anket.php?Id=<?php echo $anketcek['Id']; ?>" class="btn red" disabled>
													<span>
														<?php echo $anketcek['Anket_Ad_en']; ?></span>
														<em><?php echo $lang['INDEX_ANKET_TARIH'].' '.$tarih.'.'; ?></em>
														<em><?php echo $lang['INDEX_ANKET_TARIH_SON'].' '.$tarih_son.'.'; ?></em>
														<em><?php echo $lang['INDEX_ANKET_DURUM_2']; ?></em>
														<i class="fa fa-pause top-news-icon"></i>
													</a>
												</div>
												<?php }
											}
											else{
												if ($anketcek['Anket_Onay']==1) { ?>
												<div class="col-md-6">				
													<a href="anket.php?Id=<?php echo $anketcek['Id']; ?>" class="btn green" >
														<span>
															<?php echo $anketcek['Anket_Ad']; ?></span>
															<em><?php echo $tarihturkce.' '.$lang['INDEX_ANKET_TARIH']; ?></em>
															<em><?php echo $tarihturkce_son.' '.$lang['INDEX_ANKET_TARIH_SON']; ?></em>
															<em><?php echo $lang['INDEX_ANKET_DURUM_1']; ?></em>
															<i class="fa fa-mail-forward top-news-icon"></i>
														</a>
													</div>
													<?php }
													else{ ?>
													<div class="col-md-6">				
														<a href="anket.php?Id=<?php echo $anketcek['Id']; ?>" class="btn red" disabled>
															<span>
																<?php echo $anketcek['Anket_Ad']; ?></span>
																<em><?php echo $tarihturkce.' '.$lang['INDEX_ANKET_TARIH']; ?></em>
																<em><?php echo $tarihturkce_son.' '.$lang['INDEX_ANKET_TARIH_SON']; ?></em>
																<em><?php echo $lang['INDEX_ANKET_DURUM_2']; ?> </em>
																<i class="fa fa-pause top-news-icon"></i>
															</a>
														</div>
														<?php } ?>

														<?php	}
													}	?>


												</div>
											</div>


										</div>
										
										<!--Sayfalama numaralar-->
										<div class="col-md-12 col-xs-12" style="margin:3% auto;">

											<?php if($Sayfa > 1){?>


											<div class="btn-group btn-group-solid">
												<a style="color:white;"   href="index.php?sayfa=1"><button type="button" class="btn green">İlk</button></a>

												<a style="color:white;"  href="index.php?sayfa=<?=$Sayfa - 1?>"><button type="button" class="btn yellow">Önceki</button></a>
											</div>

											<?php } ?>

											<?php

											for($i = $Sayfa - $GorunenSayfa; $i < $Sayfa + $GorunenSayfa +1; $i++){

												if($i > 0 and $i <= $Sayfa_Sayisi){

													if($i == $Sayfa){

														echo '<button type="button" class="btn blue">'.$i.'</button>';

													}else{

														echo '<a style="color:white;"  href="index.php?sayfa='.$i.'"><button type="button" class="btn grey">'.$i.'</button></a>';

													}

												}

											}

											?>

											<?php if($Sayfa != $Sayfa_Sayisi){?>
											<div class="btn-group btn-group-solid">
												<a href="index.php?sayfa=<?=$Sayfa + 1?>"><button type="button" class="btn yellow">Sonraki</button></a>

												<a href="index.php?sayfa=<?=$Sayfa_Sayisi?>"><button type="button" class="btn red">Son</button></a>
											</div>

											<?php } ?>
										</div>
										<!--Sayfalama numaralar-->
									</div>
									<!-- END PAGE CONTENT -->
								</div>
								<!-- END PAGE CONTAINER -->

								<?php
								include 'footer.php';
								?>