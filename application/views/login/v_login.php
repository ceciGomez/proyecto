<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">


<link rel="stylesheet" href="<?=base_url()?>assets/css/style_login.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>

<body>
  <div class="login">
	<h1>SIRMi</h1>
    <form method="post">
    	<input type="text" name="u" placeholder="Usuario" required="required" />
        <input type="password" name="p" placeholder="Contraseña" required="required" />
        <button type="submit" class="btn btn-primary btn-block btn-large">Ingresar.</button>
    </form>
</div>
  
    <script src="js/index.js"></script>

</body>
</html>
