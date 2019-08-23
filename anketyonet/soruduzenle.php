<?php 
include 'header.php';
$Id=$_GET['Id'];

$sorusor=$db->prepare("SELECT Soru_Detay,Soru_Detay_en,Id FROM soru WHERE Id=?");
$sorusor->execute(array($Id));
$sorucek=$sorusor->fetch(PDO::FETCH_ASSOC);
?>
<div class="portlet light">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-cogs font-green-sharp"></i>
			<span class="caption-subject font-green-sharp bold uppercase">Soru Ekle</span>
		</div>
	</div>
	<div class="portlet-body form">
		<form action="dbthings/islem.php" method="POST" class="form-horizontal">
			<div class="form-body">
				<input type="hidden" name="Id" value="<?php echo $sorucek['Id']; ?>">



				<div class="form-body">
					<div class="form-group last">
						<label class="control-label col-md-3">Türkçe soru içeriğini düzenleyebilirsiniz</label>
						<div class="col-md-9">
							<textarea class="ckeditor form-control" name="Soru_Detay" rows="6"><?php echo $sorucek['Soru_Detay']; ?></textarea>
						</div>
					</div>
				</div>
				<div class="form-body">
					<div class="form-group last">
						<label class="control-label col-md-3">İngilizce soru içeriğini düzenleyebilirsiniz</label>
						<div class="col-md-9">
							<textarea class="ckeditor form-control" name="Soru_Detay_en" rows="6"><?php echo $sorucek['Soru_Detay_en']; ?></textarea>
						</div>
					</div>
				</div>


				<div class="form-actions">
					<button type="submit" name="soruduzenle" class="btn blue">Gönder</button>
					<button onclick="return confirm('Bu soru bağlantılı olduğu anketen kaldırılacaktır. Silmek yerine düzenlemeyi de tercih edebilirsiniz.')" type="submit" name="sorusil" class="btn red">Sil</button>
				</div>
			</div>	
		</form>
	</div>
</div>
<!-- END SAMPLE FORM PORTLET-->
<?php 
include 'footer.php';
?>