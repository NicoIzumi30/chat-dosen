<div id="appCapsule">
        <!-- Wallet Card -->
        <div class="section wallet-card-section pt-1">
            <div class="wallet-card">
                <!-- Balance -->
                <div class="balance">
                    <div class="left">
                        <span class="title"> <?= $ucapan; ?></span>
                        <h1 class="total"><?= $user['full_name']; ?></h1>
                    </div>
                </div>
                <!-- * Balance -->
                <!-- Wallet Footer -->
                <div class="wallet-footer">

                    <div class="item">
                        <a href="<?=base_url('ask')?>">
                            <div class="icon-wrapper bg-warning">
                                <ion-icon name="chatbubbles-outline"></ion-icon>
                            </div>
                            <strong>Bertanya</strong>
                        </a>
                    </div>

                    <div class="item">
                        <a href="<?=base_url('template')?>">
                            <div class="icon-wrapper bg-primary">
                               <ion-icon name="document-text-outline"></ion-icon>
                            </div>
                            <strong>Template</strong>
                        </a>
                    </div>
                   
                    <div class="item">
                        <a href="<?=base_url('history')?>">
                            <div class="icon-wrapper bg-success">
                            <ion-icon name="refresh-outline"></ion-icon>
                            </div>
                            <strong>History</strong>
                        </a>
                    </div>

                    <div class="item">
                        <a href="<?=base_url('profile')?>">
                            <div class="icon-wrapper bg-warning">
                               <ion-icon name="person-outline"></ion-icon>
                            </div>
                            <strong>Profil</strong>
                        </a>
                    </div>


                </div>
                <!-- * Wallet Footer -->
            </div>
        </div>
    </div>