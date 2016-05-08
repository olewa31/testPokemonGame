<?php $__env->startSection('content'); ?>

	<div class="container">
		<?php echo Form::open(); ?>

			<?php echo e(Form::email('email', null, array('class' => 'input',
											 'placeholder' => 'Email Address'))); ?>

			
			<?php echo e(Form::password('password', array('class' => 'input',
										        'placeholder' => 'Password'))); ?><br>

			<?php echo e(Form::label('remember', 'Remember me:')); ?><br>
			<?php echo e(Form::checkbox('remember')); ?>


			<?php echo e(Form::submit('Login', array('class' => 'input'))); ?>										  
		<?php echo Form::close(); ?>

		
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>