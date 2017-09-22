<?php /* Smarty version Smarty-3.0.7, created on 2017-09-14 13:31:48
         compiled from "application/views/initiation/detail.html" */ ?>
<?php /*%%SmartyHeaderCode:85084643459ba22547a3d07-71289759%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eb4a04da432e0c561d441f2d2932b002110bc24d' => 
    array (
      0 => 'application/views/initiation/detail.html',
      1 => 1505370470,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '85084643459ba22547a3d07-71289759',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<section class="content-header">
    <h1>
        Pengolahan Data Initiation
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-database"></i> Initiation</a></li>
        <li class="active">Detail</li>
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
                    <h3 class="box-title">Form detail initiation</h3>
                    <div class="box-tools">
                        <a class="btn btn-sm btn-primary" href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('initiation/initiation');?>
" ><i class="fa fa-long-arrow-left"></i> Kembali</a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form class="form-horizontal" action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('initiation/initiation/detail');?>
" method="post">
                    <?php  $_smarty_tpl->tpl_vars['jn'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('join')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['jn']->key => $_smarty_tpl->tpl_vars['jn']->value){
?>
                        <input type="hidden" name="id_initiation" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['jn']->value['id_initiation'])===null||$tmp==='' ? '' : $tmp);?>
">
                        <div class="box-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="client_name">Client Name</label>
                                    <input type="text" name="client" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['jn']->value['client_name'])===null||$tmp==='' ? '' : $tmp);?>
" class="form-control"  title="Nama Client" readonly>
                                    </option>
                            </div>
                            <div class="form-group">
                                <label for="nama_karyawan">Team Members Name</label>
                                    <input type="text" name="nama_karyawan" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['jn']->value['nama_karyawan'])===null||$tmp==='' ? '' : $tmp);?>
" class="form-control" id="nama_karyawan" placeholder="" title="Nama Karyawan" readonly>
                            </div>
                            <div class="form-group">
                                <label for="project_title">Project title</label>
                                    <input type="text" name="project_title" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['jn']->value['project_title'])===null||$tmp==='' ? '' : $tmp);?>
" class="form-control" id="project_title" placeholder="" title="Judul Project" readonly>
                            </div>
                            <div class="form-group">
                                <label for="nama_department">Project Manager Department</label>
         
                               <!--  <?php  $_smarty_tpl->tpl_vars['ls'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['ls']->key => $_smarty_tpl->tpl_vars['ls']->value){
?>
                                     <?php echo $_smarty_tpl->tpl_vars['ls']->value;?>

                                <?php }} ?>-->
                                <!--<?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('dp')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
?>
                                <?php echo $_smarty_tpl->tpl_vars['d']->value;?>

                                <?php echo $_smarty_tpl->tpl_vars['d']->value['id_department'];?>

                                <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['d']->value['id_department'];?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['s'] = new Smarty_variable(explode(",",$_tmp1), null, null);?>
                                <?php echo print_r($_smarty_tpl->getVariable('s')->value);?>

                                <?php }} ?> -->
                                    <!-- <?php ob_start();?><?php echo $_smarty_tpl->getVariable('d')->value;?>
<?php $_tmp2=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['s'] = new Smarty_variable(explode(",",$_tmp2), null, null);?> -->
                                    <input type="text" name="nama_department" value="<?php echo $_smarty_tpl->tpl_vars['jn']->value['nama_department'];?>
" class="form-control" id="nama_department" placeholder="" title="Daftar nama department" readonly>

                               
                                        <!-- <?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('join')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
?>
                                        <?php $_smarty_tpl->tpl_vars['temp'] = new Smarty_variable(explode(",",$_smarty_tpl->tpl_vars['i']->value["nama_department"]), null, null);?>
                                        
                                        <?php }} ?>
                                        <?php echo print_r($_smarty_tpl->getVariable('temp')->value);?>
 -->
                       <!--              
                                    <?php  $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('s')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['k']->key => $_smarty_tpl->tpl_vars['k']->value){
?>
                                        <?php echo var_dump($_smarty_tpl->tpl_vars['k']->value);?>


                                    <?php }} ?>

                                    <?php echo (($tmp = @$_smarty_tpl->tpl_vars['jn']->value['nama_department'])===null||$tmp==='' ? '' : $tmp);?>

                        -->
                            </div>
                            <div class="form-group">
                            <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/themes/ckeditor/ckeditor.js"></script>
                                <label for="project_desc">Project Description</label>
                                    <textarea name="project_desc"  class="ckeditor" id="project_desc" placeholder="" title="Deskripsi Project" readonly><?php echo (($tmp = @$_smarty_tpl->tpl_vars['jn']->value['project_desc'])===null||$tmp==='' ? '' : $tmp);?>
</textarea>
                            </div>
                            <div class="form-group">
                            <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/themes/ckeditor/ckeditor.js"></script>
                                <label for="project_just">Project Justification</label>
                                    <textarea name="project_just" class="ckeditor" id="project_just" placeholder="" title="Justifikasi Project" readonly><?php echo (($tmp = @$_smarty_tpl->tpl_vars['jn']->value['project_just'])===null||$tmp==='' ? '' : $tmp);?>
</textarea>
                            </div>
                            <div class="form-group">
                            <div class="col-md-4">
                                <label for="budget">Budget</label>
                                    <input type="text" name="budget" value="Rp. <?php echo number_format((($tmp = @$_smarty_tpl->tpl_vars['jn']->value['budget'])===null||$tmp==='' ? '' : $tmp),2,",",".");?>
" class="form-control" id="budget" placeholder="" title="Estimasi harga" readonly >
                                </div>
                            </div>
                            <div class="form-group">
                            <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/themes/ckeditor/ckeditor.js"></script>
                                <label for="not_in_project">Not in project</label>
                                    <textarea name="not_in_project"  class="ckeditor" id="not_in_project" placeholder="" title="Yang tidak diperlukan" readonly><?php echo (($tmp = @$_smarty_tpl->tpl_vars['jn']->value['not_in_project'])===null||$tmp==='' ? '' : $tmp);?>
</textarea>
                            </div>
                            <div class="form-group">
                            <div class="col-md-4">
                                <label for="start_date">Start date</label>    
                                    <input type="text" name="start_date" value="<?php echo date('d F Y',strtotime((($tmp = @$_smarty_tpl->tpl_vars['jn']->value['start_date'])===null||$tmp==='' ? '' : $tmp)));?>
" class="form-control" id="start_date" placeholder="" title="Tanggal memulai" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                            <div class="col-md-4">
                                <label for="due_date">Due date</label>
                                    <input type="text" name="due_date" value="<?php echo date('d F Y',strtotime((($tmp = @$_smarty_tpl->tpl_vars['jn']->value['due_date'])===null||$tmp==='' ? '' : $tmp)));?>
" class="form-control" id="due_date" placeholder="" title="Tanggal target selesai" readonly>
                            </div>
                            </div>

                        </div>


                            <!--<div class="form-group">
                                <label for="id_department" class="col-sm-2 control-label">Department</label>
                                <div class="col-sm-4">
                                    <select name="department" >
                                        <option value="" selected="selected" disabled="disabled"></option>
                                           <?php  $_smarty_tpl->tpl_vars['d_dp'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data_department')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['d_dp']->key => $_smarty_tpl->tpl_vars['d_dp']->value){
?>
                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['d_dp']->value['id_department'];?>
"><?php echo $_smarty_tpl->tpl_vars['d_dp']->value['nama_department'];?>
</option>
                                            <?php }} else { ?>
                                                   Data tidak ditemukan !
                                           <?php } ?>
                                    </select>
                                </div>
                            </div>
                             -->
                        <!-- /.box-body -->
                        <center>
                        <div class="col-md-6">
                        <div class="form-group">
                                <label for="files[]">Files</label>
                                <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('initiation/initiation/pdf_view');?>
" target="_blank">
                                    <table>
                                        <tr>
                                            <td><img alt="file" src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/doc/images/icon/aa.png" width="50px" height="50px"></td>
                                        </tr>
                                        <tr>
                                            <td>apabae</td>
                                        </tr>
                                    </table>
                                </a> 
                        </div>

                        <div class="form-group">
                                    <button type="button" name="accept" class="btn btn-success">Accept</button>&nbsp;&nbsp;
                                    <button type="button" name="reject" class="btn btn-danger">Reject</button>
                                    &nbsp;&nbsp;
                                    <br>
                                    <br>
                                    <br>

                </form>

                        </div>
                        </div>
                        </center>

                <form class="form-horizontal" action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('initiation/initiation/komentar_process');?>
" method="post">
                        <div class="form-group">
                            <div class="col-md-6">
                                    Komentar :
                                    <?php  $_smarty_tpl->tpl_vars['km'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('komen')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['km']->key => $_smarty_tpl->tpl_vars['km']->value){
?>
                                        <br>
                                        <b><textarea disabled class="form-control">
                                            <?php echo $_smarty_tpl->tpl_vars['km']->value['komentar'];?>
</textarea></b>
                                <div align="right">
                                    Dikomentari pada : 
                                        <br>
                                            <?php echo $_smarty_tpl->tpl_vars['km']->value['tgl_komentar'];?>

                                        <br>
                                    <?php }} ?>
                                </div>
                                    <input type="hidden" name="id_initiation" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['jn']->value['id_initiation'])===null||$tmp==='' ? '' : $tmp);?>
">
                                    <input type="hidden" name="tgl_komentar" max = "50" value="<?php echo date('d-m-Y h:i:sa');?>
">
                                        <br>
                                        <textarea name="komentar" class="form-control" id="komentar" title="Komentar"></textarea>
                                            <br>
                                <div align="right">
                                    <button type="submit" name="submit" class="btn btn-info">Comment</button>
                                </div>
                            </div>
                        </div>
                        <?php }} ?>

                </form>

                        <!-- /.box-footer -->
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