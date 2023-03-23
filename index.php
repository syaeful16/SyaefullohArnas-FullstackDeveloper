<?php

session_start();

require_once 'Controller.php';

$_SESSION['message'] = '';
$_SESSION['status'] = '';

$user = new Controller();

if(isset($_POST['save'])) {
  $name = $_POST['name'];
  $gender = $_POST['gender'];
  $age = $_POST['age'];

  $user->insertData($name, $gender, $age);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.3/css/bulma.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bulma.min.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.2.0/chartjs-plugin-datalabels.min.js" integrity="sha512-JPcRR8yFa8mmCsfrw4TNte1ZvF1e3+1SdGMslZvmrzDYxS69J7J49vkFL8u6u8PlPJK+H3voElBtUCzaXj+6ig==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          gridTemplateColumns: {
            // Simple 16 column grid
            'dahsboard': '560px 1fr'
          },
        }
      }
    }
  </script>
</head>
<body class="w-screen h-screen relative bg-[#f5f2ee]">
  <div class="h-full grid md:grid-cols-[460px_1fr] xl:grid-cols-dahsboard 2xl:mx-[16rem]">
    <!-- input data -->
    <div class="w-full h-full bg-white flex flex-col justify-center px-[4rem]">
      <form action="" method="post" id="form-data">
        <h1 class="text-[2rem] font-bold">Input Data Teman</h1>
        <p class="text-gray-400">Input data teman kamu</p>

        <!-- input nama -->
        <div class="flex flex-col my-6">
          <label for="name" class="mb-2 text-lg">Nama</label>
          <input type="text" name="name" id="name" placeholder="Masukkan nama" class="mt-1 px-3 py-3 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1 md:text-lg" required>
        </div>
        <!-- input gender -->
        <div class="flex flex-col mb-6">
          <label for="gender" class="mb-3 text-lg">Jenis Kelamin</label>
          <div class="flex gap-4">
            <label for="male" class="cursor-pointer w-full">
              <input type="radio" name="gender" id="male" value="Laki-laki" class="peer sr-only">
              <div class="w-full rounded bg-white p-3 text-gray-600 ring-1 ring-slate-300 transition-all hover:shadow peer-checked:ring-2 peer-checked:bg-slate-100 peer-checked:text-sky-600 peer-checked:ring-blue-400 peer-checked:ring-offset-2">
                <div class="flex flex-col gap-1">
                  <div class="flex items-center justify-between">
                    <p class="text-sm font-semibold uppercase text-gray-500">Laki-Laki</p>
                    <div>
                      <svg width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="m10.6 13.8l-2.175-2.175q-.275-.275-.675-.275t-.7.3q-.275.275-.275.7q0 .425.275.7L9.9 15.9q.275.275.7.275q.425 0 .7-.275l5.675-5.675q.275-.275.275-.675t-.3-.7q-.275-.275-.7-.275q-.425 0-.7.275ZM12 22q-2.075 0-3.9-.788q-1.825-.787-3.175-2.137q-1.35-1.35-2.137-3.175Q2 14.075 2 12t.788-3.9q.787-1.825 2.137-3.175q1.35-1.35 3.175-2.138Q9.925 2 12 2t3.9.787q1.825.788 3.175 2.138q1.35 1.35 2.137 3.175Q22 9.925 22 12t-.788 3.9q-.787 1.825-2.137 3.175q-1.35 1.35-3.175 2.137Q14.075 22 12 22Z" /></svg>
                    </div>
                  </div>
                </div>
              </div>
            </label>
            <label for="female" class="cursor-pointer w-full">
              <input type="radio" name="gender" id="female" value="Perempuan" class="peer sr-only">
              <div class="w-full rounded bg-white p-3 text-gray-600 ring-1 ring-slate-300 transition-all hover:shadow peer-checked:ring-2 peer-checked:bg-slate-100 peer-checked:text-sky-600 peer-checked:ring-blue-400 peer-checked:ring-offset-2">
                <div class="flex items-center justify-between">
                  <p class="text-sm font-semibold uppercase text-gray-500">Perempuan</p>
                  <div>
                    <svg width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="m10.6 13.8l-2.175-2.175q-.275-.275-.675-.275t-.7.3q-.275.275-.275.7q0 .425.275.7L9.9 15.9q.275.275.7.275q.425 0 .7-.275l5.675-5.675q.275-.275.275-.675t-.3-.7q-.275-.275-.7-.275q-.425 0-.7.275ZM12 22q-2.075 0-3.9-.788q-1.825-.787-3.175-2.137q-1.35-1.35-2.137-3.175Q2 14.075 2 12t.788-3.9q.787-1.825 2.137-3.175q1.35-1.35 3.175-2.138Q9.925 2 12 2t3.9.787q1.825.788 3.175 2.138q1.35 1.35 2.137 3.175Q22 9.925 22 12t-.788 3.9q-.787 1.825-2.137 3.175q-1.35 1.35-3.175 2.137Q14.075 22 12 22Z" /></svg>
                  </div>
                </div>
              </div>
            </label>
          </div>
        </div>
        <!-- input age -->
        <div class="flex flex-col mb-6">
          <label for="age" class="mb-2 text-lg">Usia</label>
          <input type="text" name="age" id="age" placeholder="Masukkan usia" class="mt-1 px-3 py-3 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1 md:text-lg" required>
        </div>
        <!-- btn submit -->
        <button type="submit" name="save" class="w-full bg-[#485FC7] py-3 rounded-md text-white text-lg font-bold uppercase mt-4">Simpan</button>
      </form>
    </div>

    <!-- Dashboard -->
    <div class="w-full h-full flex flex-col bg-[#f6f6f6] p-8 gap-4">
      <div class="w-full h-auto grid grid-cols-3 gap-4">
        <div class="bg-[#f6f6f6] p-8 rounded h-full bg-white rounded-lg shadow">
          <h3 class="text-xl font-medium">Total Laki-laki</h3>
          <h1 class="text-[4rem] font-bold"><?= $user->getTotalMale(); ?></h1>
          <span class="text-[#485FC7]"><?= $user->getTotalMale(); ?> dari <?= $user->getTotalData(); ?></span>
        </div>
        <div class="bg-[#f6f6f6] p-8 rounded h-full bg-white rounded-lg shadow">
          <h3 class="text-xl font-medium">Total Perempuan</h3>
          <h1 class="text-[4rem] font-bold"><?= $user->getTotalFemale(); ?></h1>
          <span class="text-[#485FC7]"><?= $user->getTotalFemale(); ?> dari <?= $user->getTotalData(); ?></span>
        </div>
        <?php if($user->getTotalData() > 0): ?>
        <div class="w-[220px] h-[220px] bg-white p-4 rounded-lg shadow">
          <canvas id="myChart"></canvas>
        </div>
        <?php else: ?>
          <div class="w-[220px] h-[220px] bg-white p-4 rounded-lg shadow flex flex-col justify-center items-center">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="red"><path d="M1 21h22L12 2 1 21zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/></svg>
            <h1 class="text-red-800">Data Masih kosong</h1>
          </div>
        <?php endif; ?>
      </div>
      <!-- Table Data -->
      <div class="h-full w-full bg-white p-6 rounded-lg shadow">
        <div class="flex justify-between items-center mb-6">
          <h1 class="text-[2rem] font-bold text-[#485FC7]">Data Teman</h1>
          <a href="cetak.php" class="bg-[#485FC7] py-2 px-4 rounded text-white font-semibold hover:bg-[#485FC7]/90 hover:text-white">Unduh Data</a>
        </div>
        <table id="example" class="table is-striped w-full">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Jenis Kelamin</th>
              <th>Usia</th>
            </tr>            
          </thead>
          <tbody>
            <?php
            $i = 1;
            foreach($rows = $user->getAllData() as $row): 
            ?>
              <tr>
                <td><?= $i++ ?></td>
                <td><?= $row["name"]; ?></td>
                <td><?= $row["gender"]; ?></td>
                <td><?= $row["age"]; ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>

  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bulma.min.js"></script>
  <script>
    $(document).ready(function () {
        $('#example').DataTable({
          "lengthChange": false,
          "pageLength": 7
        })
    });

    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: ['Laki-laki dibawah 19', 'Laki-laki diatas 20', 'Perempuan dibawah 19', 'Perempuan diatas 20'],
        datasets: [{
          label: 'Total',
          data: [<?= $user->getMaleUnder19(); ?> , <?= (int)$user->getMaleAbove19(); ?>, <?= $user->getFemaleUnder19(); ?>, <?= $user->getFemaleAbove19(); ?>,],
          backgroundColor: [
            '#485FC7',
            '#f5891d',
            '#f14668',
            '#1b998b'
          ]
        }]
      },
      options: {
        plugins: {
          legend: {
            display: false,
            position: 'right'
          },
          datalabels: {
            color: 'white',
            formatter: ((context, args) => {
              var result = (context/<?= $user->getTotalData() ?>) * 100;
              var result = result.toFixed(1)+'%';
              return result;
            })
          }
        }
      },
      plugins: [ChartDataLabels]
    });
  </script>
</body>
</html>
