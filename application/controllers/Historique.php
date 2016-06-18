<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/** -
 * 
 * @authors Antoine GUILLOT,Florian Levenez-Delafontaine
 * @date 08/06/16
 * @version 1.2
 */

class Historique extends CI_Controller
{      
        public function c1()
        {
            $data = array();
            $this->load->model('login');
            $data['log_or_not'] = $this->login->login1();

                
            $data['url_base'] = base_url();
            $this->load->view('v_header', $data);                    
            $this->load->model('M_historique');
            $result = $this->M_historique->historique();
            $tableau=array();
            $tableau[0][0]=NULL;
            $tempo=NULL;
            $i=0;
            $j=1;
            
              foreach($result as $row)
            {
                   $tempo = $row->theme;
                   if($tempo != $tableau[$i][0]){
                    $i++;
                    $tableau[$i][0]=$tempo;
                    $j=1;
                    }
                    $tableau[$i][$j]= $row->nomArtiste;
                    $j++;
            }
            $data['T_historique']=$tableau; 
            $this->load->view('v_FestESAIP', $data);
            $this->load->view('v_sponsors'); 
	        $this->load->view('v_footer');            
        }
}