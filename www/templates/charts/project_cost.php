<div class="col-md-12">
    <section class="panel">
        <header class="panel-heading">
            Project Cost
        </header>
        <div class="panel-body">
            <div class="col-md-12">
                <section class="panel general">
                    <header class="panel-heading tab-bg-dark-navy-blue">
                        <ul class="nav nav-tabs">
                            <?php $i = 0; ?>
                            <?php foreach($stats as $project => $v): ?>
                                <li<?php if($i == 0) echo ' class="active"'; ?>>
                                    <a data-toggle="tab" href="#cost_tab_<?php echo $i; ?>">
                                        <?php echo $project; ?>
                                    </a>
                                </li>
                                <?php $i ++; ?>
                            <?php endforeach; ?>
                        </ul>
                    </header>
                    <div class="panel-body">
                        <div class="tab-content">
                            <?php $i = 0; ?>
                            <?php foreach($stats as $project => $v): ?>
                                <div class="tab-pane<?php if($i == 0) echo ' active'; ?>" id="cost_tab_<?php echo $i; ?>">
                                    <div id="cost_<?php echo $i; ?>" style="width: 100%; height: 400px"></div>
                                </div>
                                <?php $i ++; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
</div>
<script type="text/javascript">
    $ = jQuery.noConflict();
    $(document).ready(function () {
        <?php $stat = $stats[array_keys($stats)[0]]; ?>
        $.plot($("#cost_0"), [ {
                data: [
                    <?php foreach($stat['data'] as $k => $v): ?>
                    [<?php echo $v; ?>,<?php echo $k; ?>]<?php if($k != count($stat['data']) - 1) echo ','; ?>
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
                        <?php foreach($stat['ticks'] as $k => $v): ?>
                        [<?php echo $k; ?>, '<?php echo $v; ?>']<?php if($k != count($stat['ticks']) - 1) echo ','; ?>
                        <?php endforeach; ?>
                    ]

                },
                xasis: {
                    color: 'white',
//                    max: 20

                }
            }
        );
        <?php $i = 1; ?>
        <?php foreach($stats as $stat): ?>
        $("[href='#cost_tab_<?php echo $i; ?>']").click(function()
        {
            setTimeout(function()
            {
                $.plot($("#cost_<?php echo $i; ?>"), [ {
                        data: [
                            <?php foreach($stat['data'] as $k => $v): ?>
                            [<?php echo $v; ?>,<?php echo $k; ?>]<?php if($k != count($stat['data']) - 1) echo ','; ?>
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
                                <?php foreach($stat['ticks'] as $k => $v): ?>
                                [<?php echo $k; ?>, '<?php echo $v; ?>']<?php if($k != count($stat['ticks']) - 1) echo ','; ?>
                                <?php endforeach; ?>
                            ]

                        },
                        xasis: {
                            color: 'white',
//                    max: 20

                        }
                    }
                );
            }, 200);
        });

        <?php $i++; ?>
        <?php endforeach; ?>

    });
</script>