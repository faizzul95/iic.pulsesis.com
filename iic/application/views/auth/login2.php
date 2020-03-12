<!DOCTYPE html>
<html lang="en">
<!-- begin::Head -->

<head>
    <meta charset="utf-8" />

    <title>Metronic | Login Page 2</title>
    <meta name="description" content="Login page example">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--begin::Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">
    <!--end::Fonts -->

    <!--begin::Page Custom Styles(used by this page) -->
    <link href="<?= base_url(); ?>/vendor/assets/css/pages/login/login-2.css" rel="stylesheet" type="text/css" />
    <!--end::Page Custom Styles -->

    <!--begin::Global Theme Styles(used by all pages) -->
    <link href="<?= base_url(); ?>/vendor/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>/vendor/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles -->

    <!--begin::Layout Skins(used by all pages) -->
    <!--end::Layout Skins -->

    <link rel="shortcut icon" href="<?= base_url(); ?>/vendor/assets/media/logos/favicon.ico" />
</head>
<!-- end::Head -->

<!-- begin::Body -->

<body class="kt-page--loading-enabled kt-page--loading kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header--minimize-menu kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--left kt-aside--fixed kt-page--loading">

    <!-- begin::Page loader -->

    <!-- end::Page Loader -->
    <!-- begin:: Page -->
    <div class="kt-grid kt-grid--ver kt-grid--root kt-page">
        <div class="kt-grid kt-grid--hor kt-grid--root kt-login kt-login--v2 kt-login--signin" id="kt_login">
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" style="background-image: url(<?= base_url(); ?>/vendor/assets/media/bg/bg-1.jpg);">
                <div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
                    <div class="kt-login__container">
                        <div class="kt-login__logo">
                            <a href="#">
                                <img src="<?= base_url(); ?>/vendor/iic_logo_blank.png" class="img-fluid" style="width: 100%">
                            </a>
                        </div>
                        <div class="kt-login__signin">
                            <div class="kt-login__head">
                                <!-- <h3 class="kt-login__title">Sign In To System</h3> -->
                            </div>
                            <?php
		                        if($this->session->flashdata('login_error_message')){
		                            ?>
		                            <div class="alert alert-danger" style="margin-top:25px;">
		                                <!-- <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> -->
		                                <?php echo $this->session->flashdata('login_error_message'); ?> 
		                             </div>
		                            <?php
		                        }
		                    ?>
                            <form class="kt-form" id="loginform" action="<?php echo site_url('auth/checkAuthorization');?>" method="post">
                                <div class="input-group">
                                    <input class="form-control" type="text" placeholder="User ID" name="username" autocomplete="off">
                                </div>
                                <?php echo form_error('username') ?>

                                <div class="input-group">
                                    <input class="form-control" type="password" placeholder="Password" name="password">
                                </div>
                               	<?php echo form_error('password') ?>
                                <div class="row kt-login__extra">
                                    <div class="col">
                                        <label class="kt-checkbox">
                                            <input type="checkbox" name="remember"> Remember me
                                            <span></span>
                                        </label>
                                    </div>
                                    <div class="col kt-align-right">
                                        <a href="javascript:;" id="kt_login_forgot" class="kt-link kt-login__link">Forget Password ?</a>
                                    </div>
                                </div>
                                <div class="kt-login__actions">
                                    <button  type="submit" id="kt_login_signin_submit" class="btn btn-pill kt-login__btn-primary">Sign In</button>
                                </div>
                            </form>
                        </div>
                        <div class="kt-login__forgot">
                            <div class="kt-login__head">
                                <h3 class="kt-login__title">Forgotten Password ?</h3>
                                <div class="kt-login__desc">Enter your email to reset your password:</div>
                            </div>
                            <form class="kt-form" action="">
                                <div class="input-group">
                                    <input class="form-control" type="text" placeholder="Email" name="email" id="kt_email" autocomplete="off">
                                </div>
                                <div class="kt-login__actions">
                                    <button id="kt_login_forgot_submit" class="btn btn-pill kt-login__btn-primary">Request</button>&nbsp;&nbsp;
                                    <button id="kt_login_forgot_cancel" class="btn btn-pill kt-login__btn-secondary">Cancel</button>
                                </div>
                            </form>
                        </div>
                        <div class="kt-login__account">
                            <span class="kt-login__account-msg">
						Don't have an account yet ?
					</span>&nbsp;&nbsp;
                            <a href="javascript:;" id="kt_login_signup" class="kt-link kt-link--light kt-login__account-link">Sign Up</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- end:: Page -->

    <!-- begin::Global Config(global config for global JS sciprts) -->
    <script>
        var KTAppOptions = {
            "colors": {
                "state": {
                    "brand": "#591df1",
                    "light": "#ffffff",
                    "dark": "#282a3c",
                    "primary": "#5867dd",
                    "success": "#34bfa3",
                    "info": "#36a3f7",
                    "warning": "#ffb822",
                    "danger": "#fd3995"
                },
                "base": {
                    "label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
                    "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
                }
            }
        };
    </script>
    <!-- end::Global Config -->

    <!--begin::Global Theme Bundle(used by all pages) -->
    <script src="<?= base_url(); ?>/vendor/assets/plugins/global/plugins.bundle.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>/vendor/assets/js/scripts.bundle.js" type="text/javascript"></script>
    <!--end::Global Theme Bundle -->

    <!--begin::Page Scripts(used by this page) -->
    <!-- <script src="<?= base_url(); ?>/vendor/assets/js/pages/custom/login/login-general.js" type="text/javascript"></script> -->
    <!--end::Page Scripts -->
</body>
<!-- end::Body -->

</html>