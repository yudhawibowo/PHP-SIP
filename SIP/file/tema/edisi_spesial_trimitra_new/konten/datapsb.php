<h3 class="heading">Data Pendaftar <a href=""><?php echo "$ns[isi_pengaturan]";?></a></h3>
<div class="table-responsive">
<?php
$statuspsb=mysql_query("SELECT *FROM sh_pengaturan WHERE id_pengaturan ='15'");
$r=mysql_fetch_array($statuspsb);
if ($r[nama_pengaturan]==1){
?>


<table class="table" id="results">
<form method="POST" action="?p=datapsbpencarian">
<input type="text" class="cari" name="cari"><input type="submit" class="tombol" style="margin-top: 20px" value="Cari">
</form>
	<tr>
		<td>No</td><td>Nama Pendaftar</td><td>NEM</td><td>Sekolah Asal</td><td>Status</td>
	</tr>
	<?php
	$no=1;
	$psb=mysql_query("SELECT * FROM sh_psb ORDER BY status_psb DESC");
	$hitungpsb=mysql_num_rows($psb);
	
	if ($hitungpsb > 0){
	while($r=mysql_fetch_array($psb)){
	?>
	<tr class="garis"><td class="garis"><?php echo "$no";?></td>
		<td class="garis"><?php echo "<b>$r[nama_psb]</b>";?></td>
		<td class="garis"><?php echo "$r[nem]";?></td>
		<td class="garis"><?php echo "$r[sekolah_asal]";?></td>
		<td class="garis"><?php
		if ($r[status_psb]== 1){
		echo "<center><img src='kontenweb/terima.png'></center>";}
		else {
		echo "<center><img src='kontenweb/tolak.png'></center>";
		}?></td>
	</tr>
	<?php $no++; }}
	else {?>
	<tr class="garis"><td class="garis" colspan="5"><b>Data Pendaftar Belum Ada</b></td></tr>
	<?php } ?>
</table>
				<div id="pageNavPosition"></div>
		
		
			    <script type="text/javascript"><!--
        var pager = new Pager('results', 50); 
        pager.init(); 
        pager.showPageNav('pager', 'pageNavPosition'); 
        pager.showPage(1);
    //--></script>
	
<table class="table">
<tr><td><img src="kontenweb/terima.png"></td><td>:</td><td>Daftar Ulang</td></tr>
<tr><td><img src="kontenweb/tolak.png"></td><td>:</td><td>Tidak memenuhi syarat/ belum dimoderasi</td></tr>
<tr><td colspan="3"><b>* Untuk mengetahui hasil moderasi, silahkan menunggu maksimal 1 x 24 jam kerja</b></td></tr>
</table>
<?php } ?>
</div>