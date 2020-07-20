<section class="section">
    <div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-body">
            <?php echo $this->session->flashdata('pesan'); ?>
                <div class="row">
                    <div class="col-md-12" style="text-align:right;">
                        <a href="<?=base_url(),'setting/update'?>"><button class="btn btn-danger" >RESET</button></a>
                    </div>
                </div> 
                <form action="<?=base_url(),'setting/edit'?>" method="POST">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Nama</label>
                                <input name="nama" class="form-control" value="<?=$konfigurasi['data']['name']?>"/>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Sub Nama</label>
                                <input name="subnama" class="form-control" value="<?=$konfigurasi['data']['subname']?>"/>
                            </div>
                        </div>
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <label>Jatuh Tempo</label>
                                <select name="tempo" class="form-control">
                                    <?php for($x=1;$x<=27;$x++){ ?>
                                    <option <?php if($konfigurasi['data']['duedate'] == $x){echo 'selected="selected"';}?> value="<?=$x?>"><?=$x?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Denda Perhari</label>
                                <input name="denda" class="form-control" value="<?=$konfigurasi['data']['due']?>"/>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Biaya Registrasi</label>
                                <input name="registrasi" class="form-control" value="<?=$konfigurasi['data']['cost']?>"/>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <label>Auto Subclass</label>
                                <?php 
                                    $auto = array('Y','N');
                                ?>
                                <select class="form-control" name="autosubclass" id="autosubclass">
                                    <?php foreach($auto as $a){ ?>
                                    <option <?php if($konfigurasi['data']['autosubclass'] == $a){echo 'selected';}?> value="<?=$a?>"><?=$a?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12" style="text-align:right;">
                            <input class="btn btn-success" type="submit" value="Save"/>
                        </div>
                   </div>
                </form>    
            </div>
        </div>
        </div>
    </div>
</section>