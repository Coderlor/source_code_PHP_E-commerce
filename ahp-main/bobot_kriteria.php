<?php
	include('config.php');
	include('fungsi.php');

	include('navbar.php');
?>
<section class="content container mt-5">
	<h2 class="ui header">Comparison of Criteria</h2>
	<?php showTabelPerbandingan('kriteria','kriteria'); ?>
</section>
