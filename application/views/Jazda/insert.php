<html>
<br />

<body id="podstranky">

<div id="container" align="center" style="color: white;">
    <?php echo form_open('jazda/insert'); ?>
    <h1>Pridať jazdu:</h1><hr/>
    <table style="color: white;">
        <tr>
            <td>Číslo auta :</td>
            <?php
            $con=mysqli_connect("localhost","root","","taxi");
            $getMinAuto=mysqli_fetch_assoc(mysqli_query($con,"SELECT MIN(idAuto) AS minauto FROM auto"));
            $getMaxAuto=mysqli_fetch_assoc(mysqli_query($con,"SELECT MAX(idAuto) AS maxauto FROM auto"));
            $row1 =  $getMinAuto['minauto'];
            $row2 = $getMaxAuto['maxauto'];
            ?>

            <td style="color: black;"><input type="number" min="<?php echo $row1?>" max="<?php echo $row2?>" name="idAuto"></input></td>
        </tr>
        <tr>
            <td>Číslo taxikára :</td>
            <?php
            $getMinTaxikar=mysqli_fetch_assoc(mysqli_query($con,"SELECT MIN(idTaxikar) AS mintax FROM taxikar"));
            $getMaxTaxikar=mysqli_fetch_assoc(mysqli_query($con,"SELECT MAX(idTaxikar) AS maxtax FROM taxikar"));
            $row3 =  $getMinTaxikar['mintax'];
            $row4 =  $getMaxTaxikar['maxtax'];
            ?>
            <td style="color: black;"><input type="number" min="<?php echo $row3?>" max="<?php echo $row4?>" name="idTaxikar"></input></td>
        </tr>
        <tr>
            <td>Číslo rezervácie :</td>
            <?php
            $getMinRez=mysqli_fetch_assoc(mysqli_query($con,"SELECT MIN(idRezervacia) AS minrez FROM rezervacia"));
            $getMaxRez=mysqli_fetch_assoc(mysqli_query($con,"SELECT MAX(idRezervacia) AS maxrez FROM rezervacia"));
            $row5 = $getMinRez['minrez'];
            $row6 =  $getMaxRez['maxrez'];
            ?>
            <td style="color: black;"><input type="number" min="<?php echo $row5?>" max="<?php echo $row6?>" name="idRezervacia"></input></td>
        </tr>
        <tr>
            <td>Telefón na zákazníka :</td>
            <td style="color: black;"><input type="text" name="telefonNaZakaznika"></input></td>
        </tr>
        <tr>
            <td>Cena :</td>
            <td style="color: black;"><input type="number" step="any" name="cena"></input></td>
        </tr>
        <tr>
            <td>Začiatok jazdy :</td>
            <td style="color: black;"><input type="text" name="zaciatok"></input></td>
        </tr>
        <tr>
            <td>Koniec jazdy :</td>
            <td style="color: black;"><input type="text" name="koniec"></input></td>
        </tr>
        <tr>
            <td>Typ :</td>
            <td style="color: black;"><input type="text" step="any" name="typ"></input></td>
        </tr>


        <tr>
            <td>Dlžka cesty :</td>
            <td style="color: black;"><input type="text" step="any" name="dlzkaCesty"></input></td>
        </tr>

        <tr>
<br />
            <td style="color: black;"><input type="submit" name="submit" value="submit" style="margin-left: 155px; color: black;"></input></td>
        </tr>
    </table>
    <?php
    echo form_close();
    ?>
</div>
</body>
</html>