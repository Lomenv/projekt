<html>

<body id="podstranky">
<br />
<div align="center" style="color: white;">
    <?php echo form_open('Vozidla/insert'); ?>
    <h1>Pridaj vozidlo:</h1><hr/>
    <table style="color:white;">
        <tr>
            <td>Značka :</td>
            <td style="color:black;"><input type="text" name="znacka"></input></td>
        </tr>
        <tr>
            <td>Model :</td>
            <td style="color:black;"><input type="text" name="model"></input></td>
        </tr>
        <tr>
            <td>Počet miest:</td>
            <td style="color:black;"><input type="text" name="pocetMiest"></input></td>
        </tr>
        <tr>
            <td>SPZ:</td>
            <td style="color:black;"><input type="text" name="SPZ"></input></td>
        </tr>
        <tr>
        <tr>
            <td>Farba:</td>
            <td style="color:black;"><input type="text" name="farba"></input></td>
        </tr>
            <td>Dostupnosť:</td>
            <td style="color:black;"><input type="text" name="dostupnost"></input></td>
        </tr>
        <tr>
            <td style="color:black;"><input type="submit" name="submit"  value="Potvrdiť" style="margin-left: 155px"></input></td>
        </tr>
    </table>
    <?php
    echo form_close();
    ?>
</div>
</body>
</html>