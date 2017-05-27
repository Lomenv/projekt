

<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
?>
<div class="container" style=" background-color: rgba(0, 0, 0, 0.5);" align="center" >


    <div class="row" style="color: white">




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

        <?php foreach ($zmenaprac_item as $key => $value):?>


            <dl>

                <dt ><?php echo $key;?> →</dt>
                <dd ><?php echo $value;?></dd>

            </dl>

        <?php endforeach; ?>

        <div align="center" style="color: white;">
            <h1>Typ zmeny: </h1>
            <table class="table table-striped" align="center">
                <?php foreach ($zmena as $zmenaprac_item): ?>
                    <tr style="color: #0b0b0b; background: white;">
                        <td><?php echo $zmenaprac_item['idZmena']; ?></td>
                        <td><?php echo $zmenaprac_item['zaciatok']; ?></td>
                        <td><?php echo $zmenaprac_item['koniec']; ?></td>

                    </tr>
                <?php endforeach; ?>
            </table>

            <h1>Zoznam taxikarov: </h1>
            <table class="table table-striped" align="center">
                <?php foreach ($taxikar as $taxikar_item): ?>
                    <tr style="color: #0b0b0b; background: white;">
                        <td><?php echo $taxikar_item['idTaxikar']; ?></td>
                        <td><?php echo $taxikar_item['meno']; ?></td>
                        <td><?php echo $taxikar_item['priezvisko']; ?></td>

                    </tr>
                <?php endforeach; ?>
            </table>
        </div>


    </div>

    <div class="col-md-4"  >
        <button type="button" class="btn btn-default" onclick="javascript:window.history.go(-1);">Naspäť</button>
    </div>
</div>    <!-- /row -->

</div>




