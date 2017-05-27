<body class="container" id="podstranky">
<br /> <br />

<table id="usertable" style="width: 100%;  bgcolor=white;" >

    <thead>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            background: #faffff;

        }
        th, td {
            padding: 5px;
            text-align: center;
        }
    </style>
    <br/>
    <tr>
        <th>Číslo vozidla</th>
        <th>Značka</th>
        <th>Model</th>
        <th>Počet miest</th>
        <th>SPŽ</th>
        <th>Farba</th>
        <th>Dostupnosť</th>

    </tr>

    </thead>

    <tbody>

    <?php foreach ($auto as $auto_item): ?>
        <tr style="color: #0b0b0b; background: white;">
            <td><?php echo $auto_item['idAuto']; ?></td>
            <td><?php echo $auto_item['znacka']; ?></td>
            <td><?php echo $auto_item['model']; ?></td>
            <td><?php echo $auto_item['pocetMiest']; ?></td>
            <td><?php echo $auto_item['SPZ']; ?></td>
            <td><?php echo $auto_item['farba']; ?></td>
            <td><?php echo $auto_item['dostupnost']; ?></td>

        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<table class="table table-striped" align="center">
    <?php foreach ($auto as $auto_item): ?>
        <tr style="color: #0b0b0b; background: white;">
        <td><?php echo $auto_item['idAuto']; ?></td>
        <td><?php echo $auto_item['znacka']; ?></td>
        <td><?php echo $auto_item['model']; ?></td>
        <td><?php echo $auto_item['pocetMiest']; ?></td>
        <td><?php echo $auto_item['SPZ']; ?></td>
        <td><?php echo $auto_item['farba']; ?></td>
        <td><?php echo $auto_item['dostupnost']; ?></td>
        <td>
        <a class="viewbutton" href="<?php echo site_url('vozidla/view/'.$auto_item['idAuto']); ?>">Pozrieť </a>
        <?php
        if (isset($_SESSION['userId']) and $_SESSION['userId']!=''): ?>
            <a class="editbutton" href="<?php echo site_url('vozidla/edit/'.$auto_item['idAuto']); ?>">Editovať </a>
            <a class="deletebutton" href="<?php echo site_url('vozidla/delete/'.$auto_item['idAuto']); ?>
    "onclick="return confirm('Urcite chcete vymazat?')">Vymazať</a>
            </td>
            </tr>
        <?php endif; ?>
    <?php endforeach; ?>
</table>

<br /> <br /> <br />

<style>
    .button {
        background-color: cornflowerblue;
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
    }

    .deletebutton {
        background-color: darkmagenta;
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
    }
    .editbutton {
        background-color: cyan;
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
    }
    .viewbutton {
        background-color: yellowgreen;
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
    }


</style>
<?php
if (isset($_SESSION['userId']) and $_SESSION['userId']!=''): ?>
    <div align="center">
        <form action="<?php echo site_url('vozidla/insert/'); ?>">
            <input type="submit" class="button" value="Pridaj vozidlo" />
        </form>
    </div>
<?php endif; ?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="../../dist/js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>


</body>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.15/datatables.min.js"></script>

<script type="text/javascript">$(document).ready(function () { $('#usertable').DataTable({
        "ajax": {url : "<?php echo site_url("vozidla/vozidla_page")?>",type : 'GET'},
    });
    });</script>
