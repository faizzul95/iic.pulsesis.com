<?php

function check_auth() {
	$ci =& get_instance();
	$user_session = $ci->session->userdata('userid');
	// $level_session = $ci->session->userdata('roleid');

	if (!$user_session) {
		echo $this->session->set_flashdata('error_message','You doest have authorization to view this page');
		redirect('auth');
	}
}
