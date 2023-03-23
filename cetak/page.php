<?php 

require_once '../Controller.php';

$user = new Controller();

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <style>

    table {
      width: 100%;
      border-collapse: collapse;
    }

    table thead {
      background-color: #485FC7;
    }

    thead tr th {
      color: white;
    }

    th, td {
      text-align: left;
      padding: 8px;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #485FC7;
      color: white;
    }

    tr:nth-child(even) {
      background-color: #f5f5f5;
    }

  </style>
</head>
<body>
  <h1 class="text-center pb-5">Data Teman</h1>
  <table class="table">
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>