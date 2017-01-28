<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">


<link rel="stylesheet" href="<?=base_url()?>assets/css/style_login.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>

<?php
$username = array('name' => 'username', 'placeholder' => 'Usuario');
$password = array('name' => 'password',	'placeholder' => 'Contraseña');
$submit = array('name' => 'submit', 'value' => 'Iniciar sesión', 'title' => 'Iniciar sesión');
?>

<body>
  <div class="login">
	<img src="<?php echo base_url('images/logo.png'); ?>" />
		<?=form_open(base_url().'index.php/c_login/new_user')?>
    <form method="post">
    	<!-- <input type="text" name="u" placeholder="Usuario" required="required" />
        <input type="password" name="p" placeholder="Contraseña" required="required" />
        <button type="submit" class="btn btn-primary btn-block btn-large">Ingresar.</button> -->
					<?=form_open(base_url().'index.php/c_login/new_user')?>
					<label for="username">Usuario:</label>
					<?=form_input($username)?><p><?=form_error('username')?></p>
					<label for="password">Contraseña:</label>
					<?=form_password($password)?><p><?=form_error('password')?></p>
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
    <a href="#">Olvidé mi contraseña</a><br>
   <a href="<?=base_url().'index.php/c_registro'?>" class="text-center">Registrarme</a>
       
    
</div>
  
    <script src="js/index.js"></script>

</body>
</html>
