<?php
include "../../../konfigurasi/koneksi.php";
include "../../../konfigurasi/image_upload.php";

$edit=mysql_query("SELECT * FROM sh_mading, sh_mading_kategori WHERE sh_mading.id_kategori=sh_mading_kategori.id_mading_kategori AND id_mading='$_GET[id]'");
$r=mysql_fetch_array($edit);
?>

<h3>Edit Mading</h3>
<div class="isikanan"><!--Awal class isi kanan-->					
		<div class="judulisikanan">
			<div class="menuhorisontalaktif-ujung"><a href="mading.php">mading</a></div>

		</div>
		
		<table class="isian">
		<form method='POST' name="editmading" id="editmading" enctype="multipart/form-data" <?php echo "action='$database?pilih=mading&untukdi=edit'"; ?>>
		<?php echo "<input type='hidden' name='id' value=$r[id_mading]"; ?>
			<tr><td class="isian" colspan="2"><input type="text" class="maksimal" name="judul_mading"
			value=<?php echo "'$r[judul_mading]'";?>></td></tr>
			
			<tr><td class="isian" colspan="2"><textarea class="tini" name="isi_mading"><?php echo "$r[isi_mading]";?></textarea></td></tr>
			
			<tr><td class="isiankanan" width="100px">Gambar Kecil</td>
				<td class="isian"><img src="../images/<?php echo $r[gambar_mading] ?>" width="200px">
				<?php if ($r[gambar_mading] !='no_image.jpg'){?>
				<br><br>
				<a href="<?php echo "$database?pilih=mading&untukdi=hapusgambar&id=$r[id_mading]";?>"><b><u>Hapus gambar</u></b></a>
				<?php } ?>
				</td>
			</tr>
			
			<tr><td class="isiankanan" width="100px">Ganti Gambar</td>
				<td class="isian"><input type="file" name="fupload"></td>
			</tr>
			<tr><td class="isian" colspan="2" style="color:#7f7f7f;"><i>Gambar kecil digunakan untuk headline halaman depan website dan summary pada halaman arsip</i><br><hr></td></tr>
			
			<tr><td class="isiankanan" width="100px">Kategori</td>
				<td class="isian">
					<select name="kategori">
					<?php
					echo "
					<option value=$r[id_mading_kategori]>$r[nama_mading_kategori]</option>";
					$kategoriberita=mysql_query("SELECT * FROM sh_mading_kategori WHERE id_mading_kategori!=$r[id_mading_kategori]");
					while ($kb=mysql_fetch_array($kategoriberita)){
					echo " <option value='$kb[id_mading_kategori]'>$kb[nama_mading_kategori]</option>";} ?>
					</select>
				</td>
			</tr>
			<tr><td class="isian" colspan="2" style="color:#7f7f7f;"><i>Pilih kategori untuk berita, anda bisa memilih kategori lebih dari satu. Jika anda tidak memilih kategori maka secara otomatis diinputkan "Tanpa Kategori"</i><br><hr></td></tr>
			
			<tr><td class="isiankanan" width="100px">Terima Komentar</td>
				<td class="isian">
				<?php
				if ($r[status_komentar]==0){
				echo "
					<input type='radio' name='status_komentar' value='1'>Ya&nbsp;
					<input type='radio' name='status_komentar' value='0' checked/>Tidak";}
				else {
				echo "
					<input type='radio' name='status_komentar' value='1' checked/>Ya&nbsp;
					<input type='radio' name='status_komentar' value='0'>Tidak";
				}?>
				</td>
			</tr>
			<tr><td class="isian" colspan="2" style="color:#7f7f7f;"><i>Anda bisa menonaktifkan form komentar pada berita dengan memilih "Tidak"</i><br><hr></td></tr>
			
			<tr><td class="isiankanan" width="100px">Headline</td>
				<td class="isian">
				<?php
				if ($r[status_headline]==0){
				echo "
					<input type='radio' name='status_headline' value='1'>Ya&nbsp;
					<input type='radio' name='status_headline' value='0' checked/>Tidak";}
				else {
				echo "
					<input type='radio' name='status_headline' value='1' checked/>Ya&nbsp;
					<input type='radio' name='status_headline' value='0'>Tidak";
				}?>
				</td>
			</tr>
			<tr><td class="isian" colspan="2" style="color:#7f7f7f;"><i>Setiap berita yang anda tulis dapat dijadikan sebagai headline pada halaman utama website. Dengan catatan berita harus mempuntai gambar kecil, jika tidak ada gambar kecil maka akan diinputkan gambar default</i><br><hr></td></tr>
			
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Update">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("editmading");
			frmvalidator.addValidation("judul_mading","req","Judul berita harus diisi");
			frmvalidator.addValidation("judul_mading","maxlen=100","Judul berita maksimal 100 karakter");
			frmvalidator.addValidation("judul_mading","minlen=5","Judul berita minimal 5 karakter");
	  
			frmvalidator.addValidation("fupload","file_extn=jpg;gif;png","Jenis file yang diterima untuk gambar adalah : jpg, gif, png");
			//]]>
		</script>
		</table>

</div><!--Akhir class isi kanan-->