<?php
  require('leer.php');

  //Código para ver devoluciones en JSON - AJAX
  $response=array();

  // Código para obtener ciudades y propiedades para mostrar

  $ciudades=array();
  $tipos=array();
  $response['tituloContenido'] = '<div class="tituloContenido card">
                    <h5>Resultados de la búsqueda:</h5>
                    <div class="divider"></div>
                    <button type="button" name="todos" class="btn-flat waves-effect" id="mostrarTodos">Mostrar Todos</button>
                    </div>';
  foreach ($data as $key => $value) {
    // Código para seleccionar ciudadaes
    $ciudades[$key]=$value['Ciudad'];
    $tipos[$key]=$value['Tipo'];

    //Código para obtener el valor que retornará
    $response[$key] = '<div class="itemMostrado card">
            <img src="img/home.jpg">
              <div class="card-stacked">
                <span><strong>&nbsp;&nbsp;&nbsp;Direccion :</strong>'.$value['Direccion'].'</span><br />
                <span><strong>&nbsp;&nbsp;&nbsp;Ciudad : </strong>'.$value['Ciudad'].'</span><br />
                <span><strong>&nbsp;&nbsp;&nbsp;Telefono : </strong>'.$value['Telefono'].'</span><br />
                <span><strong>&nbsp;&nbsp;&nbsp;Codigo Postal : </strong>'.$value['Codigo_Postal'].'</span><br />
                <span><strong>&nbsp;&nbsp;&nbsp;Tipo : </strong>'.$value['Tipo'].'</span><br />
                <span><strong>&nbsp;&nbsp;&nbsp;Precio : </strong><span class="precioTexto">'.$value['Precio'].'</span></span><br /><br />
              <div class="divider"></div>
              <div class="card-action">VER MAS</div>
              </div>
            </div>';
  }
  //Código para filtrar ciudades

  $ciudades_f=array_unique($ciudades);
  $ciudades_filtradas= array_values($ciudades_f);
  $tipos_f= array_unique($tipos);
  $tipos_filtrados= array_values($tipos_f);

  //Código para filtrar variables
  $response['ciudades'] =$ciudades_filtradas;
  $response['tipos']=$tipos_filtrados;
 
  //Código para enviar JSON
  echo json_encode($response);
  fclose($file);
?>