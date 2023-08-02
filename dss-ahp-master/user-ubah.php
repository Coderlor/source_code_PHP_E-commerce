<?php
include_once("includes/header.inc.php");

$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

include_once("includes/user.inc.php");
$eks = new User($db);
$eks->id = $id;
$eks->readOne();

if ($_POST) {
  $eks->nl = $_POST['nl'];
  $eks->rl = $_POST['rl'];
  $eks->un = $_POST['un'];
  $eks->pw = md5($_POST['pw']);
  if ($eks->update()) {
    echo "<script>location.href='user.php'</script>";
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
      <li><a href="index.php">Home page</a></li>
      <li><a href="user.php">User Data</a></li>
      <li class="active">change Data</li>
    </ol>
    <p style="margin-bottom:10px;">
      <strong style="font-size:18pt;"><span class="fa fa-pencil"></span>Change User</strong>
    </p>
    <div class="panel panel-default">
      <div class="panel-body">
        <form method="post">
          <div class="form-group">
            <label for="nl">Full Name</label>
            <input type="text" class="form-control" id="nl" name="nl" value="<?php echo $eks->nl; ?>">
          </div>
          <div class="form-group">
            <label for="rl">Role</label>
            <select class="form-control" name="rl" id="rl">
              <option value="atasan"<?=($eks->rl == "atasan") ? "selected=\"on\"" : "" ?>>Superior</option>
              <option value="kepegawaian"<?=($eks->rl == "kepegawaian") ? "selected=\"on\"" : "" ?>>Staffing</option>
              <option value="manajer"<?=($eks->rl == "manajer") ? "selected=\"on\"" : "" ?>>Manager</option>
            </select>
          </div>
          <div class="form-group">
            <label for="un">Username</label>
            <input type="text" class="form-control" id="un" name="un" value="<?php echo $eks->un; ?>">
          </div>
          <div class="form-group">
            <label for="pw">Password</label>
            <input type="text" class="form-control" id="pw" name="pw" value="<?php echo $eks->pw; ?>">
          </div>
          <div class="btn-group">
            <button type="submit" class="btn btn-dark">Update</button>
            <button type="button" onclick="location.href='user.php'" class="btn btn-default">Return</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php include_once("includes/footer.inc.php"); ?>
