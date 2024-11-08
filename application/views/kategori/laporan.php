<main>
    <div class="container-fluid px-4">
        <h1 class="nt-4"></h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="<?php echo site_url('user') ?>">Dashboard</a></li>
            <li class="breadcrumb-item active"><?php echo $title ?></li>
        </ol>
        <div class="card mb-4">

            <div class="card-header">

            </div>
            <div class="card-body">
                <div class="card mb-4">
                    <div class="card-body">
                        <form class="form-horizontal" method="post" action="<?php echo base_url('report/kategorikustom') ?>" target="_blank">
                            <div class="mb-3">
                                <label for="exampleinputemail1" class="form-label">Klik tombol berikut untuk mencetak laporan <b>kategori</b>.</label>
                            </div>
                            <button type="submit" class="btn btn-dark">Cetak Laporan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>