<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Register</title>
    <link rel="stylesheet" href="<?= base_url() ?>assets/auth/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/auth/css/fontawesome.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/auth/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/auth/style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
  <script src="https://apis.google.com/js/api:client.js"></script>
    <style type="text/css">
    #customBtn {
      display: inline-block;
      background: white;
      color: #444;
      width: 190px;
      border-radius: 5px;
      border: thin solid #888;
      box-shadow: 1px 1px 1px grey;
      white-space: nowrap;
    }
    #customBtn:hover {
      cursor: pointer;
    }
    span.label {
      font-family: serif;
      font-weight: normal;
    }
    span.icon {
      background: url('<?=base_url('assets/image/')?>g-normal.png') transparent 5px 50% no-repeat;
      display: inline-block;
      vertical-align: middle;
      width: 42px;
      height: 42px;
    }
    span.buttonText {
      display: inline-block;
      vertical-align: middle;
      padding-left: 42px;
      padding-right: 42px;
      font-size: 14px;
      font-weight: bold;
      /* Use the Roboto font that is loaded in the <head> */
      font-family: 'Roboto', sans-serif;
    }
  </style>
</head>

<body>

    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <div class="loginbox pb-4 px-3">
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <h1>Register</h1>
                            <p class="account-subtitle">Chat Dosen</p>
                            <?php echo $this->session->flashdata('message'); ?>
                            <form action="<?= base_url('register') ?>" method="post">
                            <div class="form-group">
                                    <label class="form-control-label">Nama</label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Universitas</label>
                                    <input type="text" name="university" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Email</label>
                                    <input type="email" name="email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Password</label>
                                    <div class="pass-group">
                                        <input type="password" name="password" class="form-control pass-input">
                                        <span class="fas fa-eye toggle-password"></span>
                                    </div>
                                </div>
                               
                                <p>Sudah Punya Akun? <a href="<?= base_url('login') ?>" class="text-primary">Masuk Sekarang</a></p>
                                <button name="register" class="btn btn-lg btn-block btn-primary w-100 mt-2" type="submit">Daftar</button>
                                <div id="gSignInWrapper" class="mt-3">
                                    <span class="label">Sign up with:</span>
                                    <a href="<?=$auth_url?>" id="customBtn" class="customGPlusSignIn">
                                        <span class="icon"></span>
                                        <span class="buttonText">Google</span>
                                    </a>
                                </div>
                                <div id="name"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="<?= base_url() ?>assets/auth/jquery-3.6.0.min.js"></script>

    <script src="<?= base_url() ?>assets/auth/bootstrap.bundle.min.js"></script>

    <script src="<?= base_url() ?>assets/auth/feather.min.js"></script>

    <script src="<?= base_url() ?>assets/auth/script.js"></script>
</body>

</html>