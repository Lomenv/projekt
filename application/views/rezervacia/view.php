

<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
?>
<div class="container" style=" background-color: rgba(0, 0, 0, 0.5);" align="center" >


    <div class="row" style="color: white">
        <div class="page-header">

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

        <?php foreach ($rezervacka_item as $key => $value):?>


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





















