<html>

<body id="podstranky">

<div align="center" style="color: white;">
    <?php echo form_open('Rezervacia/insert'); ?>
    <br/>
    <h1>Vytvoriť rezerváciu:</h1><hr/>
    <table>

        <td style="color: white">Dátum a čas rezervácie: </td>
        <td><input type="datetime" name="datumAcas" placeholder="rr-mm-dd hh-mm-ss"></input></td>
        </tr>
        <tr>
            <td><input type="submit" name="submit"  value="Potvrdiť" style="margin-left: 155px"></input></td>
        </tr>
    </table>
    <?php
    echo form_close();
    ?>
</div>
</body>
</html>