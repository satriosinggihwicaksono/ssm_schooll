<link href="https://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.css" rel="stylesheet"/>
<script src="https://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.js"></script>
<style>
    #datakelas td:nth-child(2),
    #datakelas th:nth-child(2),
    #sub_kelas td:nth-child(2),
    #sub_kelas th:nth-child(2)
    {
        text-align : left;
        font-weight: bold;
    }
    #datakelas td:nth-child(3),
    #datakelas th:nth-child(3),
    #datakelas td:nth-child(4),
    #datakelas th:nth-child(4)
    {
        text-align : right;
    }
    ._jw-tpk-container {
        height:220px;
    }
</style>

<section class="section">
    <div class="section-header" style="display: none;">
    <h1>Data Kelas</h1>
    </div>

    <div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div>
                            <button class="btn btn-info m-addkelas" data-toggle="modal" data-target=".modal-kelas"><i class="fas fa-folder-plus"></i> Tambah</button>
                            <span id="proses_kelas" style="display:none">
                                <button class="btn btn-warning m-editkelas" data-toggle="modal" data-target=".modal-edit-kelas"><i class="fas fa-edit"></i> Edit</button>
                                <button class="btn btn-danger m-hapuskelas" data-toggle="modal" data-target=".modal-hapus-kelas"><i class="fas fa-trash-alt"></i> Hapus</button>
                                <button class="btn btn-success m-muridkelas" data-toggle="modal" data-target=".modal-murid-kelas"><i class="fas fa-user-circle"></i> Murid</button>
                            </span>
                        </div>
                        <hr>
                    </div>
                    <div class="col-md-12">
                        <table class="table" id="datakelas">
                            <thead>
                                <tr>
                                    <th>KODE</th>
                                    <th>NAMA</th>
                                    <th>HARGA 1</th>
                                    <th>HARGA 2</th>
                                    <th>KATEGORI KELAS</th>
                                </tr>
                            </thead>
                            <tbody class="table-bordered"></tbody>
                        </table>
                    </div>    
                </div>
            </div>
        </div>
        </div>

        <div class="col-12 col-md-12 col-lg-12" id="show_sub_kelas" style="display:none;">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div style="text-align:right"> 
                                    <span id="proses_subkelas" style="display:none">
                                        <button class="btn btn-info m-addsubkelas" data-toggle="modal" data-target=".modal-subkelas" title="Tambah SubKelas"><i class="fas fa-folder-plus"></i></button>
                                    </span>
                                    <span id="edithapus" style="display:none">
                                        <button class="btn btn-warning m-editsubkelas" id="editsubklas" data-toggle="modal" data-target=".modal-edit-subkelas" title="Edit SubKelas"><i class="fas fa-edit"></i></button>
                                        <button class="btn btn-danger m-hapus" id="hapussubklas" data-toggle="modal" data-target=".modal-hapus-subkelas" title="Hapus SUbKelas"><i class="fas fa-trash-alt"></i></button>
                                    </span>
                                </div>
                                <hr>
                            </div>
                            <div class="col-md-12">
                                <table class="table" id="sub_kelas">
                                    <thead>
                                        <tr>
                                            <th>KODE SUBKELAS</th>
                                            <th>NAMA SUBKELAS</th>
                                            <th>STUDIO</th>
                                            <th>HARI</th>
                                            <th>JAM</th>
                                            <th>GURU</th>
                                            <th>ASISTEN 1</th>
                                            <th>ASISTEN 2</th>
                                            <th>STATUS</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-bordered"></tbody>
                                </table>
                            </div>    
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- modal add kelas -->
<div class="modal fade modal-kelas" tabindex="-1" role="dialog" aria-labelledby="modalkelas" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="headmodalkelas"><b>Form Tambah Kelas</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0)" method="post" id="form_tambah_kelas">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>KODE KELAS</label>
                                <input type="textarea" class="form-control" id="kodekelas" name="kodekelas" required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group">
                                <label>NAMA KELAS</label>
                                <input type="textarea" class="form-control" id="namakelas" name="namakelas" required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group">
                                <label>KATEGORI KELAS</label>
                                <select name="kategori" id="kategori" class="form-control" style="font-size:17px; font-weight:bold; height:40px;">
                                    <option value="Ujian">UJIAN</option>
                                    <option value="Reguler"><b>REGULER</b></option>
                                    <option value="Private"><b>PRIVATE</b></option>
                                    <option value="Wajib 1"><b>WAJIB 1</b></option>
                                    <option value="Wajib 2"><b>WAJIB 2</b></option>
                                    <option value="Wajib 3"><b>WAJIB 3</b></option>
                                    <option value="Wajib 4"><b>WAJIB 4</b></option>
                                    <option value="Wajib 5"><b>WAJIB 5</b></option>
                                    <option value="Wajib 6"><b>WAJIB 6</b></option>
                                    <option value="Wajib 7"><b>WAJIB 7</b></option>
                                    <option value="Wajib 8"><b>WAJIB 8</b></option>
                                    <option value="Wajib 9"><b>WAJIB 9</b></option>
                                    <option value="Wajib 10"><b>Wajib 10</b></option>
                                    <option value="Wajib 11"><b>WAJJIB 11</b></option>
                                    <option value="Wajib 12"><b>WAJIB 12</b></option>
                                    <option value="Wajib 13"><b>WAJIB 13</b></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>HARGA KELAS1</label>
                                <input type="textarea" class="form-control" id="hargakelas1" name="hargakelas1" required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group">
                                <label>HARGA KELAS2</label>
                                <input type="textarea" class="form-control" id="hargakelas2" name="hargakelas2">
                            </div>
                            <div class="form-group">
                                <label>LEOTARD</label>
                                <input type="textarea" class="form-control" id="leotard" name="leotard">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>SKIRT</label>
                                <input type="textarea" class="form-control" id="skirt" name="skirt" >
                            </div>
                            <div class="form-group">
                                <label>STOCKING</label>
                                <input type="textarea" class="form-control" id="stocking" name="stocking" >
                            </div>
                            <div class="form-group">
                                <label>SHOES</label>
                                <input type="textarea" class="form-control" id="shoes" name="shoes" >
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>CHARACTER SHOES</label>
                                <input type="textarea" class="form-control" id="cshoes" name="cshoes" >
                            </div>
                            <div class="form-group">
                                <label>CHARACTER SKIRT</label>
                                <input type="textarea" class="form-control" id="cskirt" name="cskirt" >
                            </div>
                            <div class="form-group">
                                <label>STATUS REWARD</label>
                                <select name="status_reward" class="form-control">
                                    <option value="Y">Y</option>
                                    <option value="N">N</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer" style="margin-top: 26px;">
                <button type="button" onclick="tambah_kelas()" class="btn btn-primary">Tambah</button>
            </div>
        </div>
    </div>
  </div>
</div>

<!-- modal Edit kelas -->
<div class="modal fade modal-edit-kelas" tabindex="-1" role="dialog" aria-labelledby="modaleditkelas" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="headmodaleditkelas"><b>Form Edit Kelas</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0)" method="post" id="form_data_kelas">
                        <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="Kode kelas">KODE KELAS</label>
                                <input type="text" class="form-control" id="kodekelas" name="kodekelas" readonly  required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group">
                                <label for="Nama Lengkap">NAMA KELAS</label>
                                <input type="text" class="form-control" id="namakelas" name="namakelas"  required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" >
                            </div>
                            <div class="form-group">
                                <label>KATEGORI KELAS</label>
                                <select name="kategori" id="kategori_kelas" class="form-control" style="font-size:17px; font-weight:bold; height:40px;">
                                    <option value="Ujian">UJIAN</option>
                                    <option value="Reguler"><b>REGULER</b></option>
                                    <option value="Private"><b>PRIVATE</b></option>
                                    <option value="Wajib 1"><b>WAJIB 1</b></option>
                                    <option value="Wajib 2"><b>WAJIB 2</b></option>
                                    <option value="Wajib 3"><b>WAJIB 3</b></option>
                                    <option value="Wajib 4"><b>WAJIB 4</b></option>
                                    <option value="Wajib 5"><b>WAJIB 5</b></option>
                                    <option value="Wajib 6"><b>WAJIB 6</b></option>
                                    <option value="Wajib 7"><b>WAJIB 7</b></option>
                                    <option value="Wajib 8"><b>WAJIB 8</b></option>
                                    <option value="Wajib 9"><b>WAJIB 9</b></option>
                                    <option value="Wajib 10"><b>Wajib 10</b></option>
                                    <option value="Wajib 11"><b>WAJJIB 11</b></option>
                                    <option value="Wajib 12"><b>WAJIB 12</b></option>
                                    <option value="Wajib 13"><b>WAJIB 13</b></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="Alamat Lengkap">HARGA KELAS1</label>
                                <input type="text" class="form-control" id="hargaklas1" name="hargakelas1"  required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" >
                            </div>
                            <div class="form-group">
                                <label for="Tanggal Lahir">HARGA KELAS2</label>
                                <input type="text" class="form-control" id="hargaklas2" name="hargakelas2" >
                            </div>
                            <div class="form-group">
                                <label for="Handphone kelas">LEOTARD</label>
                                <input type="text" class="form-control" id="leotard" name="leotard" >
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="Instagram">SKIRT</label>
                                <input type="text" class="form-control" id="skirt" name="skirt" >
                            </div>
                            <div class="form-group">
                                <label for="Handphone Walikelas">STOCKING</label>
                                <input type="text" class="form-control" id="stocking" name="stocking" >
                            </div>
                            <div class="form-group">
                                <label for="Email">SHOES</label>
                                <input type="text" class="form-control" id="shoes" name="shoes" >
                            </div>
                        </div> 
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="Catatan">CHARACTER SHOES</label>
                                <input type="text" class="form-control" id="cshoes" name="cshoes" >
                            </div>
                            <div class="form-group">
                                <label for="Facebook">CHARACTER SKIRT</label>
                                <input type="text" class="form-control" id="cskirt" name="cskirt" >
                            </div>
                            <div class="form-group">
                                <label>STATUS REWARD</label>
                                <select name="status_reward" id="status_reward" class="form-control">
                                    <option value="Y">Y</option>
                                    <option value="N">N</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="save_data_kelas()">Edit</button>
                </div>
            </div>
        </div>
  </div>
</div>

<!-- Modal Confirm Delete -->
<div class="modal fade modal-hapus-kelas" id="hapuskelas" tabindex="-1" role="dialog" aria-labelledby="hapuskelas" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="hapuskelas"><b>Hapus Kelas</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="javascript:void(0)" method="post" id="delete_kelas">
      <div class="modal-body">
        <h4 class="text-center" id="namahapus"></h4>
        <input type="hidden" name="hkodekelas" id="hkodekelas">
      </div>
      <div class="modal-footer">
        <button type="button" onclick="hapus_kelas()" class="btn btn-primary">Hapus</button>
      </div>
      </form>
    </div>
  </div>
</div>


<!-- -------------------------- Subkelas -------------------------------- -->

<!-- Modal Add Subkelas -->
<div class="modal fade modal-subkelas" tabindex="-1" role="dialog" aria-labelledby="modalsubkelas" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="headmodalsubkelas"><b>Form Tambah Subkelas</b></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="javascript:void(0)" method="post" id="form_subkelas">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="Kode Kelas">KODE KELAS</label>
                            <input type="textarea" class="form-control" id="kodekelas" name="kodekelas"  readonly>
                        </div>
                        <div class="form-group">
                            <label for="Kode Subkelas">KODE SUBKELAS</label>
                            <input type="textarea" class="form-control" id="kodesubkelas" name="kodesubkelas"  required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                        </div>
                        <div class="form-group">
                            <label for="Nama Subkelas">NAMA SUBKELAS</label>
                            <input type="textarea" class="form-control" id="namasubkelas" name="namasubkelas" required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                        </div>
                        <div class="form-group">
                            <label for="Guru">STATUS</label>
                            <select name="status" class="form-control" >
                                <option value="Y">Y</option>
                                <option value="N">N</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="Guru">PENGAJAR</label>
                            <select name="guru" class="form-control guru" >
                                <option value="-">-</option>
                                <?php foreach ($teacher as $t ){ ?>
                                <option name="options" value="<?=$t['code']?>"><?=$t['name']?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Asisten 1">ASISTEN 1</label>
                            <select name="asisten1" class="form-control asisten1" >
                                <option value="-">-</option>
                                <?php foreach ($teacher as $t ){ ?>
                                <option name="<?=$t['name']?>" value="<?=$t['code']?>"><?=$t['name']?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Asisten 2">ASISTEN 2</label>
                            <select name="asisten2" class="form-control asisten2" >
                                <option value="-">-</option>
                                <?php foreach ($teacher as $t ){ ?>
                                <option name="<?=$t['name']?>" value="<?=$t['code']?>"><?=$t['name']?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="Hari">HARI</label>
                            <select required name="hari" id="hari" class="form-control">
                                <option value=" ">-</option>
                                <option value="Senin">Senin</option>
                                <option value="Selasa">Selasa</option>
                                <option value="Rabu">Rabu</option>
                                <option value="Kamis">Kamis</option>
                                <option value="Jumat">Jumat</option>
                                <option value="Sabtu">Sabtu</option>
                                <option value="Minggu">Minggu</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Jam">JAM</label>
                            <input type="textarea" class="form-control" id="time1" name="jam" placeholder="Pilih Jam" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="Studio">STUDIO</label>
                            <select required name="studio" id="studio" class="form-control" >
                                <?php foreach($studio as $std){ ?>
                                    <option value="<?=$std['the_studio']?>"><?=$std['the_studio']?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div> 
                <div class="modal-footer">
                    <button type="button" onclick="tambah_subkelas2()" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
</div>

<!-- Modal Edit Subkelas -->
<div class="modal fade modal-edit-subkelas" tabindex="-1" role="dialog" aria-labelledby="modaleditkelas" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="headmodaleditkelas"><b>Form Edit SubKelas</b></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
                <form action="javascript:void(0)" method="post" id="form_data_subkelas">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="Kode Kelas">KODE KELAS</label>
                            <input type="text" class="form-control" id="kodekelas" name="kodekelas" readonly>
                        </div>
                        <div class="form-group">
                            <label for="Kode Subkelas">KODE SUBKELAS</label>
                            <input type="text" class="form-control" id="kodesubkelas" name="kodesubkelas" readonly required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                        </div>
                        <div class="form-group">
                            <label for="Nama Subkelas">NAMA SUBKELAS</label>
                            <input type="text" class="form-control" id="namasubkelas" name="namasubkelas"  required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                        </div>
                        <div class="form-group">
                            <label for="Guru">STATUS</label>
                            <select name="status" class="form-control status2" >
                                <option value="Y">Y</option>
                                <option value="N">N</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="Guru">PENGAJAR</label>
                            <select name="guru" class="form-control guru" >
                                <option value="-">-</option>
                                <?php foreach ($teacher as $t ){ ?>
                                <option value="<?=$t['code']?>"><?=$t['name']?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Asisten 1">ASISTEN 1</label>
                            <select name="asisten1" class="form-control asisten1" >
                                <option value="-">-</option>
                                <?php foreach ($teacher as $t ){ ?>
                                <option value="<?=$t['code']?>"><?=$t['name']?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Asisten 2">ASISTEN 2</label>
                            <select name="asisten2" class="form-control asisten2" >
                                <option value="-">-</option>
                                <?php foreach ($teacher as $t ){ ?>
                                <option value="<?=$t['code']?>"><?=$t['name']?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="Hari">HARI</label>
                            <div id="day"><input type='text' name="hari" class="form-control" onclick='selectday()' /></div>

                            <script>
                            function selectday()
                            {
                            document.getElementById("day").innerHTML = "<select name='hari' class='form-control'><option value='SENIN'>SENIN</option><option value='SELASA'>SELASA</option><option value='RABU'>RABU</option><option value='KAMIS'>KAMIS</option><option value='JUMAT'>JUMAT</option><option value='SABTU'>SABTU</option><option value='MINGGU'>MINGGU</option></select>";
                            }
                            </script>
                        </div>
                        <div class="form-group">
                            <label for="Jam">JAM</label>
                            <input type="text" class="form-control" id="time2" name="jam"  required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                        </div>
                        <div class="form-group">
                            <label for="Studio">STUDIO</label>
                            <select name="studio" id="studio" class="form-control studio2">
                                <?php foreach($studio as $std){ ?>
                                    <option value="<?=$std['the_studio']?>"><?=$std['the_studio']?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div> 
                <div class="modal-footer">
                    <button type="button" onclick="save_data_subkelas()" class="btn btn-primary">Edit</button>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
</div>

<!-- Modal Confirm Delete Subkelas -->
<div class="modal fade modal-hapus-subkelas" id="hapussub" tabindex="-1" role="dialog" aria-labelledby="hapussub" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="hapussub"><b>Hapus SubKelas</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="javascript:void(0)" method="post" id="form_hapus_subkelas">
      <div class="modal-body">
        <h4 class="text-center" id="namahapussub"></h4>
        <input type="hidden" name="kodekelas" id="kodekelas">
        <input type="hidden" name="hsub" id="hsub">
      </div>
      <div class="modal-footer">
        <button type="button" onclick="hapus_subkelas()" class="btn btn-primary">Hapus</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Murid -->
<div class="modal fade modal-murid-kelas" id="muridkelas" tabindex="-1" role="dialog" aria-labelledby="muridkelas" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="hapuskelas"><b>Data Murid Kelas <span id="namakelasmurid"></span></b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="javascript:void(0)" method="post" id="delete_kelas">
      <div class="modal-body">
        <div class="row">
            <table class="table" id="tablemuridkelas">
                <thead>
                    <tr>
                        <th>KODE</th>
                        <th>NAMA</th>
                        <th>SUBKELAS</th>
                    </tr>
                </thead>
                <tbody class="table-bordered"></tbody>
            </table>
        </div>      
      </div>
      </form>
    </div>
  </div>
</div>


<!-- ----------------------- PENGATURAN JAM ---------------------------------- -->
<script>

    var times = {}; // Added to initialize an object

  var timepicker = new TimePicker(['time1', 'time2'], {
  theme: 'dark',
  lang: 'en'
  });

  timepicker.on('change', function(evt){
  var value = (evt.hour || '00') + ':' + (evt.minute || '00');
  evt.element.value = value;

  //Added the below to store in the object and consoling:
  var id = evt.element.id;
  times[id] = value;
  });
    
    
</script>

<!-- ---------------------------- DIGIT GROUPING DAN RUPIAH --------------------------- -->
<script>
    /* Format hargakelas1 ADD */
    var hargakelas1 = document.getElementById('hargakelas1');
    hargakelas1.addEventListener('keyup', function(e)
    {
        hargakelas1.value = formatRupiah(this.value);
    });
    
    /* Format hargakelas2 ADD */
    var hargakelas2 = document.getElementById('hargakelas2');
    hargakelas2.addEventListener('keyup', function(e)
    {
        hargakelas2.value = formatRupiah(this.value);
    });
    
    /* Format hargaklas1 EDIT */
    var hargaklas1 = document.getElementById('hargaklas1');
    hargaklas1.addEventListener('keyup', function(e)
    {
        hargaklas1.value = formatRupiah(this.value);
    });
    
    /* Format hargaklas2 EDIT */
    var hargaklas2 = document.getElementById('hargaklas2');
    hargaklas2.addEventListener('keyup', function(e)
    {
        hargaklas2.value = formatRupiah(this.value);
    });
    
    /* Fungsi */
    function formatRupiah(angka, prefix)
    {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split    = number_string.split(','),
            sisa     = split[0].length % 3,
            rupiah     = split[0].substr(0, sisa),
            ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
            
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? + rupiah : '');
    }
</script>



<script>

function save_data_kelas(){
  var url = "<?=base_url('Data_Kelas/editkelas')?>"
  $.ajax({
    url : url,
    type : "POST",
    data : $("#form_data_kelas").serialize(),
    dataType : "JSON",
    success: function(data)
    {
    if(data['status'] == true){
      $('.modal-edit-kelas').modal('hide');
      $('#proses_kelas').hide();
      $('#datakelas').DataTable().ajax.reload();
      $('#form_tambah_kelas')[0].reset();
      swal(
          'Sukses',
          'Data telah di edit',
          'success',
      );
        } else {
            alert(data['alert']);
        } 
    },
  });
}

function tambah_kelas(){
  var url = "<?=base_url('Data_Kelas/tambahkelas')?>"
  $.ajax({
    url : url,
    type : "POST",
    data : $("#form_tambah_kelas").serialize(),
    dataType : "JSON",
    success: function(data)
    {
    if(data['status'] == true){
      $('.modal-kelas').modal('hide');
      $('#proses_kelas').hide();
      $('#datakelas').DataTable().ajax.reload();
      $('#form_tambah_kelas')[0].reset();
      swal(
          'Sukses',
          'Data telah ditambah',
          'success',
      );
    } else {
            alert(data['alert']);
        }   
    },
  });
}

function hapus_kelas(){
    var url = "<?=base_url('Data_Kelas/hapuskelas')?>"
  $.ajax({
    url : url,
    type : "POST",
    data : $("#delete_kelas").serialize(),
    dataType : "JSON",
    success: function(data)
    {
         if(data['status'] == true){
            $('.modal-hapus-kelas').modal('hide');
            $('#proses_kelas').hide();
            $('#datakelas').DataTable().ajax.reload();
            $('#sub_kelas').DataTable().clear().destroy();
            $('#form_tambah_kelas')[0].reset();
            swal(
                'Sukses',
                'Data telah berhasil dihapus',
                'success',
            );
        } else {
            alert(data['alert']);
        } 
    },
    error: function (jqXHR, textStatus, errorThrown){
        alert('Data Kekas tidak dapat di hapus karena digunakan pada Data Sub-Kelas');
    }
  });
}

function save_data_subkelas(){
  var url = "<?=base_url('data_Kelas/editsubkelas')?>"
  $.ajax({
    url : url,
    type : "POST",
    data : $("#form_data_subkelas").serialize(),
    dataType : "JSON",
    success: function(data)
    {
    if(data['status'] == true){
      var code = data.kode;
      $('#edithapus').hide();
      $('#sub_kelas').DataTable().ajax.reload();
      $('.modal-edit-subkelas').modal('hide');
      
      swal(
          'Sukses',
          'Data telah di edit',
          'success',
      );
     
    } else {
        alert(data['alert']);
    } 

    },
    error: function (jqXHR, textStatus, errorThrown){
        alret('Error adding');
    }
  });
}


function tambah_subkelas2(){
  var url = "<?=base_url('data_Kelas/tambahsubkelas')?>"
  $.ajax({
    url : url,
    type : "POST",
    data : $("#form_subkelas").serialize(),
    dataType : "JSON",
    success: function(data)
    {
    if(data['status'] == true){ 
      var code = data.kode;
      $('.modal-subkelas').modal('hide');
      $('#edithapus').hide();
      $('#sub_kelas').DataTable().ajax.reload();
      swal(
          'Sukses',
          'Data telah ditambahkan',
          'success',
      );
    } else {
        alert(data['alert']);
    } 
    },
  });
}


function hapus_subkelas(){
  var url = "<?=base_url('data_Kelas/hapussubkelas')?>"
  $.ajax({
    url : url,
    type : "POST",
    data : $("#form_hapus_subkelas").serialize(),
    dataType : "JSON",
    success: function(data)
    {
    if(data['status'] == true){  
      var code = data.kode;
      swal(
          'Sukses',
          'Data telah dihapus',
          'success',
      );
      $('.modal-hapus-subkelas').modal('hide');
      $('#edithapus').hide();
      $('#sub_kelas').DataTable().ajax.reload();
    } else {
        alert(data['alert']);
    } 
    },
  });
}
</script>
