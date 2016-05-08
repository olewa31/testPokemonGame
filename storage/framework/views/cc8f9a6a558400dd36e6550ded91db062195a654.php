<?php $__env->startSection('content'); ?>

	<div class="container">
		<?php echo Form::open(); ?>

			<?php echo e(Form::text('fullname', null, array('class' => 'input',
											 'placeholder' => 'Full Name'))); ?>


			<?php echo e(Form::text('name', null, array('class' => 'input',
											 'placeholder' => 'Username'))); ?>


			<?php echo e(Form::email('email', null, array('class' => 'input',
											 'placeholder' => 'Email Address'))); ?>


			<?php echo e(Form::date('birthday', null, array('class' => 'input'
											 ))); ?>

			
			<?php echo e(Form::password('password', array('class' => 'input',
										        'placeholder' => 'Password (min. 6 characters)'))); ?>


			<?php echo e(Form::password('password_confirmation', array('class' => 'input',
										        'placeholder' => 'Confirm Password'))); ?>


			

			<?php echo e(Form::submit('Register', array('class' => 'input'))); ?>

			
	</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>