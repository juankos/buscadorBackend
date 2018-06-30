<?php
  //Código para activar estrucutura JSON 
  
  require('leer.php');
  
  //Código para relacionar JSON con AJAX
  
  $response=array();
 
  //Código para tomar variables
  if($_POST['ciudad'] != "null"){
      $ciudad = $_POST['ciudad'];
  }else{
    $ciudad = null;
  }
  if($_POST['tipo'] != "null"){
      $tipo = $_POST['tipo'];
  }else{
    $tipo = null;
  }
    $p = $_POST['precio'];
    $precio = explode(";",$p);
    $precio_i = intval($precio[0]);
    $precio_f = intval($precio[1]);
    
      if($ciudad != null && $tipo != null){
        // Código en caso encuentre la cudad, debe mostrar contenidos
        foreach ($data as $key => $value) {
          $arreglar = array("$",",");
          $valor = str_replace($arreglar,"",$value['Precio']);
          $valor = intval($valor);
          // Código para contenido encontrado por precios
          if($precio_i<=$valor && $valor<= $precio_f){
            if($ciudad == $value['Ciudad'] && $tipo == $value['Tipo'] ){
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
          }
        }
      }else if($ciudad !=null xor $tipo !=null){
       
        foreach ($data as $key => $value) {
          $arreglar = array("$",",");
          $valor = str_replace($arreglar,"",$value['Precio']);
          $valor = intval($valor);
          
          if($precio_i<=$valor && $valor<= $precio_f){
            if($ciudad == null){
              if($tipo == $value['Tipo']){
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
            }else if($tipo == null){
              if($ciudad == $value['Ciudad']){
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
            }
          }
        }
      }else{
        // En caso que contenidos buscados no se encuentren
        foreach ($data as $key => $value) {
          $arreglar = array("$",",");
          $valor = str_replace($arreglar,"",$value['Precio']);
          $valor = intval($valor);
        
          if($precio_i<=$valor && $valor<= $precio_f){
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
        }
      }
    // Obtener respuestas
    $res=array_unique($response);
    $r= array_values($res);
    //Código para enviar JSON
    echo json_encode($r);
?>