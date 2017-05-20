

<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
?>
<body id="podstranky">
<div class="container"  align="center" >


    <div class="row" style="color: white">
        <div class="page-header">
            <h1><small style="color: white;"> <?php echo $subtitle;?></small></h1>
        </div>



        <style>

            dl {
                width: 30%;
                overflow: hidden;
                padding: 0;
                margin: 0
            }
            dt {
                float: left;
                width: 50%;
                padding: 0;
                margin: 0
            }
            dd {
                float: left;
                width: 50%;
                background: #dd0
                padding: 0;
                margin: 0
            }

        </style>






        <?php foreach ($auto_item as $key => $value):?>
            <?php  if (($value == 1)&&($key=='idAuto')): ?>
                <img src="<?php echo base_url('assets/img/transporter.png'); ?>" align="center" style="width: 35%; height: 30%;">
            <?php endif ?>
            <?php  if (($value == 2)&&($key=='idAuto')): ?>
                <img src="<?php echo base_url('assets/img/a5.png'); ?>" align="center" style="width: 30%; height: 30%;">
            <?php endif ?>
            <?php  if (($value == 3)&&($key=='idAuto')): ?>
                <img src="<?php echo base_url('assets/img/vectra.png'); ?>" align="center" style="width: 25%; height: 35%;">
            <?php endif ?>
            <?php  if (($value == 4)&&($key=='idAuto')): ?>
                <img src="<?php echo base_url('assets/img/407.png'); ?>" align="center" style="width: 35%; height: 30%;">
            <?php endif ?>
            <?php  if (($value == 5)&&($key=='idAuto')): ?>
                <img src="<?php echo base_url('assets/img/c4.png'); ?>" align="center" style="width: 35%; height: 30%;">
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

</body>



















