<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/** -
 * 
 * @authors Hardy Nathan
 * @date 08/06/16
 * @version 1.2
 */
class Programmation extends CI_Controller {

    public function c_prog()
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
        $this->load->model('M_programmation');
        $result = $this->M_programmation->concerts();
        $tableau = array();

        foreach ($result as $row)
        {
            array_push($tableau, $row->nomArtiste, $row->dateConcert, $row->heureDebut);
        }

        $data['T_concerts'] = $tableau;
        $this->load->view('v_programmation',$data);
        $this->load->view('v_sponsors');
        $this->load->view('v_footer');
    }
}
