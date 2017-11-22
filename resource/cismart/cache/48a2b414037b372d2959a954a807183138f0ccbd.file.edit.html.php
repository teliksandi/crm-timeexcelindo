<?php /* Smarty version Smarty-3.0.7, created on 2017-09-12 10:48:25
         compiled from "application/views/initiation/edit.html" */ ?>
<?php /*%%SmartyHeaderCode:81288092659b75909ae6335-37976339%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '48a2b414037b372d2959a954a807183138f0ccbd' => 
    array (
      0 => 'application/views/initiation/edit.html',
      1 => 1505188102,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '81288092659b75909ae6335-37976339',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<script type="text/javascript">
    $(document).ready(function () {
        // date picker
        $(".tanggal").datepicker({
            changeMonth: true,
            changeYear: true,
            buttonImageOnly: true,
            yearRange: '1970:2000',
            dateFormat: 'yy-mm-dd'
        });
        
    });
</script>
<section class="content-header">
    <h1>
        Pengolahan Data Initiation
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-database"></i> Master</a></li>
        <li><a href="#">Initiation</a></li>
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

            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Form Ubah Data Initiation</h3>
                    <div class="box-tools">
                        <a class="btn btn-sm btn-primary" href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('initiation/initiation');?>
" ><i class="fa fa-long-arrow-left"></i> Kembali</a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form  action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('initiation/initiation/edit_process');?>
" method="post">
                    <input type="hidden" name="id_initiation" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['id_initiation'])===null||$tmp==='' ? '' : $tmp);?>
">
<div class="box box-default" data-url="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
">
    <div class="box-header with-border">
        <label><h4><b>
            Detail Project
        </b></h4></label>
    <br>
    <div class="col-md-6">
        <div class="form-group">
            <label>Project Title</label>
            <input type="text" name="judul_project" 
            value ="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['project_title'])===null||$tmp==='' ? '' : $tmp);?>
" placeholder="" title="Masukkan Judul Project" class="form-control" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
        </div>

        <div class="form-group">
            <label>Project Manager Department</label>
            <br>
            <select name="department[]" class="form-control select2 department" multiple title="Pilih Manager Department Project">
                    <?php  $_smarty_tpl->tpl_vars['cth'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('datadepartment')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['cth']->key => $_smarty_tpl->tpl_vars['cth']->value){
?>
                <option value=<?php echo $_smarty_tpl->tpl_vars['cth']->value['id_department'];?>
><?php echo $_smarty_tpl->tpl_vars['cth']->value['nama_department'];?>
</option>
                    <?php }} else { ?>
                    Data tidak ditemukan !
                    <?php } ?>
            </select>
        </div>

<div class="form-group">
    <label>Team Member Name</label>
    <br>
    <select name="karyawan[]" title="Pilih Anggota Tim" class="form-control select2 karyawan" data-value="" multiple="multiple">
    <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('karyawans')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
?>
        <option value="<?php echo $_smarty_tpl->tpl_vars['value']->value['id_karyawan'];?>
"><?php echo $_smarty_tpl->tpl_vars['value']->value['nama_karyawan'];?>
</option>
    <?php }} else { ?>
    Data tidak ditemukan !
    <?php } ?>
    </select>
</div>
                    <label>Client</label>
                    <br>
        <div class="form-group">
                    <input name="client" title="Pilih Client" value ="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['id_client'])===null||$tmp==='' ? '' : $tmp);?>
"  list="list_client" class="form-control">
                    <datalist id = "list_client">
                        <?php  $_smarty_tpl->tpl_vars['cth'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('dataclient')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['cth']->key => $_smarty_tpl->tpl_vars['cth']->value){
?>
                         <option label="<?php echo $_smarty_tpl->tpl_vars['cth']->value['client_name'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['cth']->value['id_client'];?>
">
                        <?php }} ?>
                    </datalist>
        </div>
        <div class="form-group">
        <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/themes/ckeditor/ckeditor.js"></script>
            <label>Project Description</label>
            <textarea name="deskripsi" title="Masukkan Deskripsi tentang Project" rows="3" cols="35" class="ckeditor" id="ckedtor" placeholder="" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"><?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['project_desc'])===null||$tmp==='' ? '' : $tmp);?>
</textarea>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
        <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/themes/ckeditor/ckeditor.js"></script>
            <label>Project Justification</label> 
            <textarea name="justifikasi" title="Masukkan Justifikasi Project" placeholder="" class="ckeditor" id="ckedtor2" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"><?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['project_just'])===null||$tmp==='' ? '' : $tmp);?>
</textarea>
        </div>
        <div class="form-group">
            <label>Budget</label><br><b>Rp.</b>
            <input type="text" name="money" value ="<?php echo number_format((($tmp = @$_smarty_tpl->getVariable('result')->value['budget'])===null||$tmp==='' ? '' : $tmp),2,",",".");?>
" title="Masukkan Jumlah Uang" data-inputmask="'alias': 'numeric', 'groupSeparator':'.', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'prefix': ' ', 'placeholder': '0'" data-mask required>
        </div>
    
        <div class="form-group">
        <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/themes/ckeditor/ckeditor.js"></script>
            <label>Not in this Project</label> 
            <textarea name="not_in" rows="3" cols="35" class="ckeditor" id="ckedtor3" title="Masukkan Data yang tidak ada pada Project" placeholder="" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"><?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['not_in_project'])===null||$tmp==='' ? '' : $tmp);?>
</textarea>
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
                        <td width="500px" align="center"><b>Start date</b></td>
                        <td width="500px" align="center"><b>Due date</b></td>
                        <td width="500px"  align="center"><b>Pilih File</b></td>
                    </tr>
                    <tr>
                        <td align="center">
                            <input type="text" name="tanggal_start" value ="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['start_date'])===null||$tmp==='' ? '' : $tmp);?>
" class="tanggal" maxlength="10" size="10">
                        </td>
                        <td align="center">
                            <input type="text" name="tanggal_due" value ="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['due_date'])===null||$tmp==='' ? '' : $tmp);?>
" class="tanggal" maxlength="10" size="10">
                        </td>
                        <td align="center">
                        (File Berbentuk png, jpg, jpeg, docx, pdf, xlsx, pptx , rar, zip.)<br>
                        Ket : Gunakan Ctrl + Click Untuk Memilih > 1 File Pada Folder File
                            <input type="file" name="files[]" id="files" multiple>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </div>
</div>
    <div class="form-group">
    <center>
        <button type="submit" class="btn btn-success" id="kirim">Simpan</button>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button type="reset" value="reset" name="reset" class="btn btn-danger">Reset</button>
    </center>
    <br>
    </div>
</form>

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
