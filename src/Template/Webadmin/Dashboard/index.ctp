<?php
/**
 * App\src\Template\Webadmin\Dashboard\index.ctp
 * Don't Remove this signature if you love code 
 * Code For Easy
 * =================================================================
 * Author   : Ardiansyah Iqbal
 * Email    : aiqbalsyah@gmail.com
 * Github   : aiqbalsyah
 */
?>
<!--Begin::Main Portlet-->
<div class="kt-portlet">
    <div class="kt-portlet__body  ">
        <div class="row kt-row--no-padding kt-row--col-separator-xl">
        <div class="col-xl-12">
            <h5>SELAMAT DATANG DI:</h5>
            <h3><?=$defaultAppSettings['App.Name'];?> </h3><br>
            <p>
                <b>Anda login sebagai</b> : <?=$userData->name;?><br>
                <b>Username</b> :  <?=$userData->username;?> <br>
                <b>Email</b> : <?=$userData->email;?><br>
                <b>Group</b> : <?=$userData->user_group->name;?>
            </p>
            <p>
                <?=$userData->user_group->descriptions;?>
            </p>

        </div>
        </div>
    </div>
</div>
<!--End::Main Portlet-->
<?php if($analytic_view):?>
<div class="row">
    <div class="col-xl-4 col-md-6">
		<!--begin:: Widgets/Profit Share-->
        <div class="kt-portlet kt-portlet--height-fluid">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Users & Visitors
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <ul class="nav nav-pills nav-pills-sm nav-pills-label nav-pills-bold">
                        <li class="nav-item">
                            <a class="nav-link active" href="#" >
                                Last Month
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div id="kt_chart_user_visitor" style="height: 300px; width: 100%;"></div>
            </div>
        </div>		
        <!--end:: Widgets/Profit Share-->    
    </div>
    <div class="col-xl-8 col-md-6">
		<!--begin:: Widgets/Profit Share-->
        <div class="kt-portlet kt-portlet--height-fluid">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Browsers
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <ul class="nav nav-pills nav-pills-sm nav-pills-label nav-pills-bold">
                        <li class="nav-item">
                            <a class="nav-link active" href="#" >
                                Last Month
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div id="kt_chart_user_browser" style="height: 300px; width: 100%;"></div>
            </div>
        </div>		
        <!--end:: Widgets/Profit Share-->    
    </div>
</div>
<?php endif;?>

<?php $this->start('script');?>
    <script src="https://www.amcharts.com/lib/4/core.js"></script>
    <script src="https://www.amcharts.com/lib/4/charts.js"></script>
    <script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>
    <script>
        if($("#kt_chart_user_visitor").length > 0){
            // Themes begin
            am4core.useTheme(am4themes_animated);
            // Themes end

            // Create chart instance
            var chart = am4core.create("kt_chart_user_visitor", am4charts.PieChart);

            // Add and configure Series
            var pieSeries = chart.series.push(new am4charts.PieSeries());
            pieSeries.dataFields.value = "litres";
            pieSeries.dataFields.category = "country";

            // Let's cut a hole in our Pie chart the size of 30% the radius
            chart.innerRadius = am4core.percent(30);

            // Put a thick white border around each Slice
            pieSeries.slices.template.stroke = am4core.color("#fff");
            pieSeries.slices.template.strokeWidth = 2;
            pieSeries.slices.template.strokeOpacity = 1;
            pieSeries.slices.template
            .cursorOverStyle = [
                {
                    "property": "cursor",
                    "value": "pointer"
                }
            ];
            var shadow = pieSeries.slices.template.filters.push(new am4core.DropShadowFilter);
            shadow.opacity = 0;

            // Create hover state
            var hoverState = pieSeries.slices.template.states.getKey("hover");
            var hoverShadow = hoverState.filters.push(new am4core.DropShadowFilter);
            hoverShadow.opacity = 0.7;
            hoverShadow.blur = 5;

            chart.legend = new am4charts.Legend();

            chart.data = [
                {
                    "country": "Users",
                    "litres": <?=$analytic_result['ga_user']['user_lama'];?>
                },{
                    "country": "Visitor",
                    "litres": <?=$analytic_result['ga_user']['user_baru'];?>
                }
            ];
        }
        if($("#kt_chart_user_browser").length > 0){
            // Create chart instance
            var chartBrowser = am4core.create("kt_chart_user_browser", am4charts.XYChart3D);
            chartBrowser.paddingBottom = 30;
            chartBrowser.angle = 35;

            // Add data
            chartBrowser.data = [
                <?php foreach($analytic_result['ga_browser'] as $key => $r):?>
                    {
                        "country": "<?=$r['name'];?>",
                        "visits": <?=$r['count'];?>
                    },
                <?php endforeach;?>
            ];

            // Create axes
            var categoryAxisBrowser = chartBrowser.xAxes.push(new am4charts.CategoryAxis());
            categoryAxisBrowser.dataFields.category = "country";
            categoryAxisBrowser.renderer.grid.template.location = 0;
            categoryAxisBrowser.renderer.minGridDistance = 20;
            categoryAxisBrowser.renderer.inside = true;
            // categoryAxisBrowser.renderer.grid.template.disabled = true;

            let labelTemplateBrowser = categoryAxisBrowser.renderer.labels.template;
            labelTemplateBrowser.rotation = -90;
            labelTemplateBrowser.horizontalCenter = "left";
            labelTemplateBrowser.verticalCenter = "middle";
            labelTemplateBrowser.dy = -20; // moves it a bit down;
            labelTemplateBrowser.inside = false; // this is done to avoid settings which are not suitable when label is rotated

            var valueAxisBrowser = chartBrowser.yAxes.push(new am4charts.ValueAxis());
            // valueAxisBrowser.renderer.grid.template.disabled = true;

            // Create series
            var seriesBrowser = chartBrowser.series.push(new am4charts.ColumnSeries());
            seriesBrowser.dataFields.valueY = "visits";
            seriesBrowser.dataFields.categoryX = "country";
            seriesBrowser.columns.template.tooltipText = "{categoryX}: [bold]{valueY}[/]";

            var columnTemplateBrowser = seriesBrowser.columns.template;
            columnTemplateBrowser.adapter.add("fill", (fill, target) => {
                return chartBrowser.colors.getIndex(target.dataItem.index);
            })

            columnTemplateBrowser.adapter.add("stroke", (stroke, target) => {
                return chartBrowser.colors.getIndex(target.dataItem.index);
            })
        }
    </script>
<?php $this->end();?>