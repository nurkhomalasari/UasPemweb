<?= $this->session->flashdata('pesan'); ?>
<style>
    .thumbnail {
        text-align: center;
        padding-top: 10px;
        min-height: 400px;
        max-width: 320px;
        border-radius: 10px;
        box-shadow: 3px 5px 5px rgba(0, 0, 0, 0.2);
        transition: all 0.3s;
        margin-bottom: 20px;
        border-right: 3px solid var(--white);
        border-bottom: 3px solid var(--white);
        backdrop-filter: blur(9px);
        background: rgba(255, 255, 255, 0.3);
        cursor: pointer;
    }
    .btn .btn-outline-warning: hover {
        background: #cc8f00;
        border-color: #cc8f00;
    }
    .thumbnail:hover {
        transform: translateY(-30px);
        box-shadow: 0 1px 3px var(--info), 0 15px 5px rgba(0, 0, 0, 0.3),0px 30px rgba(0, 0, 0, 0.07);
        border-right: 3px solid var(--info);
        border-bottom: 3px solid var(--info);
    }
    .thumbnail .img-box {
        width: 180px;
        height: 200px;
        border-radius: 5px;
        overflow: hidden;
        margin: auto;
    }
    .thumbnail .img-box img {
        max-width: 100%;
        max-height: 100%;
        height: 200px;
        width: 180px;
    }
    .thumbnail .caption {
        margin-top: 10px;
        color: #000;
        text-shadow: 0 1px 2px rgba(255, 255, 255, 0.9);
    }
    .thumbnail .caption h5 {
        padding: 0 6px;
        font-size: 1.1em;
        height: 60px;
        border-bottom: 1px solid var(--white);
        overflow: hidden;
        -webkit-line-clamb: 2;
        text-overflow: ellipsis;
        max-width: 300px;
    }
    .thumbnail:hover .caption h5 {
        border-color: var(--info);
    }
    .thumbnail .caption hr {
        background: var(--white);
        box-shadow: 0 0 2px var(--white);
    }
    .thumbnail:hover .caption hr {
        background: var(--info);
        filter: blur(0.7px);
        box-shadow: 0 0 3px var(--info);
    }
    .thumbnail .caption p {
        font-size: 0.9em;
    }
    .thumbnail .caption p a {
        padding: 2px 8px; 
        font-weight: 500;
    }
    @media (max-width: 1020px) {
        .col-sm-3 {
            flex: 0 0 33.3333%;
            max-width: 33.3333%;
        }
    }
    @media  (max-width: 777px) {
        .col-sm-3 {
            flex: 0 0 50%;
            max-width: 50%;
        }
    }
    @media (max-width: 570px) {
        .col-sm-3 {
            flex: 100%;
            max-width: 100%;
        }
        .thumbnail {
            margin: 0 calc((100% - 320px)/2);
            margin-bottom: 30px;
        }
    }
</style>
<div>
    <div class="x_panel">
        <div class="x_content">
            <!-- Tampilkan semua produk -->
            <div class="row">
            <!-- looping products -->
                <?php foreach ($buku as $buku) { ?>
                    <div class="col-sm-3 mb-3">
                        <div class="thumbnail thumbnail-buku" data-link="<?= base_url('home/detailBuku/' . $buku->id); ?>">
                            <div class="img-box">
                                <img src="<?php echo base_url(); ?>assets/img/upload/<?= $buku->image; ?>" style="max-width:100%; max-height: 100%; height: 200px; width: 180px">
                            </div>
                            <div class="caption">
                                <h5><?= $buku->judul_buku ?></h5>
                                <p><?= $buku->pengarang ?></>
                                <h6><?= substr($buku->tahun_terbit, 0, 4) ?></h6>
                                <hr>
                                <p>
                                    <?php
                                    if ($buku->stok < 1) {
                                        echo "<i class='btn btn-outline-primary'><i class='fas fw fa-shopping-cart'></i> Booking&nbsp:&nbsp 0</i>";
                                    } else {
                                    echo "<a class='btn btn-outline-primary' href='" . base_url('booking/tambahBooking/' . $buku->id) . "'><i class='fas fw fa-shopping-cart'></i> Booking</a>";
                                    }
                                    ?>
                                <a class="btn btn-outline-warning" href="<?= base_url('home/detailBuku/' . $buku->id); ?>"><i class="fas fw fa-search"></i> Detail</a>
                            </p>
                            </div>
                        </div>
                    </div> 
                <?php } ?>
                <!-- End loop -->
            </div>
        </div>
    </div>
</div>
<script>
    let thumbnail_buku = document.querySelectorAll(".thumbnail-buku");

    for (let f = 0; f < thumbnail_buku.length; f++) {
        thumbnail_buku[f].addEventListener("click", function() {
            window.location.href = this.dataset.link;
            // console.log(this.dataset.link);
        });
    }
</script>