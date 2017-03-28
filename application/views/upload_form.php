<div class="content-wrapper">
   <section class="content">


<h1>Cambiar foto de perfil</h1>
<?php echo $error;?>

<?php echo form_open_multipart('upload/do_upload');?>

<input type="file" name="userfile" size="20" />

<br /><br />

<input type="submit" value="Cargar Imagen" />

</form>
</section>
</div>