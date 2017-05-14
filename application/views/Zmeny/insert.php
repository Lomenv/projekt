<html>

<body>

<div id="container" align="center" style="color: white;">
    <?php echo form_open('Zmeny/insert'); ?>
    <h1>Pridaj zmenu:</h1><hr/>
    <table style="color: white">

        <tr>
            <?php
            $con=mysqli_connect("localhost","root","","taxi");
            $getMinZmena=mysqli_fetch_assoc(mysqli_query($con,"SELECT MIN(idZmena) AS minsh FROM zmena"));
            $getMaxZmena=mysqli_fetch_assoc(mysqli_query($con,"SELECT MAX(idZmena) AS maxsh FROM zmena"));
            $row3 =  $getMinZmena['minsh'];
            $row4 =  $getMaxZmena['maxsh'];
            ?>
            <td>Číslo zmeny :</td>
            <td style="color: black;"><input type="number" min="<?php echo $row3?>" max="<?php echo $row4?>" name="idZmena"></input></td>
        </tr>
        <tr>
            <td>Začiatok:</td>
            <td style="color: black;"><input type="date" name="zaciatok"></input></td>
        </tr>
        <tr>
            <td>Koniec:</td>
            <td style="color: black;"><input type="date" name="koniec"></input></td>
        </tr>

        <tr>

            <td style="color: black;"><input type="submit" name="submit"  value="Potvrdiť" style="margin-left: 155px"></input></td>
        </tr>
    </table>
    <?php
    echo form_close();
    ?>
</div>
</body>
</html>