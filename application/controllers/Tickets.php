<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/** -
 * 
 * @authors Hardy Nathan
 * @date 08/06/16
 * @version 1.2
 */
class Tickets extends CI_Controller {

    public function c_tickets()
    {
        $sess_array = $this->session->userdata('logged_in');
        $data = array();
        if ($sess_array['username'] != NULL) 
        {
            $data['log_or_not'] = '<a href="' . base_url() . 'accueil/logout">Se déconnecter</a></li>';
        }
        else
        {
            $data['log_or_not'] = 'Se connecter';
        }

        $data['url_base'] = base_url();
        $this->load->view('v_header', $data);
        /*$this->load->model('M_tickets');*/

        /*$data['T_concerts'] = $this->M_tickets->concerts();*/
        $this->load->view('v_tickets',$data);
        $this->load->view('v_footer');
    }
}
