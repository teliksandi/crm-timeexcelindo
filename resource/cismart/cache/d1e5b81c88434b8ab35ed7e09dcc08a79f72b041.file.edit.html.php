<?php /* Smarty version Smarty-3.0.7, created on 2017-11-16 06:40:05
         compiled from "application/views\execution/edit.html" */ ?>
<?php /*%%SmartyHeaderCode:4017671725a0d24b5407940-09035336%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd1e5b81c88434b8ab35ed7e09dcc08a79f72b041' => 
    array (
      0 => 'application/views\\execution/edit.html',
      1 => 1510801248,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4017671725a0d24b5407940-09035336',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<section class="content-header">
    <h1>
        Pengolahan Data Execution
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-briefcase"></i> Execution</a></li>
        <li><a href="#">Data Execution</a></li>
        <li class="active">Edit Data Execution</li>
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
                    <h3 class="box-title">Form Ubah Data execution</h3>
                    <div class="box-tools">
                        <a class="btn btn-sm btn-primary" href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('execution/execution');?>
" ><i class="fa fa-long-arrow-left"></i> Kembali</a>
                    </div>
                </div>
                <!-- /.box-header --> 
                <?php  $_smarty_tpl->tpl_vars['rs'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('result')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['rs']->key => $_smarty_tpl->tpl_vars['rs']->value){
?>

                <div class="box-body">
                    <form  action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('execution/execution/edit_process');?>
" method="post">
                    <input type="hidden" name="id_execution" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['rs']->value['id_execution'])===null||$tmp==='' ? '' : $tmp);?>
">
                        <div class="box box-default" data-url="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
">
                            <div class="box-header with-border">
                                <label><h4><b>
                                    Detail Execution
                                </b></h4></label>
                            <br>
                            <div class="col-md-6">
                                <div class="form-group">         
                                    <label>Project Title</label>
                                        <input type="text" name="judul_project" value ="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['rs']->value['project_title'])===null||$tmp==='' ? '' : $tmp);?>
" placeholder="" title="Masukkan Judul Project" class="form-control" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Project Manager Department</label>
                                    <br>
                                    <select name="depart_edit[]"  class="form-control select2 " multiple="multiple" title="Pilih Manager Department Project">
                                        <?php  $_smarty_tpl->tpl_vars['cth'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('datadepartment')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['cth']->key => $_smarty_tpl->tpl_vars['cth']->value){
?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['cth']->value['id_department'];?>
" <?php if (in_array($_smarty_tpl->tpl_vars['cth']->value['id_department'],$_smarty_tpl->getVariable('ex')->value)){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['cth']->value['nama_department'];?>
</option>
                                        <?php }} else { ?>
                                        Data tidak ditemukan !
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Team Member Name</label>
                                    <br>
                                    <select name="kary_edit[]" title="Pilih Anggota Tim" class="form-control select2 " data-value="" multiple="multiple">
                                         <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('marketing_kar')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['value']->value['id_karyawan'];?>
" <?php if (in_array($_smarty_tpl->tpl_vars['value']->value['id_karyawan'],$_smarty_tpl->getVariable('exs')->value)){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['value']->value['nama_karyawan'];?>
</option>
                                        <?php }} else { ?>
                                        Data tidak ditemukan !
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Client</label>
                                    <br>
                                        <select name="client" class="form-control select2" min="0" max="40" multiple disabled>
                                            <?php  $_smarty_tpl->tpl_vars['cath'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('clientedit')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['cath']->key => $_smarty_tpl->tpl_vars['cath']->value){
?>
                                                <option value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['rs']->value['id_client'])===null||$tmp==='' ? '' : $tmp);?>
" <?php if ($_smarty_tpl->tpl_vars['rs']->value['id_client']==$_smarty_tpl->tpl_vars['cath']->value['id_client']){?> selected <?php }?>><?php echo $_smarty_tpl->tpl_vars['cath']->value['client_name'];?>
</option>
                                            <?php }} else { ?>
                                            Data tidak ditemukan !
                                            <?php } ?>
                                        </select>
                                </div>
                                <div class="form-group">
                                    <label>Budget</label><br><b>Rp.</b>
                                    <input type="text" name="money" value ="<?php echo number_format((($tmp = @$_smarty_tpl->tpl_vars['rs']->value['budget'])===null||$tmp==='' ? '' : $tmp),2,",",".");?>
" title="Masukkan Jumlah Uang" data-inputmask="'alias': 'numeric', 'groupSeparator':'.', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'prefix': ' ', 'placeholder': '0'" data-mask required disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" style="overflow: scroll; width: 100%; height: 400px;">
                                    <div class="form-group">
                                        <label>Project Description</label>
                                            <textarea name="deskripsi" title="Masukkan Deskripsi tentang Project" rows="3" cols="35" class="ckeditor" id="ckedtor" placeholder="" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" disabled><?php echo (($tmp = @$_smarty_tpl->tpl_vars['rs']->value['project_desc'])===null||$tmp==='' ? '' : $tmp);?>
</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Project Justification</label> 
                                            <textarea name="justifikasi" title="Masukkan Justifikasi Project" placeholder="" class="ckeditor" id="ckedtor2" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" disabled><?php echo (($tmp = @$_smarty_tpl->tpl_vars['rs']->value['project_just'])===null||$tmp==='' ? '' : $tmp);?>
</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Not in this Project</label> 
                                            <textarea name="not_in" rows="3" cols="35" class="ckeditor" id="ckedtor3" title="Masukkan Data yang tidak ada pada Project" placeholder="" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" disabled><?php echo (($tmp = @$_smarty_tpl->tpl_vars['rs']->value['not_in_project'])===null||$tmp==='' ? '' : $tmp);?>
</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                            <div class="box box-success">
                                <div class="box-header with-border">
                                    <tr>
                                        <label><h4><b>
                                            Date And Upload  - Target Penyelesaian Inisiasi
                                        </b></h4></label>
                                        <td>
                                            <table>
                                                <tr>
                                                    <td width="250px" align="center"><b>Start date</b></td>
                                                    <td width="250px" align="center"><b>Due date</b></td>
                                                    <td width="450px"  align="center"><b>Pilih File</b></td>
                                                    <td width="450px" align="center"><b>Delete File</b></td>
                                                </tr>
                                                <tr>
                                                    <td align="center">
                                                        <input type="text" name="tanggal_start" value ="<?php echo date('d F Y',strtotime((($tmp = @$_smarty_tpl->tpl_vars['rs']->value['mulai'])===null||$tmp==='' ? '' : $tmp)));?>
" class="tanggal" maxlength="10" size="10" disabled style="width: 150px; text-align: center;">
                                                    </td>
                                                    <td align="center">
                                                        <input type="text" name="tanggal_due" value ="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['rs']->value['akhir'])===null||$tmp==='' ? '' : $tmp);?>
" class="tanggal" maxlength="10" size="10" disabled style="width: 150px; text-align: center;">
                                                    </td>
                                                    <td align="center">
                                                    (File Berbentuk png, jpg, jpeg, docx, pdf, xlsx, pptx , rar, zip.)<br>
                                                    Ket : Gunakan Ctrl + Click Untuk Memilih > 1 File Pada Folder File
                                                        <input type="file" name="files[]" id="files" multiple>
                                                    </td>
                                                    <td align="center">
                                                        <div style="overflow-y: scroll; height: 120px; width: 100%;">
                                                            <?php  $_smarty_tpl->tpl_vars['f'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('ef_e')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['f']->key => $_smarty_tpl->tpl_vars['f']->value){
?>
                                                                <table>
                                                                    <input type="hidden" name="nm" value="<?php echo $_smarty_tpl->tpl_vars['f']->value;?>
">
                                                                        <div class="form-group" align="center">
                                                                            <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('initiation/initiation/pdf_view');?>
/<?php echo $_smarty_tpl->tpl_vars['f']->value;?>
" target="_blank" style="width: 300px;"><?php echo $_smarty_tpl->tpl_vars['f']->value;?>
</a>    <?php if ($_smarty_tpl->tpl_vars['f']->value!==''){?>  <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('execution/execution/delete_file');?>
/<?php echo $_smarty_tpl->tpl_vars['f']->value;?>
" class="btn btn-xs btn-danger" title="Delete"><i class="fa fa-trash-o" title="Delete"></i></a><?php }?>
                                                                        </div>
                                                            <?php if ($_smarty_tpl->tpl_vars['f']->value!==''){?>
                                                                    <hr></hr>
                                                            <?php }?>
                                                                </table>
                                                            <?php }} ?>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </div>
                            </div>
                        <?php }} ?>
                                <div class="form-group">
                                    <center>
                                        <button type="submit" class="btn btn-success">Simpan</button>&nbsp;&nbsp;
                                       
                                        <input type="button" value="Reset" class="btn btn-danger" onClick="history.go(0)">
                                    </center>
                                    <br>
                                </div>
                    </form>

<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/themes/ckeditor/ckeditor.js"></script>

 <script>
$('#files').change(function(){
  var files = $('#files')[0].files;
  var error = '';
  var form_data = new FormData();
  for(var count = 0; count<files.length; count++)
  {
   var name = files[count].name;
   var extension = name.split('.').pop().toLowerCase();
   if(jQuery.inArray(extension, ['png','jpg','jpeg','docx','pdf','xlsx','pptx','rar','zip']) == -1)
   {
    error = "Pilih file dengan format png, jpg, jpeg, docx, pdf, xlsx, pptx, rar, zip"
   }
   else
   {
    form_data.append("files[]", files[count]);
   }
  }
  if(error == '')
  {
   $.ajax({
    url:"<?php echo $_smarty_tpl->getVariable('config')->value->site_url('initiation/initiation/upload_f');?>
", //base_url() return http://localhost/tutorial/codeigniter/
    method:"POST",
    data:form_data,
    contentType:false,
    cache:false,
    processData:false,
    beforeSend:function()
    {
     $('#uploaded_images').html("<label class='text-success'>Uploading...</label>");
    },
    success:function(data)
    {
     $('#uploaded_images').html(data);
     $('#files').val('');
    }
   })
  }
  else
  {
   alert(error);
  }
 });
    
 </script>
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
