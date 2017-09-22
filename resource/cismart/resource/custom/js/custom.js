$(document).ready(function() {
	$('[data-mask]').inputmask();
	$(".select2").select2();

	function getSelectedOptions(sel) {
		var opts = [], opt;
		var len = sel.options.length;

		for(var i = 0; i < len; i++) {
			opt = sel.options[i];

			if (opt.selected) {
				opts.push(opt.value);
			}
		}
		return opts;
	}


	$(".department").on("change", function () {
		var id_department = getSelectedOptions(this); 
		var url = $(this).closest('.box-success').data('url');
		var data = {
			idDepartment : id_department
		}

		$.ajax({
			url: "initiation/initiation/add_initiation.php",
			type: "POST", 
			data: data,
		}).done(function (r){
			var res = r.split(',');
			eachKaryawan(res);
			$(".select2").select2();
		}).fail(function() {

		});

	});

	function eachKaryawan(val) {
		$('.karyawan').select2('val', val);
	}

});