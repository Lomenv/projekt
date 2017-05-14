
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
?>
<body id="podstranky">
<br /> <br />
<div class="container" style=" background-color: rgba(0, 0, 0, 0.5);" align="center" >


    <div class="row" style="color: white">
        <div class="page-header">

        </div>



        <style>

            dl {
                width: 40%;
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






        <?php foreach ($jazda_item as $key => $value):?>

            <dl>

                <dt ><?php echo $key;?> →</dt>
                <dd ><?php echo $value;?></dd>

            </dl>

        <?php endforeach; ?>


    </div>
<br />
    <div  align="center">
        <button type="button" class="btn btn-default" onclick="javascript:window.history.go(-1);">Naspäť</button>
    </div>
</div>    <!-- /row -->

</div>

</body>



















