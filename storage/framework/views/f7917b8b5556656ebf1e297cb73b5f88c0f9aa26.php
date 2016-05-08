<!DOCTYPE html>
<html>
    <head>
        <title>The Pokemon Game</title>

        <link rel="stylesheet" type="text/css" href="/css/default.css" />

        
    </head>
    <body>
    <center><div class="title">
        <h1 class="title">The Pokemon Game</h1>

        <?php echo $__env->make('popups._messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


    </div></center>
    
    <div class="user_info">

    <?php if(Auth::check()): ?> 
    You are logged in as <?php echo e(Auth::user()->name); ?> 
        <?php if(!Auth::user()->is_admin): ?>
        (you are a standard user)
        <?php else: ?>
        (you are an admin)
        <?php endif; ?>
    <a href="<?php echo e(route('users.show', Auth::user()->id)); ?>" class="button_small">Account</a>
    <a href="<?php echo e(route('users.index')); ?>" class="button_small">Users</a>
    <a href="<?php echo e(route('pokemons.index')); ?>" class="button_small">Pokemons</a>
    <a href="<?php echo e(route('logout')); ?>" class="button_small">Logout</a>
    <div class="army">Your Army Strength: <?php echo e(Auth::user()->army_strength); ?></div>

    <?php else: ?>
    You are not logged in. <a href="<?php echo e(route('login')); ?>" class="button_small">Login</a>
    <a href="<?php echo e(route('register')); ?>" class="button_small">Register</a>
    <?php endif; ?>

    </div>


        <center>
            <?php echo $__env->yieldContent('content'); ?>
        </center>
    </body>
</html>