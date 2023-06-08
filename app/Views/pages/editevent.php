<div class="con">
    <div class="row">
        <div id="heading">
            <form action="/pages/updateevent/<?= $dafkegModel['id']; ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <fieldset id="field">
                    <legend id="legend">
                        <h2 class="my-3">&emsp;&emsp; Formulir Ubah Kegiatan</h2>
                    </legend>
                    <label for="nama" class="label">&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;Nama Kegiatan
                        &emsp;&nbsp;&nbsp;&nbsp;:
                        &emsp;&emsp;</label>
                    <input type="text" name="nama" id="nama" <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>
                        value="<?= $dafkegModel['nama']; ?>" autofocus />
                    <div class="invalid-feedback">
                        <?= $validation->getError('nama'); ?>
                    </div><br /></br>
                    <label for="jenis" class="label">&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;Jenis Kegiatan
                        &emsp;&emsp;&nbsp;:
                        &emsp;&emsp;</label>
                    <input type="radio" name="jenis" id="seminar" value="Seminar" checked />
                    <div class="invalid-feedback">
                        <?= $validation->getError('jenis'); ?>
                    </div>
                    <label for="seminar" class="label">
                        Seminar
                    </label></br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                    &emsp;
                    &nbsp;
                    <input type="radio" name="jenis" id="webinar" value="Webinar" checked />
                    <label for="webinar" class="label">
                        Webinar
                    </label></br></br>
                    <label for="date" class="label">&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;Tanggal dan
                        Waktu&nbsp;:
                        &emsp; &emsp;</label>
                    <input type="date" name="date" id="date" <?= ($validation->hasError('date')) ? 'is-invalid' : ''; ?>
                        value="<?= $dafkegModel['date']; ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('date'); ?>
                    </div></br></br>
                    <label for="time" class="label">&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;Waktu
                        Kegiatan &emsp; &nbsp;:
                        &emsp; &emsp;</label>
                    <input type="time" name="time" id="mulai"
                        <?= ($validation->hasError('time')) ? 'is-invalid' : ''; ?>
                        value="<?= $dafkegModel['time']; ?>"><label>&emsp;-&emsp;</label>
                    <input type="time" name="time2" id="berakhir"
                        <?= ($validation->hasError('time2')) ? 'is-invalid' : ''; ?>
                        value="<?= $dafkegModel['time2']; ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('time2'); ?>
                    </div></br></br>
                    <label for="lokasi" class="label">&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;Lokasi&emsp; &emsp;&emsp;
                        &emsp;&emsp;
                        &nbsp;: &emsp;&emsp;</label>
                    <input type="text" name="lokasi" id="lokasi"
                        <?= ($validation->hasError('lokasi')) ? 'is-invalid' : ''; ?>
                        value="<?= $dafkegModel['lokasi']; ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('lokasi'); ?>
                    </div></br></br>

                    <label for="benefit" class="label">&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;Benefit&emsp;
                        &emsp;&emsp;
                        &emsp;&emsp;:&emsp;&emsp; &nbsp;</label>
                    <textarea for="text" name="benefit" id="benefit" style="width: 50%" maxlength="100" cols="45"
                        rows="5" <?= ($validation->hasError('benefit')) ? 'is-invalid' : ''; ?>
                        value="<?= $dafkegModel['benefit']; ?>"></textarea>
                    <div class="invalid-feedback">
                        <?= $validation->getError('benefit'); ?>
                    </div></br></br>

                    <label for="poster" class="label">&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;Upload Poster
                        &emsp;&nbsp;&nbsp;&nbsp;
                        : &emsp;&emsp;&nbsp;</label>
                    <input type="file" name="poster" id="poster"
                        <?= ($validation->hasError('poster')) ? 'is-invalid' : ''; ?>
                        value="<?= $dafkegModel['poster']; ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('poster'); ?>
                    </div></br></br>

                    &emsp;&emsp; &emsp; &emsp;<button type="Submit" class="btn btn-success">Change</button>
        </div>
    </div>
</div>