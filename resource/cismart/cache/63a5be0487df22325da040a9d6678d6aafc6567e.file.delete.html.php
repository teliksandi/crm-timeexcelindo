<?php /* Smarty version Smarty-3.0.7, created on 2017-08-11 04:45:53
         compiled from "application/views\master/karyawan/delete.html" */ ?>
<?php /*%%SmartyHeaderCode:26428598d1a61e8bdc6-76121291%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '63a5be0487df22325da040a9d6678d6aafc6567e' => 
    array (
      0 => 'application/views\\master/karyawan/delete.html',
      1 => 1502384267,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26428598d1a61e8bdc6-76121291',
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
        <li><a href="#"> Kategori</a></li>
        <li class="active">Hapus Data</li>
    </ol>
</section>

<section class="content">
    <!-- notification template -->
    <?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    <!-- end of notification template-->
    <div class="row">
        <div class="col-md-12">

            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Apakah anda yakin ingin menghapus data ini ?</h3>
                    <div class="box-tools">
                        <a class="btn btn-sm btn-default" href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('master/karyawan');?>
" ><i class="fa fa-long-arrow-left"></i> Kembali</a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form class="form-horizontal" action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('master/karyawan/delete_process');?>
" method="post">
                        <input type="hidden" name="no_identitas" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['no_identitas'])===null||$tmp==='' ? '' : $tmp);?>
">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="nama_karyawan" class="col-sm-2 control-label">Nama Karyawan</label>
                                <div class="col-sm-4">
                                    <input type="text" name="nama_karyawan" disabled value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['nama_karyawan'])===null||$tmp==='' ? '' : $tmp);?>
" class="form-control" id="nama_karyawan" placeholder="">
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-md-3 col-md-offset-2">
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i> Hapus</button>
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
