<?php $__env->startSection('content'); ?>

	<div class="container">
	<?php echo Form::model($pokemon, array('route' => array('pokemons.update', $pokemon->id),
									'method' => 'PUT', 'files' => true)); ?>

    		
			
			<?php echo e(Form::text('name', null, array('class' => 'input', 
											  'placeholder' => 'Name (4 - 12 characters long)'))); ?>

			<?php if( Auth::user()->is_admin===1): ?>
			<?php echo e(Form::number('strength', null, array('class' => 'input', 
											        'placeholder' => 'Strength (1 - 100)',
											        'min' => '1',
											        'max' => '100'))); ?>

			<br>Image: <?php echo e(Form::file('image')); ?>

			<?php else: ?>
			<?php echo Form::hidden('strength', null, array('class' => 'input', 
											        'placeholder' => 'Strength (1 - 100)',
											        'min' => '1',
											        'max' => '100')); ?>

			<?php endif; ?>
											        
		
	<br><a class="button_small" href="<?php echo e(route('pokemons.index')); ?>">Cancel</a><br> 

	<?php echo e(Form::submit('Save', array('class' => 'button_small'))); ?>

	
		<?php echo Form::close(); ?>

	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>