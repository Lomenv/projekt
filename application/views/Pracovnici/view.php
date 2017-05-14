

<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
?>
<br />
<body id="podstranky">
<div class="container" style=" background-color: rgba(0, 0, 0, 0.5);" align="center" >


    <div class="row" style="color: white">
        <div class="page-header">
            <h1><small> <?php echo $subtitle;?></small></h1>
        </div>



        <style>

            dl {
                width: 25%;
                overflow: hidden;
                padding: 0;
                margin: 0
            }
            dt {
                float: left;
                width: 50%;
                /* adjust the width; make sure the total of both is 100% */
                padding: 0;
                margin: 0
            }
            dd {
                float: left;
                width: 50%;
                /* adjust the width; make sure the total of both is 100% */
                background: #dd0
                padding: 0;
                margin: 0
            }

        </style>






        <?php foreach ($taxikar_item as $key => $value):?>
            <?php
            if ($value == 1): ?>
                <img src="<?php echo base_url('assets/img/hasselhoff.png'); ?>" align="center">
            <?php endif ?>
            <?php
            if ($value == 2): ?>
                <img src="<?php echo base_url('assets/img/y2j.png'); ?>" align="center" style="width: 25%; height: 25%;">
            <?php endif ?>
            <?php
            if ($value == 3): ?>
                <img src="<?php echo base_url('assets/img/bruce.png'); ?>" align="center" style="width: 15%; height: 15%;">
            <?php endif ?>
            <?php
            if ($value == 4): ?>
                <img src="<?php echo base_url('assets/img/sylvester.png'); ?>" align="center" >
            <?php endif ?>
            <?php
            if ($value == 5): ?>
                <img src="<?php echo base_url('assets/img/strowman.png'); ?>" align="center" style="width: 20%; height: 20%;">
            <?php endif ?>

            <dl>

                <dt ><?php echo $key;?> →</dt>
                <dd ><?php echo $value;?></dd>

            </dl>

        <?php endforeach; ?>


    </div>

    <div align="center">
        <button type="button" class="btn btn-default" onclick="javascript:window.history.go(-1);">Naspäť</button>
    </div>
</div>    <!-- /row -->
</body>
</div>





















