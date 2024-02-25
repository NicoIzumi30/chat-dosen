<div id="appCapsule">
    <div class="section mt-2">
        <form id="my-form">
            <div class="card">
                <div class="card-body">
                    <div class="row text-start">
                        <div class="col-sm-4 col-md-4">
                            <div class="form-group basic">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Lengkap Anda">
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            <div class="form-group basic">
                                <label for="nim">NIM/NPM</label>
                                <input type="text" class="form-control" id="nim" name="nim" placeholder="Masukkan NIM Anda">
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            <div class="form-group basic">
                                <label for="prodi">Prodi</label>
                                <input type="text" class="form-control" id="prodi" name="prodi" placeholder="Masukkan Prodi Anda">
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            <div class="form-group basic">
                                <label for="fakultas">Fakultas</label>
                                <input type="text" class="form-control" id="fakultas" name="fakultas" placeholder="Masukkan Fakultas Anda">
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            <div class="form-group basic">
                                <label for="angkatan">Angkatan</label>
                                <input type="number" class="form-control" id="angkatan" min="0" name="angkatan" placeholder="Masukkan Angkatan Anda">
                            </div>
                        </div>
                        <div class="col-sm-4  col-md-4">
                            <div class="form-group basic">
                                <label for="jk">Jenis Kelamin</label>
                                <select class="form-control" name="jk" id="jk">
                                    <option value="1">Laki Laki</option>
                                    <option value="2">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4  col-md-4">
                            <div class="form-group basic">
                                <label for="salam">Salam</label>
                                <select class="form-control" name="salam" id="salam">
                                    <option value="0">Tidak Menggunakan Salam</option>
                                    <option value="1">Assalamualaikum</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4  col-md-4">
                            <div class="form-group basic">
                                <label for="pesan">Isi Pesan</label>
                                <textarea class="form-control" id="pesan" name="pesan" rows="6">Mohon maaf pak sebelumnya, saya ingin bertanya </textarea>
                            </div>
                        </div>
                        <div class="col-sm-4  col-md-4">
                            <div class="form-group basic">
                                <label for="penutup">Penutup</label>
                                <select class="form-control" name="penutup" id="penutup">
                                    <option value="1">Terima kasih🙏🙏</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4 justify-content-between">
                            <button type="submit" class="btn btn-success mt-1"><ion-icon name="send-outline"></ion-icon>
                                Kirim</button>
                        </div>

                        <div class="card mt-4 w-100">
                            <div class="card-header bg-danger">
                                <h3 class="card-title text-white">Hasil</h3>
                            </div>
                            <div class="card-body text-justify">
                                <p id="hasil"></p>
                            </div>
                            <div class="card-footer">
                                <button type="button" onclick="copyToClipboard()" class="btn bg-success"><ion-icon name="copy-outline"></ion-icon>Salin Pesan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
   $(document).ready(function() {
  $("#my-form").submit(function(event) {
    event.preventDefault();

    // Mendapatkan data dari form
    var data = {
      nama: $("#nama").val(),
      nim: $("#nim").val(),
      prodi: $("#prodi").val(),
      fakultas: $("#fakultas").val(),
      angkatan: $("#angkatan").val(),
      jk: $("#jk").val(),
      salam: $("#salam").val(),
      pesan: $("#pesan").val(),
      penutup: $("#penutup").val(),
    };
    console.log(data)

    // Validasi input
    if (!data.nama || !data.nim || !data.prodi || !data.fakultas || !data.angkatan || !data.jk || !data.salam || !data.pesan || !data.penutup) {
      Swal.fire({
        icon: "error",
        title: "Error",
        text: "Silakan isi semua formulir dengan lengkap."
      });
      return;
    }

    // Mengirim data menggunakan jQuery AJAX
    $.ajax({
      url: "<?= base_url('generate') ?>",
      method: "POST",
      data: data,
      success: function(response) {
        if (response.status == true) {
          Swal.fire({
            icon: "success",
            title: "Sukses",
            text: "Pesan Berhasil Di Generate",
          });
          $("#hasil").html(response.output);
        } else {
          Swal.fire({
            icon: "error",
            title: "Error",
            text: "Terjadi kesalahan saat mengirim data.",
          });
        }
        console.log(response);
      },
      error: function(error) {
        // Menampilkan pesan error
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "Terjadi kesalahan saat mengirim data."
        });
      },
    });

    // Reset form
    $("#my-form")[0].reset();
  });
});
</script>
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