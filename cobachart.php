<?php
require_once 'connect.php';
require_once 'functions.php';


$pengeluaran = mysqli_query($conn, "SELECT * FROM pengeluaran WHERE id_User = $iduser");
$total = 0;
foreach ($pengeluaran as $row){
    $total = $total + $row['Jumlah_Barang'] * $row['Harga_Barang'];
}
echo $total;

;
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
</head>

<body>

    <!-- <div class="chartMenu w-600 h-10 bg-slate-800 text-read-600 ">
        <p>coba CHARTJS</p>
    </div>
    <div class="chartCard w-600 h-10 bg-slate-800 text-read-600">
        <div class="chartBox w-600 p-4 rounded-lg border-4 border-indigo-600">
            <canvas id="myChart"></canvas>
        </div> -->
    <!-- </div> -->
    <div class="w shadow-lg rounded-lg overflow-hidden">
        <div class="py-3 px-5 bg-gray-50">Bar chart</div>
        <canvas class="p-10" id="chartBar"></canvas>
    </div>

    <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
    const ctx = document.getElementById('chartBar');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    </script> -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Chart bar -->
    <script>
        const labelsBarChart = [
            "total", "pendapatan", "pengeluaran",
        ];
        const dataBarChart = {
            labels: labelsBarChart,
            datasets: [{
                label: "My First dataset",
                backgroundColor: "hsl(252, 82.9%, 67.8%)",
                borderColor: "hsl(252, 82.9%, 67.8%)",
                data: [<?php echo $total;?> ],
            },],
        };

        const configBarChart = {
            type: "bar",
            data: dataBarChart,
            options: {},
        };

        var chartBar = new Chart(
            document.getElementById("chartBar"),
            configBarChart
        );
    </script>
</body>

</html>