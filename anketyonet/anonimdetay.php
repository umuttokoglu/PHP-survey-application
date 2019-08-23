<?php

include 'header.php';

$Id=$_GET['Id'];

$anketsor=$db->prepare("SELECT Anket_Ad FROM anket WHERE Id=?");
$anketsor->execute(array($Id));
$anketcek=$anketsor->fetch(PDO::FETCH_ASSOC);


//Toplam evet ve hayır sonuçlarını gösterebilmek için
$toplam_ev=0;
$toplam_ha=0; 

$toplam=$db->prepare("SELECT Cevap_Evet, Cevap_Hayir FROM soru WHERE Anket_Id=?");
$toplam->execute(array($Id));
while ($hayir=$toplam->fetch(PDO::FETCH_ASSOC)){ 
	$toplam_ha += $hayir['Cevap_Hayir'];
	$toplam_ev += $hayir['Cevap_Evet'];
}
$tüm_cevap=$toplam_ha+$toplam_ev;
//Toplam evet ve hayır sonuçlarını gösterebilmek için
?>

<div class="row">
	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 margin-bottom-10">
		<a class="dashboard-stat dashboard-stat-light blue-madison" href="">
			<div class="visual">
				<i class="fa fa-check fa-icon-medium"></i>
			</div>
			<div class="details">
				<div class="number">
					<?php
					echo '%'.($toplam_ev*100)/($tüm_cevap);
					?>
				</div>
				<div class="desc">
					Evet Oranı
				</div>
			</div>
		</a>
	</div>
	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
		<a class="dashboard-stat dashboard-stat-light red-intense" href="">
			<div class="visual">
				<i class="fa fa-times"></i>
			</div>
			<div class="details">
				<div class="number">
					<?php
					
					echo '%'.($toplam_ha*100)/($tüm_cevap);
					?>
				</div>
				<div class="desc">
					Hayır Oranı
				</div>
			</div>
		</a>
	</div>
	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
		<a class="dashboard-stat dashboard-stat-light green-haze" href="">
			<div class="visual">
				<i class="fa fa-group fa-icon-medium"></i>
			</div>
			<div class="details">
				<div class="number">
					<?php
					//Toplam katılımı ip tablosundan okumak için
					$toplam=0; 
					$toplam_katilim=$db->prepare("SELECT Ip FROM ip_kontrol WHERE Anket_Id=?");
					$toplam_katilim->execute(array($Id));
					
					$toplam_et=$toplam_katilim->rowCount();
					echo $toplam_et;
					//Toplam katılımı ip tablosundan okumak için
					?>
				</div>
				<div class="desc">
					Toplam Katılım
				</div>
			</div>
		</a>
	</div>
</div>



<div class="row">
	<div class="col-md-12 col-sm-12">

		<!-- Begin: life time stats -->
		<div class="portlet light">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-bar-chart font-green-sharp"></i>
					<span class="caption-subject font-green-sharp bold uppercase">Genel Görünüm</span>
					<?php if ($_GET['guncel']=='ok'){ ?>
					<small style="color:green;">Güncelleme başarılı.</small>
					<?php }else if ($_GET['sil']=='ok') { ?>
					<small style="color:green;">Soru başarıyla silinmiştir.</small>
					<?php	} ?>
				</div>
				<div class="col-md-offset-7">
					<a href="dbthings/excell.php?Id=<?php echo $Id; ?>" class="btn btn-lg blue">
						Excell'e Aktar <i class="fa fa-table"></i>
					</a>
					<a href="soruekle.php?Id=<?php echo $Id; ?>" class="btn btn-lg green">
						Soru ekle <i class="fa fa-plus"></i>
					</a>
					
					<a href="anketduzenle.php?Id=<?php echo $Id; ?>" class="btn btn-lg yellow">
						Anketi düzenle <i class="fa fa-pencil"></i>
					</a>

				</div>
			</div>
			<div class="portlet-body">
				<div class="tabbable-line">
					<ul class="nav nav-tabs">
						<li class="active">
							<a href="#overview_1" data-toggle="tab">
								<?php echo $anketcek['Anket_Ad']; ?> </a>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="overview_1">
								<div class="table-responsive">
									<table class="table table-hover table-light">
										<thead>
											<tr class="uppercase">
												<th>
													TOPLAM DEĞERLER
												</th>
												<th></th>
												<th></th>
												<th style="color:green;">
													<?php echo $toplam_ev; ?>
												</th>
												<th style="color:red;">
													<?php echo $toplam_ha; ?>
												</th>
												<th></th>
												<th></th>
											</tr>
										</thead>
										<tbody>

											<?php
											$sorusor=$db->prepare("SELECT * FROM soru WHERE Anket_Id=?");
											$sorusor->execute(array($Id));

											$i=0;
											while ($sorucek=$sorusor->fetch(PDO::FETCH_ASSOC)) {
												$i++;
												$detay = $sorucek['Soru_Detay'];
												$uzunluk = strlen($detay);
												$limit = 30;
												?>
												<tr>
													<td>
														----<?php echo $i.'.'; ?> 
													</td>
													<td></td>
													<td>
														<?php 	
														if ($uzunluk > $limit) {
															$detay = substr($detay,0,$limit) . "...";
														} 
														echo $detay ?>
													</td>
													<td>
														<?php echo $sorucek['Cevap_Evet']; ?> 
													</td>
													<td>
														<?php echo $sorucek['Cevap_Hayir']; ?> 
													</td>

													<td>
														<?php 
														$Soru_Deger = $isimli['Deger'];

														if (($toplam_et*3)==$Soru_Deger || $Soru_Deger>=($toplam_et*(2))) {
															echo "Önemli";
														}
														else if (($toplam_et)<=$Soru_Deger || $Soru_Deger<($toplam_et*(2))) {
															echo "Orta";
														}
														else{
															if ($Soru_Deger==0) {
																echo '-';
															}
															else{
																echo "Önemsiz";
															}
														}					
														$Soru_Deger=0;


														?>
													</td>

													<td>
														<a href="soruduzenle.php?Id=<?php echo $sorucek['Id']; ?>">Soruyu düzenle.</a>
													</td>
												</tr>


												<?php } ?>

											</tbody>
										</table>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
				<!-- End: life time stats -->



			</div>


			<?php include 'footer.php'; ?>