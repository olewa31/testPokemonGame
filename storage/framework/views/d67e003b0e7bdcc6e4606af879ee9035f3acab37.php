<?php $__env->startSection('content'); ?>

	<div class="container">
		<font id="justtext">Fill the form and add a Pokemon</font>

		<?php echo Form::open(array('route' => 'pokemons.store')); ?>

    		
			
			<?php echo e(Form::text('name', null, array('class' => 'input', 
											  'placeholder' => 'Name (4 - 12 characters long)'))); ?>


			<?php echo e(Form::number('strength', null, array('class' => 'input', 
											        'placeholder' => 'Strength (1 - 100)',
											        'min' => '1',
											        'max' => '100'))); ?>

			<br>Image: <?php echo e(Form::file('image')); ?>

			
			<?php echo e(Form::submit('Add a Pokemon')); ?>								        
			
		<?php echo Form::close(); ?>


	</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>