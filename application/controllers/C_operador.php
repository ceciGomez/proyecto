<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_operador extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
    }



	public function index()
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'operador')
		{
			redirect(base_url().'index.php/c_login_operador');
		}
		$data["notificaciones_mp"]=$this->notificaciones_mp();
		$data["notificaciones_ep"]=$this->notificaciones_ep();
		$data["notificaciones_si"]=$this->notificaciones_si();

		$data['titulo'] = 'Bienvenido Operador';

		$this->load->view('templates/cabecera_operador',$data);
		$this->load->view('templates/operador_menu',$data);
		$this->load->view('home/operador',$data);
		$this->load->view('templates/pie',$data);
	}
	
		public function gestionarEscribanos()
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'operador')
		{
			redirect(base_url().'index.php/c_login_operador');
		}
		$data['titulo'] = 'Bienvenido Operador';
		
		$data["notificaciones_mp"]=$this->notificaciones_mp();
		$data["notificaciones_ep"]=$this->notificaciones_ep();
		$data["notificaciones_si"]=$this->notificaciones_si();

		$this->load->model('M_operador');
		$data["escribanos"] = $this->M_operador->getEscribanos();

		$this->load->view('templates/cabecera_operador',$data);
		$this->load->view('templates/operador_menu',$data);
		$this->load->view('operador/gestionarEscribanos',$data);
		$this->load->view('templates/pie',$data);
	}





	public function editarEscribano($idEscribano="",$exito=FALSE, $hizo_post=FALSE)
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'operador')
		{
			redirect(base_url().'index.php/c_login_operador');
		}
		
		$data['exito']= $exito; 
		$data['hizo_post']=$hizo_post;

		$data["notificaciones_mp"]=$this->notificaciones_mp();
		$data["notificaciones_ep"]=$this->notificaciones_ep();
				$data["notificaciones_si"]=$this->notificaciones_si();

		$data['titulo'] = 'Bienvenido Operador';
		$esc=$this->db->get_where('usuarioescribano', array('idEscribano'=>$idEscribano))->row();
		$data["escribano"] =$esc;
		//var_dump($data["operador"]);
		$this->load->view('templates/cabecera_operador',$data);
		$this->load->view('templates/operador_menu',$data);
		$this->load->view('operador/editarEscribano',$data);
		$this->load->view('templates/pie',$data);
	}

	public function actualizarEscribano()
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'operador')
		{
			redirect(base_url().'index.php/c_login_operador');
		}
		$data["notificaciones_mp"]=$this->notificaciones_mp();
		$data["notificaciones_ep"]=$this->notificaciones_ep();
				$data["notificaciones_si"]=$this->notificaciones_si();

		$idEscribano = $this->input->post("idEscribano");

		$hizo_post=TRUE;	

				 $this->load->helper(array('form', 'url'));

			    $this->form_validation->set_rules('nomyap', 'nomyap', 'required',array('required' => 'Debes ingresar un Nombre y Apellido ') );


			    $this->form_validation->set_rules('dni', 'dni', 'required',array('required' => 'Debes ingresar DNI '));


			    $this->form_validation->set_rules('email', 'email', 'required',array('required' => 'Debes ingresar un correo ') );

			    $this->form_validation->set_rules('telefono', 'telefono', 'required',array('required' => 'Debes ingresar numero de teleéfono ') );

			    $this->form_validation->set_rules('provincia', 'provincia', 'required',array('required' => 'Debes seleccionar una Provincia ') );

			    $this->form_validation->set_rules('localidad', 'localidad', 'required',array('required' => 'Debes seleccionar una Localidad ') );

			    $this->form_validation->set_rules('direccion', 'direccion', 'required',array('required' => 'Debes ingresar una dirección ') );
			   

				 $this->form_validation->set_rules('usuario', 'usuario',  'required|min_length[6]',array('required' => 'Debes ingresar un nombre de Usuario ','min_length'=> 'El nombre de usuario debe ser de al menos 6 digitos') );


			    $this->form_validation->set_rules('matricula', 'matricula', 'required',array('required' => 'Debes ingresar un Nro de Matricula ') );

			    $this->form_validation->set_rules('estadoAprobacion', 'estadoAprobacin', 'required',array('required' => 'Debes seleccionar un Estado ') );



		
		
			if($this->form_validation->run() == FALSE)
			{	
				
				$this->editarEscribano($idEscribano,FALSE,TRUE);
			}else{
		//actualizo
		
		$escribanoAct= array(
			//Nombre del campo en la bd -----> valor del campo name en la vista
			'nomyap' => $this->input->post("nomyap"),
			'usuario' => $this->input->post("usuario"),	
			'dni' => $this->input->post("dni"),	
			'telefono' => $this->input->post("telefono"),
			'direccion' => $this->input->post("direccion"),	
			'idLocalidad' => $this->input->post('localidad'),	
			'matricula' => $this->input->post('matricula'),
			'estadoAprobacion' => $this->input->post('estadoAprobacion'),	
			'email' => $this->input->post('email'),	
			'baja' => $this->input->post('baja'),	





			);
		$this->load->model('M_operador');
		
		$ctrl=$this->M_operador->actualizarEscribano($escribanoAct,$idEscribano);

		$this->editarEscribano($idEscribano,TRUE,TRUE);
	}
	
	}


//para el menu minutas


	public function detalles_esc(){
			$idEscribano=$_POST["idEscribano"];
			$esc=$this->db->get_where('usuarioescribano', array('idEscribano'=>$idEscribano))->row();
			 echo " <tr>
                          <td>$esc->nomyap</td>  
                        	<td>  $esc->usuario</td>
                            <td> $esc->dni</td>
                            <td>  $esc->matricula</td>
                            <td> $esc->direccion</td>
                            <td> $esc->email</td>
                            <td> $esc->telefono</td>
                            <td>$esc->estadoAprobacion</td>
                       </tr>
                         "; 
                         }
      public function aceptar_esc(){
      	$idEscribano=$_POST["idEscribano"];
      	$idUsuario=$_POST["idUsuario"];
      		$data = array(
               'estadoAprobacion' => "A",
                'baja' => "0",
               	'idUsuario'=>$idUsuario
              
            );

		$this->db->where('idEscribano', $idEscribano);
		$this->db->update('usuarioescribano', $data); 

      }
      public function rechazar_esc(){
      		$idEscribano=$_POST["idEscribano"];
      		$motivoRechazo=$_POST["motivoRechazo"];
      		$idUsuario=$_POST["idUsuario"];

      		$data = array(
               'estadoAprobacion' => "R",
              	'motivoRechazo' =>"$motivoRechazo",
              	'idUsuario'=>$idUsuario
            );

		$this->db->where('idEscribano', $idEscribano);
		$this->db->update('usuarioescribano', $data); 

      }
      
      public function eliminar_esc(){
      	$idEscribano=$_POST["idEscribano"];
      		$data = array(
               'baja' => "1",

              
            );

		$this->db->where('idEscribano', $idEscribano);
		$this->db->update('usuarioescribano', $data); 


      }
	


	public function detalles_minuta(){

		$minuta = $this->M_escribano->getUnaMinuta($_POST['idMinuta']);
		$idEscribano = $minuta[0]->idEscribano;
		$this->load->model('M_escribano');
		$unEscribano = $this->M_escribano->getUnEscribano($idEscribano);
		$idMinuta = $minuta[0]->idMinuta;
		$parcelas =$this->M_escribano->getParcelas($idMinuta);
		//var_dump($data["parcelas"]);
		echo 
		 "<article>
         <!-- Titulo -->
         <small class='pull-right'><u>Fecha:</u> ".date("d/m/Y H:i:s")." </small>
         <h2 class='page-header' align='center'><i><b>Minuta de Inscripción de Titulo</b></i>
         </h2>
         <p align='justify'>
            Departamento  <strong>". $unEscribano[0]->nombreDpto."</strong>
            - Provincia de <strong>". $unEscribano[0]->nombreProv.".</strong><br> 
            <u>FUNCIONARIO AUTORIZANTE: </u> Esc: <strong>". $unEscribano[0]->nomyap."</strong><br><br>";
            foreach ($parcelas as $value) { 
            echo" <u>NOMENCLATURA CATASTRAL: </u>
            CIRCUNSCRIPCION: <strong>".$value->circunscripcion ."</strong>
            SECCION: <strong>".$value->seccion ."</strong>
            CHACRA: <strong>".$value->chacra."</strong>
            MANZANA: <strong>". $value->manzana ."</strong>
            PARCELA: <strong>".$value->parcela ."</strong> <br>
            <br>
            Superficie:   <strong>". $value->superficie. "mts. </strong>
            Tipo Propiedad: <strong>". $value->tipoPropiedad ."</strong> <br>
            <u>Plano:</u>
            Nro de Plano aprobado:  <strong>" .$value->planoAprobado ."</strong> 
            Fecha:  <strong>". $value->fechaPlanoAprobado ." </strong> 
            <u>Localidad:</u> <strong>". $value->nombreLocalidad. "</strong><br>
<br>
            <u>INSCRIPCION: </u>
            NRO MATRICULA: <strong> ".$value->nroMatriculaRPI ."</strong>
            FECHA:  <strong> ". $value->fechaMatriculaRPI ."</strong>
            TOMO:  <strong>".$value->tomo ."</strong>
            FOLIO:  <strong> ". $value->folio ."</strong>
            FINCA:  <strong>". $value->finca ."</strong>
            AÑO:  <strong> ".$value->año ."</strong>
            <br>

            <u>DESCRIPCION: </u><strong>". $value->descripcion."</strong>.<br><br>";
            $propietarios = $this->M_escribano->getPropietarios($value->idParcela);
             foreach ( $propietarios as $key) { 
               $nroProp = 0;
               
	             if ($key->tipoPropietario == 'A'): echo "<u> ADQUIRIENTE: </u>";endif; 
	            if ($key->tipoPropietario == 'T'): echo "<u>TRANSMITENTE: </u>" ;endif;
            
            if ($key->nroUfUc != NULL):echo " NRO UF/UC: <strong> ". $key->nroUfUc ."-". $key->tipoUfUc."</strong>";endif;

             if ($key->fechaEscritura != NULL) :  echo" Fecha de Escritura: <strong> ". $key->fechaEscritura ."</strong>";
             if ($key->titular != NULL): echo "Nombre y Apellido: <strong> ". $key->titular."</strong>" ;endif;

             if ($key->porcentajeCondominio != NULL): echo "PORCENTAJE DE CONDOMINIO: <strong> ". $key->porcentajeCondominio; echo '% "</strong>"'; endif;
           
             if ($key->cuitCuil != NULL): echo "Cuit - Cuil: <strong> ".$key->cuitCuil."</strong>" ; endif;

             if ($key->direccion != NULL): echo "Direccion: <strong> ". $key->direccion."</strong>";  endif;

             if ($key->planoAprobado != NULL) echo "Plano Aprobado: <strong> ". $key->planoAprobado ."</strong>";endif;

             if ($key->fechaPlanoAprobado != NULL): echo "Fecha de Plano Aprobado: <strong>".$key->fechaPlanoAprobado ."</strong>"; endif;

             if ($key->poligonos != NULL) : echo "Poligonos: <strong>". $key->poligonos ."</strong>"; endif;

             if ($key->porcentajeUfUc != NULL):echo "Porcentaje de Uf/Uc: <strong> ".$key->porcentajeUfUc; echo "% </strong><br>" ;endif;
             if ($key->conyuge != NULL):echo" Asentimiento Conyugal: <strong> ". $key->conyuge."</strong><br>" ; endif;
             } 
            } 
         echo "</p>
      </article>";

		
     	}

		  public function rechazar_min	(){
		      		$idEstadoMinuta=$_POST["idEstadoMinuta"];
		      		$motivoRechazo=$_POST["motivoRechazo"];
		      		$idUsuario=$_POST["idUsuario"];
		      		$datetime_variable = new DateTime();
					$datetime_formatted = date_format($datetime_variable, 'Y-m-d H:i:s');
		      		$data = array(
		               'estadoMinuta' => "R",
		              	'motivoRechazo' =>"$motivoRechazo",
		              	'idUsuario'=>$this->session->userdata('idUsuario'),
		              	'fechaEstado'=> $datetime_formatted ,	
		              	'idUsuario'=>$idUsuario
		            );

				$this->db->where('idEstadoMinuta', $idEstadoMinuta);
				$this->db->update('estadominuta', $data); 

		      }

		   public function aceptar_min(){
				$idEstadoMinuta=$_POST["idEstadoMinuta"];
				$idUsuario=$_POST["idUsuario"];
				$datetime_variable = new DateTime();
				$datetime_formatted = date_format($datetime_variable, 'Y-m-d H:i:s');
		      		$data = array(
		               'estadoMinuta' => "A",
			           	'idUsuario'=>$this->session->userdata('idUsuario'),
			           	'fechaEstado'=> $datetime_formatted ,
		             	'idUsuario'=>$idUsuario

		            );

				$this->db->where('idEstadoMinuta', $idEstadoMinuta);
				$this->db->update('estadominuta', $data); 

      }

      public function gestionarMinutas()
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'operador')
		{
			redirect(base_url().'index.php/c_login_operador');
		}
		$data["notificaciones_mp"]=$this->notificaciones_mp();
		$data["notificaciones_ep"]=$this->notificaciones_ep();
				$data["notificaciones_si"]=$this->notificaciones_si();

		$this->db->select('*');
		$this->db->from('minuta');
		
		
		$minutas= $this->db->get()->result();
		
		//obtengo el ultimo estado de cada minuta
		$min=null;
		foreach ($minutas as $mi) {
			  			$this->db->from('estadominuta');
                         $this->db->where('idMinuta', $mi->idMinuta); 
                         $this->db->order_by('idEstadoMinuta', 'DESC');
                         $estadoMinuta= $this->db->get()->row();
          // solo necesito guardar el estado y el idEstadoMinuta
          //entonces junto creo una nueva variable
           $datosMinutas=array("idMinuta" => "$mi->idMinuta","idEscribano" => "$mi->idEscribano", "fechaIngresoSys" => "$mi->fechaIngresoSys","fechaEdicion" => "$mi->fechaEdicion","idEstadoMinuta" => "$estadoMinuta->idEstadoMinuta","estadoMinuta" =>"$estadoMinuta->estadoMinuta");
           $arreglo=array($datosMinutas);
         	if ($min==null){
         		$min=$arreglo;
                
         	}
         	else{
         		$min=array_merge($min,$arreglo);    
		};
         	}
         		  
		$data['minutas']=$min;


		$data['titulo'] = 'Bienvenido Operador';
		$this->load->view('templates/cabecera_operador',$data);
		$this->load->view('templates/operador_menu',$data);
		$this->load->view('operador/gestionarMinutas',$data);
		$this->load->view('templates/pie',$data);
	}

	public function ver_estados(){
		$idMinuta=$_POST['idMinuta'];
		$estadoMinuta=$this->db->get_where('estadominuta', array('idMinuta'=>$idMinuta))->result();
		foreach ($estadoMinuta as $e) {
			$idUsuario=$e->idUsuario;
			if ($idUsuario!=null){
			$usuario=$this->db->get_where('usuariosys', array('idUsuario'=>$idUsuario))->row();
				 echo " <tr>
				 		    <td>  $e->fechaEstado</td>
  							<td>  $e->estadoMinuta</td>
                            <td> $e->motivoRechazo</td>
 							<td> $usuario->nomyap</td>
                       </tr>
                         "; 
	
					}
			else {
				 echo " <tr>
                         <td>  $e->fechaEstado</td>
  							<td>  $e->estadoMinuta</td>
                            <td> $e->motivoRechazo</td>
 							<td> </td>
                       </tr>	";
			}

					 }
			

	}
//para obtener las localidades
		public function departamento()
	{
		$id_prov=$_POST["miprovincia"];
		
		//$departamentos=$this->db->get("departamento")->result();
	   	
	   	$departamentos=$this->db->get_where('departamento', array('idProvincia'=>$id_prov))->result();
	
		
		foreach ($departamentos as $d ) {
				
				echo"<option value='$d->idDepartamento'>$d->nombre</option>";
			
		}
	}

		public function mostrarLocalidad()
	{
		$id_prov=$_POST["miprovincia"];
		
		$this->db->select('localidad.idLocalidad, localidad.nombre');
		$this->db->from('localidad');
		$this->db->join('departamento', 'localidad.idDepartamento = departamento.idDepartamento AND departamento.idProvincia ='.$id_prov);
		

		$localidades=$this->db->get()->result();
	   	
		//en este caso quiero que en el value aparezca el id que esta en la tabla , porque este valor me va a servir para insertar en la tabla usuarioescribano
		foreach ($localidades as $l ) {
				
				echo"<option value='$l->idLocalidad'>$l->nombre</option>";
			
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
						$this->db->from('pedidos');
                         $this->db->where('estadoPedido', "P"); 
                        return( $this->db->get()->result()); 

	}

	//en caso de que haga click en las notificaciones guarda los id y el estado para que aparezca la tabla filtrada por
	public function buscar_esc_p_x_dni(){
			if ($_POST["dniEscribano"]==null) {
				$dniEscribano="";
			}else
			{
				$dniEscribano=$_POST["dniEscribano"];
			};
		   $noti_esc=array("dniEscribano"=>$dniEscribano,"estado"=>"P");
		  	  $this->session->set_flashdata('noti_esc',$noti_esc); 
		    redirect(base_url().'index.php/c_operador/gestionarEscribanos');
	}
	public function buscar_min_p_x_id(){
			if ($_POST["idMinuta"]==null) {
				$idMinuta="";
			}else
			{
				$idMinuta=$_POST["idMinuta"];
			};
			$noti_min=array("idMinuta"=>$idMinuta,"estado"=>"P");
		   $this->session->set_flashdata('noti_min',$noti_min); 
		    redirect(base_url().'index.php/c_operador/gestionarMinutas');
	}

	public function obtenerProvincia_x_idLoc(){
		$idLocalidad=$_POST["idLocalidad"];
		$this->db->select('*');
		$this->db->from('departamento');
		$this->db->join('localidad', 'localidad.idDepartamento = departamento.idDepartamento');
		

		echo $this->db->get()->row()->idProvincia;
	}
	public function motivoRechazo(){
				$idEscribano=$_POST["idEscribano"];
				$escribano=  $this->db->get_where('usuarioescribano', array('idEscribano'=>$idEscribano))->row();
				echo $escribano->motivoRechazo;

	}


	 public function gestionarPedidos()
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'operador')
		{
			redirect(base_url().'index.php/c_login_operador');
		}
		$data["notificaciones_mp"]=$this->notificaciones_mp();
		$data["notificaciones_ep"]=$this->notificaciones_ep();
		$data["notificaciones_si"]=$this->notificaciones_si();
		$this->db->select('*');
		$this->db->from('pedidos');
		$this->db->join('usuariosys', 'usuariosys.idUsuario = pedidos.idUsuario','left');


		
		
		$pedidos= $this->db->get()->result();
	
		$data['pedidos']=$pedidos;


		$data['titulo'] = 'Bienvenido Operador';
		$this->load->view('templates/cabecera_operador',$data);
		$this->load->view('templates/operador_menu',$data);
		$this->load->view('operador/gestionarPedidos',$data);
		$this->load->view('templates/pie',$data);
	}

		
	public function buscar_si(){
			if ($_POST["idPedido"]==null) {
				$idPedido="";
			}else
			{
				$idPedido=$_POST["idPedido"];
			};
			$noti_si=array("idPedido"=>$idPedido,"estadoPedido"=>"P");
		   $this->session->set_flashdata('noti_si',$noti_si); 
		    redirect(base_url().'index.php/c_operador/gestionarPedidos');
	}


	public function contestar_pedido (){
			$idPedido=$_POST["idPedido"];
			$rtaPedido=$_POST["rtaPedido"];
			$idUsuario=$_POST["idUsuario"];
      		$data = array(
               'rtaPedido' => $rtaPedido,
                'estadoPedido'=>"C",
                'idUsuario'=>$idUsuario
            );

		$this->db->where('idPedido', $idPedido);
		$this->db->update('pedidos', $data); 
	}

	 public function buscarParcelas()
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'operador')
		{
			redirect(base_url().'index.php/c_login_operador');
		}
		$data["notificaciones_mp"]=$this->notificaciones_mp();
		$data["notificaciones_ep"]=$this->notificaciones_ep();
		$data["notificaciones_si"]=$this->notificaciones_si();
		$this->db->select('minuta.fechaIngresoSys,minuta.idMinuta,relacion.fechaEscritura,relacion.nroUfUc,relacion.tipoUfUc,parcela.circunscripcion,parcela.seccion,parcela.chacra,parcela.quinta,parcela.fraccion,parcela.manzana,parcela.parcela,parcela.planoAprobado,parcela.nroMatriculaRPI,parcela.idLocalidad,parcela.idParcela');
		$this->db->from('parcela');
		$this->db->join('minuta', 'parcela.idMinuta = minuta.idMinuta','left');
		$this->db->join('relacion', 'relacion.idParcela=parcela.idParcela');
	

		$parcelas= $this->db->get()->result();
	
		$data['parcelas']=$parcelas;


		$data['titulo'] = 'Bienvenido Operador';
		$this->load->view('templates/cabecera_operador',$data);
		$this->load->view('templates/operador_menu',$data);
		$this->load->view('operador/buscarParcelas',$data);
		$this->load->view('templates/pie',$data);
	}

	public function buscar_min_id(){
			if ($_POST["idMinuta"]==null) {
				$idMinuta="";

			}else
			{
				$idMinuta=$_POST["idMinuta"];

			};
			$noti_min=array("idMinuta"=>$idMinuta);
		   $this->session->set_flashdata('noti_min',$noti_min); 
		    redirect(base_url().'index.php/c_operador/gestionarMinutas');
	}

	public function detalles_parcela(){
			$idParcela=$_POST["idParcela"];
			$parcela=$this->db->get_where('parcela', array('idParcela'=>$idParcela))->row();
			$date=new DateTime($parcela->fechaPlanoAprobado);
            $date_formated=$date->format('d/m/Y ');
			$fecha_planoAprobado=$date_formated;

			$date2=new DateTime($parcela->fechaMatriculaRPI);
            $date_formated2=$date->format('d/m/Y ');
            $fecha_matriculaRPI=$date_formated;
			 echo " 
			 	<tr>
			 		<th> Circunscripcion</th><td>$parcela->circunscripcion </td>
			 	</tr>
			 	<tr>
					<th> Sección</th><td>$parcela->seccion </td>
				</tr>
				<tr>
			 		<th> Chacra</th><td>$parcela->chacra </td>
			 	</tr>
			 	<tr>
			 		<th> Quinta</th><td>$parcela->quinta </td>
			 	</tr>
			 	<tr>
			 		<th> Fracción</th><td>$parcela->fraccion </td>
			 	</tr>
			 	<tr>
			 		<th> Manzana</th><td>$parcela->manzana </td>
			 	</tr>
			 	<tr>
			 		<th> Parcela</th><td>$parcela->parcela </td>
			 	</tr>
			 	<tr>
			 		<th> Superficie</th><td>$parcela->superficie </td>
			 	</tr>
			 	<tr>
			 		<th> Partida</th><td>$parcela->partida </td>
			 	</tr>
			 	<tr>
			 		<th> Tipo de Propiedad</th><td>$parcela->tipoPropiedad </td>
			 	 </tr>
			 	 	<tr>
			 		<th> Plano Aprobado</th><td>$parcela->planoAprobado</td>
			 	 </tr>	   
			 	 	<tr>
			 		<th> Fecha Plano Aprobado</th><td>$fecha_planoAprobado </td>
			 	 </tr>	
			 	 <tr>
			 		<th> Descripción</th><td>$parcela->descripcion</td>
			 	 </tr>	  
			 	 <tr>
			 		<th> Nro de Matrícula RPI</th><td>$parcela->nroMatriculaRPI</td>
			 	 </tr>	  
			 	  <tr>
			 		<th> Fecha Matrícula RPI</th><td>$fecha_matriculaRPI</td>
			 	 </tr>	 
			 	 <tr>
			 		<th> Tomo</th><td>$parcela->tomo</td>
			 	 </tr>
			 	 <tr>
			 		<th> Folio</th><td>$parcela->folio</td>
			 	 </tr> 
			 	 <tr>
			 		<th>Finca</th><td>$parcela->finca</td>
			 	 </tr>
			 	 <tr>
			 		<th> Año</th><td>$parcela->año</td>
			 	 </tr>
                         "; 
                         }

//para los reportes
//oara los reportes
public function reportesPedidos()
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'operador')
		{
			redirect(base_url().'index.php/c_login_operador');
		}
		$data["notificaciones_mp"]=$this->notificaciones_mp();
		$data["notificaciones_ep"]=$this->notificaciones_ep();
		$data["notificaciones_si"]=$this->notificaciones_si();

		$data['titulo'] = 'Bienvenido Operador';

		$this->db->select('*');
		$this->db->from('pedidos');
		$this->db->join('usuariosys', 'usuariosys.idUsuario = pedidos.idUsuario','left');


		
		
		$pedidos= $this->db->get()->result();
	
		$data['pedidos']=$pedidos;


		$data['titulo'] = 'Bienvenido Operador';
		$this->load->view('templates/cabecera_operador',$data);
		$this->load->view('templates/operador_menu',$data);
		$this->load->view('reportes/pedidosPorFecha_op',$data);
		$this->load->view('templates/pie',$data);
	}


	public function imprimirPedidos()
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'operador')
		{
			redirect(base_url().'index.php/c_login_operador');
		}

		$fechaPedidoDesde=$_GET['fechaPedidoDesde'];
		$fechaPedidoHasta=$_GET['fechaPedidoHasta'];

		redirect(base_url().'reportePedidos.php?fechaPedidoDesde='.$fechaPedidoDesde.'&fechaPedidoHasta='.$fechaPedidoHasta);
	}

	public function imprimirMinuta()
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'operador')
		{
			redirect(base_url().'index.php/c_login_operador');
		}
		$idMinuta=$_POST['resg_idMinuta'];
		$data['titulo'] = 'Bienvenido Operador';
		$data["minuta"] = $this->M_administrador->getUnaMinuta($idMinuta);
		//var_dump($data["minuta"] );
		$idEscribano = $data["minuta"][0]->idEscribano;
		//var_dump($idEscribano);
		$data["unEscribano"] = $this->M_administrador->getUnEscribano($idEscribano);
		//var_dump($data["unEscribano"]);
		$idMinuta = $data["minuta"][0]->idMinuta;
		//var_dump($idMinuta );
		$data["parcelas"] =$this->M_escribano->getParcelas($idMinuta);
		//var_dump($data["parcelas"]);
		//$this->load->view('templates/cabecera_escribano',$data);
		//$this->load->view('templates/escri_menu',$data);
		$this->load->view('operador/imprimirMinuta',$data);
		//$this->load->view('templates/pie',$data);
	}
	//Carga la pagina para ver/editar los datos de usuario.
	public function verPerfil()
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'operador')
		{
			redirect(base_url().'index.php/c_login_operador');
		}
		//muestra las notificaciones
		$data["notificaciones_mp"]=$this->notificaciones_mp();
		$data["notificaciones_ep"]=$this->notificaciones_ep();
		$data["notificaciones_si"]=$this->notificaciones_si();


		$idOperador =  $this->session->userdata('id_usuario');
		$data['unOperador'] = $this->M_operador->getUnOperador($idOperador);
		$this->load->view('templates/cabecera_operador',$data);
		$this->load->view('templates/operador_menu',$data);
		$this->load->view('operador/perfil_operador',$data);
		$this->load->view('templates/pie',$data);
	}
}
