
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="an onymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="an onymous"></script>
<script src="<?= base_url(); ?>assets/user/js/bootstrap.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
<script>
$('.alert').alert().delay(3000).slideUp('slow');
</script>
<script>
    let showPw = document.querySelectorAll(".input-box .show-pass");
    const pass = document.querySelector("#password");
    const createPw = document.querySelector("#password1");
    const confirmPw = document.querySelector("#password2");
    
    for(let d = 0; d < showPw.length; d++){
        showPw[d].onclick = function() {
            if (pass.type == "password" || (createPw.type == "password" & confirmPw.type == "password")) {
                pass.type = "text";
                createPw.type = "text";
                confirmPw.type = "text";
                showPw[d].classList.replace("fa-eye-slash", "fa-eye");
            } else {
                pass.type = "password";
                createPw.type = "password";
                confirmPw.type = "password";
                showPw[d].classList.replace("fa-eye", "fa-eye-slash");
            }
        }
    }
</script>
</body>
</html>