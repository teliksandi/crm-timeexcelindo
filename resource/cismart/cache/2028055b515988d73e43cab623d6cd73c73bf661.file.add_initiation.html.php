<?php /* Smarty version Smarty-3.0.7, created on 2017-11-22 08:10:14
         compiled from "application/views\initiation/add_initiation.html" */ ?>
<?php /*%%SmartyHeaderCode:13575a1522d6877733-85372470%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2028055b515988d73e43cab623d6cd73c73bf661' => 
    array (
      0 => 'application/views\\initiation/add_initiation.html',
      1 => 1511246046,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13575a1522d6877733-85372470',
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
        <li class="active">Add Data Initiation</li>
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
                    <h3><b>Detail Project</b></h3>
                    <div class="box-tools">
                        <br><a class="btn btn-sm btn-primary" href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('initiation/initiation');?>
" ><i class="fa fa-long-arrow-left"></i> Kembali</a>
                    </div>
                </div>
            </div>
			<!-- box-success -->
		</div>
        <!-- col -->
            
            	<form  action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('initiation/initiation/add_process');?>
" method="post">
            		<div class="col-md-6">
						<div class="box">
							<div class="box-body">
								<div class="form-group">
									<h5><b>Project Title</b></h5>
										<input type="text" name="judul_project" placeholder="-- Judul Project --" title="Masukkan Judul Project" class="form-control" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
								</div>
								<div class="form-group">
									<h5><b>Project Manager Department</b></h5>
									<select name="department[]" class="form-control select2" multiple title="Pilih Manager Department Project" placeholder="-- Manager Department Project --">
							    			<?php  $_smarty_tpl->tpl_vars['cth'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('datadepartment')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['cth']->key => $_smarty_tpl->tpl_vars['cth']->value){
?>
							    		<option value=<?php echo $_smarty_tpl->tpl_vars['cth']->value['id_department'];?>
 placeholder="-- Manager Department Project --"><?php echo $_smarty_tpl->tpl_vars['cth']->value['nama_department'];?>
</option>
							   				<?php }} else { ?>
							   				Data tidak ditemukan !
							   				<?php } ?>
							   		</select>
								</div>
								<div class="form-group">
									<h5><b>Team Member Name</b></h5>
										<select name="karyawan[]" title="Pilih Anggota Tim" class="form-control select2 " data-value="" multiple="multiple" placeholder="-- Nama Anggota Tim --">
									<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('marketing_kar')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
?>
											<option value="<?php echo $_smarty_tpl->tpl_vars['value']->value['id_karyawan'];?>
" placeholder="-- Nama Anggota Tim --"><?php echo $_smarty_tpl->tpl_vars['value']->value['nama_karyawan'];?>
</option>
									<?php }} else { ?>
									Data tidak ditemukan !
									<?php } ?>
										</select>
								</div>
								<div class="form-group">
									<h5><b>Client</b></h5>
									<select name="client" class="form-control select2" min="0" max="40" multiple>
						                <?php  $_smarty_tpl->tpl_vars['cth'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('dataclient')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['cth']->key => $_smarty_tpl->tpl_vars['cth']->value){
?>
										<option value=<?php echo $_smarty_tpl->tpl_vars['cth']->value['id_client'];?>
><?php echo $_smarty_tpl->tpl_vars['cth']->value['client_name'];?>
</option>
				           				<?php }} else { ?>
				           				Data tidak ditemukan !
				           				<?php } ?>
						            </select>							
								</div>
								<div class="form-group">
									<h5><b>Budget</b></h5><b><input type="text" name="Rp." value="Rp." disabled style="width: 6%;"></b><input type="text" name="money" title="Masukkan Jumlah Uang" data-inputmask="'alias': 'numeric', 'groupSeparator':'.', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'prefix': ' ', 'placeholder': '0'" data-mask required>
								</div>
							</div>
						</div>
					</div>
			
					<div class="col-md-6">
						<div class="box">
							<div class="box-body">
								<div class="form-group" style="overflow: scroll; width: 100%; height: 350px;">
									<div class="form-group">
										<h5><b>Project Description</b></h5>
											<textarea name="deskripsi" title="Masukkan Deskripsi tentang Project" rows="3" cols="35" class="ckeditor" id="ckedtor" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="-- Deskripsi Project --">
											</textarea>
									</div>
									<div class="form-group">
										<h5><b>Project Justification</b></h5>
											<textarea height="300" name="justifikasi" title="Masukkan Justifikasi Project" placeholder="" class="ckeditor" id="ckedtor2" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="-- Justifikasi Project --">
											</textarea>
									</div>
									<div class="form-group">
											<label>Not in this Project</label> 
												<textarea name="not_in" rows="3" cols="35" class="ckeditor" id="ckedtor3" title="Masukkan Data yang tidak ada pada Project" placeholder="-- Data yang tidak ada dalam Project" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
												</textarea>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="box box-primary">
							<div class="box-body">
								<center><h5><b>Target Penyelesaian Initiation</b></h5></center>
							</div>
						</div>
					</div>

					<div class="col-md-6">
						<div class="box box-primary">
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
										<td width="230px" align="center"><b>Start Date</b></td>
										<td>     </td>
										<td width="230px" align="center"><b>Due Date</b></td>
									</tr>
									<tr>
										<td align="center">
											<br><input type="text" name="tanggal_start" class="tanggal" id="DATE" maxlength="10" size="10" placeholder="- dd/mm/yyyy -" value="" style="width: 150px; text-align: center;">
										</td>
										<td>     </td>
										<td align="center">
											<br><input type="text" name="tanggal_due" class="tanggal" maxlength="10" size="10" placeholder="- dd/mm/yyyy -" style="width: 150px; text-align: center;">
										</td>
									</tr>
								</table>
								<br><br>
							</div>
						</div>
					</div>

					<div class="col-md-6">
						<div class="box">
							<div class="box-body">
								<h5><b>Pilih File</b></h5>
								<input type="file" name="files[]" id="files" multiple>
								(File Berbentuk png, jpg, jpeg, docx, pdf, xlsx, ppt , rar, zip.)<br>
								Ket : Gunakan Ctrl + Click Untuk Memilih > 1 File Pada Folder File
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



		<script>

			$('#files').change(function(){
			  var files = $('#files')[0].files;
			  var error = '';
			  var form_data = new FormData();
			  for(var count = 0; count<files.length; count++)
			  {
			   var name = files[count].name;
			   var extension = name.split('.').pop().toLowerCase();
			   if(jQuery.inArray(extension, ['png','jpg','jpeg','docx','pdf','xlsx','ppt','rar','zip']) == -1)
			   {
			    error = "Pilih file dengan format png, jpg, jpeg, docx, pdf, xlsx, ppt, rar, zip"
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
			    }
			   })
			  }
			  else
			  {
			   alert(error);
			  }
			 });
		 	
		</script>
		<script type="text/javascript">
			var today = new Date();
			var dd = today.getDate();
			var mm = today.getMonth()+1; //January is 0!

			var yyyy = today.getFullYear();
			if(dd<10){
			    dd='0'+dd;
			} 
			if(mm<10){
			    mm='0'+mm;
			} 
			var today = dd+'-'+mm+'-'+yyyy;
			document.getElementById("DATE").value = today;
		</script>
		<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/themes/ckeditor/ckeditor.js"></script>
</section>