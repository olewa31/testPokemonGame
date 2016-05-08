<?php $__env->startSection('content'); ?>
	<div class="wider_container">
	<font id="justtext">
	<table class="no_border">
		<tr>
			<td class="no_border" rowspan="4"><img class="avatar" src="<?php echo e($user->image_path); ?>" /></td>
			<td class="no_border">Name:</td><td class="no_border"><?php echo e($user->fullname); ?></td>
		</tr>
		<tr>
			<td class="no_border">Username:</td><td class="no_border"><?php echo e($user->name); ?></td>
		</tr>
		<tr>
			<td class="no_border">Email:</td><td class="no_border"><?php echo e($user->email); ?></td>
		</tr>
		<tr>
			<td class="no_border">Date of Birth:</td><td class="no_border"><?php echo e($user->birthday); ?></td> 
		</tr>
		
		
	</table>
	<a href="<?php echo e(route('users.edit', Auth::user()->id)); ?>" class="button_small">Edit profile</a><br><br>

	<?php if($user->pokemons_owned == 0): ?>
	
		<?php echo e(Session::flash('error','You have no pokemons. Recruit some in a Pokemons panel.')); ?>


	<?php else: ?>
		Your Pokemons:<br>
		<table>
			<thead>
				<th>Image</th>
				<th>Name</th>
				<th>Strength</th>
				<th>Action</th>
			</thead>
		<tbody>
		<?php foreach($pokemons as $pokemon): ?>

			<?php if($pokemon->user_id == Auth::user()->id): ?>

				
				<tr>
					<td><img class="small_avatar" src="<?php echo e($pokemon->image_path); ?>" /></td>
					<td><?php echo e($pokemon->name); ?></td>
					<td class="middle"><?php echo e($pokemon->strength); ?></td>
					<td>
					<?php echo Form::model($pokemon, array('route' => array('abandon', $pokemon->id), 'method' => 'PUT')); ?>

							<?php echo e(Form::submit('Abandon', array('class' => 'button_small'))); ?>

							<a class="button_small" href="<?php echo e(route('pokemons.edit', $pokemon->id)); ?>">Rename</a>
					<?php echo Form::close(); ?>

					</td>
				</tr>		
					

			<?php endif; ?>

		<?php endforeach; ?>
		</tbody>
		</table>
	<?php endif; ?>

	</font>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>