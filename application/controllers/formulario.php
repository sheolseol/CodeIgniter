<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Formulario extends CI_Controller
{
    	public function __construct()
        {
            parent::__construct();
            $this->layout->setLayout('template');
        }
        public function index()
        {
        	$this->layout->setTitle("Trabajando con formularios");
	        $this->layout->setKeywords("formulario,codeigniter");
	        $this->layout->setDescripcion("formularios en codeigniter");
            //ambiente con post
                if ( $this->input->post() )
 		         {

                    //proceso la imagen
                 $error=NULL;
                   //valido la foto
                    $config['upload_path'] = './uploads/archivos/';
            		$config['allowed_types'] = 'jpg|jpeg';
            		$config['max_size']	= '51200';
                    $config["overwrite"]=false;
                    $config['encrypt_name'] = true;
                     $this->load->library('upload', $config);
                     if ( ! $this->upload->do_upload('archivo'))
                		{
                			$error = array('error' => $this->upload->display_errors());
                            #$this->session->set_flashdata('ControllerMessage', $error["error"]);

                		}
                        if($error==null)
                        {
                            $ima = $this->upload->data();
                            $file_name = $ima['file_name'];
                        }

                     //proceso los datos
                     echo "nombre: ".$this->input->post("nom",true);
                     echo "<br>";
                     echo "password: ".sha1($this->input->post("pass",true));
                     echo "<br>";
                     echo "descripcion: ".$this->input->post("descripcion",true);
                     echo "<br>";
                     echo "paises: ".$this->input->post("paises",true);
                     echo "<br>";
                     if(!$error==null)
                     {
                        echo $error["error"];

                     }else
                     {
                        echo "file :".$file_name;
                     }

                     exit;
 		         }

            //ambiente sin post
            $this->layout->view('index');
        }
}