<!DOCTYPE html>
<head>
    <br /> <br /> <br />
    <h1> Najdrahšie jazdy </h1>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

    <script type="text/javascript">


        google.charts.load('current', {'packages':['corechart']});


        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var jsonData = $.ajax({
                url: "<?php echo base_url() . 'index.php/Graf/getdata' ?>",
                dataType: "json",
                async: false
            }).responseText;


            var data = new google.visualization.DataTable(jsonData);
            var options = {
                width: 900, height: 500,
                backgroundColor: "transparent",
                legend: {textStyle: {color: 'white'}},
                series: {textStyle: {color: 'white'} },
                series: { 0: { color: '00FFFF', pointSize: 5, lineWidth: 4 }},
                hAxis: {textStyle: {color: 'white'}},
                vAxis: {textStyle: {color: 'white'}}
            }

            var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));

            chart.draw(data, options);
        }

    </script>
    <style>
        h1 {
            text-align: center;
            color:#00FFFF;
        }
    </style>


    <script type="text/javascript">


        google.charts.load('current', {'packages':['corechart']});


        google.charts.setOnLoadCallback(drawChart2);

        function drawChart2() {
            var jsonData = $.ajax({
                url: "<?php echo base_url() . 'index.php/Graf/getdata2' ?>",
                dataType: "json",
                async: false
            }).responseText;


            var data = new google.visualization.DataTable(jsonData);
            var options = {
                width: 900, height: 500,
                backgroundColor: "transparent",
                legend: {textStyle: {color: 'white'}},
                series: {textStyle: {color: 'white'} },
                series: { 0: { color: '00FFFF', pointSize: 5, lineWidth: 4 }},
                hAxis: {textStyle: {color: 'white'}},
                vAxis: {textStyle: {color: 'white'}}
            }

            var chart = new google.visualization.ColumnChart(document.getElementById('chart_div2'));

            chart.draw(data, options);
        }

    </script>





</head>


<body>

<div id="chart_div" align="center" style="background-color: rgba(0, 0, 0, 0.5); color: white;"></div>
<h1> Autá a ich počet miest</h1>
<br />
<div style="background-color: rgba(0, 0, 0, 0.5); color: white;">
    <div id="chart_div2" align="center" ></div>
</div>
</body>