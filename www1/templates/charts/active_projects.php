<div class="col-md-12">
    <section class="panel">
        <header class="panel-heading">
            Active Projects
        </header>
        <div class="panel-body">
            <div id="active_projects" style="width: 100%; height: 400px"></div>
        </div>
    </section>
</div>
<script type="text/javascript">
    $ = jQuery.noConflict();
    $(document).ready(function () {
        var count = <?php echo count($stats['data']); ?>;
        $("#active_projects").height(30 * count + 60);
        $.plot($("#active_projects"), [ {
                data: [
                    <?php foreach($stats['data'] as $k => $v): ?>
                    [<?php echo $v; ?>,<?php echo $k; ?>]<?php if($k != count($stats['data']) - 1) echo ','; ?>
                    <?php endforeach; ?>,

                ],
                color: '#F06262',
                bars: {
                    show: true,
                    barWidth: 0.8,
                    fillColor: '#F28D8D',
                    highlightColor: '#F28D8D',
                    horizontal: true
                }
            }],
            {
                yaxis: {
                    color: 'white',
                    ticks: [
                        <?php foreach($stats['ticks'] as $k => $v): ?>
                        [<?php echo $k; ?>, '<?php echo $v; ?>']<?php if($k != count($stats['ticks']) - 1) echo ','; ?>
                        <?php endforeach; ?>
                    ]

                },
                xasis: {
                    color: 'white',
//                    max: 20

                }
            });
        var xaxisLabel = $("<div class='axisLabel xaxisLabel'></div>")
            .text("Hours")
            .appendTo($("#active_projects"));
        xaxisLabel.css("top", $("#active_projects").height() - 40);
    });
</script>