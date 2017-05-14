

<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
?>
<div class="container" style=" background-color: rgba(0, 0, 0, 0.5);" align="center" >


    <div class="row" style="color: white">
        <div class="page-header">
            <h1><small> <?php echo $subtitle;?></small></h1>
        </div>



        <style>

            dl {
                width: 15%;
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






        <?php foreach ($auto_item as $key => $value):?>
            <?php
            if ($value == 1): ?>
                <img src="<?php echo base_url('assets/img/q5.png'); ?>" align="center" style="width: 25%; height: 25%;">
            <?php endif ?>
            <?php
            if ($value == 2): ?>
                <img src="<?php echo base_url('assets/img/bmw.png'); ?>" align="center" style="width: 25%; height: 25%;">
            <?php endif ?>
            <?php
            if ($value == 3): ?>
                <img src="<?php echo base_url('assets/img/golf.png'); ?>" align="center" style="width: 25%; height: 25%;">
            <?php endif ?>
            <?php
            if ($value == 4): ?>
                <img src="<?php echo base_url('assets/img/mustang.png'); ?>" align="center" style="width: 25%; height: 25%;">
            <?php endif ?>
            <?php
            if ($value == 5): ?>
                <img src="<?php echo base_url('assets/img/batmobile.png'); ?>" align="center" style="width: 25%; height: 25%;">
            <?php endif ?>

            <dl>

                <dt ><?php echo $key;?> →</dt>
                <dd ><?php echo $value;?></dd>

            </dl>

        <?php endforeach; ?>


    </div>

    <div class="col-md-4"  >
        <button type="button" class="btn btn-default" onclick="javascript:window.history.go(-1);">Naspäť</button>
    </div>
</div>

</div>





















