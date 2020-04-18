<!DOCTYPE html>
<html lang ="en">
<head>

<?php $this->load->view('header'); ?>

</head>
<body>

<div id="loading">
    <div class="spinner">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
    </div>
</div>

<style type="text/css">

    html,body {
        height: 100%;
        background: #fff;
        overflow: hidden;
    }

</style>


<script type="text/javascript" src="<?php echo base_url();?>assets/widgets/wow/wow.js"></script>
<script type="text/javascript">
    /* WOW animations */

    wow = new WOW({
        animateClass: 'animated',
        offset: 100
    });
    wow.init();
</script>


<img  src="<?php echo base_url();?>assets/images/kantor-pusat-alfamart.jpg" class="login-img wow fadeIn" alt="" />

<div class="center-vertical">
    <div class="center-content">
    <h3 class="text-center pad25B font-gray text-transform-upr font-size-23">Web Admin <span class="opacity-80">v1.0</span></h3>
            <h5 class="text-center font-red"><?php echo $warning ?></h5>
        <div class="col-md-3 center-margin">
            <form method="post" action="<?php echo base_url('Login/login_proses'); ?>">
                <div class="content-box wow bounceInDown modal-content">
                    <h3 class="content-box-header content-box-header-alt bg-default">
                        <span class="icon-separator">
                            <i class="glyph-icon icon-cog"></i>
                        </span>
                        <span class="header-wrapper">
                            Members area
                            <small>Login to your account.</small>
                        </span>
                        <span class="header-buttons">
                            <a href="#" class="btn btn-sm btn-primary" title="">Sign Up</a>
                        </span>
                    </h3>
                    <div class="content-box-wrapper">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" name="user" class="form-control" id="idlogin" placeholder="Nama Pengguna">
                                <span class="input-group-addon bg-blue">
                                    <i class="glyph-icon icon-envelope-o"></i>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="password" name="password" class="form-control" id="idpassword" placeholder="Kata Kunci">
                                <span class="input-group-addon bg-blue">
                                    <i class="glyph-icon icon-unlock-alt"></i>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <a href="" title="Recover password">Forgot Your Password?</a>
                        </div>
                        <button class="btn btn-success btn-block">Sign In</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
</div>
<div class="hero-overlay hero-dark"></div>
<div class="hero-pattern pattern-bg-2"></div>
<?php $this->load->view('footer'); ?>     
</body>
</html>