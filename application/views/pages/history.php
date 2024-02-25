<div id="appCapsule">
    <div class="section mt-2 mx-2">
        <div class="text-center">
            <h2>History</h2>
        </div>
        <div class="row mt-3">
            <?php foreach ($history as $key => $value) { ?>
                <div class="col-12 col-md-4 mb-3">
                    <div class="card" data-toggle="modal" data-target="#view-template<?= $value['id'] ?>">
                        <div class="card-body">
                            <p><?= $this->History_Model->shortened($value['message']); ?></p>
                            <div class="text-right">
                                <small><?= $value['created_at'] ?></small>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="view-template<?= $value['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="view-templateLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p id="hasil"><?= $value['message'] ?></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success my-2" onclick="copyToClipboard()">Copy
                                        message</button>

                                </div>
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
                Swal.fire({
                    icon: "success",
                    title: "Sukses",
                    text: "Teks berhasil disalin!",
                })
            })
            .catch(function(err) {
                console.error('Gagal menyalin teks: ', err);
            });
    }
</script>