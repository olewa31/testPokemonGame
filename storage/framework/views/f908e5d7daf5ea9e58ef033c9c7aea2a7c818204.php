<?php if(Session::has('success')): ?>

	<div class="confirm_div">
		<strong><?php echo e(Session::get('success')); ?></strong>
	</div>
	
<?php endif; ?>

<?php if(Session::has('error')): ?>
	<div class="error_div">
		<strong><?php echo e(Session::get('error')); ?></strong>
	</div>
<?php endif; ?>

<?php if(count($errors) > 0): ?>

	<div class="error_div">
		<strong>
			
			<?php foreach($errors->all() as $error): ?>
				<?php echo e($error); ?><br>
			<?php endforeach; ?>

		</strong>
	</div>

<?php endif; ?>