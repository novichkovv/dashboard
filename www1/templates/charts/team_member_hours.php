<div class="col-md-12">
    <section class="panel">
        <header class="panel-heading">
            Team Member Hours
        </header>
        <div class="panel-body">
            <div id="team_member_hours" style="width:100% ;height:400px; background-color: rgba(115, 193, 255, 0.11)"></div>
        </div>
    </section>
</div>
<script type="text/javascript">
    $ = jQuery.noConflict();
    $(document).ready(function () {
        var count = <?php echo count($stats['data']); ?>;
        $("#team_member_hours").height(30 * count + 60);
        $.plot($("#team_member_hours"), [ {
                data: [
                    <?php foreach($stats['data'] as $k => $v): ?>
                    [<?php echo $v; ?>,<?php echo $k; ?>]<?php if($k != count($stats['data']) - 1) echo ','; ?>
                    <?php endforeach; ?>,

                ],
                color: '#78A8FF',
                bars: {
                    show: true,
                    barWidth: 0.8,
                    fillColor: 'rgba(143, 198, 242, 0.7)',
                    highlightColor: '#CCE8E2',
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
            .appendTo($("#team_member_hours"));
        xaxisLabel.css("top", $("#team_member_hours").height() - 40);
    });
</script>