<?php require_once('includes/init.php'); ?>
<?php cek_login($role = array(1)); ?>

<?php
$errors = array();
$sukses = false;

if(isset($_POST['submit'])):	
	$kode_kriteria = $_POST['kode_kriteria'];
	$nama = $_POST['nama'];
	$type = $_POST['type'];
	$bobot = $_POST['bobot'];
	$ada_pilihan = $_POST['ada_pilihan'];

	if(!$kode_kriteria) {
		$errors[] = 'Kode kriteria tidak boleh kosong';
	}
	// Validasi Nama Kriteria
	if(!$nama) {
		$errors[] = 'Nama kriteria tidak boleh kosong';
	}		
	// Validasi Tipe
	if(!$type) {
		$errors[] = 'Type kriteria tidak boleh kosong';
	}
	// Validasi Bobot
	if(!$bobot) {
		$errors[] = 'Bobot kriteria tidak boleh kosong';
	}	
	
	if(empty($errors)):
		
		$simpan = mysqli_query($koneksi,"INSERT INTO kriteria (id_kriteria, kode_kriteria, nama, type, bobot, ada_pilihan) VALUES ('', '$kode_kriteria', '$nama', '$type', '$bobot', '$ada_pilihan')");
		if($simpan) {
			redirect_to('list-kriteria.php?status=sukses-baru');		
		}else{
			$errors[] = 'Data gagal disimpan';
		}
	endif;

endif;
?>

<?php
$page = "Kriteria";
require_once('template/header.php');
?>


<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-cube"></i> Data Kriteria</h1>

	<a href="list-kriteria.php" class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
		<span class="text">Return</span>
	</a>
</div>

<?php if(!empty($errors)): ?>
	<div class="alert alert-info">
		<?php foreach($errors as $error): ?>
			<?php echo $error; ?>
		<?php endforeach; ?>
	</div>
<?php endif; ?>	

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-danger"><i class="fas fa-fw fa-plus"></i> ADD Data Kriteria</h6>
    </div>
	
	<form action="tambah-kriteria.php" method="post">
		<div class="card-body">
			<div class="row">
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Criteria Code</label>
					<input autocomplete="off" type="text" name="kode_kriteria" required class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Criteria Name</label>
					<input autocomplete="off" type="text" name="nama" required class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Type Criteria</label>
					<select name="type" class="form-control" required>
						<option value="">--Choose--</option>
						<option value="Benefit">Benefit</option>
						<option value="Cost">Cost</option>						
					</select>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Criterion Weights</label>
					<input autocomplete="off" type="number" name="bobot" required step="0.01" class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">How to Assess</label>
					<select name="ada_pilihan" class="form-control" required>
						<option value="">--Choose--</option>
						<option value="0">Direct Input</option>
						<option value="1">Sub Criteria Options</option>						
					</select>
				</div>
			</div>
		</div>
		<div class="card-footer text-right">
            <button name="submit" value="submit" type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
            <button type="reset" class="btn btn-info"><i class="fa fa-sync-alt"></i> Reset</button>
        </div>
	</form>
</div>


<?php
require_once('template/footer.php');
?>