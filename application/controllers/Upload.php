<?php

class Upload extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->helper(array('form', 'url'));
        }

        public function index()
        {
                $perfil = $this->session->userdata('perfil');
        switch ($perfil) {
                case 'escribano':
                       if($perfil == FALSE ||$perfil != 'escribano')
                        {
                                redirect(base_url().'index.php/c_login_escribano');
                        } else{
                                $data["notificaciones_ma"]=$this->notificaciones_ma();
                                $data["notificaciones_mr"]=$this->notificaciones_mr();
                                $data["notificaciones_si"]=$this->notificaciones_si_es();
                                $data['titulo'] = 'Bienvenido Escribano';
                                $this->load->view('templates/cabecera_escribano',$data);
                                $this->load->view('templates/escri_menu',$data);
                                $this->load->view('upload_form', array('error' => ' ' ));
                                $this->load->view('templates/pie',$data);
                        }
                        break;
                case 'Administrador':
                        if($perfil == FALSE ||$perfil != 'Administrador')
                        {
                                redirect(base_url().'index.php/c_login_administrador');
                        } else{
                               $data["notificaciones_mp"]=$this->notificaciones_mp();
                                $data["notificaciones_ep"]=$this->notificaciones_ep();
                                $data["notificaciones_si"]=$this->notificaciones_si();
                                $data['titulo'] = 'Bienvenido administrador';
                                $this->load->view('templates/cabecera_administrador',$data);
                                $this->load->view('templates/admin_menu',$data);
                                $this->load->view('upload_form_admin', array('error' => ' ' ));
                                $this->load->view('templates/pie',$data);
                        }
                        break;
                case 'operador':
                         if($perfil == FALSE ||$perfil != 'operador')
                        {
                                redirect(base_url().'index.php/c_login_operador');
                        } else{
                               $data["notificaciones_mp"]=$this->notificaciones_mp();
                                $data["notificaciones_ep"]=$this->notificaciones_ep();
                                $data["notificaciones_si"]=$this->notificaciones_si();
                                $data['titulo'] = 'Bienvenido Operador';
                                $this->load->view('templates/cabecera_operador',$data);
                                $this->load->view('templates/operador_menu',$data);
                                $this->load->view('upload_form_operador', array('error' => ' ' ));
                                $this->load->view('templates/pie',$data);
                        }
                        break;
                
                default:
                        # code...
                        break;
        }


        }

        public function do_upload()
        {
                $config['upload_path']          = './assets/dist/img';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;
                

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('upload_form', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());
                       // var_dump($data);
                       // var_dump($data['upload_data']['file_name']); //<<<== Nombre de archivo cargado
                        $foto = $data['upload_data']['file_name'];
                        //$cambio_exitoso = 
                        $this->cambiarFoto($foto);
                      
                }
        }

        public function cambiarFoto($foto)
        {
                $perfil = $this->session->userdata('perfil');

                switch ($perfil) {
                        case 'escribano':
                                $id = $this->session->userdata('idEscribano');
                                $escAct = array('foto' => $foto );
                                //var_dump($escAct);
                                $cambio = $this->M_escribano->actualizarFoto($escAct, $id);    
                                //var_dump($cambio);
                                if ($cambio) {
                                        $data = array(
                                                'foto' => $foto
                                        );              
                                        $this->session->set_userdata($data);

                                        $data["notificaciones_ma"]=$this->notificaciones_ma();
                                        $data["notificaciones_mr"]=$this->notificaciones_mr();
                                        $data["notificaciones_si"]=$this->notificaciones_si();
                                        $data['titulo'] = 'Bienvenido Escribano';
                                        
                                        $this->load->view('templates/cabecera_escribano',$data);
                                        $this->load->view('templates/escri_menu',$data);
                                        $this->load->view('upload_success', $data);
                                        $this->load->view('templates/pie',$data);
                                } else {
                                        $error = 'En este momento no se puede cambiar la foto. Intente nuevamente mas tarde';
                                        $data["notificaciones_ma"]=$this->notificaciones_ma();
                                        $data["notificaciones_mr"]=$this->notificaciones_mr();
                                        $data["notificaciones_si"]=$this->notificaciones_si();
                                        $data['titulo'] = 'Bienvenido Escribano';
                                        $this->load->view('templates/cabecera_escribano',$data);
                                        $this->load->view('templates/escri_menu',$data);
                                        $this->load->view('upload_form', $error);
                                        $this->load->view('templates/pie',$data);
                                }
                                break;
                        case 'Administrador':
                                $id = $this->session->userdata('id_usuario');
                                $usuario = array('foto' => $foto );
                                $cambio = $this->M_administrador->actualizarFoto($usuario, $id);
                                if ($cambio) {
                                        $data = array(
                                                'foto' => $foto
                                        );              
                                        $this->session->set_userdata($data);

                                        $data["notificaciones_mp"]=$this->notificaciones_mp();
                                        $data["notificaciones_ep"]=$this->notificaciones_ep();
                                        $data['titulo'] = 'Bienvenido Administrador';
                                        
                                        $this->load->view('templates/cabecera_administrador',$data);
                                        $this->load->view('templates/admin_menu',$data);
                                        $this->load->view('upload_success_admin', $data);
                                        $this->load->view('templates/pie',$data);
                                } else {
                                        $error = 'En este momento no se puede cambiar la foto. Intente nuevamente mas tarde';
                                       $data["notificaciones_mp"]=$this->notificaciones_mp();
                                        $data["notificaciones_ep"]=$this->notificaciones_ep();
                                        $data['titulo'] = 'Bienvenido Administrador';
                                        $this->load->view('templates/cabecera_administrador',$data);
                                        $this->load->view('templates/admin_menu',$data);
                                        $this->load->view('upload_form', $error);
                                        $this->load->view('templates/pie',$data);
                                }
                                break;
                        
                        case 'operador':
                                $id = $this->session->userdata('id_usuario');
                                $usuario = array('foto' => $foto );
                                $cambio = $this->M_administrador->actualizarFoto($usuario, $id);

                                if ($cambio) {
                                        $data = array(
                                                'foto' => $foto
                                        );              
                                        $this->session->set_userdata($data);

                                        $data["notificaciones_mp"]=$this->notificaciones_mp();
                                        $data["notificaciones_ep"]=$this->notificaciones_ep();
                                         $data["notificaciones_si"]=$this->notificaciones_si();
                                        $data['titulo'] = 'Bienvenido Operador';
                                        
                                        $this->load->view('templates/cabecera_operador',$data);
                                        $this->load->view('templates/operador_menu',$data);
                                        $this->load->view('upload_success_operador', $data);
                                        $this->load->view('templates/pie',$data);
                                } else {
                                        $error = 'En este momento no se puede cambiar la foto. Intente nuevamente mas tarde';
                                       $data["notificaciones_mp"]=$this->notificaciones_mp();
                                        $data["notificaciones_ep"]=$this->notificaciones_ep();
                                        $data['titulo'] = 'Bienvenido Operador';
                                        $this->load->view('templates/cabecera_operador',$data);
                                        $this->load->view('templates/operador_menu',$data);
                                        $this->load->view('upload_form', $error);
                                        $this->load->view('templates/pie',$data);
                                }
                                break;
                        default:
                                # code...
                                break;
                }

        }

                        
        public function notificaciones_mp(){
                         $this->db->from('estadominuta');
                         $this->db->where('estadoMinuta', "P"); 
                        return( $this->db->get()->result()); 

        }
        public function notificaciones_ep(){
                        $this->db->from('usuarioescribano');
                         $this->db->where('estadoAprobacion', "P"); 
                        return( $this->db->get()->result()); 

        }

        public function notificaciones_si(){
                        $this->db->from('estadominuta');
                         $this->db->where('estadoMinuta', "P"); 
                        return( $this->db->get()->result()); 

        }       


        public function notificaciones_ma(){
                $idEscribano=$this->session->userdata('idEscribano');
                        $this->db->from('estadominuta');
                        $this->db->where('estadoMinuta', "A"); 
                        $this->db->where('minuta.idEscribano', $idEscribano); 
                        $this->db->join('minuta', 'estadominuta.idMinuta = minuta.idMinuta','left');
                        $this->db->order_by('idEstadoMinuta', 'DESC');
                        $this->db->limit(10);

                        return( $this->db->get()->result()); 

        }

        public function notificaciones_mr(){
                        $idEscribano=$this->session->userdata('idEscribano');

                        $this->db->from('estadominuta');
                        $this->db->where('estadoMinuta', "R"); 
                        $this->db->where('minuta.idEscribano', $idEscribano); 
                        $this->db->join('minuta', 'estadominuta.idMinuta = minuta.idMinuta','left');
                        $this->db->order_by('idEstadoMinuta', 'DESC');
                        $this->db->limit(10);
                        return( $this->db->get()->result()); 

        }
        public function notificaciones_si_e(){
                        $idEscribano=$this->session->userdata('idEscribano');

                        $this->db->from('pedidos');
                         $this->db->where('estadoPedido', "C"); 
                        $this->db->where('idEscribano', $idEscribano); 
                        $this->db->order_by('idPedido', 'DESC');
                        $this->db->limit(10);
                        return( $this->db->get()->result()); 
        }
}
?>