<div class="text-center">
	<?php if(isset($_SESSION['is_logged_in'])) : ?>
	<a href="<?php echo ROOT_PATH; ?>/shares/add" class="btn btn-success btn-share">Share something</a>
	<br>
	<?php endif; ?>
	<?php foreach($viewmodel as $item) : ?>
	<br>
	<div class="well">
		<h3><?php echo $item['title']; ?></h3>
		<small><?php echo $item['create_date']; ?></small>

		<hr>
		<p><?php echo $item['body']; ?></p>
		<br>
		<a class="btn btn-default" href="<?php echo $item['link']; ?>" target="_blank">Go To Website</a>
	</div>
	<?php endforeach; ?>
</div>