
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?=base_url()?>assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>assets/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?=base_url()?>assets/css/blue.css">


  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

  <script type="text/javascript">
//funcion que solo permite numeros
 function NumbersOnly(e) {
    var unicode = e.charCode ? e.charCode : e.keyCode;
    if (unicode != 8) {
        if (unicode < 48 || unicode > 57) {

            if (unicode == 9 || IsArrows(e) )
                return true;
            else
                return false;
        }
    }
}
function IsArrows (e) {
       return (e.keyCode >= 37 && e.keyCode <= 40); 
}
//funcion que solo permite letras
function validar(e) { 
tecla = (document.all) ? e.keyCode : e.which;
if (tecla==8) return true; 
patron =/[A-Za-z\s]/; 
te = String.fromCharCode(tecla); 
return patron.test(te); 
}

/*funcion ajax que llena el combo dependiendo de la categoria seleccionada*/
$(document).ready(function(){
   $("#Provincia").change(function () {
           $("#Provincia option:selected").each(function () {
         
           //console.log( $('#Provincia').val());
           //pado el numero de pronvicia, es decir el id
            miprovincia=$('#Provincia').val();
            $.post("<?=base_url()?>index.php/c_registro/departamento", { miprovincia: miprovincia}, function(data){
            $("#Departamento").html(data);
            });            
        });
   })
});


$(document).ready(function(){
   $("#Departamento").change(function () {
           $("#Departamento option:selected").each(function () {
         
           //console.log( $('#Provincia').val());
           //pado el numero de pronvicia, es decir el id
            midepartamento=$('#Departamento').val();
            $.post("<?=base_url()?>index.php/c_registro/localidad", { midepartamento: midepartamento}, function(data){
            $("#Localidad").html(data);
            });            
        });
   })
});
/*fin de la funcion ajax que llena el combo dependiendo de la categoria seleccionada*/
</script>

</head>
<body class="hold-transition register-page" >
<div class="register-box">
  <div class="register-logo">
  <b>Registro</b>Escribano</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Registrar nuevo Escribano</p>

  
     <?=form_open(base_url().'index.php/c_registro/registro_esc')?>
          <form method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Nombre" name="nombre" style="text-transform:uppercase;" onkeypress="return validar(event)" onkeyup="javascript:this.value=this.value.toUpperCase();">
         <p><?=form_error('nombre')?></p>
      </div>
       <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Apellido" name="apellido" style="text-transform:uppercase;"  onkeypress="return validar(event)" onkeyup="javascript:this.value=this.value.toUpperCase();">
           <p><?=form_error('apellido')?></p>
      </div>

        <div class="form-group has-feedback">
        <input type="text" id="number" class="form-control" placeholder="DNI"  name="DNI" maxlength="8" onkeypress="return NumbersOnly(event);">
         <p><?=form_error('DNI')?></p>
      </div>

        <div class="form-group has-feedback">
        <input type="text" id="number" class="form-control" placeholder="Nro Matricula" name="nroMatricula" maxlength="8" onkeypress="return NumbersOnly(event);">
         <p><?=form_error('nroMatricula')?></p>
      </div>

      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Correo" style="text-transform:uppercase;"  name="correo"onkeyup="javascript:this.value=this.value.toUpperCase();">
         <p><?=form_error('correo')?></p>
      </div>
    
      <div class="form-group">
      <label>Teléfono:</label>
              <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <input type="text" class="form-control" name="telefono" data-inputmask='"mask": "(054) 999-9999999"' data-mask>
                </div>
                <!-- /.input group -->
       </div>
        <p><?=form_error('telefono')?></p>
      <div> 
        <?php 
        $id_prov=0;
         ?>
        Provincia
            <select name="provincia" id="Provincia">
              <option value="">Selecciona una Provincia</option>
              <?php  foreach ($provincias as $p){ ?>
                 <option value=
                  <?php
                 
                  echo "' $p->idProvincia' > $p->nombre"; }?></option>
            

          </select>
           <p><?=form_error('provincia')?></p>
       </div>
       <div>
       
       <br>

       <div> 
        Departamento
            <select name="departamento" id="Departamento">
                <option value="">Selecciona un Departamento</option>
            </select>
             <p><?=form_error('departamento')?></p>
       </div>
       <div>

       <br>

        Localidad
          <select name="localidad" id="Localidad">
               <option value="">Selecciona una Localidad </option>
          </select>
           <p><?=form_error('localidad')?></p>
       </div>
       <div class="form-group">
                  <input type="text" class="form-control" placeholder="Direccion" name="direccion" maxlength="100" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                   <p><?=form_error('direccion')?></p>
       </div>
              <!-- /.form group -->
       <div class="form-group">
                  <input type="text" class="form-control" placeholder="Usuario"  name="usuario" maxlength="100" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                   <p><?=form_error('usuario')?></p>
       </div>       
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Contraseña" name="contraseña" maxlength="100" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
        <p><?=form_error('contraseña')?></p>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Repetir contraseña"  name="repecontraseña" maxlength="100" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
           <p><?=form_error('repecontraseña')?></p>
      </div>
      <div class="row">
        
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Registrar</button>
        </div>

          <?=form_close()?>
        <!-- /.col -->
      </div>
    </form>

    <a href="login.html" class="text-center">Ya estoy registrado</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 2.2.3 -->
<script src="<?=base_url()?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?=base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="<?=base_url()?>assets/plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="<?=base_url()?>assets/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?=base_url()?>assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?=base_url()?>assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="<?=base_url()?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="<?=base_url()?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- bootstrap color picker -->
<script src="<?=base_url()?>assets/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="<?=base_url()?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="<?=base_url()?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="<?=base_url()?>assets/plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="<?=base_url()?>assets/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>assets/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url()?>assets/dist/js/demo.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/aaaa", {"placeholder": "dd/mm/aaaa"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
    //Date range as a button
    $('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function (start, end) {
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
    );

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

    //Colorpicker
    $(".my-colorpicker1").colorpicker();
    //color picker with addon
    $(".my-colorpicker2").colorpicker();

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
  });
</script>
</body>
</html>
