<div id="appCapsule">
    <form action="" id="update" method="POST">
        <div class="section mt-3 text-center">
            <div class="avatar-section">
                <a href="#">'
                    <?php if ($user['login_type'] == 'google') { ?>
                        <img src="<?= $user['image'] ?>" alt="image" class="imaged w100 rounded">
                    <?php } else { ?>
                        <img src="<?= base_url('upload/profile/' . $user['image']) ?>" alt="image" class="imaged w100 rounded">';
                    <?php } ?>
                </a>
            </div>
        </div>

        <div class="section mt-2 mb-2">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <form action="<?=base_url('profile')?>" method="post">
                        <div class="section-title">Profil</div>
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group boxed">
                                    <div class="input-wrapper">
                                        <label class="label" for="name">Full Name</label>
                                        <input type="text" class="form-control" id="name" name="name" value="<?= $user['full_name'] ?>" required>
                                        <i class="clear-input">
                                            <ion-icon name="close-circle"></ion-icon>
                                        </i>
                                    </div>
                                </div>
                                <div class="form-group boxed">
                                    <div class="input-wrapper">
                                        <label class="label" for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" value="<?= $user['email'] ?>" required>
                                        <i class="clear-input">
                                            <ion-icon name="close-circle"></ion-icon>
                                        </i>
                                    </div>
                                </div>
                                <div class="form-group boxed">
                                    <div class="input-wrapper">
                                        <label class="label" for="university">University</label>
                                        <input type="text" class="form-control" id="university" name="university" value="<?= $user['university'] ?>" required>
                                        <i class="clear-input">
                                            <ion-icon name="close-circle"></ion-icon>
                                        </i>
                                    </div>
                                </div>
                                <hr>
                                <button type="submit" class="btn btn-danger mr-1 btn-lg btn-block btn-profile">Update</button>


                            </div>
                        </div>
                        </form>
                    </div>
    <div class="col-12 col-md-6">
        <div class="section-title">Update Password</div>
        <form action="<?= base_url('update_password') ?>" method="post">
        <div class="card">
            <div class="card-body">
                <?php if ($user['password'] !== null) { ?>
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="label" for="current_password">Current Password</label>
                            <input type="password" class="form-control" id="current_password" name="current_password" required>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>
                <?php } ?>
                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <label class="label" for="new_password">New Password</label>
                        <input type="password" class="form-control" id="new_password" name="new_password" required>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                </div>
                <hr>
                <button type="submit" class="btn btn-danger mr-1 btn-lg btn-block btn-profile">Update</button>
            </div>
        </div>
        </form>
    </div>
</div>
</div>


</div>
</div>