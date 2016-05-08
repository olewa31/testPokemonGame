<?php $__env->startSection('content'); ?>

	<div class="wider_container">
		<font id="justtext">List of the pokemons</font>

		<?php if(Auth::user()->is_admin): ?>
		<div><a href="<?php echo e(route('pokemons.create')); ?>" class="button">Create New Pokemon</a></div>
		<?php endif; ?>
		<div>
		<br><br><br>
		<table>
			<thead>
				<?php if(Auth::user()->is_admin): ?>			
				<th>ID</th>
				<?php endif; ?>
				<th>Image</th>
				<th>Name</th>
				<th>Strength</th>
				<?php if(Auth::user()->is_admin): ?>
				<th>Owned By</th>
				<th>Created at</th>
				<?php endif; ?>
				<th>Action</th>
			</thead>
			<tbody>
				<?php foreach($pokemons as $pokemon): ?>
					<?php if(!Auth::user()->is_admin): ?>
						<?php if($pokemon->user_id==null): ?>
					<tr>
						<td><img class="small_avatar" src="<?php echo e($pokemon->image_path); ?>" /></td>
						<td><?php echo e($pokemon->name); ?></td>
						<td class="middle"><?php echo e($pokemon->strength); ?></td>
						<td>
						<?php echo Form::model($pokemon, array('route' => array('recruit', $pokemon->id), 'method' => 'PUT')); ?>

							<?php echo e(Form::submit('Recruit', array('class' => 'button_small'))); ?>

							<?php echo Form::close(); ?>

						</td>
					</tr>
					<?php endif; ?>
					<?php endif; ?>
					<?php if(Auth::user()->is_admin): ?>					
					<tr>
						<td><?php echo e($pokemon->id); ?></td>						
						<td><img class="small_avatar" src="<?php echo e($pokemon->image_path); ?>" /></td>						
						<td><?php echo e($pokemon->name); ?></td>
						<td class="middle"><?php echo e($pokemon->strength); ?></td>
						<td>
						<?php if($pokemon->user_id != null): ?>
						<?php echo e($pokemon->user->name); ?>

						<?php endif; ?>
						</td>						
						<td><?php echo e($pokemon->created_at); ?></td>
						
						<td>
						<?php if($pokemon->user_id == null): ?>

							<?php echo Form::model($pokemon, array('route' => array('recruit', $pokemon->id), 'method' => 'PUT')); ?>

							<?php echo e(Form::submit('Recruit', array('class' => 'button_small'))); ?>

							<?php echo Form::close(); ?>

							
						<?php endif; ?>	
						
						<?php echo Form::open(array('route' => array('pokemons.destroy', $pokemon->id), 'method' => 'DELETE')); ?>

						<a class="button_small" href="<?php echo e(route('pokemons.edit', $pokemon->id)); ?>">Edit</a>
						<?php echo Form::submit('Delete', array('class' => 'button_small')); ?>

						</td><?php echo Form::close(); ?>

					</tr>
					<?php endif; ?>
					
				<?php endforeach; ?>
			</tbody>
		</table>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>