<div class="container">
    <a class="btn btn-primary" href="tambahEvent.php" role="button">Add Event</a>

    <table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Poster</th>
            <th scope="col">Jenis</th>
            <th scope="col">Nama</th>
            <th scope="col">Date</th>
            <th scope="col">Lokasi</th>
            <th scope="col">Benefit</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($event as $e) : ?>
        <tr>
            <th scope="row">1</th>
            <td><img src="/img/<?= $e['poster']; ?>" alt="" width="100"></td>
            <td><?= $e['jenis']; ?></td>
            <td><?= $e['nama']; ?></td>
            <td><?= $e['date']; ?></td>
            <td><?= $e['lokasi']; ?></td>
            <td><?= $e['benefit']; ?></td>
            <td><a href="/Pages/detailEvent/<?= $e['slug']; ?>" class="btn btn-success">Detail</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    </table>
</div>