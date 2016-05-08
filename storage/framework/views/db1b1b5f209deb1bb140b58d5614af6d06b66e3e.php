<?php $__env->startSection('content'); ?>
    
    <div class="container">
        <font id="justtext">Hello there! Please log in to continue.</font><br><br>

        <form method="post" action="login.php">
        <center><input id="username" type="text" name="username" placeholder="Username" /><br></center>
        <center><input id="password" type="password" name="password" placeholder="Password" /><br></center>
        <center><input id="submit" type="submit" name="submit" value="Log in" /></center>
        </form> 

        <div class="not_registered">Don't have an account? 
        <a id="not_registered" href="register">REGISTER </a>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>