<p>こんにちは。</p>
<p>以下はあなたのデータです。</p>

<div style="height: 450px; width: 600px;"><canvas id="myPieChart"></canvas></div>
<div style="height: 450px; width: 600px;"><canvas id="secondChart"></canvas></div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.js"></script>
<script>
    Chart.plugins.register({
        afterDatasetsDraw: function (chart, easing) {
            var ctx = chart.ctx;
            chart.data.datasets.forEach(function (dataset, i) {
                var dataSum = 0;
                dataset.data.forEach(function (element){
                    dataSum += Number(element);
                });

                var meta = chart.getDatasetMeta(i);
                if (!meta.hidden) {
                    meta.data.forEach(function (element, index) {
                        ctx.fillStyle = 'rgb(0, 0, 0)';

                        var fontSize = 16;
                        var fontStyle = 'normal';
                        var fontFamily = 'Helvetica Neue';
                        ctx.font = Chart.helpers.fontString(fontSize, fontStyle, fontFamily);

                        var labelString = chart.data.labels[index];
                        var dataString = (Math.round(dataset.data[index] / dataSum * 1000)/10).toString() + "%";

                        ctx.textAlign = 'center';
                        ctx.textBaseline = 'middle';

                        var padding = 5;
                        var position = element.tooltipPosition();
                        ctx.fillText(dataString, position.x, position.y - (fontSize / 2) - padding);
                    });
                }
            });
        }
    });

    //1つ目のグラフ
    var ctx = document.getElementById("myPieChart");
    var myPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: <?php echo json_encode(@$in_category); ?>,
            datasets: [{
                backgroundColor: <?php echo json_encode(@$in_color) ?>,
                data: <?php echo json_encode(@$income); ?>
            }]
        },
        options: {
            title: {
                display: true,
                text: ["今月のあなたの収入", "<?php echo @array_sum($income); ?>円"]
            }
        }
    });


    //2つ目のグラフ
    var cty = document.getElementById('secondChart');
    var secondChart = new Chart(cty, {
        type: 'pie',
        data: {
            labels: <?php echo json_encode(@$out_category); ?>,
            datasets: [{
                backgroundColor: <?php echo json_encode(@$out_color); ?>,
                data: <?php echo json_encode(@$outcome); ?>
            }]
        },
        options: {
            title: {
                display: true,
                text: ["今月のあなたの出費", "<?php echo @array_sum($outcome) ?>円"]
            }
        }
    });
</script>