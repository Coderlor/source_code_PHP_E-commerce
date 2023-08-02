<?php
include_once('includes/header.inc.php');

if ($_POST) {
  include_once('includes/user.inc.php');
  $eks = new User($db);
  $eks->nl = $_POST['nl'];
  $eks->rl = $_POST['rl'];
  $eks->un = $_POST['un'];
  $eks->pw = md5($_POST['pw']);

  if ($eks->pw == md5($_POST['up'])) {
    if ($eks->insert()) { ?>
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
  } else { ?>
    <script type="text/javascript">
      window.onload=function(){
        showStickyWarningToast();
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
		  <li class="active">Add Data</li>
		</ol>
  	<p style="margin-bottom:10px;">
  		<strong style="font-size:18pt;"><span class="fa fa-clone"></span> Add User</strong>
  	</p>
    <div class="panel panel-default">
      <div class="panel-body">
        <form method="post">
          <div class="form-group">
            <label for="nl">Full Name</label>
            <input type="text" class="form-control" id="nl" name="nl" required>
          </div>
          <div class="form-group">
            <label for="rl">Role</label>
            <select class="form-control" name="rl" id="rl" required>
              <option value="">----</option>
              <option value="atasan">Superior</option>
              <option value="kepegawaian">Staffing</option>
              <option value="manajer">Manager</option>
            </select>
          </div>
          <div class="form-group">
            <label for="un">Username</label>
            <input type="text" class="form-control" id="un" name="un" required>
          </div>
          <div class="form-group">
            <label for="pw">Password</label>
            <input type="password" class="form-control" id="pw" name="pw" required>
          </div>
          <div class="form-group">
            <label for="up">Reset Password</label>
            <input type="password" class="form-control" id="up" name="up" required>
          </div>
          <div class="btn-group">
            <button type="submit" class="btn btn-dark">Save</button>
      		  <button type="button" onclick="location.href='user.php'" class="btn btn-default">Return</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php include_once('includes/footer.inc.php'); ?>
