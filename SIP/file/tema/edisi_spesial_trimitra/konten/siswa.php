<?php // Menghilangkan Error Notice
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
?>
<div id="siswa" class="panel panel-primary">
<div class="panel-heading"><h3 style="font-family:Bree Serif;">Data Siswa <a href=""><?php echo "$ns[isi_pengaturan]";?></a></h3></div>
<div class="panel-body">

<div class="table-responsive">

<form method="POST" action="?p=siswapencarian#siswa" style="float:right">
<input type="text" class="cari" placeholder="Nama atau NIS" required name="cari"><input type="submit" class="tombol" style="margin-bottom: 20px" value="Cari">
</form>

<table class="table" id="results">
<tr>
<th class="garis" width="20px">No</th>

<th class="garis">Nama Siswa</th>

<th class="garis">
<form method="POST" action="?p=siswajk">
<select name="jk" onChange="this.form.submit()">
	<option selected>Jenis Kelamin</option>
	<option value="L">Laki laki</option>
	<option value="P">Perempuan</option>
</select>
</form>
</th>
<th class="garis"><form method="POST" action="?p=siswakelas">
<select name="kelas" onChange="this.form.submit()">
	<option selected>Kelas</option>
	<?php
	$kelas=mysql_query("SELECT * FROM sh_kelas ORDER BY id_kelas");
	while($k=mysql_fetch_array($kelas)){
	?>
	<option value="<?php echo "$k[id_kelas]";?>"><?php echo "$k[nama_kelas]";?></option>
	<?php } ?>
</select>
</form>
</th></tr>
<?php
# UNTUK PAGING (PEMBAGIAN HALAMAN)
$baris 		= 30;
$halaman 	= isset($_GET['hal']) ? $_GET['hal'] : 0;
$pageSql 	= "SELECT * FROM sh_siswa, sh_kelas WHERE sh_siswa.id_kelas=sh_kelas.id_kelas  AND status_siswa='1' ORDER BY nama_siswa ASC";
$pageQry 	= mysql_query($pageSql) or die ("Error: ".mysql_error());
$jmlData 	= mysql_num_rows($pageQry);
$maksData	= ceil($jmlData/$baris);


$no=$halaman+1;
$siswa=mysql_query("SELECT * FROM sh_siswa, sh_kelas WHERE sh_siswa.id_kelas=sh_kelas.id_kelas  AND status_siswa='1' ORDER BY nama_siswa ASC LIMIT $halaman, $baris");
$hitungsiswa=mysql_num_rows($siswa);

if($hitungsiswa > 0){
while($r=mysql_fetch_array($siswa)){
?>
<tr class="garis"><td class="garis"><?php echo "$no";?></td>
	<?php
	$detaildata=mysql_query("SELECT * FROM sh_pengaturan WHERE id_pengaturan='4'");
	$dd=mysql_fetch_array($detaildata);
		if ($dd[isi_pengaturan]== 0){
	?>
	<td class="garis"><b><?php echo "$r[nama_siswa]";?></b></td>
	<?php }
	else { ?>
	
	<td class="garis"><a href="<?php echo "?p=detailsiswa&nis=$r[nis]";?>" title="Klik untuk melihat detail data"><b><?php echo "$r[nama_siswa]";?></b></a></td>
	<?php } ?>
	<td class="garis"><?php if($r['jenkel']=="L"){
	   echo"Laki-laki";
	}elseif($r['jenkel']=="P"){
	   echo"Perempuan";
	}?></td>
	<td class="garis"><?php echo "$r[nama_kelas]";?></td>
</tr>
<?php $no++; }}
else { ?>
<tr class="garis"><td colspan="4"><b>Data siswa belum ada</b></td></tr>
<?php } ?>
<tr>
    <td class="garis" colspan="2"><strong>Jumlah Data :</strong> <?php echo $jmlData; ?> </td>
    <td class="garis" colspan="2" align="right"><strong>Halaman ke :</strong>
    <?php
	for ($h = 1; $h <= $maksData; $h++) {
		$list[$h] = $baris * $h - $baris;
		echo " <a href='?p=siswa&hal=$list[$h]'>$h</a> ";
	}
	?></td>
  </tr>
</table>
				
</div> <!--table-responsive-->
</div> <!--panel-body -->
</div> <!--panel panel-default-->