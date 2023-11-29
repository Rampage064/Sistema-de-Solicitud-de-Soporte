<?php if(isset($_SESSION['nombre']) && isset($_SESSION['tipo'])){
        

        if(isset($_POST['fecha_ticket']) && isset($_POST['name_ticket']) && isset($_POST['email_ticket'])){

          /*Este codigo nos servira para generar un numero diferente para cada ticket*/
          $codigo = ""; 
          $longitud = 2; 
          for ($i=1; $i<=$longitud; $i++){ 
            $numero = rand(0,9); 
            $codigo .= $numero; 
          } 
          $num=Mysql::consulta("SELECT id FROM ticket");
          $numero_filas = mysqli_num_rows($num);

          $numero_filas_total=$numero_filas+1;
          $id_ticket="TK".$codigo."N".$numero_filas_total;
          /*Fin codigo numero de ticket*/


          $fecha_ticket= MysqlQuery::RequestPost('fecha_ticket');
          $nombre_ticket= MysqlQuery::RequestPost('name_ticket');
          $email_ticket=MysqlQuery::RequestPost('email_ticket');
          $departamento_ticket=MysqlQuery::RequestPost('departamento_ticket');
          $asunto_ticket=MysqlQuery::RequestPost('asunto_ticket');        
          $mensaje_ticket=MysqlQuery::RequestPost('mensaje_ticket');
          $estado_ticket="Pendiente";
          $cabecera="From: Soporte Técnico <Hospital Amazónico>";
          $mensaje_mail="¡Gracias por reportarnos su problema! Buscaremos una solución para su producto lo mas pronto posible. Su ID ticket es: ".$id_ticket;
          $mensaje_mail=wordwrap($mensaje_mail, 70, "\r\n");

          if(MysqlQuery::Guardar("ticket","fecha,nombre_usuario,email_cliente,departamento,asunto,mensaje,estado_ticket,serie,solucion", "'$fecha_ticket','$nombre_ticket','$email_ticket','$departamento_ticket','$asunto_ticket','$mensaje_ticket', '$estado_ticket','$id_ticket',''")){

            /*----------  Enviar correo con los datos del ticket
            mail($email_ticket, $asunto_ticket, $mensaje_mail, $cabecera)
            ----------*/
            
            echo '
                <div class="alert alert-info alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="text-center">TICKET CREADO</h4>
                    <p class="text-center">
                        Ticket creado con exito, '.$_SESSION['nombre'].'<br>El TICKET ID es: <strong>'.$id_ticket.'</strong>
                    </p>
                </div>
            ';

          }else{
            echo '
                <div class="alert alert-danger alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="text-center">OCURRIÓ UN ERROR</h4>
                    <p class="text-center">
                        No hemos podido crear el ticket. Por favor intente nuevamente.
                    </p>
                </div>
            ';
          }
        }
?>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        // Obtiene la fecha y hora actual
        var currentDateTime = new Date();

        // Formatea la fecha y hora como YYYY-MM-DD HH:MM:SS (puedes cambiar el formato según tus necesidades)
        var formattedDateTime =
            currentDateTime.getDate() + '-' +
            ('0' + (currentDateTime.getMonth() + 1)).slice(-2) + '-' +
            ('0' + currentDateTime.getFullYear()).slice(-4) + ' ' +
            ('0' + currentDateTime.getHours()).slice(-2) + ':' +
            ('0' + currentDateTime.getMinutes()).slice(-2) + ':' +
            ('0' + currentDateTime.getSeconds()).slice(-2);

        // Establece la fecha y hora en el campo de entrada
        $('#fechainput').val(formattedDateTime);
    });
</script>

        <div class="container">
          <div class="row well">
            <div class="col-sm-3">
              <img src="img/soporte.png" class="img-responsive" alt="Image">
            </div>
            <div class="col-sm-9 lead">
              <h2 class="text-info">¿Cómo abrir un nuevo Ticket?</h2>
              <p>Para abrir un nuevo ticket deberá de llenar todos los campos de el siguiente formulario. Usted podra verificar el estado de su ticket mediante el <strong>Ticket ID</strong> que se le proporcionara a usted cuando llene y nos envie el siguiente formulario.</p>
            </div>
          </div><!--fin row 1-->

          <div class="row">
            <div class="col-sm-12">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title text-center"><strong><i class="fa fa-ticket"></i>&nbsp;&nbsp;&nbsp;Ticket</strong></h3>
                </div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-sm-4 text-center">
                      <br><br><br>
                      <img src="img/HospitalL2.png" alt=""><br><br>
                      <p class="text-primary text-justify">Por favor llene todos los datos de este formulario para abrir su ticket. El <strong>Ticket ID</strong> será enviado a la base de datos del Hospital.</p>
                    </div>
                    <div class="col-sm-8">
                      <form class="form-horizontal" role="form" action="" method="POST">
                          <fieldset>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Fecha</label>
                            <div class='col-sm-10'>
                                <div class="input-group">
                                    <input class="form-control" type="text" id="fechainput" placeholder="Fecha" name="fecha_ticket" required="" readonly>
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                          <label  class="col-sm-2 control-label">Nombre</label>
                          <div class="col-sm-10">
                              <div class='input-group'>
                                <input type="text" class="form-control" placeholder="Nombre" required="" pattern="[a-zA-Z ]{1,30}" name="name_ticket" title="Nombre Apellido" value="<?php echo $_SESSION['nombre_completo']; ?>" >
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                              </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                          <div class="col-sm-10">
                              <div class='input-group'>
                                <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email_ticket" required="" title="Ejemplo@dominio.com" value="<?php echo $_SESSION['email']; ?>" >
                                <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                              </div> 
                          </div>
                        </div>

                        <div class="form-group">
                          <label  class="col-sm-2 control-label">Departamento</label>
                          <div class="col-sm-10">
                              <div class='input-group'>
                                <select class="form-control" name="departamento_ticket">
                                <option value="Anatomia Patologica">Anatomia Patologica</option>
                                <option value="Area de Almacen">Area de Almacen</option>
                                <option value="Area de Patrimonio">Area de Patrimonio</option>
                                <option value="Asesoria Legal">Asesoria Legal</option>
                                <option value="Cirugia">Cirugia</option>
                                <option value="Consultorio - Especiales">Consultorio - Especiales</option>
                                <option value="Consultorio - Sociales">Consultorio - Sociales</option>
                                <option value="Consultorio - Transmisibles">Consultorio - Transmisibles</option>
                                <option value="Consultorio Madre-Nino">Consultorio Madre-Nino</option>
                                <option value="Direccion">Direccion</option>
                                <option value="Educacion para la Salud">Educacion para la Salud</option>
                                <option value="Epidemiologia">Epidemiologia</option>
                                <option value="Estadistica">Estadistica</option>
                                <option value="Farmacia">Farmacia</option>
                                <option value="Ginecologia y Obstetricia">Ginecologia y Obstetricia</option>
                                <option value="Imaginologia">Imaginologia</option>
                                <option value="Medicina">Medicina</option>
                                <option value="Oficina de Administracion">Oficina de Administracion</option>
                                <option value="Oficina de planeamiento estrategico">Oficina de planeamiento estrategico</option>
                                <option value="Patologia Clinica">Patologia Clinica</option>
                                <option value="Pediatria">Pediatria</option>
                                <option value="Salud Ocupacional">Salud Ocupacional</option>
                                <option value="Salud ambiental">Salud ambiental</option>
                                <option value="Sala de Operaciones">Sala de Operaciones</option>
                                <option value="Servicio de emergencia">Servicio de emergencia</option>
                                <option value="Servicio de Farmacia">Servicio de Farmacia</option>
                                <option value="Servicio Social">Servicio Social</option>
                                <option value="TRAUMATOLOGIA">TRAUMATOLOGIA</option>
                                <option value="UCI">UCI</option>
                                <option value="Unidad de Calidad">Unidad de Calidad</option>
                                <option value="Unidad de Economia">Unidad de Economia</option>
                                <option value="Unidad de Emergencia y Desastres">Unidad de Emergencia y Desastres</option>
                                <option value="Unidad de Epidemiologia">Unidad de Epidemiologia</option>
                                <option value="Unidad de Estadistica e Informatica">Unidad de Estadistica e Informatica</option>
                                <option value="Unidad de Logistica">Unidad de Logistica</option>
                                <option value="Unidad de Seguros">Unidad de Seguros</option>
                                <option value="Unidad de Servicios generales">Unidad de Servicios generales</option>
                                <option value="Unidad de recursos humanos">Unidad de recursos humanos</option>
                                </select>
                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                              </div> 
                          </div>
                        </div>

                        <div class="form-group">
                          <label  class="col-sm-2 control-label">Asunto</label>
                          <div class="col-sm-10">
                              <div class='input-group'>
                                <input type="text" class="form-control" placeholder="Asunto" name="asunto_ticket" required="">
                                <span class="input-group-addon"><i class="fa fa-paperclip"></i></span>
                              </div> 
                          </div>
                        </div>

                        <div class="form-group">
                          <label  class="col-sm-2 control-label">Problema de su producto</label>
                          <div class="col-sm-10">
                            <textarea class="form-control" rows="3" placeholder="Escriba el problema que presenta su producto" name="mensaje_ticket" required=""></textarea>
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-info">Abrir ticket</button>
                          </div>
                        </div>
                             </fieldset> 
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

<?php
}else{
?>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <img src="./img/Stop.png" alt="Image" class="img-responsive"/><br>
                <br>
                <br>
                <br>
                <br>
            </div>
            <div class="col-sm-7 text-center">
                <h1 class="text-danger">Esta página solo está disponible para usuarios del Hospital Amazónico.</h1>
                <h3 class="text-info">Inicia sesión para poder acceder</h3>
            </div>
            <div class="col-sm-1">&nbsp;</div>
        </div>
    </div>
<?php
}
?>
<script type="text/javascript">
  $(document).ready(function(){
      $("#fechainput").datepicker();
  });
</script>