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
    <tr>
        <th>Číslo rezervácie</th>
        <th>Dátum a čas</th>

    </tr>

    </thead>

    <tbody>

    <?php foreach ($rezervacka as $rezervacka_item): ?>
        <tr style="color: #0b0b0b; background: white;">
            <td><?php echo $rezervacka_item['idRezervacia']; ?></td>
            <td><?php echo $rezervacka_item['datumAcas']; ?></td>

        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<table class="table table-striped" align="center">
    <?php foreach ($rezervacka as $rezervacka_item): ?>
        <tr style="color: #0b0b0b; background: white;">
        <td><?php echo $rezervacka_item['idRezervacia']; ?></td>
        <td><?php echo $rezervacka_item['datumAcas']; ?></td>
        <td>
        <a class="viewbutton" href="<?php echo site_url('rezervacia/view/'.$rezervacka_item['idRezervacia']); ?>">View </a>
        <?php
        if (isset($_SESSION['userId']) and $_SESSION['userId']!=''): ?>
            <a class="editbutton" href="<?php echo site_url('rezervacia/edit/'.$rezervacka_item['idRezervacia']); ?>">Edit </a>
            <a class="deletebutton" href="<?php echo site_url('rezervacia/delete/'.$rezervacka_item['idRezervacia']); ?>
    "onclick="return confirm('Are you sure you want to delete?')">Delete</a>
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
        <form action="<?php echo site_url('rezervacia/insert/'); ?>">
            <input type="submit" class="button" value="Vytvoriť rezerváciu" />
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
        "ajax": {url : "<?php echo site_url("rezervacia/rezervacia_page")?>",type : 'GET'},
    });
    });</script>
