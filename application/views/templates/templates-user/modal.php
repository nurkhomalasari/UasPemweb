<!-- login modal -->
<style>
    .modal-footer {
        border-color: #feebdd;
    }
    .modal-content {
        box-shadow: 0 0px 5px rgba(255, 255, 255, 0.5);
        background: var(--white);
    }
    .modal-header {
        color: var(--light);
        background: var(--danger);
        text-transform: uppercase;
    }
    .modal-header button span{
        color: #fff;
    }
    .modal-header button:focus {
        border: none;
        outline: none;
    }
    .modal-footer .btn.btn-outline-pink {
        background: #feebdd;
        color: #cc0a53;
    }
    .modal-footer .btn.btn-outline-pink:hover {
        background: #ffc0cb;
    }
    .input-box:not(.daftar) {
        position: relative;
        height: 60px;
        margin: 20px 0;
        padding: 0 20px;
    }
    .input-box input {
        width: 100%;
        height: 100%;
        border-radius: 6px;
        outline: none;
        border: 1px solid #b79999;
        padding-left: 20px;
    }
    .input-box input:focus,
    .input-box input:valid {
        border: 2px solid #ff0000;
        background: #fff !important;
    }
    .input-box:not(.daftar) label {
        left: 35px;
    }
    .input-box.daftar label {
        left: 15px;
    }
    .input-box label,
    .input-box i {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        color: #a6a6a6;
    }
    .input-box i:hover {
        opacity: 0.8;
    }
    .input-box:not(.daftar) i {
        right: 35px;
    }
    .input-box.daftar i {
        right: 15px;
    }
    .input-box i {
        cursor: pointer;
    }
    .input-box label {
        white-space: nowrap;
        transition: all .4s ease;
        padding: 0 5px;
    }
    .input-box input:valid ~ label,
    .input-box input:focus ~ label {
        top: 0;
        color: var(--danger);
        background: #fff;
        font-size: 13px;
    }
    .input-box input:focus ~ i,
    .input-box input:focus ~ i {
        color: #f572a9;
    }
    .input-box.daftar {
        position: relative;
        height: 50px;
        margin-bottom: 20px;
    }
</style>
<div class="modal fade" tabindex="-1" id="loginModal" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Login user</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('member'); ?>" method="post">
                <div class="modal-body">
                    <div class="input-box">
                        <input type="text" id="email" name="email" required>
                        <label for="email">Alamat Email</label>
                    </div>
                    <div class="input-box" style="margin-top:3em;">
                        <input type="password" id="password" name="password" required>
                        <label for="password">Password</label>
                        <i class="fas fw fa-eye-slash show-pass"></i>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-pink" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-danger">Log in</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- login modal -->
<!-- daftar modal -->
<div class="modal fade" tabindex="-1" id="daftarModal" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Daftar Anggota</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('member/daftar'); ?>" method="post">
                <div class="modal-body" style="padding-bottom: 0;">
                    <div class="input-box daftar">
                        <input type="text" id="nama" name="nama" required>
                        <label for="nama">Masukan Nama</label>
                    </div>
                    <div class="input-box daftar">
                        <input type="text" id="alamat" name="alamat" required>
                        <label for="alamat">Masukan Alamat</label>
                    </div>
                    <div class="input-box daftar">
                        <input type="text" id="newEmail" name="email" required>
                        <label for="newEmail">Masukan Email</label>
                    </div>
                    <div class="input-box daftar">
                        <input type="password" id="password1" name="password1" required>
                        <label for="password1">Masukan Password</label>
                    </div>
                    <div class="input-box daftar">
                        <input type="password" id="password2" name="password2" required>
                        <label for="password2">Konfirmasi password</label>
                        <i class="fas fw fa-eye-slash show-pass"></i>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-pink" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-danger">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--/end of Modal Daftar -->
<!-- modal info-->
<div class="modal fade" tabindex="-1" id="modalinfo" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Informasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <span class="alert alert-message alert-success">Waktu Pengambilan Buku 1x24 jam dari Booking!!!</span>
            </div>
            <div class="modal-footer">
                <a class="btn btn-outline-info" href="<?= base_url(); ?>">Ok</a>
            </div>
        </div>
    </div>
</div>
<!--/modal info -->