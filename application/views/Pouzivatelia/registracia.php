<!DOCTYPE html>
<head>
    <br /> <br /> <br />

    <link href="<?php echo base_url(); ?>assets/css/freelancer.css" rel='stylesheet' type='text/css' />
</head>
      <span style="color: white;">
<body id="podstranky" >
<div class="container" align="center">
    <h2>Registrácia</h2>
    <form action="" method="post">
        <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Name" required="" value="<?php echo !empty($user['name'])?$user['name']:''; ?>">
            <?php echo form_error('name','<span class="help-block">','</span>'); ?>
        </div>
        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Email" required="" value="<?php echo !empty($user['email'])?$user['email']:''; ?>">
            <?php echo form_error('email','<span class="help-block">','</span>'); ?>
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required="">
            <?php echo form_error('password','<span class="help-block">','</span>'); ?>
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="conf_password" placeholder="Confirm password" required="">
            <?php echo form_error('conf_password','<span class="help-block">','</span>'); ?>
        </div>
<br />
        <div class="form-group">
            <input type="submit" name="regisSubmit" class="btn-primary" value="Submit"/>
        </div>
    </form>
</div>
</body>
</span>
</html>