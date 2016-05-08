<?php $__env->startSection('content'); ?>

<div class="wider_container">
		<font id="justtext">List of the Users</font>

		
		<div>
		
		<table>
			<thead>
				<?php if(Auth::user()->is_admin): ?>			
				<th>ID</th>
				<?php endif; ?>
				<th>Avatar</th>
				<th>Username</th>
				<th>Army Strength</th>
				<?php if(Auth::user()->is_admin): ?>
				<th>Full Name</th>
				<th>Date of Birth</th>
				<th>Email</th>
				<th>Priviledges</th>
				<th>Last activity</th>
				<th>Action</th>
				<?php endif; ?>
			</thead>
			<tbody>
				<?php foreach($users as $user): ?>
					<?php if(!Auth::user()->is_admin): ?>
						
					<tr>
						<td><img class="small_avatar" src="<?php echo e($user->image_path); ?>" /></td>
						<td><?php echo e($user->name); ?></td>
						<td class="middle"><?php echo e($user->army_strength); ?></td>
					</tr>
					<?php endif; ?>
					
					<?php if(Auth::user()->is_admin): ?>					
					<tr>						
						<td><?php echo e($user->id); ?></td>
						<td><img class="small_avatar" src="<?php echo e($user->image_path); ?>" /></td>						
						<td><?php echo e($user->name); ?></td>
						<td class="middle"><?php echo e($user->army_strength); ?></td>
						<td><?php echo e($user->fullname); ?></td>
						<td><?php echo e($user->birthday); ?></td>
						<td><?php echo e($user->email); ?></td>						
						<td>
							<?php if($user->is_admin): ?>
							<?php echo e('Admin'); ?>

							<?php else: ?>
							<?php echo e('Standard'); ?>

							<?php endif; ?>
						</td>
						<td><?php echo e($user->updated_at); ?></td>
						
						<td>
						<?php echo Form::model($user, array('route' => array('admin', $user->id), 'method' => 'PUT')); ?>

						<?php if(!$user->is_admin): ?>
						<?php echo e(Form::submit('Make admin', array('class' => 'button_small'))); ?>

						<?php else: ?>
						<?php echo e(Form::submit('Make standard', array('class' => 'button_small'))); ?>

						<?php endif; ?>
						<?php echo Form::close(); ?>

						<?php echo Form::open(array('route' => array('users.destroy', $user->id), 'method' => 'DELETE')); ?>

						<?php echo Form::submit('Delete', array('class' => 'button_small')); ?><?php echo Form::close(); ?>

						</td>
					</tr>
					<?php endif; ?>
				<?php endforeach; ?>
			</tbody>
		</table>
		</div>
	</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>