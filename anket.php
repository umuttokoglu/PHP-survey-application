<?php 
include 'header.php';


$Id=$_GET['Id'];
$IP=GetIP();
$long_IP=ip2long($IP);

$ipsor=$db->prepare("SELECT Anket_Id,Ip FROM ip_kontrol WHERE Anket_Id=$Id AND Ip=$long_IP");
$ipsor->execute();
$varmi=$ipsor->rowCount();

if ($varmi<1) {
	
	$sorusor=$db->prepare("SELECT anket.Anket_Ad, anket.Anket_Aciklama, soru.Soru_Detay, soru.Id, soru.Soru_Detay_en,anket.Isim_Onay
		FROM soru
		INNER JOIN anket ON soru.Anket_Id = anket.Id
		WHERE soru.Anket_Id=$Id");
	$sorusor->execute();
	$sorusayisi = $sorusor->rowCount(); 
	?>





	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				



				<?php 
				$anketdetay=$db->prepare("SELECT Anket_Ad,Anket_Aciklama,Anket_Aciklama_en,Anket_Ad_en FROM anket WHERE Id=?");
				$anketdetay->execute(array($Id));
				$detay = $anketdetay->fetch(PDO::FETCH_ASSOC);
				
				if ($_SESSION['lang']=='en') { 
					echo '<h1>'.$detay['Anket_Ad_en'].' ('.$sorusayisi.' questions)';  
					echo '<br><small> '.$detay['Anket_Aciklama_en'].'</small>';
					echo '</h1>';
				}else{ 
					echo '<h1>'.$detay['Anket_Ad'].' ('.$sorusayisi.' soru)';  
					echo '<br><small> '.$detay['Anket_Aciklama'].'</small>';
					echo '</h1>';
				}
				?>




			</div>
			<!-- END PAGE TITLE -->
			<!-- BEGIN PAGE TOOLBAR -->
			<div class="page-toolbar">

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
				<form action="anketyonet/dbthings/islem.php" method="POST" class="form-horizontal">
					<?php
					$Isimsor=$db->prepare("SELECT Isim_Onay
						FROM anket
						WHERE Id=?");
					$Isimsor->execute(array($Id)); 
					$Isimcek=$Isimsor->fetch(PDO::FETCH_ASSOC);
					if ($Isimcek['Isim_Onay']==1) { ?>

					<div class="input-group col-md-12">
						<span class="input-group-addon input-circle-left">
							<i class="fa fa-user"></i>
						</span>
						<input type="text" name="Isim" class="form-control input-circle-right" placeholder="Adınızı giriniz" required>
					</div>

					<?php } 
					$i=0;
					while ($sorucek=$sorusor->fetch(PDO::FETCH_ASSOC)) { 
						$i++;

						if ($_SESSION['lang']=='en'){

							?>
							<div class="col-md-12">
								<div class="portlet light">
									<div class="portlet-title">
										<div class="caption">
											<?php echo $i.'. '; ?>
											<span class="caption-subject font-green-sharp bold uppercase"><?php echo $sorucek['Soru_Detay_en'] ?></span>
										</div>
									</div>
									<div class="portlet-body">

										<div class="margin-top-10 margin-bottom-10 clearfix">
											<input type="hidden" name="Soru_Id[]" value="<?php echo $sorucek['Id'] ?>">
											<div class="form-group">
												<div class="checkbox-list" style="margin-left: 15px;">

													<label >
														<input type="checkbox" value="1" name="Cevap[]"> <?php echo $lang['CEVAP_EVET']; ?> </label>
														<label>
															<input type="checkbox" value="0" name="Cevap[]"> <?php echo $lang['CEVAP_HAYIR']; ?> </label>

														</div>
													</div>
												</div>
											</div>


											<div class="form-group">
												<div class="col-md-9">
													<select class="form-control input-extra-large select2me" name="deger[]">
														<option value="0"><?php echo $lang['DEGER_SORU']; ?></option>
														<option value="1"><?php echo $lang['DEGER_KOTU']; ?></option>
														<option value="2"><?php echo $lang['DEGER_ORTA']; ?></option>
														<option value="3"><?php echo $lang['DEGER_IYI']; ?></option>
													</select>

												</div>
											</div>
										</div>
									</div>

									<?php }else{  ?>

									<div class="col-md-12">
										<div class="portlet light">
											<div class="portlet-title">
												<div class="caption">
														<?php echo $i.'. '; ?>
													<span class="caption-subject font-green-sharp bold uppercase"><?php echo $sorucek['Soru_Detay'] ?></span>
												</div>
											</div>
											<div class="portlet-body">

												<div class="margin-top-10 margin-bottom-10 clearfix">
													<input type="hidden" name="Soru_Id[]" value="<?php echo $sorucek['Id'] ?>">
													<div class="form-group">
														<div class="checkbox-list" style="margin-left: 15px;">

															<label >
																<input type="checkbox" value="1" name="Cevap[]"> <?php echo $lang['CEVAP_EVET']; ?> </label>
																<label>
																	<input type="checkbox" value="0" name="Cevap[]"> <?php echo $lang['CEVAP_HAYIR']; ?> </label>

																</div>
															</div>
														</div>
													</div>


													<div class="form-group">
														<div class="col-md-9">
															<select class="form-control input-extra-large select2me" name="deger[]">
																<option value="0"><?php echo $lang['DEGER_SORU']; ?></option>
																<option value="1"><?php echo $lang['DEGER_KOTU']; ?></option>
																<option value="2"><?php echo $lang['DEGER_ORTA']; ?></option>
																<option value="3"><?php echo $lang['DEGER_IYI']; ?></option>
															</select>

														</div>
													</div>
												</div>
											</div>
											<?php	} 
										} ?>
										<input type="hidden" name="Ip" value="<?php echo $long_IP; ?>">
										<input type="hidden" name="Anket_Id" value="<?php echo $Id; ?>">

										<!-- BEGIN BUTTON DIV -->
										<?php


										$Isimsor=$db->prepare("SELECT Isim_Onay
											FROM anket
											WHERE Id=?");
										$Isimsor->execute(array($Id)); 
										$Isimcek=$Isimsor->fetch(PDO::FETCH_ASSOC);

										if ($Isimcek['Isim_Onay']==1){ ?>
										<div class="form-actions" style="margin-left: 14px;  bottom:200px;">
											<button type="submit" name="Isimligonder" class="btn blue"><?php echo $lang['DEGER_BUTON_GONDER']; ?></button>
										</div>
										<?php }else{ ?>
										<div class="form-actions" style="margin-left: 14px;  bottom:200px;">
											<button type="submit" name="anketgonder" class="btn green"><?php echo $lang['DEGER_BUTON_GONDER']; ?></button>
										</div>
										<?php } ?>

										<!-- END BUTTON DIV -->
										<!-- END PAGE CONTENT INNER -->
									</form>
								</div>
							</div>
							<!-- END PAGE CONTENT -->
						</div>
						<!-- END PAGE CONTAINER -->

						<?php 
						include 'footer.php';
					}else{
						Header("Location:index.php?dolu=ok");
					}
					?>