<?php 
include 'header.php';
$Id=$_GET['Id'];

$anketsor=$db->prepare("SELECT Anket_Ad,Anket_Onay,Anket_Aciklama,Isim_Onay,Anket_Tarih_Son FROM anket WHERE Id=?");
$anketsor->execute(array($Id));
$anketcek=$anketsor->fetch(PDO::FETCH_ASSOC);
?>
<div class="portlet light">
	<div class="portlet-title" style="padding-bottom: 10px;">
		<div class="caption">
			<i class="fa fa-cogs font-green-sharp"></i>
			<span class="caption-subject font-green-sharp bold uppercase">Anket Düzenle</span>
		</div>
	</div>
	<div class="portlet-body form">
		<form action="dbthings/islem.php" method="POST" class="form-horizontal">
			<div class="form-body">

				<input type="hidden" name="Id" value="<?php echo $Id; ?>">

				<div class="form-group">
					<label style="padding-bottom: 10px;">Anket adı | (Türkçe)</label>
					<div class="input-group">
						<span class="input-group-addon input-circle-left">
							<i class="fa fa-envelope"></i>
						</span>
						<input type="text" name="Anket_Ad" class="form-control input-circle-right" value="<?php echo $anketcek['Anket_Ad']; ?>">
					</div>
				</div>
				<div class="form-group">
					<label style="padding-bottom: 10px;">Anket adı | (İngilizce)</label>
					<div class="input-group">
						<span class="input-group-addon input-circle-left">
							<i class="fa fa-envelope"></i>
						</span>
						<input type="text" name="Anket_Ad_en" class="form-control input-circle-right" value="<?php echo $anketcek['Anket_Ad_en']; ?>">
					</div>
				</div>

				<div class="form-body">
					<div class="form-group last">
						<label class="control-label col-md-3">Anket açıklamasını giriniz | (Türkçe)</label>
						<div class="col-md-9">
							<textarea class="ckeditor form-control" name="Anket_Aciklama" rows="6"><?php echo $anketcek['Anket_Aciklama']; ?></textarea>
						</div>
					</div>
				</div>
				<div class="form-body">
					<div class="form-group last">
						<label class="control-label col-md-3">Anket açıklamasını giriniz | (İngilizce)</label>
						<div class="col-md-9">
							<textarea class="ckeditor form-control" name="Anket_Aciklama_en" rows="6"><?php echo $anketcek['Anket_Aciklama_en']; ?></textarea>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-md-3">Anket ne zaman sonlanacak?</label>
					<div class="col-md-3">

						<div class="input-group date form_datetime">
							<input type="datetime-local" name="Anket_Tarih_Son">

						</div>
						<!-- /input-group -->
					</div>
					<label>(Şu anki son tarih <?php echo $anketcek['Anket_Tarih_Son']; ?>)</label>
				</div>





				<div class="form-group">
					<label style="padding-bottom: 10px;">Anket onay</label>
					<div class="checkbox-list">

						<?php if ($anketcek['Anket_Onay']==1){ ?>
						<label>
							<input type="checkbox" name="Anket_Onay" value="1" checked="true"> Anketi Onayla </label>
							<?php }else{ ?>
							<label>
								<input type="checkbox" name="Anket_Onay" value="1"> Anketi Onayla </label>
								<?php } ?>



							</div>
						</div>
						<div class="form-group">
							<label style="padding-bottom: 10px;">İsim al</label>
							<div class="checkbox-list">

								<?php if ($anketcek['Isim_Onay']==1){ ?>
								<label>
									<input type="checkbox" name="Isim_Onay" value="1" checked="true"> Ankette isim alınacak </label>
									<?php }else{ ?>
									<label>
										<input type="checkbox" name="Isim_Onay" value="1"> Ankette isim alınacak </label>
										<?php } ?>



									</div>
								</div>

								<div class="form-actions">
									<button type="submit" name="anketduzenle" class="btn blue">Gönder</button>
									<button onclick="return confirm('Bu işlemi onayladığınızda bu anket ile bağlantılı tüm kayıtlar silinecektir. Onaylamadan önce yedek aldığınızdan emin olunuz.')" type="submit" name="anketsil" class="btn red">Anketi sil</button>
								</div>
							</form>
						</div>
					</div>
					<!-- END SAMPLE FORM PORTLET-->
					<?php 
					include 'footer.php';
					?>