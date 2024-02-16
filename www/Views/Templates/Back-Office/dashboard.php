<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <!-- Lien vers votre CSS principal -->
    <link rel="stylesheet" href="../../../Front-end/Workspace/dist/css/backoffice.css">
</head>
<body>

<section class="dashboard-container">

    <h1>Dashboard</h1>

    <!-- Section Dataviz avec amCharts -->
    <div id="chartdiv" style="height: 500px;"></div>

    <!-- Section Titre du Tableau de Données -->
    <h1>Tableau de données</h1>

    <!-- Section Tableau de Données avec Datatable -->
    <table id="example" class="display" style="width:100%">
        <thead>
        <tr>
            <th>Colonne 1</th>
            <th>Colonne 2</th>
            <th>Colonne 3</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Donnée 1-1</td>
            <td>Donnée 1-2</td>
            <td>Donnée 1-3</td>
        </tr>
        <tr>
            <td>Donnée 2-1</td>
            <td>Donnée 2-2</td>
            <td>Donnée 2-3</td>
        </tr>
        </tbody>
    </table>

</section>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script>
    // Initialisation de TinyMCE
    tinymce.init({ selector: '#myeditor' });

    // Initialisation de DataTables
    $(document).ready(function() {
        $('#example').DataTable();
    });

    // Initialisation de amCharts (Exemple de graphique simple)
    am4core.ready(function() {
        var chart = am4core.create("chartdiv", am4charts.XYChart);
        chart.paddingRight = 20;

        var data = [];
        var visits = 10;
        for (var i = 1; i < 366; i++) {
            visits += Math.round((Math.random()<0.5?1:-1)*Math.random()*10);
            data.push({ date: new Date(2021, 0, i), name: "name"+i, value: visits });
        }

        chart.data = data;

        var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
        dateAxis.renderer.grid.template.location = 0;

        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
        valueAxis.tooltip.disabled = true;
        valueAxis.renderer.minWidth = 35;

        var series = chart.series.push(new am4charts.LineSeries());
        series.dataFields.dateX = "date";
        series.dataFields.valueY = "value";

        series.tooltipText = "{valueY.value}";
        chart.cursor = new am4charts.XYCursor();

        var scrollbarX = new am4charts.XYChartScrollbar();
        scrollbarX.series.push(series);
        chart.scrollbarX = scrollbarX;

        this.chart = chart;
    });
</script>

</body>
</html>
