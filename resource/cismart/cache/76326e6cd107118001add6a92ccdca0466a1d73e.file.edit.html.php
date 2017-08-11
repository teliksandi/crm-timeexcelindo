<?php /* Smarty version Smarty-3.0.7, created on 2017-08-11 08:34:58
         compiled from "application/views\master/karyawan/edit.html" */ ?>
<?php /*%%SmartyHeaderCode:20981598d50128db4b9-54244790%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '76326e6cd107118001add6a92ccdca0466a1d73e' => 
    array (
      0 => 'application/views\\master/karyawan/edit.html',
      1 => 1502384267,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20981598d50128db4b9-54244790',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<section class="content-header">
    <h1>
        Pengolahan Data Karyawan
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-database"></i> Master</a></li>
        <li><a href="#"> Karyawan</a></li>
        <li class="active">Ubah Data</li>
    </ol>
</section>

<section class="content">
    <!-- notification template -->
    <?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    <!-- end of notification template-->
    <div class="row">
        <div class="col-md-12">

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Form Ubah Data Karyawan</h3>
                    <div class="box-tools">
                        <a class="btn btn-sm btn-default" href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('master/karyawan');?>
" ><i class="fa fa-long-arrow-left"></i> Kembali</a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form class="form-horizontal" action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('master/karyawan/edit_process');?>
" method="post">
                        <input type="hidden" name="no_identitas" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['no_identitas'])===null||$tmp==='' ? '' : $tmp);?>
">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="nama_karyawan" class="col-sm-2 control-label">Nama Karyawan</label>
                                <div class="col-sm-4">
                                    <input type="text" name="nama_karyawan" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['nama_karyawan'])===null||$tmp==='' ? '' : $tmp);?>
" class="form-control" id="nama_karyawan" placeholder="">
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-md-3 col-md-offset-2">
                                    <button type="reset" class="btn btn-default">Reset</button>
                                    <button type="submit" class="btn btn-info">Simpan</button>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-footer -->
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
