<?php $__env->startSection('content'); ?>
    
    <div class="container">
        <?php if(Auth::user()): ?>

        <table>
			<thead>
				
				<th>Name</th>
				<th>Strength</th>
				
				<th></th>
			</thead>
			<tbody>
				<?php foreach($pokemons as $pokemon): ?>
					<tr>
						<?php if($pokemon->user_id == Auth::user()->id): ?>
						<td><?php echo e($pokemon->name); ?></td>
						<td class="middle"><?php echo e($pokemon->strength); ?></td>
						

						
						
						<td><a class="button_small" href="abandon")}}>Abandon</a>	
						<!--<a class="button_small" href="<?php echo e(route('pokemons.edit', $pokemon->id)); ?>">Edit</a>-->
						
						
						


						
						
						</td>
						<?php endif; ?>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
       <?php endif; ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>