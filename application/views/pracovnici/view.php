

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
                width: 35%;
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





















