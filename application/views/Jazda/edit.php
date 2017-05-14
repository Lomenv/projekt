<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
?>
<body >
<div class="container" align="center">
    <div class="row" style="color: white">
        <div class="page-header">
            <h1><?php echo $title; ?></h1>
        </div>
    </div>
</body>
    <div class="row" style="color: white">

        <div class="col-md-12">
            <?php if (validation_errors()): ?>
                <div class="alert alert-danger alert-dismissable" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
                    <strong>Warning!</strong> <?php echo validation_errors(); ?>
                </div>
            <?php endif;
            echo form_open('jazda/edit/'.$jazda_item['idJazda'],array('class'=>'form-horizontal')); ?>
            <div class="form-group">
                <?php foreach ($jazda_item as $key => $value):?>
                    <div class="form-group">
                        <label for="<?php echo $key; ?>" class="col-sm-2 control-label"><?php echo $key;?></label>
                        <div class="col-sm-10">
                            <input type="input" class="form-control" id="<?php echo $key; ?>" name="<?php echo $key;?>" size="40" maxlength="40" value="<?php echo $value;?>">
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
    <br />
    <div align="center">
        <input type="submit" class="btn btn-default" name="submit" value="Editovať" />
      &nbsp;  <button type="button" class="btn btn-default" onclick="javascript:window.history.go(-1);">Naspäť</button>
    </div>

    <?php form_close();?>





</div>    <!-- /row -->
<div class="row">

</div>

</div> <!-- /container -->
