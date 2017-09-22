<?php /* Smarty version Smarty-3.0.7, created on 2017-09-06 14:23:24
         compiled from "application/views/master/client/add_client.html" */ ?>
<?php /*%%SmartyHeaderCode:139515951859afa26c5e0c08-53200883%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dfc3692a6a2e2c0ae9ef3697fb4c59b4a3a9ebcf' => 
    array (
      0 => 'application/views/master/client/add_client.html',
      1 => 1504682600,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '139515951859afa26c5e0c08-53200883',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<section class="content-header">
    <h1>
        Penambahan Data Client
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-database"></i> Master</a></li>
        <li><a href="#"> Client</a></li>
        <li class="active">Tambah Data</li>
    </ol>
</section>

<section class="content">
    <!-- notification template -->
    <?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    <!-- end of notification template-->
    <div class="row">
        <div class="col-md-12">

            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Data Client</h3>
                    <div class="box-tools">
                        <a class="btn btn-sm btn-primary" href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('master/client');?>
" ><i class="fa fa-long-arrow-left"></i> Kembali</a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form class="form-horizontal" action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('master/client/add_process');?>
" method="post" name="kk">
                <div class="box-header with-border">
     <div class="col-md-6">
        <tr>
            <label>Client Name</label>
            <input type="text" name="client_name" size="10" maxlength="40" placeholder="" class="form-control" title="Masukkan Nama Client" required>
        </tr>
        <tr>
            <label>Client Address</label>
            <textarea name="client_address" size="10" maxlength="40" placeholder="" class="form-control" title="Masukkan Alamat Client" required></textarea>
        </tr>
        <tr>
            <label>Person Name</label>
            <input type="text" name="person_name" size="10" maxlength="40" placeholder="" class="form-control" title="Masukkan Nama Personal" required>
        </tr>
        <tr>
            <label>Job Position</label>
            <input type="text" name="job_position" size="10" maxlength="40" placeholder="" class="form-control" title="Masukkan Posisi Pekerjaan" required>
        </tr>
        <br>
                <tr>
            <label>No. Telp</label>&nbsp;&nbsp;
            <br>
            <b>+62-8</b>&nbsp;
            <input type="number" id="telepon" size="10" maxlength="40" name="telepon" placeholder="" title="Masukkan Nomor Telepon" required  onchange="myFunction()">
                <script>
    function myFunction() {
    var x = '+628';
    var y = document.getElementById("telepon").value;
    var hasil = x + y;
        document.kk.hsl_telp.value = hasil;
}
</script>
<input type="hidden" name="hsl_telp" id="hsl_telp">
        </tr>
        <br>
        <br>
        <tr>
            <label>Email</label> 
            <input type="email" name="email" size="10" maxlength="40" placeholder="" class="form-control" title="Masukkan Email">
        </tr>
     </div>
    </div>
                        <!-- /.box-footer -->
<div class="box-header with-border">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-success">Simpan</button>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button type="reset" value="reset" name="reset" class="btn btn-danger">Reset</button>
    </div>

                    </form>
                </div>
                 
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <?php echo (($tmp = @$_smarty_tpl->getVariable('pagination')->value['data'])===null||$tmp==='' ? '' : $tmp);?>

                </div>
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
</section>