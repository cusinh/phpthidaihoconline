<?php  if (count($errors) > 0) : ?>
	<div class="error">
		<?php foreach ($errors as $error) : ?>
			<p style="color:#F00; font-size:14px"><?php echo $error ?></p>
		<?php endforeach ?>
	</div>
<?php  endif ?>