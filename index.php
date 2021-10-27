<?php 
    $barang = [
        [
            'nama'  => 'Mangga',
            'satuan' => 'kg', 'berat' => 2, 'stok' => 3
        ] ,
        [
            'nama'  => 'Kacang Tanah',
            'satuan' => 'gram', 'berat' => 1000, 'stok' => 5
        ] ,
        [
            'nama'  => 'Beras',
            'satuan' => 'liter', 'berat' => 3, 'stok' => 0
        ] ,
        [
            'nama'  => 'Sawi',
            'satuan' => 'gram', 'berat' => 500, 'stok' => 0
        ] ,
        [
            'nama'  => 'Jeruk',
            'satuan' => 'kg', 'berat' => 1, 'stok' => 10
        ] ,
        [
            'nama'  => 'Aqua',
            'satuan' => 'liter', 'berat' => 1.5, 'stok' => 7
        ] ,
        [
            'nama'  => 'Bayam',
            'satuan' => 'gram', 'berat' => 900, 'stok' => 0
        ] ,
        [
            'nama'  => 'Apel',
            'satuan' => 'kg', 'berat' => 2, 'stok' => 12
        ] ,
    ];
    
        foreach ($barang as $b) {
            $b_nama = $b['nama'];
            $b_value = $b['berat'];
            $b_stok = $b['stok'];
            switch ($b['satuan']) {
                case "kg":
                    $item ['nama'][] = $b_nama;
                    $item ['kg'][] = $b_value; 
                    $item ['gram'][] = ($b_value*1000);
                    $item ['mg'][] = ($b_value*1000000);
                    $item ['liter'][] = $b_value;
                    $item ['stok'][] = $b_stok;
                  break;
                case "gram":
                    $item ['nama'][] = $b_nama;
                    $item ['kg'][] = ($b_value/1000);
                    $item ['gram'][] = $b_value;
                    $item ['mg'][] = ($b_value*1000);
                    $item ['liter'][] = ($b_value/1000);
                    $item ['stok'][] = $b_stok;
                  break;
                case "mg":
                    $item ['nama'][] = $b_nama;
                    $item ['kg'][] = ($b_value/1000000);
                    $item ['gram'][] = ($b_value/1000);
                    $item ['mg'][] = ($b_value);
                    $item ['liter'][] = ($b_value/1000000);
                    $item ['stok'][] = $b_stok;
                  break;
                case "liter":
                    $item ['nama'][] = $b_nama;
                    $item ['kg'][] = "-";
                    $item ['gram'][] = "-";
                    $item ['mg'][] = "-";
                    $item ['liter'][] = $b_value;
                    $item ['stok'][] = $b_stok;
                  break;
                default:
                  break;
              }
        }
        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Warung Pak Joy</title>
</head>
<body>
    <div class="jumbotron">
        <div class="logo">
            <h1>Warung Pak Joy</h1>
        </div>
    </div>

    <div class="container">
    <input type="text" id="search" placeholder="masukkan keyword">
    <button for="search">Search</button>
    <h1>Tabel Konversi Barang</h1>
    <table border="1" cellspacing="1" cellpadding="5">
        <thead>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Berat (kg)</th>
            <th>Berat (gram)</th>
            <th>Berat (miligram)</th>
            <th>Berat (liter)</th>
            <th>Stok Barang</th>
        </thead>
        <tbody>
            <?php for ($num = 0; $num < count($item['nama']); $num++) : ?>
            <tr>
                <th > <?= $num+1; ?> </th>
                <td> <?= $item['nama'][$num]; ?> </td>
                <td> <?= $item['kg'][$num]; ?> </td>
                <td> <?= $item['gram'][$num]; ?> </td>
                <td> <?= $item['mg'][$num]; ?> </td>
                <td> <?= $item['liter'][$num]; ?> </td>
                <?php if ($item['stok'][$num] == 0) : ?>
                    <td class="kosong">kosong</td>
                <?php else : ?>
                    <td> <?= $item['stok'][$num]; ?> </td>
                <?php endif; ?>
            </tr>
            <?php endfor; ?>
        </tbody>
    </table>
    </div>
</body>
</html>