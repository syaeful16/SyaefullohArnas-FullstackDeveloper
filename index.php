<?php

session_start();

require_once 'Controller.php';

$_SESSION['message'] = '';
$_SESSION['status'] = '';

$user = new Controller();

// $new->insertData('Saya', 'P', 23);

// $data = $new->getAllData();

// foreach ($data as $d) {
//   echo $d;
// }
if(isset($_POST['save'])) {
  $name = $_POST['name'];
  $gender = $_POST['gender'];
  $age = $_POST['age'];

  $user->insertData($name, $gender, $age);
  header("Refresh:5");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
<body class="w-screen h-screen bg-slate-100 py-20 relative">
  <?php if($_SESSION['status'] === 'success'): ?>
    <div class="bg-green-100 absolute top-10 left-0 py-4 px-16 transform translate-y-full transition-transform duration-500 rounded shadow ring-2 ring-green-300">
      <!-- <h1 class=""><?= $_SESSION['message'] ?></h1> -->
      <h1 class="text-lg font-medium">Berhasil</h1>
      <p>Data Anda berhasil ditambahkan</p>
    </div>
  <?php endif; ?>

  <div class="h-full grid grid-cols-dahsboard 2xl:mx-[16rem] rounded-lg shadow-lg bg-[#f5f5f5]">
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
        <button type="submit" name="save" class="w-full bg-slate-800 py-3 rounded-md text-white text-lg font-bold uppercase mt-4">Simpan</button>
      </form>
    </div>

    <!-- Dashboard -->
    <div class="w-full max-h-full bg-[#f6f6f6] p-8">
      <div class="w-full h-auto bg-white rounded-lg shadow grid grid-cols-[300px_1fr] gap-10 p-6">
        <div class="flex flex-col gap-4">
          <div class="bg-[#f6f6f6] py-4 px-8 rounded h-full">
            <h3>Total Laki-laki</h3>
            <h1 class="text-2xl"><?= $user->getTotalMale(); ?></h1>
          </div>
          <div class="bg-blue-100 py-4 px-8 rounded h-full">
            <h3>Total Perempuan</h3>
            <h1 class="text-2xl"><?= $user->getTotalMale(); ?></h1>
          </div>
        </div>
        <div class="w-[240px] h-[240px]">
          <canvas id="myChart"></canvas>
        </div>
      </div>
      <div class="w-full bg-blue-200"></div>
    </div>

  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
      type: 'doughnut',
      data: {
        // labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
          label: '1 of Votes',
          data: [12, 19, 3, 5],
        }]
      },
      options: {
        scales: {
          // y: {
          //   beginAtZero: true
          // }
        },
        legend: {
                display: true,
                labels: {
                    color: 'rgb(255, 99, 132)'
                }
            }
      }
    });
  </script>
</body>
</html>
