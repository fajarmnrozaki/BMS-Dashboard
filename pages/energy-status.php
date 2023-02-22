<div id="battery-status" class="tabcontent" style="display:block;">
    <div class="panel">
        <div class="panel-container-item" id="electricity"></div>
        <div class="kwh panel-container-item" id="kwh"></div>
        <div class="cost panel-container-item" id="cost"></div>
        <div class="carbon panel-container-item" id="carbon"></div>
        <div class="status panel-container-item" id="status"></div>
    </div>
    <div class="title-chart-section">
        <div class="battery-options">
            <!-- <h5>Smartplug</h5> -->
            <select class="batt-toggle" data-target=".chart-section">
                <option value="Batt-1" selected data-show=".Batt-1">Smart Plug - 1</option>
                <option value="Batt-2" data-show=".Batt-2">Smart Plug - 2</option>
                <option value="Batt-3" data-show=".Batt-3">Smart Plug - 3</option>
                <option value="Batt-4" data-show=".Batt-4">Smart Plug - 4</option>
                <option value="Batt-5" data-show=".Batt-5">Smart Plug - 5</option>
                <option value="Batt-6" data-show=".Batt-6">Smart Plug - 6</option>
                <option value="Batt-7" data-show=".Batt-7">Smart Plug - 7</option>
                <option value="Batt-8" data-show=".Batt-8">Smart Plug - 8</option>
            </select>
        </div>
    </div>
    <div class="chart-section">
        <div class="Batt-1" id="responsecontainer1"></div>
        <div class="Batt-2 hide" id="responsecontainer2"></div>
        <div class="Batt-3 hide" id="responsecontainer3"></div>
        <div class="Batt-4 hide" id="responsecontainer4"></div>
        <div class="Batt-5 hide" id="responsecontainer5"></div>
        <div class="Batt-6 hide" id="responsecontainer6"></div>
        <div class="Batt-7 hide" id="responsecontainer7"></div>
        <div class="Batt-8 hide" id="responsecontainer8"></div>
        <script>
            var refreshId = setInterval(function() {
                // $('#responsecontainer1').load('./data/ultrasonic.php');
                $('#responsecontainer1').load('./data/smartplug-1.php');
                $('#responsecontainer2').load('./data/smartplug-2.php');
                $('#responsecontainer3').load('./data/smartplug-3.php');
                $('#responsecontainer4').load('./data/smartplug-4.php');
                $('#responsecontainer5').load('./data/smartplug-5.php');
                $('#responsecontainer6').load('./data/smartplug-6.php');
                $('#responsecontainer7').load('./data/smartplug-7.php');
                $('#responsecontainer8').load('./data/smartplug-8.php');

                $('#electricity').load('./components/battery-status/electricity-component.php');
                $('#kwh').load('./components/battery-status/kwh-component.php');
                $('#cost').load('./components/battery-status/cost-electricity-component.php');
                $('#carbon').load('./components/battery-status/carbon-component.php');
                $('#status').load('./components/battery-status/status-component.php');
            }, 5000);
        </script>
        <!-- SCRIPT SECTION -->
        <script>
            $(document).on('change', '.batt-toggle', function() {
                var target = $(this).data('target');
                var show = $("option:selected", this).data('show');
                $(target).children().addClass('hide');
                $(show).removeClass('hide');
            });
            $(document).ready(function() {
                $('.batt-toggle').trigger('change');
            });
        </script>
    </div>
</div>