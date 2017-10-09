<?php  
	function getComment($id_initiation) {
		$CI =& get_instance();
		$CI->load->model('m_initiation');

	$rest = $CI->m_initiation->getComment($id_initiation);
	return !empty($rest[0]['tgl_komentar']) ? $rest[0]['tgl_komentar'] : '' ;
	}
?>