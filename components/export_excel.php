<!-- 
<body>
    <style type="text/css">
        body {
            font-family: sans-serif;
        }

        table {
            margin: 20px auto;
            border-collapse: collapse;
        }

        table th,
        table td {
            border: 1px solid #3c3c3c;
            padding: 3px 8px;

        }

        a {
            background: blue;
            color: #fff;
            padding: 8px 10px;
            text-decoration: none;
            border-radius: 2px;
        }
    </style>

    <?php
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Data COBA.xls");
    ?>

    <center>
        <h1>Export Data Ke Excel Dengan PHP <br /> www.malasngoding.com</h1>
    </center>

    <table border="1">
        <tr>
            <th>id</th>
            <th>Time</th>
            <th>Voltage</th>
            <th>Current</th>
            <th>Power</th>
            <th>Electricity</th>
            <th>Day</th>
            <th>Week</th>
            <th>Month</th>
            <th>Total Electricity</th>
            <th>Total Cost</th>
            <th>Carbon Emission</th>
        </tr>
        <?php
        // koneksi database
        $koneksi = mysqli_connect("localhost", "root", "", "monitoring");

        // menampilkan data pegawai
        $data = mysqli_query($koneksi, "select * from tuya_smart_plug_1");
        while ($d = mysqli_fetch_array($data)) {
        ?>
            <tr>
                <td><?php echo $d['id']; ?></td>
                <td><?php echo $d['time']; ?></td>
                <td><?php echo $d['voltage']; ?></td>
                <td><?php echo $d['current']; ?></td>
                <td><?php echo $d['power']; ?></td>
                <td><?php echo $d['electricity']; ?></td>
                <td><?php echo $d['day']; ?></td>
                <td><?php echo $d['week']; ?></td>
                <td><?php echo $d['month']; ?></td>
                <td><?php echo $d['total_electricity']; ?></td>
                <td><?php echo $d['total_cost']; ?></td>
                <td><?php echo $d['carbon_emission']; ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html> -->