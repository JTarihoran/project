<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pertemuan 3 - Data Anggota</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            background: #f9f9f9;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background: #fff;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th {
            background: #007BFF;
            color: white;
            text-transform: uppercase;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>

    <h1>Data Anggota</h1>
    <form action="<?= site_url('welcome/tambah')?>" method="post">
        <input type="text" name="NIM" placeholder="Masukkan NIM Anda" required>
        <input type="text" name="Nama" placeholder="Masukkan Nama Anda" required>
        <input type="text" name="Offering" placeholder="Masukkan Offering Anda" required>
        <button type="submit">SIMPAN</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Offering</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($data)): ?>
                <?php $no = 1; foreach ($data as $row): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= htmlspecialchars($row->NIM, ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars($row->Nama, ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars($row->Offering, ENT_QUOTES, 'UTF-8') ?></td>
                        <td>
                            <form action="<?= site_url('welcome/hapus/'.$row->NIM )?>" method="post" onsubmit ="return confirm('Yakin Hapus?');">
                                <button type="submit" style= "background-color:red;">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">Tidak ada data anggota.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</body>
</html>
