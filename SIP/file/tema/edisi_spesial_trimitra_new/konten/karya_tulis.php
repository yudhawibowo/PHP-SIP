<div class="row">
	<div class="col-md-12"><h3 class="heading">Mading Karya Tulis</h3></div>
</div>
<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4"></div>
	<div class="col-md-4">		
		<form method="POST" action="?p=pencarianmading" class="form-group">
			<div class="input-group">
				<input type="text"  class="form-control" name="cari">
				<span class="input-group-btn">
					<button class="btn btn-default">Cari</button>
				</span>
			</div>
		</form>
	</div>
</div>

<?php	$batas= 5;
		$halaman=$_GET['halaman'];
		If (empty($halaman)){
		$posisi=0;
		$halaman=1;
		}

		else { $posisi=($halaman-1) * $batas;
		}
		$tampil2 = mysql_query ("SELECT * FROM sh_mading WHERE status_terbit='1'");
		$jmldata = mysql_num_rows($tampil2);
		$jmlhal = ceil($jmldata/$batas);
		$mading =mysql_query("SELECT * FROM sh_mading, sh_mading_kategori, sh_siswa WHERE sh_mading.id_kategori=sh_mading_kategori.id_mading_kategori AND sh_mading.nama_siswa=sh_siswa.nama_siswa AND status_terbit='1' AND id_kategori=2 ORDER BY sh_mading.id_mading DESC LIMIT $posisi, $batas");
		$cek_mading=mysql_num_rows($mading);

		if($cek_mading > 0){
		while ($r=mysql_fetch_array($mading)){
		$tggl=date("d F Y",strtotime($r[tanggal_posting]));
		$hitung_komen=mysql_query("SELECT * FROM sh_komentar_mading WHERE id_mading='$r[id_mading]'");
		$jml_komen=mysql_num_rows($hitung_komen);
?>

<?php echo "<h4><a href='?p=detmading&id=$r[id_mading]'>$r[judul_mading]</a></h4><br>
		<small>Diposting pada: <a href='?p=tglmading&tgl=$r[tanggal_posting]'>$tggl</a>, oleh : <a href='?p=usermading&user=$r[nama_siswa]'>$r[nama_siswa]</a>, Kategori: <a href='?p=katmading&id=$r[id_mading_kategori]'>$r[nama_mading_kategori]</a>
			, Komentar : $jml_komen
			</small><br>";
			//isi mading karya tulis
			
			$isi_mading = strip_tags($r[isi_mading]); 
			$isi = substr($isi_mading,0,450);

			if ($r[gambar_mading] != 'no_image.jpg'){
			echo "<p><img src='images/$r[gambar_mading]' width='175px' height='175px' style='float:left; margin: 5px 10px 0 0; padding: 10px; background: #fff; border: 1px solid #dcdcdc'><br/>$isi...<a href='?p=detmading&id=$r[id_mading]'>Baca selengkapnya...</a></p><br/><br/><br/><br/><br/><br/><br/><br/><br/>";}
else {
echo "<p>$isi...<a href='?p=detmading&id=$r[id_mading]'>Baca selengkapnya...</a></p><br>";
}}
		if ($halaman > 1){
		$prev=$halaman-1;
		echo 	"	<div class='hal' style='float: left'><a href='?p=mading&halaman=$prev' title='Halaman Sebelumnya'>&laquo; Sebelumnya</a></div>";
		}
		if ($halaman < $jmlhal) {
		$next=$halaman+1;
		echo "	<div class='hal' style='float: right'><a href='?p=mading&halaman=$next' title='halaman Berikutnya'>Berikutnya &raquo;</a></div>"; }
}
else { 
?>
<b>Data mading belum tersedia</b>
<?php } ?>
</div>
</div>