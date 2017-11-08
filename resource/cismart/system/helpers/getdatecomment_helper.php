<?php  
	function getComment($id_initiation) {
		$CI =& get_instance();
		$CI->load->model('m_initiation');

	$rest = $CI->m_initiation->getComment($id_initiation);
	return !empty($rest[0]['tgl_komentar']) ? $rest[0]['tgl_komentar'] : '' ;
	}

	function getComment_Planning($id_planning){
		$CI =& get_instance();
		$CI->load->model('m_planning');

	$rest = $CI->m_planning->getComment_Planning($id_planning);
	return !empty($rest[0]['tgl_komentar']) ? $rest[0]['tgl_komentar'] : '' ;

	}

	function getComment_Execution($id_execution){
		$CI =& get_instance();
		$CI->load->model('m_execution');

	$rest = $CI->m_execution->getComment_Execution($id_execution);
	return !empty($rest[0]['tgl_komentar']) ? $rest[0]['tgl_komentar'] : '' ;

	}
?>