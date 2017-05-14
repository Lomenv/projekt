

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
        <th>Číslo pracovnej zmeny</th>
        <th>Číslo pracovníka</th>
        <th>Číslo zmeny</th>


    </tr>

    </thead>

    <tbody>

    <?php foreach ($zmenyprac as $zmenaprac_item): ?>
        <tr style="color: #0b0b0b; background: white;">
            <td><?php echo $zmenaprac_item['idZmenyPrac']; ?></td>
            <td><?php echo $zmenaprac_item['idTaxikar']; ?></td>
            <td><?php echo $zmenaprac_item['idZmena']; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<table class="table table-striped" align="center">
    <?php foreach ($zmenyprac as $zmenaprac_item): ?>
        <tr style="color: #0b0b0b; background: white;">
        <td><?php echo $zmenaprac_item['idZmenyPrac']; ?></td>
        <td><?php echo $zmenaprac_item['idTaxikar']; ?></td>
        <td><?php echo $zmenaprac_item['idZmena']; ?></td>
        <td>
        <a class="viewbutton" href="<?php echo site_url('zmeny/view/'. $zmenaprac_item['idZmenyPrac']); ?>">View </a>
        <?php
        if (isset($_SESSION['userId']) and $_SESSION['userId']!=''): ?>
            <a class="editbutton" href="<?php echo site_url('zmeny/edit/'. $zmenaprac_item['idZmenyPrac']); ?>">Edit </a>
            <a class="deletebutton" href="<?php echo site_url('zmeny/delete/'. $zmenaprac_item['idZmenyPrac']); ?>
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
        <form action="<?php echo site_url('zmeny/insert/'); ?>">
            <input type="submit" class="button" value="Vložiť zmenu" />
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
        "ajax": {url : "<?php echo site_url("zmeny/zmena_page")?>",type : 'GET'},
    });
    });</script>
