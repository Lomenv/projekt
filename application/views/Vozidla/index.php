<body id="podstranky">


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.15/datatables.min.css"/>



<br /> <br /> <br /> <br /> <br /> <br /> <br />

<table id="usertable" style="width: 100%"  bgcolor="#f05f40" >

    <thead>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;


        }
        th, td {
            padding: 5px;
            text-align: center;
        }
    </style>
    <tr>
        <th>Cislo vozidla</th>
        <th>Znacka</th>
        <th>Model</th>
        <th>Pocet miest</th>
        <th>SPZ</th>
        <th>Farba</th>
        <th>Dostupnost</th>

    </tr>

    </thead>

    <tbody>

    <?php foreach ($vozidla as $vozidla_item): ?>
        <tr style="color: #0b0b0b; background: white;">
            <td><?php echo $vozidla_item['idAuto']; ?></td>
            <td><?php echo $vozidla_item['znacka']; ?></td>
            <td><?php echo $vozidla_item['model']; ?></td>
            <td><?php echo $vozidla_item['SPZ']; ?></td>
            <td><?php echo $vozidla_item['pocetMiest']; ?></td>
            <td><?php echo $vozidla_item['farba']; ?></td>
            <td><?php echo $vozidla_item['dostupnost']; ?></td>

        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<table class="table table-striped" align="center">
    <?php foreach ($vozidla as $vozidla_item): ?>
        <tr style="color: #0b0b0b; background: white;">
        <td><?php echo $vozidla_item['idAuto']; ?></td>
        <td><?php echo $vozidla_item['znacka']; ?></td>
        <td><?php echo $vozidla_item['model']; ?></td>
        <td><?php echo $vozidla_item['pocetMiest']; ?></td>
        <td><?php echo $vozidla_item['SPZ']; ?></td>
        <td><?php echo $vozidla_item['farba']; ?></td>
        <td><?php echo $vozidla_item['dostupnost']; ?></td>
        <td>
        <a class="viewbutton" href="<?php echo site_url('vozidla/view/'.$vozidla_item['idAuto']); ?>">View </a>
        <?php
        if (isset($_SESSION['userId']) and $_SESSION['userId']!=''): ?>
            <a class="editbutton" href="<?php echo site_url('vozidla/edit/'.$vozidla_item['idAuto']); ?>">Edit </a>
            <a class="deletebutton" href="<?php echo site_url('vozidla/delete/'.$vozidla_item['idAuto']); ?>
    "onclick="return confirm('Are you sure you want to delete?')">Delete</a>
            </td>
            </tr>
        <?php endif; ?>
    <?php endforeach; ?>
</table>

<br /> <br /> <br />

<style>
    .button {
        background-color: #f05f40;
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
        background-color: red;
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
        background-color: green;
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
        background-color: blue;
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
            <input type="submit" class="button" value="ADD VEHICLE" />
        </form>
    </div>
<?php endif; ?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="../../dist/js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>




<script type="text/javascript">$(document).ready(function () { $('#usertable').DataTable({
        "ajax": {url : "<?php echo site_url("vozidla/vozidla_page")?>",type : 'GET'},

    });
    });</script>

<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.15/datatables.min.js"></script>

</body>