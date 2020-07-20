<!-- <link rel="stylesheet" href="<?=base_url()?>components/assets/css/design.css"> -->
<style>
    .full_modal-dialog {
    width: 98% !important;
    height: 92% !important;
    min-width: 98% !important;
    min-height: 92% !important;
    max-width: 98% !important;
    max-height: 92% !important;
    padding: 0 !important;
    }

    .full_modal-content {
    height: 99% !important;
    min-height: 99% !important;
    max-height: 99% !important;
    }
    .pink {
        background-color: pink;
    }
    .table td {
        padding: .05rem;
    }
    .table:not(.table-sm):not(.table-md):not(.dataTable) td,
    .table:not(.table-sm):not(.table-md):not(.dataTable) th {
        height: 25px;
    }
    .form-group .control-label,
    .form-group > label {
        font-weight: 600;
        color: #ef6767;
        font-size: 10px;
        margin-right: 7px;  
        padding-top: 10px;
    }
    .form-group {
        margin-bottom: 5px;
    }
    .selected {
        background: #90edfe !important;
    }
    table{
        text-align: center;
    }
    .combobox {
        width: 150px;
        font-weight: 600;
        color: #ef6767;
        font-size: 25px;
        margin-right: 7px;
    }
    .text {
        font-size: 10px;
    }
    .search {
        /* width: 55px;
        margin-left: 170px;
        margin-top: -31px; */
        width: 55px;
        margin-left: 810px;
        margin-top: -82px;
    }
    .start{
        /* margin-top: 25px; */
        margin-left: 45px;
    }
    .end{
        margin-top: -40px;
        margin-left: 203px;
    }
    .startdate {
        margin-left: 25px;
    }
    .enddate {
        margin-top: -47px;
        margin-left: 240px;
    }
    .selectopt {
        margin-top: -89px;
        margin-left: 470px;
        width: 275px;
    }
    .namamurid {
        margin-top: -85px;
        margin-left: 404px;
    }
    div.dataTables_wrapper {
        width: auto;
    }
    /* #datakelas td:nth-child(1),
    #datakelas th:nth-child(1)
    {
        text-align : center;
        font-weight: bold;
        font-style: italic;
    } */
</style>

<section class="section">
    <div class="section-header" style="display: none;">
    <h1>SPP</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="<?= site_url("SPP/getspp"); ?>" method="post" style="margin-bottom: -45px;">
                            <div class="row">
                                <div class="col-8">
                                    <div class="form-group row">
                                        <div class="combobox">
                                            <div class="form-group row">
                                                <!--<label for="start" class="start">Dari Tanggal <i>(bulan/tanggal/tahun)</i></label>-->
                                                <input type="date" class="form-control startdate" id="startdate" name="startdate" value="<?php echo date('Y-m-d'); ?>">
                                            </div>
                                            <div class="form-group row">
                                                <label for="end" class="end">S.D</label>
                                                <input type="date" class="form-control enddate" id="enddate" name="enddate" value="<?php echo date('Y-m-d'); ?>">
                                            </div>
                                            <br>
                                            <!-- <select id="namamurid" name="namamurid" class="form-control">
                                                <option value=" "></option>
                                            </select> -->
                                            <div class="form-group row">
                                                <label for="nama murid" class="namamurid">NamaMurid</label>
                                                <select id="namamurid" name="namamurid" class="form-control selectopt">
                                                    <option value="-"></option>
                                                    <option value="ABIGAIL AMELIA">ABIGAIL AMELIA</option>
                                                    <option value="ABIGAIL GRACIELLE HOPPER">ABIGAIL GRACIELLE HOPPER</option>
                                                    <option value="ABIGAIL SIAWAN">ABIGAIL SIAWAN</option>
                                                    <option value="ADELA AYODYA">ADELA AYODYA</option>
                                                    <option value="AHVADEA">AHVADEA</option>
                                                    <option value="ALEXANDRA MARIANNE AALBREGT">ALEXANDRA MARIANNE AALBREGT</option>
                                                    <option value="ALEXANDRA TIARA CARISA KRISTIANJATI">ALEXANDRA TIARA CARISA KRISTIANJATI</option>
                                                    <option value="ALICE RYAN MICHAELA">ALICE RYAN MICHAELA</option>
                                                    <option value="ALINE AUDINA">ALINE AUDINA</option>
                                                    <option value="ALINEA">ALINEA</option>
                                                    <option value="ALVERTA REVALIN">ALVERTA REVALIN</option>
                                                    <option value="ALYA ANINDITA JANISYA">ALYA ANINDITA JANISYA</option>
                                                    <option value="AMARA">AMARA</option>
                                                    <option value="ANASTASIA BUNGA CHRISTABEL">ANASTASIA BUNGA CHRISTABEL</option>
                                                    <option value="ANAVAYA SIDDHATTHA SOEGIYANTO">ANAVAYA SIDDHATTHA SOEGIYANTO</option>
                                                    <option value="ANDREA KINTANA KEJORA">ANDREA KINTANA KEJORA</option>
                                                    <option value="ARIANNE">ARIANNE</option>
                                                    <option value="ARUM">ARUM</option>
                                                    <option value="ARWEN">ARWEN</option>
                                                    <option value="ASHARA TAAVI RAYHANA LAY">ASHARA TAAVI RAYHANA LAY</option>
                                                    <option value="ASSYIFA RAHMADANI PURNOMO">ASSYIFA RAHMADANI PURNOMO</option>
                                                    <option value="ASTROMELLA ANDROMEDA WICAKSONO">ASTROMELLA ANDROMEDA WICAKSONO</option>
                                                    <option value="ATHENA">ATHENA</option>
                                                    <option value="AURELIA ARSHA PUTRI MURDIANTO">AURELIA ARSHA PUTRI MURDIANTO</option>
                                                    <option value="AURELIA NABILLA SHAKUNTALA KALYANI"></option>
                                                    <option value="AURELIA SHERLY MEDIANA">AURELIA SHERLY MEDIANA</option>
                                                    <option value="AZIZAH">AZIZAH</option>
                                                    <option value="AZKADHELYA CAHAYA ANDEERA">AZKADHELYA CAHAYA ANDEERA</option>
                                                    <option value="BELLA VICTORIA DARMAWAN">BELLA VICTORIA DARMAWAN</option>
                                                    <option value="BERNADETTA CLAUDYA GRACE NATALIE">BERNADETTA CLAUDYA GRACE NATALIE</option>
                                                    <option value="BEVERLY">BEVERLY</option>
                                                    <option value="BHADRAVARA KUMARALALITHA DEWANGGANI">BHADRAVARA KUMARALALITHA DEWANGGANI</option>
                                                    <option value="BIANCA ALLY SABINE">BIANCA ALLY SABINE</option>
                                                    <option value="BIANCA YRENA HARTONO">BIANCA YRENA HARTONO</option>
                                                    <option value="BINTANG NARNIA PURNOMO">BINTANG NARNIA PURNOMO</option>
                                                    <option value="CALISTA MAXIMILIENNE SETIAWAN">CALISTA MAXIMILIENNE SETIAWAN</option>
                                                    <option value="CALLULA SYAFIA NISHA RAMADHANI">CALLULA SYAFIA NISHA RAMADHANI</option>
                                                    <option value="CARINA LIVANA HANDOKO">CARINA LIVANA HANDOKO</option>
                                                    <option value="CAROLINE OLIVIA CANDRA BUDIONO">CAROLINE OLIVIA CANDRA BUDIONO</option>
                                                    <option value="CAROLINE TIFFANY NURHADI">CAROLINE TIFFANY NURHADI</option>
                                                    <option value="CATTLEYA BIANCA EL-HUMAYRA HENDRAWAN">CATTLEYA BIANCA EL-HUMAYRA HENDRAWAN</option>
                                                    <option value="CELINA">CELINA</option>
                                                    <option value="CELINE CHRISTIANE GUO">CELINE CHRISTIANE GUO</option>
                                                    <option value="CEYA SULISTYAWATI">CEYA SULISTYAWATI</option>
                                                    <option value="CHAIREEN">CHAIREEN</option>
                                                    <option value="CHERISE ELAINE WIJAYA">CHERISE ELAINE WIJAYA</option>
                                                    <option value="CHERYLE ELOISE WIJAYA">CHERYLE ELOISE WIJAYA</option>
                                                    <option value="CHIKA KANAYA PUTRI HANTORO">CHIKA KANAYA PUTRI HANTORO</option>
                                                    <option value="CHININDYA NARESWARI NARIRATANA">CHININDYA NARESWARI NARIRATANA</option>
                                                    <option value="CINDY RESPATI DEWI">CINDY RESPATI DEWI</option>
                                                    <option value="CLARISSA VICTORIA NATANIA CHANDRA">CLARISSA VICTORIA NATANIA CHANDRA</option>
                                                    <option value="CUT MALIKA MAHESWARI PUTRI">CUT MALIKA MAHESWARI PUTRI</option>
                                                    <option value="DAMARA SETIAWAN">DAMARA SETIAWAN</option>
                                                    <option value="DEA">DEA</option>
                                                    <option value="DEVIKA">DEVIKA</option>
                                                    <option value="EDUARDINE HEDWIG ADONLEYDIA">EDUARDINE HEDWIG ADONLEYDIA</option>
                                                    <option value="ELANA LOREN PRASETIA">ELANA LOREN PRASETIA</option>
                                                    <option value="ELENA NEVANANTA">ELENA NEVANANTA</option>
                                                    <option value="ELIZABETH KINANTYA GASA">ELIZABETH KINANTYA GASA</option>
                                                    <option value="ESNORIAINE">ESNORIAINE</option>
                                                    <option value="EUGENE BELLAVANIA LOEKMAN">EUGENE BELLAVANIA LOEKMAN</option>
                                                    <option value="FAHIRA SEKAR TANJUNG">FAHIRA SEKAR TANJUNG</option>
                                                    <option value="FARAH">FARAH</option>
                                                    <option value="FAYE">FAYE</option>
                                                    <option value="FELICIA CECILIA CLAIRINE SANTOSO">FELICIA CECILIA CLAIRINE SANTOSO</option>
                                                    <option value="FELICIA RAHADIAN">FELICIA RAHADIAN</option>
                                                    <option value="FELICIA SHALOM EVANGELIN">FELICIA SHALOM EVANGELIN</option>
                                                    <!-- <option value="Feni Aprilian">Feni Aprilian</option> -->
                                                    <option value="FLORENCIA JEANICE ANDREA LAKSITO">FLORENCIA JEANICE ANDREA LAKSITO</option>
                                                    <option value="FLORENZA">FLORENZA</option>
                                                    <option value="FRANSISCA CHRISTY RADIAN PUTRI">FRANSISCA CHRISTY RADIAN PUTRI</option>
                                                    <option value="FRANSISKA GIOVANNIA CHANDRA">FRANSISKA GIOVANNIA CHANDRA</option>
                                                    <option value="GABRIELLA JEANY MAHARANI PRIHANTO">GABRIELLA JEANY MAHARANI PRIHANTO</option>
                                                    <option value="GABRIELLA LARAS ANINDITA">GABRIELLA LARAS ANINDITA</option>
                                                    <option value="GIANNA ABIGAIL PANGUDI">GIANNA ABIGAIL PANGUDI</option>
                                                    <option value="GISELLE ALEXAMABEL WIDAKDO">GISELLE ALEXAMABEL WIDAKDO</option>
                                                    <option value="GIULIANA VICTORIA SANTOSA">GIULIANA VICTORIA SANTOSA</option>
                                                    <option value="GLINDA POHAN">GLINDA POHAN</option>
                                                    <option value="GRACE LETTICIA">GRACE LETTICIA</option>
                                                    <option value="GRACIELLA FELICIA ETENG">GRACIELLA FELICIA ETENG</option>
                                                    <option value="GRACIEVA CELESTE WIDAKDO">GRACIEVA CELESTE WIDAKDO</option>
                                                    <option value="GWEN">GWEN</option>
                                                    <option value="GWENNABELLE HEAVENLY XIE">GWENNABELLE HEAVENLY XIE</option>
                                                    <option value="HUANG YEN SETIAWAN">HUANG YEN SETIAWAN</option>
                                                    <option value="HUI">HUI</option>
                                                    <option value="JACQUELINE ABIGAIL PRASETYA">JACQUELINE ABIGAIL PRASETYA</option>
                                                    <option value="JANETTA DANICA OETOMO">JANETTA DANICA OETOMO</option>
                                                    <option value="JANITA BELOVEN LAKAMASA">JANITA BELOVEN LAKAMASA</option>
                                                    <option value="JASINDA KAYANA PUTRI GINOGA">JASINDA KAYANA PUTRI GINOGA</option>
                                                    <option value="JASMINE VIOLETTA EIFFEL">JASMINE VIOLETTA EIFFEL</option>
                                                    <option value="JEANY ROUKERS">JEANY ROUKERS</option>
                                                    <option value="JENNIFER STANNY LEE">JENNIFER STANNY LEE</option>
                                                    <option value="JENNIFER STEPHANIE WIBOWO">JENNIFER STEPHANIE WIBOWO</option>
                                                    <option value="JESLYN FLORENCIA ETENG">JESLYN FLORENCIA ETENG</option>
                                                    <option value="JESSECA AURYN RUMEKSO">JESSECA AURYN RUMEKSO</option>
                                                    <option value="JESSELYN ANNABEL CHRISTIAN">JESSELYN ANNABEL CHRISTIAN</option>
                                                    <option value="JESSELYN LIE">JESSELYN LIE</option>
                                                    <option value="JOANNA ISABEL KURNIADI">JOANNA ISABEL KURNIADI</option>
                                                    <option value="JOCELYN DOMINIQUE ARRON">JOCELYN DOMINIQUE ARRON</option>
                                                    <option value="JOEVANCA CHRYSELLYN BUDIANTO">JOEVANCA CHRYSELLYN BUDIANTO</option>
                                                    <option value="JOHANALIS HARI PRAMESTI">JOHANALIS HARI PRAMESTI</option>
                                                    <option value="JOY ANGELIA PRAKOSO">JOY ANGELIA PRAKOSO</option>
                                                    <option value="JOYCE KARISSA LOEKMAN">JOYCE KARISSA LOEKMAN</option>
                                                    <option value="KAMILA TALITA SHAKI PUTRIYANTO">KAMILA TALITA SHAKI PUTRIYANTO</option>
                                                    <option value="KATIYA SHAE MINNA">KATIYA SHAE MINNA</option>
                                                    <option value="KEIKO MAITRA ANANTA">KEIKO MAITRA ANANTA</option>
                                                    <option value="KEIKO VANESSA ONG">KEIKO VANESSA ONG</option>
                                                    <option value="KENISHA RAHMA ROZANO">KENISHA RAHMA ROZANO</option>
                                                    <option value="KENNICE">KENNICE</option>
                                                    <option value="KEYSHIA VaALLERINE LIEM">KEYSHIA VaALLERINE LIEM</option>
                                                    <option value="KEZIA MERY KUSUMANEGARA">KEZIA MERY KUSUMANEGARA</option>
                                                    <option value="KINAN">KINAN</option>
                                                    <option value="KINZEL MARVANIDYA E.P">KINZEL MARVANIDYA E.P</option>
                                                    <option value="KOMANG KEZIA SASHI KIRANA">KOMANG KEZIA SASHI KIRANA</option>
                                                    <option value="LAREINA DEO AISHAI HALEAKALA">LAREINA DEO AISHAI HALEAKALA</option>
                                                    <option value="LENKA ALEJANDRA NAMARA LAY">LENKA ALEJANDRA NAMARA LAY</option>
                                                    <option value="LIANG">LIANG</option>
                                                    <option value="LILY">LILY</option>
                                                    <option value="LUISA YASMIN SCHUELLER">LUISA YASMIN SCHUELLER</option>
                                                    <option value="LYNELLE EMILIE SUSANTO">LYNELLE EMILIE SUSANTO</option>
                                                    <option value="MALA">MALA</option>
                                                    <option value="MARA CHITU">MARA CHITU</option>
                                                    <option value="MARIA SELENA HANNI MICHELLA">MARIA SELENA HANNI MICHELLA</option>
                                                    <option value="MEICHA JENI SUDARMAN">MEICHA JENI SUDARMAN</option>
                                                    <option value="MEIME SETIAWAN">MEIME SETIAWAN</option>
                                                    <option value="MICHELLE KYLIE SUSANTO">MICHELLE KYLIE SUSANTO</option>
                                                    <option value="MIKEYLA ACELIN RUMEKSO">MIKEYLA ACELIN RUMEKSO</option>
                                                    <option value="MIMI">MIMI</option>
                                                    <option value="MYCHAELLA ARIENA KAIRUPAN">MYCHAELLA ARIENA KAIRUPAN</option>
                                                    <option value="NACITA ALODIE PUTRI ARIYANTO">NACITA ALODIE PUTRI ARIYANTO</option>
                                                    <option value="NAEEMA SHANUM BRAMANTYO">NAEEMA SHANUM BRAMANTYO</option>
                                                    <option value="NAJWA">NAJWA</option>
                                                    <option value="NAMIA PRATISTA ARIEFIANDY">NAMIA PRATISTA ARIEFIANDY</option>
                                                    <option value="NAOMI BENNETT WIJAYA">NAOMI BENNETT WIJAYA</option>
                                                    <option value="NATANEILA ANGELYNNE JOEVANCA">NATANEILA ANGELYNNE JOEVANCA</option>
                                                    <option value="NAURA">NAURA</option>
                                                    <option value="NAURA FARAHDIBA">NAURA FARAHDIBA</option>
                                                    <option value="NAURA KINAR">NAURA KINAR</option>
                                                    <option value="NAYARRA AURELIA">NAYARRA AURELIA</option>
                                                    <option value="NAYESHA ALMIRA PUTRI ARIYANTO">NAYESHA ALMIRA PUTRI ARIYANTO</option>
                                                    <option value="NAYLANAYA INDA AYU SUBROTO">NAYLANAYA INDA AYU SUBROTO</option>
                                                    <option value="NAYSILLA">NAYSILLA</option>
                                                    <option value="NI LUH P.A ANABEL A">NI LUH P.A ANABEL A</option>
                                                    <option value="NI MADE PUSPADHANTY ARYAPUTRI">NI MADE PUSPADHANTY ARYAPUTRI</option>
                                                    <option value="NICOLE ANNETTE LIE">NICOLE ANNETTE LIE</option>
                                                    <option value="NIKO THOMASHOW">NIKO THOMASHOW</option>
                                                    <option value="NINDITA CINTYA KINASIH">NINDITA CINTYA KINASIH</option>
                                                    <option value="OLIVIA CINTA WIBOWO">OLIVIA CINTA WIBOWO</option>
                                                    <option value="OLIVIA MAYANG NUR ADSHEAD">OLIVIA MAYANG NUR ADSHEAD</option>
                                                    <option value="OUNNI SETIAWAN">OUNNI SETIAWAN</option>
                                                    <option value="PATRICIA BELINDA RENDRANATA">PATRICIA BELINDA RENDRANATA</option>
                                                    <option value="PATRICIA CHERYL ANDREA LAKSITO">PATRICIA CHERYL ANDREA LAKSITO</option>
                                                    <option value="PEVITA ARJANEETA">PEVITA ARJANEETA</option>
                                                    <option value="PING">PING</option>
                                                    <option value="QUEEN GABRIELLA GINOGA">QUEEN GABRIELLA GINOGA</option>
                                                    <option value="RAENA TAN SUSANTO">RAENA TAN SUSANTO</option>
                                                    <option value="RAESHA HAYU PRASETIYO">RAESHA HAYU PRASETIYO</option>
                                                    <option value="RAFAELA ABIGAIL LAQUISHA SOETANTO">RAFAELA ABIGAIL LAQUISHA SOETANTO</option>
                                                    <option value="RENATA ZOEY PRAMOEDITO">RENATA ZOEY PRAMOEDITO</option>
                                                    <option value="RHEIN">RHEIN</option>
                                                    <option value="RUMAYSA YASMINA DANISH">RUMAYSA YASMINA DANISH</option>
                                                    <option value="SABRINA VICTORIA">SABRINA VICTORIA</option>
                                                    <option value="SAFRINA AULIA R">SAFRINA AULIA R</option>
                                                    <option value="SALLY">SALLY</option>
                                                    <option value="SAMANTHA ADELINE SUSANTO">SAMANTHA ADELINE SUSANTO</option>
                                                    <option value="SAMANTHA PUTRI CAUDWELL">SAMANTHA PUTRI CAUDWELL</option>
                                                    <option value="SANDRINA DILLA FARAWIANTO">SANDRINA DILLA FARAWIANTO</option>
                                                    <option value="SARAH">SARAH</option>
                                                    <option value="SELINA ALEXANDRA FABIANUS">SELINA ALEXANDRA FABIANUS</option>
                                                    <option value="SHANUM">SHANUM</option>
                                                    <option value="SHERRYNE">SHERRYNE</option>
                                                    <option value="SINDER TAMIMI">SINDER TAMIMI</option>
                                                    <option value="STELLA KINANTI KESA MAHESWARI">STELLA KINANTI KESA MAHESWARI</option>
                                                    <option value="STEPHANIE ANGIE LUXZA PRADANA">STEPHANIE ANGIE LUXZA PRADANA</option>
                                                    <option value="TAIRA LEE">TAIRA LEE</option>
                                                    <option value="THE ANGLITA MARSHA DAMARANTIE">THE ANGLITA MARSHA DAMARANTIE</option>
                                                    <option value="THE NINTYA SENANDUNG TIARA">THE NINTYA SENANDUNG TIARA</option>
                                                    <option value="TIRZA">TIRZA</option>
                                                    <option value="TRIRZANA GLEDA HERLAMBANG">TRIRZANA GLEDA HERLAMBANG</option>
                                                    <option value="TSANA">TSANA</option>
                                                    <option value="TSANIA">TSANIA</option>
                                                    <option value="VALLENE MIRACLE PUTHERA">VALLENE MIRACLE PUTHERA</option>
                                                    <option value="VANESSA FREYA NATHANAEL ONG">VANESSA FREYA NATHANAEL ONG</option>
                                                    <option value="VANILLA MILITESIA GIFTTAN">VANILLA MILITESIA GIFTTAN</option>
                                                    <option value="VENZA">VENZA</option>
                                                    <option value="VERENA ANGELICA">VERENA ANGELICA</option>
                                                    <option value="VIANCA">VIANCA</option>
                                                    <option value="VINDA NAVARA SIDDHARTA SOEGIYANTO">VINDA NAVARA SIDDHARTA SOEGIYANTO</option>
                                                    <option value="WYNONNA">WYNONNA</option>
                                                    <option value="YESSIKA NAFTALI BUANA">YESSIKA NAFTALI BUANA</option>
                                                    <option value="YOHANA BONIFACIA PUTRI ARDYANTI">YOHANA BONIFACIA PUTRI ARDYANTI</option>
                                                    <option value="YUTAKA">YUTAKA</option>
                                                    <option value="ZHOVIANCA FEVRIER HENDRANATA">ZHOVIANCA FEVRIER HENDRANATA</option>
                                                    <option value="ZI MOIRA ANDRETI">ZI MOIRA ANDRETI</option>
                                                </select>
                                                <div class="search">
                                                <!-- <a href="<?= base_url("spp/getspp"); ?>" method="post"><input type="submit" id="bulan" class="btn btn-primary btn-block" value="Cari"></a> -->
                                                <input type="submit" class="btn btn-success btn-block" value="Cari">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <table class="table display nowrap" id="spp" style="max-height: 350px;">
                            <thead>
                                <tr>
                                    <th>BULAN</th>
                                    <th>TANGGAL</th>
                                    <th>REF.ID</th>
                                    <th>JENIS PEMBAYARAN</th>
                                    <th>ATAS NAMA</th>
                                    <th>NOMINAL</th>
                                    <th>CATATAN</th>
                                    <th>KODE MURID</th>
                                    <th>MURID</th>
                                    <th>KELAS</th>
                                    <th>SUBKELAS</th>
                                </tr>
                            </thead>
                            <tbody class="table-bordered"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  
