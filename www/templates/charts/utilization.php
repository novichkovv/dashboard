<div class="col-md-12">
    <section class="panel">
        <header class="panel-heading">
            Utilization In Office
        </header>
        <div class="panel-body">
            <div id="utilization" style="width: 100%; height: 400px"></div>
        </div>
    </section>
</div>
<script type="text/javascript">
    $ = jQuery.noConflict();
    $(document).ready(function () {
        $.plot($("#utilization"), [ {
                data: [
                    <?php foreach($stats['data'] as $k => $v): ?>
                    [<?php echo $v; ?>,<?php echo $k; ?>]<?php if($k != count($stats['data']) - 1) echo ','; ?>
                    <?php endforeach; ?>,

                ],
                color: '#EBEB56',
                bars: {
                    show: true,
                    barWidth: 0.8,
                    fillColor: '#FFFF98',
                    highlightColor: '#FFFF98',
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
                }
            });
    });
</script>