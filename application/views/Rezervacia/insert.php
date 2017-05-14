<html>

<body>

<div id="container" align="center" style="color: white;">
    <?php echo form_open('Rezervacia/insert'); ?>
    <h1>Vytvoriť rezerváciu:</h1><hr/>
    <table>

        <td>Dátum a čas rezervácie: </td>
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