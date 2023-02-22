<div class="panel panel-primary" style="height:50vh; width:90vw">
    <canvas id="myChart8"></canvas>
    <script>
        labels = newDataset

        data = {
            labels: labels,
            datasets: [
                {
                    label: 'Power (W)',
                    backgroundColor: '#FF6D28',
                    borderColor: '#FCE700',
                    data: [<?php
                            while ($b = mysqli_fetch_array($power)) {
                                echo  $b['power'] . ',';
                            }
                            ?>]
                }
            ]
        };

        config = {
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
                        text: 'Realtime Energy Monitoring'
                    }
                },
                animation: false,
                interaction: {
                    intersect: false,
                },
            }
        };

        myChart = new Chart(
            document.getElementById('myChart8'),
            config
        );
    </script>
</div>