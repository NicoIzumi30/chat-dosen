<div id="appCapsule">
    <div class="section mt-2 mx-2">
        <div class="text-right mt-2">
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#add-template">Add
                Template</button>
        </div>
        <div class="modal fade" id="add-template" tabindex="-1" role="dialog" aria-labelledby="add-templateLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="add-templateLabel">Add New Template</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('template') ?>" method="POST">
                        <div class="modal-body">
                            <div class="form-group basic">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan Judul Template Anda">
                            </div>
                            <div class="form-group basic">
                                <label for="template">Isi Template</label>
                                <textarea class="form-control" id="template" name="template" rows="6"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <?php foreach ($template as $key => $value) { ?>
                <div class="col-12 col-md-4 mb-3">
                    <div class="card" >
                        <div class="card-body">
                            <div class="text" data-toggle="modal" data-target="#view-template<?= $value['id'] ?>">
                            <h4><?= $value['judul'] ?></h4>
                            <small ><?= $this->Template_Model->shortened($value['template']); ?></small>
                            </div>
                            <div class="row mt-2">
                                <div class="col-6">
                                    <?php 
                                    $user_id = $this->session->userdata('user_id');
                                    if($user_id == 1 || $user_id == $value['user_id']) {
                                    ?>
                                    <button type="button" data-toggle="modal" data-target="#edit-template<?= $value['id'] ?>" class="btn btn-sm btn-info"><ion-icon name="create"></ion-icon></button>
                                    <a href="<?= base_url('delete-template/' . $value['id']) ?>" class="tombol-hapus btn btn-sm btn-danger"><ion-icon name="trash"></ion-icon></a>
                                    <?php } ?>
                                </div>
                                <div class="col-6">
                                    <div class="text-right">
                                        <?php if($value['user_id'] == 1){ ?>
                                        <small>Author : <?= $value['full_name'] ?> <ion-icon class="text-success" name="shield-checkmark"></ion-icon></small>
                                        <?php }else{ ?>
                                            <small>Author : <?= $value['full_name'] ?></small>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal fade" id="view-template<?= $value['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="view-templateLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="view-templateLabel"><?= $value['judul']; ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p id="hasil"><?= $value['template'] ?></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success my-2" onclick="copyToClipboard()">Copy
                                        Template</button>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="edit-template<?= $value['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="add-templateLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="add-templateLabel">Edit Template</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="<?= base_url('update-template/' . $value['id']) ?>" method="POST">
                                    <div class="modal-body">
                                        <div class="form-group basic">
                                            <label for="title">Title</label>
                                            <input type="text" class="form-control" id="judul" value="<?= $value['judul'] ?>" name="judul" placeholder="Masukkan Judul Template Anda">
                                        </div>
                                        <div class="form-group basic">
                                            <label for="template">Isi Template</label>
                                            <textarea class="form-control" id="template" name="template" rows="6"><?= $value['template']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>

    </div>
</div>
<script>
    function copyToClipboard() {
        var textToCopy = document.getElementById("hasil").innerText;

        // Menyalin teks ke clipboard
        navigator.clipboard.writeText(textToCopy)
            .then(function() {
                alert("Teks berhasil disalin!");
            })
            .catch(function(err) {
                console.error('Gagal menyalin teks: ', err);
            });
    }
</script>