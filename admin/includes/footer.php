</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script src="js/dropzone.js"></script>

<script src="js/scripts.js"></script>

<script type="text/javascript">
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Views | Comments | Users | Photos', 'New Views', 'Comments', 'Users', 'Photos'],
            ['Amount', <?= $session->count; ?>, <?= Comment::count_all(); ?>, <?= User::count_all(); ?>, <?= Photo::count_all(); ?>],
        ]);

        var options = {
            chart: {
                title: 'Analytical Report',
                backgroundColor: 'transparent'
            },
            bars: 'horizontal' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
    }
</script>

</body>
</html>
