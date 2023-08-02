<?php
include_once('includes/header.inc.php');
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

include_once('includes/nilai.inc.php');
$eks = new Nilai($db);
$eks->id = $id;
$eks->readOne();

if($_POST){
	$eks->jm = $_POST['jm'];
	$eks->kt = $_POST['kt'];
	if($eks->update()){
		echo "<script>location.href='nilai.php'</script>";
	} else{ ?>
		<script type="text/javascript">
			window.onload=function(){
				showStickyErrorToast();
			};
		</script> <?php
	}
}
?>
<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12">
	  <ol class="breadcrumb">
		  <li><a href="index.php">Home page</a></li>
		  <li><a href="nilai.php">Mark</a></li>
		  <li class="active">Change Data</li>
		</ol>
  	<p style="margin-bottom:10px;">
  		<strong style="font-size:18pt;"><span class="fa fa-pencil"></span> Change Preference Value</strong>
  	</p>
  	<div class="panel panel-default">
			<div class="panel-body">
		    <form method="post">
				  <div class="form-group">
				    <label for="jm">Total Value</label>
				    <input type="text" class="form-control" id="jm" name="jm" value="<?php echo $eks->jm; ?>">
				  </div>
				  <div class="form-group">
				    <label for="kt">Value Description</label>
				    <input type="text" class="form-control" id="kt" name="kt" value="<?php echo $eks->kt; ?>">
				  </div>
					<div class="btn-group">
					  <button type="submit" class="btn btn-dark">Update</button>
					  <button type="button" onclick="location.href='nilai.php'" class="btn btn-default">Return</button>
					</div>
				</form>
			  </div>
			</div>
	</div>
  <div class="col-xs-12 col-sm-12 col-md-2"> </div>
</div>

<?php include_once('includes/footer.inc.php');?>
