<!DOCTYPE html>
<html lang="en">




< <!-- Navigation -->
<nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand page-scroll" href="<?php echo site_url('Home');?>">Taxi Nitra</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden">
                    <a href="<?php echo site_url('Home');?>"></a>
                </li>
                <li>
                    <a href="<?php echo site_url('Onas');?>">O nás</a>
                </li>

                <li>
                    <a href="<?php echo site_url('Vozidla');?>">Vozidlá</a>
                </li>
                <li>
                    <a href="<?php echo site_url('Pracovnici');?>">Pracovníci</a>
                </li>
                <li>
                    <a href="<?php echo site_url('Kontakt');?>">Kontakt</a>
                </li>
                <li>
                    <a href="<?php echo site_url('Jazda');?>">Jazdy</a>
                </li>
                <li>
                    <a href="<?php echo site_url('Rezervacia');?>">Rezervácie</a>
                </li>
                <li>
                    <a href="<?php echo site_url('Zmeny');?>">Zmeny</a>
                </li>
                </li>
                <li>
                    <a href="<?php echo site_url('Graf');?>">Grafy</a>
                </li>
                <?php
                if (isset($_SESSION['userId']) and $_SESSION['userId']!=''): ?>

                    <li id="liright"><a href="<?php echo site_url('Pouzivatelia/konto'); ?>">Konto</a></li>
                    <li id="liright"><a href="<?php echo site_url('Pouzivatelia/odhlasenie'); ?>">Odhlásenie</a></li>

                    <?php
                else:
                    ?>
                    <li id="liright"><a href="<?php echo site_url('Pouzivatelia/prihlasenie'); ?>">Prihlásenie</a></li>

                <?php endif; ?>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

<style>
    p {
        font-family: "Comic Sans MS", Times, serif;
        color:#444444;
        font-size: 50px;
    }
</style>

<br /> <br /> <br />  <br /> <br /> <br />




