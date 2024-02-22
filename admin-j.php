<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Film - Admin</title>
    <link rel="stylesheet" href="./style/admin-j.css">
</head>

<body>
    <?php
    include('data-p.php');

    ?>
    <header>
        <h1>Jadwal Film - Admin</h1>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Film</th>
                    <th>Location</th>
                    <th>jam</th>
                    <th>Harga Tiket</th>
                    <th>Gambar</th>
                    <th>Action</th>
                </tr>
                <center><a class="action" href="add-film.php">+ &nbsp; Tambah film</a>
                    <center>
                        </tr>
            </thead>
            <tbody>

                <?php
                $query = "SELECT * FROM vidio ORDER BY id ASC";
                $result = mysqli_query($coon, $query);
                if (!$result) {
                    die("Query Error: " . mysqli_errno($coon) .
                        " - " . mysqli_error($coon));
                }
                $no = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $row['film']; ?></td>
                        <td><?php echo $row['location']; ?></td>
                        <td><?php echo $row['jam'];?> <?php echo $row['jam1'];?> <?php echo $row['jam2'];?></td>
                        <td>Rp <?php echo $row['harga_tiket']; ?></td>
                        <td style="text-align: center;"><img src="gambar/<?php echo $row['gambar_produk']; ?>" style="width: 120px;"></td>
                        <td><center>
                            <a class="action" href="edit-film.php?id=<?php echo $row['id']; ?>">Edit</a>
                            <a class="action" href="delete-film.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Anda yakin akan menghapus?')">Delete</a>
                            </center>
                        </td>
                    </tr>
                <?php
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </main>
    <div class="box">
        <button class="btn-bac">

        <a class="btn-back" href="admin.php">Back</a>

        </button>

    </div>
</body>

</html>