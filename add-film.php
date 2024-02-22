<?php
include('data-p.php');

?>
<!DOCTYPE html>
<html>

<head>
    <title>Document</title>
    <link rel="stylesheet" href="./style//add-film.css">
</head>

<body>
    <center>
        <h1>Tambah Film</h1>
        <center>
            <form method="POST" action="data-add.php" enctype="multipart/form-data">
                <section class="base">
                    <div>
                        <label>Nama Film</label>
                        <input type="text" name="film" autofocus="" required="" />
                    </div>
                    <div>
                        <label>Location</label>
                        <input type="text" name="location" />
                    </div>
                    <div>
                        <label>Jam 1</label>
                        <input type="text" name="jam" required="" />
                    </div>
                    <div>
                        <label>Jamn2</label>
                        <input type="text" name="jam1"/>
                    </div>
                    <div>
                        <label>Jam 3</label>
                        <input type="text" name="jam2"/>
                    </div>
                    <div>
                        <label>Harga tiket</label>
                        <input type="text" name="harga_tiket" required="" />
                    </div>
                    <div>
                        <label>Film</label>
                        <input type="file" name="gambar_produk" required="" />
                    </div>
                    <div>
                        <button type="submit">Simpan</button>
                    </div>
                </section>
            </form>
</body>

</html>