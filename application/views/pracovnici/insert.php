<html>

<body id="podstranky">
<br />
<h1 align="center" style="color: white;">Pridať taxikára:</h1><hr/>
<div align="center" style="color: white;">
    <?php echo form_open('pracovnici/insert'); ?>

    <table style="color: white">
        <tr>
            <td>Meno :</td>
            <td style="color: black;"><input type="text" name="meno"></input></td>
        </tr>
        <tr>
            <td>Priezvisko :</td>
            <td style="color: black;"><input type="text" name="priezvisko"></input></td>
        </tr>
        <tr>
            <td>Telefón :</td>
            <td style="color: black;"><input type="text" name="telefon"></input></td>
        </tr>
        <tr>
            <td>Mzda :</td>
            <td style="color: black;"><input type="number" step=any name="hodinovaMzda"></input></td>
        </tr>
        <tr>
            <td>Dátum narodenia :</td>
            <td style="color: black;"><input type="date" step=any name="datumNarodenia"></input></td>
        </tr>
        <tr>
            <td>Číslo vodičského preukazu :</td>
            <td style="color: black;"><input type="text" maxlength="6" step=any name="cisloVodicskehoPreukazu"></input></td>
        </tr>
        <tr>
            <br />
            <td style="color: black;"><input type="submit" name="submit"  value="Potrvdiť" style="margin-left: 155px"></input></td>
        </tr>
    </table>
    <?php
    echo form_close();
    ?>
</div>
</body>
</html>