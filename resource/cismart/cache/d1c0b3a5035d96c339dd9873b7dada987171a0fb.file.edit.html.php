<?php /* Smarty version Smarty-3.0.7, created on 2017-11-22 08:09:50
         compiled from "application/views\initiation/edit.html" */ ?>
<?php /*%%SmartyHeaderCode:48565a1522be0542e4-90405685%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd1c0b3a5035d96c339dd9873b7dada987171a0fb' => 
    array (
      0 => 'application/views\\initiation/edit.html',
      1 => 1511333931,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '48565a1522be0542e4-90405685',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<section class="content-header">
    <br>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-book"></i> Initiation</a></li>
        <li><a href="#">Data Initiation</a></li>
        <li class="active">Edit Data Initiation</li>
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
                    <h3><b>Form Ubah Data Initiation</b></h3>
                    <div class="box-tools">
                        <br><a class="btn btn-sm btn-primary" href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('initiation/initiation');?>
" ><i class="fa fa-long-arrow-left"></i> Kembali</a>
                    </div>
                </div>
                <!-- /.box-header -->
            </div>
            <!-- box box -->
        </div>
        <!-- col -->

                <form  action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('initiation/initiation/edit_process');?>
" method="post">
                    <input type="hidden" name="id_initiation" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['id_initiation'])===null||$tmp==='' ? '' : $tmp);?>
">
                        <div class="col-md-6">
                            <div class="box">
                                <div class="box-body">
                                    <div class="form-group">
                                        <h5><b>Project Title</b></h5>
                                            <input type="text" name="judul_project" value ="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['project_title'])===null||$tmp==='' ? '' : $tmp);?>
" placeholder="" title="Masukkan Judul Project" class="form-control" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
                                    </div>
                                    <div class="form-group">
                                        <h5><b>Project Manager Department</b></h5>
                                            <select name="department[]" id="department" class="form-control select2 " multiple="multiple" title="Pilih Manager Department Project">
                                                <?php  $_smarty_tpl->tpl_vars['cth'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('datadepartment')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['cth']->key => $_smarty_tpl->tpl_vars['cth']->value){
?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['cth']->value['id_department'];?>
"<?php if (in_array($_smarty_tpl->tpl_vars['cth']->value['id_department'],$_smarty_tpl->getVariable('ex')->value)){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['cth']->value['nama_department'];?>
</option>
                                                    <?php }} else { ?>
                                                    Data tidak ditemukan !
                                                    <?php } ?>
                                            </select>
                                    </div>
                                    <div class="form-group">
                                        <h5><b>Team Member Name</b></h5>
                                            <select name="karyawan[]" title="Pilih Anggota Tim" class="form-control select2 " data-value="" multiple="multiple">
                                                  <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('marketing_kar')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['value']->value['id_karyawan'];?>
"<?php if (in_array($_smarty_tpl->tpl_vars['value']->value['id_karyawan'],$_smarty_tpl->getVariable('exs')->value)){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['value']->value['nama_karyawan'];?>
</option>
                                                  <?php }} else { ?>
                                                  Data tidak ditemukan !
                                                  <?php } ?>
                                            </select>
                                    </div>
                                    <div class="form-group">
                                        <h5><b>Client</b></h5>
                                            <select name="client" class="form-control select2" min="0" max="40" multiple>
                                                    <?php  $_smarty_tpl->tpl_vars['cath'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('clientedit')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['cath']->key => $_smarty_tpl->tpl_vars['cath']->value){
?>
                                                    <option value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['id_client'])===null||$tmp==='' ? '' : $tmp);?>
" <?php if ($_smarty_tpl->getVariable('result')->value['id_client']==$_smarty_tpl->tpl_vars['cath']->value['id_client']){?> selected <?php }?>><?php echo $_smarty_tpl->tpl_vars['cath']->value['client_name'];?>
</option>
                                                    <?php }} else { ?>
                                                    Data tidak ditemukan !
                                                    <?php } ?>
                                            </select>
                                    </div>
                                    <div class="form-group">
                                            <h5><b>Budget</b></h5><b><input type="text" name="Rp." value="Rp." disabled style="width: 6%;"></b><input type="text" name="money" value ="<?php echo number_format((($tmp = @$_smarty_tpl->getVariable('result')->value['budget'])===null||$tmp==='' ? '' : $tmp),2,",",".");?>
" title="Masukkan Jumlah Uang" data-inputmask="'alias': 'numeric', 'groupSeparator':'.', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'prefix': ' ', 'placeholder': '0'" data-mask required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="box">
                                <div class="box-body">
                                    <div class="form-group" style="overflow: scroll; width: 100%; height: 360px;">
                                        <div class="form-group">
                                            <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/themes/ckeditor/ckeditor.js"></script>
                                                <h5><b>Project Description</b></h5>
                                                    <textarea name="deskripsi" title="Masukkan Deskripsi tentang Project" rows="3" cols="35" class="ckeditor" id="ckedtor" placeholder="" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"><?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['project_desc'])===null||$tmp==='' ? '' : $tmp);?>

                                                    </textarea>
                                        </div>
                                        <div class="form-group">
                                            <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/themes/ckeditor/ckeditor.js"></script>
                                                <h5><b>Project Justification</b></h5>
                                                    <textarea name="justifikasi" title="Masukkan Justifikasi Project" placeholder="" class="ckeditor" id="ckedtor2" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"><?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['project_just'])===null||$tmp==='' ? '' : $tmp);?>

                                                    </textarea>
                                        </div>
                                        <div class="form-group">
                                            <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/themes/ckeditor/ckeditor.js"></script>
                                                <h5><b>Not in this Project</b></h5>
                                                    <textarea name="not_in" rows="3" cols="35" class="ckeditor" id="ckedtor3" title="Masukkan Data yang tidak ada pada Project" placeholder="" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"><?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['not_in_project'])===null||$tmp==='' ? '' : $tmp);?>

                                                    </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- row -->

                    <div class="row">
                    <div class="col-md-6">
                        <div class="box box-success">
                            <div class="box-body">
                                <center><h5><b>Target Penyelesaian Initiation</b></h5></center>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="box box-success">
                            <div class="box-body">
                                <center><h5><b>Upload File/Berkas</b></h5></center>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="box">
                            <div class="box-body">
                                <table>
                                    <tr>
<<<<<<< HEAD
                                        <td width="230px" align="center"><b>Start Date</b></td>
                                        <td>     </td>
                                        <td width="230px" align="center"><b>Due Date</b></td>
                                    </tr>
                                    <tr>
                                        <td align="center">
                                            <br><input type="text" name="tanggal_start" value ="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['start_date'])===null||$tmp==='' ? '' : $tmp);?>
" class="tanggal" maxlength="10" size="10" style="width: 150px; text-align: center;">
                                        </td>
                                        <td>     </td>
                                        <td align="center">
                                            <br><input type="text" name="tanggal_due" value ="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['due_date'])===null||$tmp==='' ? '' : $tmp);?>
" class="tanggal" maxlength="10" size="10" style="width: 150px; text-align: center;">
                                        </td>
                                    </tr>
                                </table>
                                <br><br>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="box">
                            <div class="box-body">
                                <b>Pilih File</b><br><br>
                                <input type="file" name="files[]" id="files" multiple title="(File berbentuk png, jpg, docx, pdf, xlsx, ppt , rar, zip) Ket : Gunakan Ctrl + Click Untuk Memilih > 1 File Pada Folder File"><br>
                            </div><br>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="box">
                            <div class="box-body">
                                <b>List File</b><br><br>
                                <div style="overflow-y: scroll; height: 60px; width: 100%;">
                                        <?php  $_smarty_tpl->tpl_vars['f'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('ef')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['f']->key => $_smarty_tpl->tpl_vars['f']->value){
?>
                                        <center>
                                        <table>
                                            <input type="hidden" name="nm" value="<?php echo $_smarty_tpl->tpl_vars['f']->value;?>
">
                                                <div class="form-group">
                                                    <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('initiation/initiation/pdf_view');?>
/<?php echo $_smarty_tpl->tpl_vars['f']->value;?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['f']->value;?>
</a>    <?php if ($_smarty_tpl->tpl_vars['f']->value!==''){?>  <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('initiation/initiation/delete_file');?>
/<?php echo $_smarty_tpl->tpl_vars['f']->value;?>
" class="btn btn-xs btn-danger" title="Delete"><i class="fa fa-trash-o" title="Delete"></i></a><?php }?>
                                                </div>
                                        <?php if ($_smarty_tpl->tpl_vars['f']->value!==''){?>
                                                <hr></hr>
                                        <?php }?>
                                        </table>
                                    </center>
                                        <?php }} ?>
                                    
=======
                                        <label><h4><b>
                                            Date And Upload  - Target Penyelesaian Inisiasi
                                        </b></h4></label>
                                        <td>
                                            <table>
                                                <tr>
                                                    <td width="250px" align="center"><b>Start date</b></td>
                                                    <td width="250px" align="center"><b>Due date</b></td>
                                                    <td width="500px"  align="center"><b>Tambahkan File Baru</b></td>
                                                    <td width="500px"  align="center"><b>Detail File</b></td>
                                                </tr>
                                                <tr>
                                                    <td align="center">
                                                        <input type="text" name="tanggal_start" value ="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['start_date'])===null||$tmp==='' ? '' : $tmp);?>
" class="tanggal" maxlength="10" size="10" style="width: 150px; text-align: center;">
                                                    </td>
                                                    <td align="center">
                                                        <input type="text" name="tanggal_due" value ="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['due_date'])===null||$tmp==='' ? '' : $tmp);?>
" class="tanggal" maxlength="10" size="10" style="width: 150px; text-align: center;">
                                                    </td>
                                                    <td align="center">
                                                        <div class="form-group"><br>
                                                                (File Berbentuk png, jpg, jpeg, docx, pdf, xlsx, ppt , rar, zip.)<br>
                                                                Ket : Gunakan Ctrl + Click Untuk Memilih > 1 File Pada Folder File
                                                                <input type="file" name="files[]" id="files" multiple>
                                                        </div>
                                                    </td>
                    </form>
                                                    <td align="center">
                                                        <div style="overflow-y: scroll; height: 120px; width: 100%;">
                                                        <form class="form-horizontal" action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('initiation/initiation/pdf_view');?>
" method="post" target="blank">
                                                        <!-- **************************************************** ini baru ***************************************-->
                                                                <?php  $_smarty_tpl->tpl_vars['f'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('ef')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['f']->key => $_smarty_tpl->tpl_vars['f']->value){
?>
                                                                    <table>
                                                                        <input type="hidden" name="nm" value="<?php echo $_smarty_tpl->tpl_vars['f']->value;?>
">
                                                                            <div class="form-group">
                                                                                <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('initiation/initiation/pdf_view');?>
/<?php echo $_smarty_tpl->tpl_vars['f']->value;?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['f']->value;?>
</a>    <?php if ($_smarty_tpl->tpl_vars['f']->value!==''){?>  <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('initiation/initiation/delete_file');?>
/<?php echo $_smarty_tpl->tpl_vars['f']->value;?>
" class="btn btn-xs btn-danger" title="Delete"><i class="fa fa-trash-o" title="Delete"></i></a><?php }?>
                                                                            </div>
                                                                <?php if ($_smarty_tpl->tpl_vars['f']->value!==''){?>
                                                                            <hr></hr>
                                                                <?php }?>
                                                                    </table>
                                                                <?php }} ?>
                                                        <!-- ************************************************************************************************ -->
                                                        </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
>>>>>>> 48719cd63679c487692bd7dd62168d14e71b21b3
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-body">
                                <div class="form-group">
                                <br>
                                        <center>
                                            <button type="submit" class="btn btn-success" id="kirim">Simpan</button>                         
                                                <button type="reset" value="reset" name="reset" class="btn btn-danger">Reset</button>
                                        </center>
                                    </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
            <!-- row -->

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
        <!-- /.col -->
        </div>
</section>