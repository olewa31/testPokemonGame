<?php $__env->startSection('content'); ?>

<div class="container">
	<?php echo Form::model($user, array('route' => array('users.update', $user->id),
									'method' => 'PUT', 'files' => true)); ?>

    		
			
			<?php echo e(Form::text('fullname', null, array('class' => 'input', 
											  'placeholder' => 'Full Name'))); ?>


			<?php echo e(Form::text('name', null, array('class' => 'input', 
											        'placeholder' => 'Username',
											        'min' => '1',
											        'max' => '100'))); ?>

	        <?php echo e(Form::email('email', null, array('class' => 'input',
											 'placeholder' => 'Email Address'))); ?>

			<?php echo e(Form::date('birthday', null, array('class' => 'input'))); ?>


			<br>Avatar: <?php echo e(Form::file('image')); ?>


											        
		
	<br><a class="button_small" href="<?php echo e(route('users.show', $user->id)); ?>">Cancel</a><br> 

	<?php echo e(Form::submit('Save', array('class' => 'button_small'))); ?>

	
		<?php echo Form::close(); ?>

	</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>