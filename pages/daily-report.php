<?php
include('./database/config.php');

$upper1  = mysqli_query($connect, 'SELECT id,time,voltage,current,power,electricity,day,week,month FROM tuya_smart_plug_1 WHERE voltage IS NOT NULL ORDER BY id DESC LIMIT 50 ');
$under1 = mysqli_query($connect, 'SELECT total_electricity,total_cost,carbon_emission FROM tuya_smart_plug_1 WHERE total_electricity IS NOT NULL ORDER BY id DESC LIMIT 50');

$upper2 = mysqli_query($connect, 'SELECT id,time,voltage,current,power,electricity,day,week,month FROM tuya_smart_plug_2 WHERE voltage IS NOT NULL ORDER BY id DESC LIMIT 50');
$under2 = mysqli_query($connect, 'SELECT total_electricity,total_cost,carbon_emission FROM tuya_smart_plug_2 WHERE total_electricity IS NOT NULL ORDER BY id DESC LIMIT 50');

?>

<!-- <center>
  <a target="_blank" href="./components/export_excel.php">EXPORT KE EXCEL</a>
  <a target="_blank" href="./components/export_csv.php">EXPORT KE CSV</a>
</center> -->
<div id="daily-report" class="tabcontent" style="display:none;">
  <div class="title-table-section">
    <div class="battery-options">
      <select class="batt-toggle" data-target=".table-section">
        <option value="Batt-1" selected data-show=".Batt-1">Smartplug - 1</option>
        <option value="Batt-2" data-show=".Batt-2">Smartplug - 2</option>
        <option value="Batt-3" data-show=".Batt-3">Smartplug - 3</option>
        <option value="Batt-4" data-show=".Batt-4">Smartplug - 4</option>
        <option value="Batt-5" data-show=".Batt-5">Smartplug - 5</option>
        <option value="Batt-6" data-show=".Batt-6">Smartplug - 6</option>
        <option value="Batt-7" data-show=".Batt-7">Smartplug - 7</option>
        <option value="Batt-8" data-show=".Batt-8">Smartplug - 8</option>
      </select>
    </div>
  </div>
  <section class="container">
    <div class="panel">
      <div class="body">
        <div class="input-group">
          <label for="searchBox">Search</label>
          <input type="search" id="searchBox" placeholder="Search By Value">
        </div>
      </div>
    </div>
    <form method='post' action='export_csv.php'>
      <input type='submit' value='Export' name='Export'>
      <table id="table" class="myTable table hover">
        <thead>
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
        </thead>
        <tbody id="theData">
        </tbody>
      </table>
      </table>
      <?php
      $serialize_user_arr = serialize($upperata_arr);
      ?>
      <textarea name='export_data'><?php echo $serialize_user_arr; ?></textarea>
  </section>
</div>

<script>
  var dataUpper = [];
  var dataUnder = [];
  let fusionData = []

  var dataUpper1 = [];
  var dataUnder1 = [];

  var dataUpper2 = [];
  var dataUnder2 = [];
</script>

<?php
$user_arr = array();
while ($upper = mysqli_fetch_assoc($upper1)) {
  $data_upper[] = array($upper['id'], $upper['time'], $upper['voltage'], $upper['current'], $upper['power'], $upper['electricity'], $upper['day'], $upper['week'], $upper['month'])
?>
  <script>
    dataUpper1.push([<?php echo $upper['id']; ?>, <?php echo '"' . $upper['time'] . '"'; ?>, <?php echo $upper['voltage']; ?>, <?php echo $upper['current']; ?>, <?php echo $upper['power']; ?>, <?php echo $upper['electricity']; ?>, <?php echo $upper['day']; ?>, <?php echo $upper['week']; ?>, <?php echo $upper['month']; ?>])
  </script>
<?php
}
?>

<?php
while ($under = mysqli_fetch_assoc($under1)) {
  $data_under[]=array($under['total_electricity'], $under['total_cost'], $under['carbon_emission'])
?>
  <script>
    dataUnder1.push([<?php echo $under['total_electricity']; ?>, <?php echo '"' . $under['total_cost'] . '"'; ?>, <?php echo $under['carbon_emission']; ?>])
  </script>
<?php
}
?>

<?php
while ($upper = mysqli_fetch_assoc($upper2)) {
?>
  <script>
    dataUpper2.push([<?php echo $upper['id']; ?>, <?php echo '"' . $upper['time'] . '"'; ?>, <?php echo $upper['voltage']; ?>, <?php echo $upper['current']; ?>, <?php echo $upper['power']; ?>, <?php echo $upper['electricity']; ?>, <?php echo $upper['day']; ?>, <?php echo $upper['week']; ?>, <?php echo $upper['month']; ?>])
  </script>
<?php
}
?>

<?php
while ($under = mysqli_fetch_assoc($under2)) {
?>
  <script>
    dataUnder2.push([<?php echo $under['total_electricity']; ?>, <?php echo '"' . $under['total_cost'] . '"'; ?>, <?php echo $under['carbon_emission']; ?>])
  </script>
<?php
}
?>


<script>
  var battStatus

  if (document.getElementById("theData").childElementCount == 0) {
    tableRender(dataUpper1, dataUnder1)
  }

  $('select').on('change', function() {
    battStatus = this.value
    if (battStatus == 'Batt-1') {
      tableRender(dataUpper1, dataUnder1)
    } else if (battStatus == 'Batt-2') {
      tableRender(dataUpper2, dataUnder2)
    }
  });


  function tableRender(dataUpper, dataUnder) {
    if (!document.getElementById("theData")) {
      var tableBodyMaker = document.createElement('tbody');
      tableBodyMaker.id = "theData"
      document.getElementById("table").appendChild(tableBodyMaker)
    }
    document.getElementById("theData").innerHTML = ""

    if (fusionData.length > 0) {
      fusionData = []
    }

    dataUpper.map((value, index) => {
      fusionData.push(value.concat(dataUnder[index]))
    })
    var tableData = "";
    fusionData.forEach(data => {
      tableData += "<tr>";
      tableData += `<td>${data[0]}</td>`
      tableData += `<td>${data[1]}</td>`
      tableData += `<td>${data[2]}</td>`
      tableData += `<td>${data[3]}</td>`
      tableData += `<td>${data[4]}</td>`
      tableData += `<td>${data[5]}</td>`
      tableData += `<td>${data[6]}</td>`
      tableData += `<td>${data[7]}</td>`
      tableData += `<td>${data[8]}</td>`
      tableData += `<td>${data[9]}</td>`
      tableData += `<td>${data[10]}</td>`
      tableData += `<td>${data[11]}</td>`
      tableData += "</tr>"
    });
    document.getElementById("theData").innerHTML = tableData;

    // console.log(tableData);
    // console.log("2222", document.getElementById("table").innerHTML)

    let options = {
      numberPerPage: 10, //Cantidad de datos por pagina
      goBar: true, //Barra donde puedes digitar el numero de la pagina al que quiere ir
      pageCounter: true, //Contador de paginas, en cual estas, de cuantas paginas
    };

    let filterOptions = {
      el: '#searchBox' //Caja de texto para filtrar, puede ser una clase o un ID
    };


    // window.paginate = lignePaginate();
    paginate.init('.myTable', options, filterOptions);
  }
</script>