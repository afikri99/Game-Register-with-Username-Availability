<?=$this->include('common/header.php')?>
<!-- Content  -->
<section class="container py-5">
    <div class="row">
        <div class="col-lg-6">
            <div class="rounded-2 p-5" id="card-register">
                <h1 class="h1 text-white">Register Your Account</h1>
                <img src="https://csfederation.ucoz.com/portal/cspointblank/images/csflogo.png" class="img-fluid mb-3 w-75" alt="">
                <hr>
                <form action="register" method="post" id="regform">
                    <div class="row">
                        <div class="col-sm-10"><div class="form-floating mb-3">
                        <input type="text" class="form-control" name="nickname" placeholder="Nickname" id="nickname">
                        <label for="floatingInput">Nickname</label>
                    </div>
                    </div>
                        <div class="col-sm-2" id="loader" style="display:none"><img src="img/loader.svg" class="img-fluid" alt=""></div>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" name="pass" placeholder="Password" id="pass1" minlength="6">
                        <label for="floatingPassword">Password</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" name="pass2" placeholder="Confirm Password" id="pass2" minlength="6">
                        <label for="floatingPassword">Confirm Password</label>
                    </div>
                    <button type="submit" id="btn_register" name="register" class="btn btn-lg w-100 btn-danger" disabled>Register</button>
                    <label for="" id="msg"></label>
                    <label for="" id="msg2"></label>
                    <input type="text" id="website" name="website">
                </form>
                <p style="color:white"><span class="text-danger">*</span><b>Admin never asks for your password, please carefuly!</b></p>
            </div>
            <small>2023. Design by Thefik. Server Powered by <a href="https://www.sawahijau.com">Sawah Hijau CS1.6</a> </small>
        </div>
        
    </div>
</section>
<!-- End of Content -->
<?=$this->include('js/home.php')?>
<?=$this->include('common/footer.php')?>