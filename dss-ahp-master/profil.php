<?php
include_once('includes/header.inc.php');

include_once('includes/user.inc.php');
$eks = new User($db);
$eks->id = $_SESSION['id_pengguna'];
$eks->readOne();

if($_POST){
  $eks->nl = $_POST['nl'];
  $eks->un = $_POST['un'];
  $eks->pw = md5($_POST['pw']);
  if($eks->update()){ ?>
    <script type="text/javascript">
      window.onload=function(){
        showStickySuccessToast();
      };
    </script> <?php
  } else { ?>
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
  	  <li><a href="index.php"><span class="fa fa-home"></span> Home page</a></li>
  	  <li class="active"><span class="fa fa-user"></span> Profile</li>
  	</ol>
  	<p style="margin-bottom:10px;">
  		<strong style="font-size:18pt;"><span class="fa fa-pencil"></span> Change Profile</strong>
  	</p>
    <form method="post">
      <div class="form-group">
        <label for="nl">Full name</label>
        <input type="text" class="form-control" id="nl" name="nl" value="<?php echo $eks->nl; ?>" required>
      </div>
      <div class="form-group">
        <label for="un">Username</label>
        <input type="text" class="form-control" id="un" name="un" value="<?php echo $eks->un; ?>" required>
      </div>
      <div class="form-group">
        <label for="pw">Password</label>
        <input type="text" class="form-control" id="pw" name="pw" value="<?php echo $eks->pw; ?>" required>
      </div>
      <button type="submit" class="btn btn-primary"><span class="fa fa-edit"></span>Update</button>
    </form>

  </div>
</div>

<?php include_once('includes/footer.inc.php'); ?>
