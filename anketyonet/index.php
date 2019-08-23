
<?php 
include 'header.php';
?>
<div class="container">


	<!-- BEGIN HEADER SEARCH BOX -->
	<form action="#" method="POST">

		<div class="form-group" style=" margin-top: -20px; margin-bottom: 19px;">
			<div class="col-md-12">

				<div class="input-group">
					<div class="input-icon">
						<i class="fa fa-search "></i>
						<input id="newpassword" class="form-control" type="text" name="aranan" placeholder="aramak için bir kelime giriniz..."/>
					</div>
					<span class="input-group-btn">
						<button id="genpassword" class="btn btn-success" type="button"><i class="fa fa-arrow-left fa-fw"/></i> Ara</button>
					</span>
				</div>

			</div>
		</div>


	</form>
	<!-- END HEADER SEARCH BOX -->


</div>
<!-- BEGIN PAGE CONTENT -->
<div class="page-content">
	<div class="container">
		<!-- BEGIN PAGE CONTENT INNER -->
		<div class="row">
			<div class="col-md-12">
				<!-- BEGIN INLINE NOTIFICATIONS PORTLET-->
				<div class="portlet light">
					<div class="portlet-title">
						<div class="caption">
							<i class="fa fa-cogs font-green-sharp"></i>
							<span class="caption-subject font-green-sharp bold uppercase">Anketler</span>
							<?php if ($_GET['guncel']=='ok'){ ?>
							<small style="color:green;">Güncelleme başarılı.</small>
							<?php }else if ($_GET['ekle']=='ok') { ?>
							<small style="color:green;">Kayıt başarılı.</small>
							<?php	}else if ($_GET['sil']=='ok') { ?>
							<small style="color:green;">Kayıt başarıyla silinmiştir.</small>
							<?php	} ?>
						</div>

						<div class="col-md-offset-10">

							<a href="anketekle.php" class="btn btn-lg green">
								Anket ekle <i class="fa fa-plus"></i>
							</a>

						</div>
						
					</div>
					<div class="portlet-body">
						<div class="row margin-bottom-40">
							<?php 
							//sayfalama veri kısıtlama
							$Sayfa   = @intval($_GET['sayfa']); if(!$Sayfa) $Sayfa = 1;
							$Say   = $db->query("select Id from anket");
							$ToplamVeri   = $Say->rowCount();
							$Limit	= 8;
							$Sayfa_Sayisi	= ceil($ToplamVeri/$Limit); if($Sayfa > $Sayfa_Sayisi){$Sayfa = 1;}
							$Goster   = $Sayfa * $Limit - $Limit;
							$GorunenSayfa   = 10;
							//sayfalama veri kısıtlama
							
							$anketsor=$db->prepare("SELECT Anket_Ad,Id,Anket_Tarih,Anket_Aciklama,Anket_Onay,Isim_Onay FROM anket LIMIT $Goster,$Limit");
							$anketsor->execute();

							while ($anketcek=$anketsor->fetch(PDO::FETCH_ASSOC)) {
								?>

								<div class="col-md-3">
									<div class="pricing hover-effect">
										<div class="pricing-head">
											<h3><?php echo $anketcek['Anket_Ad']; ?> <span>
												<?php echo $anketcek['Anket_Tarih']; ?>
											</span>
										</h3>
									</div>

									<div class="pricing-head"><br>
										<p><?php echo $anketcek['Anket_Aciklama']; ?></p>	<br>
										<?php 

										if ($anketcek['Anket_Onay']==1) {

											echo '<span style="color:green; font-size:13px;">ONAYLI</span><br>';

										}else{
											echo '<span style="color:red; font-size:13px;">ONAY BEKLİYOR</span><br>';
										}

										?>
										<br><a href="<?php
										if($anketcek['Isim_Onay']!=1){
											echo 'anonimdetay'; 
										}else{
											echo 'isimlidetay';
										} ?>.php?Id=<?php echo $anketcek['Id']; ?>" class="btn yellow-crusta">
										Detaya Git <i class="m-icon-swapright m-icon-white"></i>
									</a>
								</div>
							</div>
						</div>


						<?php } ?>


					</div>
				</div>
			</div>
			<!-- END INLINE NOTIFICATIONS PORTLET-->
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
	<!-- END PAGE CONTENT INNER -->
</div>
<!-- BEGIN PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
<?php 
include 'footer.php';
?>