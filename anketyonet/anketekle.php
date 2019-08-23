<?php 
include 'header.php';
?>
<div class="portlet light">
	<div class="portlet-title" style="padding-bottom: 10px;">
		<div class="caption">
			<i class="fa fa-cogs font-green-sharp"></i>
			<span class="caption-subject font-green-sharp bold uppercase">Anket Ekle</span>
			<?php if ($_GET['durumekle']=='ok'): ?>
				<small style="color:green;">Anket başarıyla eklenmiştir.</small>
			<?php endif ?>
		</div>
	</div>
	<div class="portlet-body form">
		<form action="dbthings/islem.php" method="POST" class="form-horizontal">
			<div class="form-body">

				<div class="form-body">
					<div class="form-group last">
						<label class="control-label col-md-3">Anket adı |(Türkçe)</label>
						<div class="input-group">
							<span class="input-group-addon input-circle-left">
								<i class="fa fa-envelope"></i>
							</span>
							<input type="text" name="Anket_Ad" class="form-control input-circle-right" placeholder="anket için bir isim giriniz.">
						</div>
					</div>
				</div>
				<div class="form-body">
					<div class="form-group last">
						<label class="control-label col-md-3">Anket adı |(İngilizce)</label>
						<div class="input-group">
							<span class="input-group-addon input-circle-left">
								<i class="fa fa-envelope"></i>
							</span>
							<input type="text" name="Anket_Ad_en" class="form-control input-circle-right" placeholder="anket için bir isim giriniz.">
						</div>
					</div>
				</div>

				<div class="form-body">
					<div class="form-group last">
						<label class="control-label col-md-3">Anket açıklamasını giriniz |(Türkçe)</label>
						<div class="col-md-9">
							<textarea class="ckeditor form-control" name="Anket_Aciklama" rows="6"></textarea>
						</div>
					</div>
				</div>
				<div class="form-body">
					<div class="form-group last">
						<label class="control-label col-md-3">Anket açıklamasını giriniz |(İngilizce)</label>
						<div class="col-md-9">
							<textarea class="ckeditor form-control" name="Anket_Aciklama_en" rows="6"></textarea>
						</div>
					</div>
				</div>


				<div class="form-group">
					<label class="control-label col-md-3">Anket ne zaman sonlanacak?</label>
					<div class="col-md-4">
						<div class="input-group date form_datetime">
							<input type="datetime-local" name="Anket_Tarih_Son">
						</div>
						<!-- /input-group -->
					</div>
				</div>


				<div class="form-body">
					<div class="form-group last">
						<label class="control-label col-md-3">Anket onay |</label>
						<br><div class="checkbox-list">
							<label>
								<input type="checkbox" name="Anket_Onay" value="1"> Anketi Onayla </label>
							</div>
						</div>
					</div>

					<div class="form-body">
						<div class="form-group last">
							<label class="control-label col-md-3">Isim onay |</label>
							<br><div class="checkbox-list">
								<label>
									<input type="checkbox" name="Isim_Onay" value="1"> İsim alınacak mı? </label>
								</div>
							</div>
						</div>


						<div class="form-actions">
							<button type="submit" name="anketekle" class="btn blue">Gönder</button>
						</div>
					</form>
				</div>
			</div>
			<!-- END SAMPLE FORM PORTLET-->
			<?php 
			include 'footer.php';
			?>