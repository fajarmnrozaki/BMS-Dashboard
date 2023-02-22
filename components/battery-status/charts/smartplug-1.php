<div class="panel panel-primary" style="height:50vh; width:90vw">
    <canvas id="myChart1"></canvas>
    <script>
        var labels = newDataset;

        var data = {
            labels: labels,
            datasets: [
                {
                    label: 'Power (W)',
                    // backgroundColor: '#FF6D28',
                    backgroundColor: '#FF6D28',
                    borderColor: '#FCE700',
                    fill: 'start',
                    data: [<?php
                            while ($b = mysqli_fetch_array($power)) {
                                echo  $b['power'] . ',';
                            }
                            ?>]
                }
            ]
        };

        var config = {
            type: 'line',
            data: data,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true
                    },
                    title: {
                        display: true,
                        text: 'Real-time Energy Monitoring'
                    }
                },
                animation: false,
                interaction: {
                    intersect: false,
                },
            }
        };

        var myChart = new Chart(
            document.getElementById('myChart1'),
            config
        );
    </script>
</div>


<!-- var data = {
            labels: labels,
            datasets: [{
                    label: 'Current (A)',
                    backgroundColor: '#EA047E',
                    borderColor: '#EA047E',
                    data: [<?php
                            while ($b = mysqli_fetch_array($current)) {
                                echo  $b['current'] . ',';
                            }
                            ?>],
                },
                {
                    label: 'Voltage (V)',
                    backgroundColor: '#FF6D28',
                    borderColor: '#FF6D28',
                    data: [<?php
                            while ($b = mysqli_fetch_array($voltage)) {
                                echo  $b['voltage'] . ',';
                            }
                            ?>],
                },
                {
                    label: 'Power (Watt)',
                    backgroundColor: '#FCE700',
                    borderColor: '#FCE700',
                    data: [<?php
                            while ($b = mysqli_fetch_array($power)) {
                                echo  $b['power'] . ',';
                            }
                            ?>],
                },
                {
                    label: 'Electricity (kWh)',
                    backgroundColor: '#00F5FF',
                    borderColor: '#00F5FF',
                    data: [<?php
                            while ($b = mysqli_fetch_array($electricity)) {
                                echo  $b['electricity'] . ',';
                            }
                            ?>],
                },
            ]
        }; -->