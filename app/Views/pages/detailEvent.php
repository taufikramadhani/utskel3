<div class="container">
    <div class="row">
        <div class="col">
          <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="/img/<?= $event['poster']; ?>" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title"><?= $event['nama']; ?></h5>
                  <p class="card-text">Jenis: <?= $event['jenis']; ?></p>
                  <p class="card-text"><small class="text-body-secondary">Lokasi: <?= $event['lokasi']; ?></small></p>
                  <a href="/Pages/event">Kembali</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>