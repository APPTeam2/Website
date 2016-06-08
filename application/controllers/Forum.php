<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/** -
 * 
 * @author Antoine GUILLOT
 * @date 08/06/16
 * @version 1
 */

class Forum extends CI_Controller
{
	public function accueil()
	{
		echo 'Hello World!';
                $this->load->helper('url');
                echo site_url();
                echo 'lol';
                $url_base=  site_url();
                echo($url_base.'assets/css/style_header.css');
	}
        
        public function page2($var="Antoine")
        {
            echo 'Hey'.$var;
            $this->load->helper('url');
            
        }
        
        public function page3()
        {
            $this->load->helper('url');

            
            $requete = "select * from table1";
            $this->load->database();
            $result = $this->db->query($requete);
            $result_f = $result->row(0);
            
            echo $result_f->ID;
            
            foreach ($result->result_array() as $row)
            {
                echo $row['ID'];
            }
            
            $this->db->close();
            $nb_ligne=$result->num_rows();
            
            //$reponse = $db->query('SELECT * FROM table1');
            //$donnees = $reponse->fetch();
            
            $data = array();
            $data['pseudo'] = 'Arthur';
            $data['email'] = 'email@ndd.fr';
            $data['en_ligne'] = true;
            $data['nb_ligne'] = $nb_ligne;
            
            $data['donnees']=$result_f;

            $this->load->view('v_Page1', $data);
            
        }
}