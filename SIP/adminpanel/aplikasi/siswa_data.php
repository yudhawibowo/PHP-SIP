<?php
$database="aplikasi/database/siswa.php";
switch($_GET['pilih']){
default: ?>
<h3>Siswa</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontalaktif-ujung"><a href="siswa.php">Siswa</a></div>
			<div class="menuhorisontal"><a href="alumni.php">Alumni</a></div>
			<div class="menuhorisontal"><a href="kelas.php">Kelas</a></div>
		</div>

		<div class="atastabel" style="margin: 30px 10px 0 10px">
			<div class="tombol">
			<?php
				$datasiswa=mysql_query("SELECT * FROM sh_siswa WHERE status_siswa='1'");
				$jumlahsiswa=mysql_num_rows($datasiswa);
				
				$siswalaki=mysql_query("SELECT * FROM sh_siswa WHERE status_siswa='1' AND jenkel='L'");
				$jumlahlaki=mysql_num_rows($siswalaki);
				
				$siswaperempuan=mysql_query("SELECT * FROM sh_siswa WHERE status_siswa='1' AND jenkel='P'");
				$jumlahperempuan=mysql_num_rows($siswaperempuan);
			?>
			<a href="siswa.php">Jumlah data</a> (<?php echo "$jumlahsiswa";?>)&nbsp;&nbsp;|
			<a href="<?php echo"?pilih=jenkel&kode=L";?>">Laki-Laki</a> (<?php echo "$jumlahlaki";?>)&nbsp;&nbsp;|
			<a href="<?php echo"?pilih=jenkel&kode=P";?>">Perempuan</a> (<?php echo "$jumlahperempuan";?>)
			</div>
			<div class="cari">
			<form method="POST" action="?pilih=pencarian">
			<input type="text" class="pencarian" name="cari"><input type="submit" class="pencet" value="Cari">
			</form>
			</div>
		</div>
		
		<div class="atastabel" style="margin-bottom: 10px">
			<div class="tombol">
			<form method="POST" style="float: left" action="siswa.php?pilih=kelas">
				<select name="kelas" onChange="this.form.submit()">
					<option value="" selected>Tampil Berdasarkan Kelas</option>
					<?php
					$tampilkelas=mysql_query("SELECT * FROM sh_kelas");
					while($tk=mysql_fetch_array($tampilkelas)){
					echo "<option value='$tk[id_kelas]'>$tk[nama_kelas]</option>";}
					?>
				</select>
			</form>
			</div>
			
			<?php echo "<form method='POST' action='$database?pilih=siswa&untukdi=hapusbanyak'>"; ?>
			<div class="cari">
			<input type="button" class="pencet" value="Tambah" onclick="window.location.href='?pilih=tambah';">
			<input type="submit" class="hapus" value="Hapus yang ditandai">
			</div>
		</div>
		<div class="clear"></div>
		
		<table class="tabel" id="results">
			<tr>
				<th class="tabel" width="25px">No</th>
				<th class="tabel" width="25px">&nbsp;</th>
				<th class="tabel">Nama Siswa</th>
				<th class="tabel">NIS</th>
				<th class="tabel">JK</th>
				<th class="tabel">Kelas</th>
				<th class="tabel">Nama Orang Tua</th>
				<th class="tabel">Wali Kelas</th>
				<th class="tabel" width="100px">Pilihan</th>
			</tr>
			<?php
				$no=1;
				$siswa=mysql_query("SELECT * FROM sh_siswa,sh_kelas,sh_guru_staff WHERE sh_siswa.id_kelas=sh_kelas.id_kelas AND sh_guru_staff.id_gurustaff = sh_kelas.id_gurustaff AND status_siswa='1' ORDER BY nama_siswa ASC");
				$cek_siswa=mysql_num_rows($siswa);
				
				if($cek_siswa > 0){
				while($s=mysql_fetch_array($siswa)){
					//$sisa=mysql_query("SELECT foto FROM sh_siswa WHERE nis='$s[nis]'");
					//$cek_sisa=mysql_fetch_array($sisa);
					//if($cek_sisa[foto]==""){
						//$sis=mysql_query("UPDATE sh_siswa SET foto='C:/xampp/htdocs/websch-demo/images/foto/siswa/no_photo.jpg' WHERE nis='$s[nis]'");
					//}
			?>
			<tr class="tabel">
				<td class="tabel"><?php echo "$no";?></td>
				<td class="tabel"><?php echo "<input type=checkbox name=cek[] value=$s[id_siswa] id=id$no>"; ?></td>
				<td class="tabel"><a href="<?php echo"?pilih=edit&id=$s[id_siswa]";?>"><b><?php echo "$s[nama_siswa]";?></b></a></td>
				<td class="tabel"><?php echo "$s[nis]";?></td>
				<td class="tabel"><?php echo "$s[jenkel]";?></td>
				<td class="tabel"><a href=""><?php echo "$s[nama_kelas]";?></a></td>
				<td class="tabel"><?php echo "$s[nama_ortu]";?></td>
				<td class="tabel"><?php echo "$s[nama_gurustaff]";?></td>
				<td class="tabel">
					<div class="hapusdata"><a href="<?php echo"$database?pilih=siswa&untukdi=hapus&id=$s[id_siswa]";?>">hapus</a></div>
					<div class="editdata"><a href="<?php echo"?pilih=edit&id=$s[id_siswa]";?>">edit</a></div>
				</td>
			</tr>
			<?php
			$no++;
			}}
			else { ?>
			<tr class="tabel"><td class="tabel" colspan="9"><b>DATA SISWA BELUM TERSEDIA</b></td></tr>
			<?php }
			?>
		</table>
		<div class="atastabel" style="margin: 5px 10px 0 10px">
				<div id="pageNavPosition"></div>
		</div>
		<div class="atastabel" style="margin: 5px 10px 0 10px">
		<?php
			$jumlahtampil=mysql_query("SELECT * FROM sh_pengaturan WHERE id_pengaturan='3'");
			$jt=mysql_fetch_array($jumlahtampil);
		?>
		<script type="text/javascript"><!--
        var pager = new Pager('results', <?php echo "$jt[isi_pengaturan]"; ?>); 
        pager.init(); 
        pager.showPageNav('pager', 'pageNavPosition'); 
        pager.showPage(1);
    //--></script>
		</div>
		</form>
</div><!--Akhir class isi kanan-->
		<?php break;
		
		case "tambah":
			include "aplikasi/siswa_tambah.php";
		break;
		
		case "edit":
			include "aplikasi/siswa_edit.php";
		break;
		
		case "jenkel":
			include "aplikasi/siswa_jenkel.php";
		break;
		
		case "kelas":
			include "aplikasi/siswa_kelas.php";
		break;
		
		case "pencarian":
			include "aplikasi/siswa_pencarian.php";
		}
		?>
	