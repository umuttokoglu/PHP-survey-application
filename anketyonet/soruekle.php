<?php 
include 'header.php';
$Id=$_GET['Id'];


$anketsor=$db->prepare("SELECT Anket_Ad FROM anket WHERE Id=?");
$anketsor->execute(array($Id));
$anketcek=$anketsor->fetch(PDO::FETCH_ASSOC);

?>
<div class="portlet light">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-cogs font-green-sharp"></i>
			<span class="caption-subject font-green-sharp bold uppercase"><?php echo $anketcek['Anket_Ad'].' İSİMLİ ANKETE SORU EKLİYORSUNUZ!'; ?></span>
		</div>
	</div>
	<div class="portlet-body form">
		<form action="dbthings/islem.php" method="POST" class="form-horizontal">
			<div class="form-body">
				<div class="form-body">
					<div class="form-group last">
						<label class="control-label col-md-3">Türkçe soru içeriğini giriniz</label>
						<div class="col-md-9">
							<textarea class="ckeditor form-control" name="Soru_Detay" rows="6"></textarea>
						</div>
					</div>
				</div>

				<div class="form-body">
					<div class="form-group last">
						<label class="control-label col-md-3">İngilizce soru içeriğini giriniz</label>
						<div class="col-md-9">
							<textarea class="ckeditor form-control" name="Soru_Detay_en" rows="6"></textarea>
						</div>
					</div>
				</div>
				<input type="hidden" name="Anket_Id" value="<?php echo $Id; ?>">
				<div class="form-actions">
					<button type="submit" name="soruekle" class="btn blue">Gönder</button>
				</div>
			</div>	
		</form>
	</div>
</div>
<!-- END SAMPLE FORM PORTLET-->
<?php 
include 'footer.php';
?>