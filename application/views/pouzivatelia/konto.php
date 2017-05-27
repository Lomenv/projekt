<!DOCTYPE html>
<html lang="en">
<head>
    <link href="<?php echo base_url(); ?>assets/css/freelancer.css" rel='stylesheet' type='text/css' />
</head>
<br /> <br /> <br />
<style>

    p {
        color:white;
    }
</style>

<span style="color: white">
<body id="podstranky">
<div class="container" align="center">
    <h2>Použivateľské konto</h2>
    <h3>Dobrý deň <?php echo $pouzivatel['name']; ?>!</h3>
    <div class="account-info" style="color: white">
        <p><b>Meno: </b><?php echo $pouzivatel['name']; ?></p>
        <p><b>Email: </b><?php echo $pouzivatel['email']; ?></p>
    </div>
</div>

</body>
    </span>
</html>