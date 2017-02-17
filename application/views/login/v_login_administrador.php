<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login Administrador</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">


<link rel="stylesheet" href="<?=base_url()?>assets/css/style_login.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>

<?php
$usuario = array('name' => 'usuario', 'placeholder' => 'Usuario');
$contraseña = array('name' => 'contraseña',	'placeholder' => 'Contraseña');
$submit = array('name' => 'submit', 'value' => 'Iniciar sesión', 'title' => 'Iniciar sesión');
?>

<body>
  <div class="login">
	<img src="<?php echo base_url('images/logo_administrador.png'); ?>" />
		<?=form_open(base_url().'index.php/c_login_administrador/new_user')?>
    <form method="post">
    	<!-- <input type="text" name="u" placeholder="Usuario" required="required" />
        <input type="password" name="p" placeholder="Contraseña" required="required" />
        <button type="submit" class="btn btn-primary btn-block btn-large">Ingresar.</button> -->
					<?=form_open(base_url().'index.php/c_login_administrador/new_user')?>
					<label for="usuario">Usuario:</label>
					<?=form_input($usuario)?><p><?=form_error('usuario')?></p>
					<label for="contraseña">Contraseña:</label>
					<?=form_password($contraseña)?><p><?=form_error('contraseña')?></p>
					<?=form_hidden('token',$token)?>
					<button type="submit" class="btn btn-primary btn-block btn-large"><?=form_submit($submit)?></button>
					<?=form_close()?>


		<?php 
		if($this->session->flashdata('usuario_incorrecto'))
		{
		?>
			<p><?=$this->session->flashdata('usuario_incorrecto')?></p>
		<?php
		}
		?>
    </form>

  
       
    
</div>
  
    <script src="js/index.js"></script>

</body>
</html>
