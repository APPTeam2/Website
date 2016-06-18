<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/** -
 * 
 * @author Antoine GUILLOT
 * @date 08/06/16
 * @version 1
 */

class Inscription_Ticket extends CI_Controller
{      
    public function c1()
    {
        $this->load->model('login');
        $login = $this->login->recuperer_login();  
        if($login!=FALSE)
        {
	        redirect('Inscription_Ticket/ticket', 'refresh');
        }
        else
        {
            //redirect('Inscription/afficherFormulaire', 'refresh');
            redirect('Tickets/c_tickets', 'refresh');
        }       
    }

    public function ticket()
    {
        $data = array();
        $this->load->model('login');
        $data['log_or_not'] = $this->login->login1();
        $data['url_base'] = base_url();

        $this->load->view('v_header', $data);
        $this->load->view('v_tickets');
        $this->load->view('v_footer');
    }
}