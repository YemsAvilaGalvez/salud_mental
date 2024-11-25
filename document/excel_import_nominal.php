<?php
require('conn.php');
$tipo       = $_FILES['excel']['type'];
$tamanio    = $_FILES['excel']['size'];
$archivotmp = $_FILES['excel']['tmp_name'];
$lineas     = file($archivotmp);

$i = 0;

foreach ($lineas as $linea) {
    $cantidad_registros = count($lineas);
    $cantidad_regist_agregados =  ($cantidad_registros - 1);

    if ($i != 0) {

        $datos = explode(",", $linea);

        $Id_Cita  =                             !empty($datos[0])  ? ($datos[0]) : '';
        $Anio  =                                !empty($datos[1])  ? ($datos[1]) : '';
        $Mes =                                  !empty($datos[2])  ? ($datos[2]) : '';
        $Dia  =                                 !empty($datos[3])  ? ($datos[3]) : '';
        $Fecha_Atencion  =                      !empty($datos[4])  ? ($datos[4]) : '';
        $Lote =                                 !empty($datos[5])  ? ($datos[5]) : '';
        $Num_Pag =                              !empty($datos[6])  ? ($datos[6]) : '';
        $Num_Reg  =                             !empty($datos[7])  ? ($datos[7]) : '';
        $Id_Ups  =                              !empty($datos[8])  ? ($datos[8]) : '';
        $Id_Establecimiento =                   !empty($datos[9])  ? ($datos[9]) : '';
        $Id_Paciente  =                         !empty($datos[10])  ? ($datos[10]) : '';
        $Id_Personal  =                         !empty($datos[11])  ? ($datos[11]) : '';
        $Id_Registrador =                       !empty($datos[12])  ? ($datos[12]) : '';
        $Id_Financiador =                       !empty($datos[13])  ? ($datos[13]) : '';
        $Id_Condicion_Establecimiento  =        !empty($datos[14])  ? ($datos[14]) : '';
        $Id_Condicion_Servicio =                !empty($datos[15])  ? ($datos[15]) : '';
        $Edad_Reg  =                            !empty($datos[16])  ? ($datos[16]) : '';
        $Tipo_Edad  =                           !empty($datos[17])  ? ($datos[17]) : '';
        $Anio_Actual_Paciente =                 !empty($datos[18])  ? ($datos[18]) : '';
        $Mes_Actual_Paciente =                  !empty($datos[19])  ? ($datos[19]) : '';
        $Dia_Actual_Paciente =                  !empty($datos[20])  ? ($datos[20]) : '';
        $Id_Turno  =                            !empty($datos[21])  ? ($datos[21]) : '';
        $Codigo_Item  =                         !empty($datos[22])  ? ($datos[22]) : '';
        $Tipo_Diagnostico  =                    !empty($datos[23])  ? ($datos[23]) : '';
        $Valor_Lab  =                           !empty($datos[24])  ? ($datos[24]) : '';
        $Id_Correlativo =                       !empty($datos[25])  ? ($datos[25]) : '';
        $Peso =                                 !empty($datos[26])  ? ($datos[26]) : '';
        $Talla  =                               !empty($datos[27])  ? ($datos[27]) : '';
        $Hemoglobina  =                         !empty($datos[28])  ? ($datos[28]) : '';
        $Perimetro_Abdominal =                  !empty($datos[29])  ? ($datos[29]) : '';
        $Perimetro_Cefalico  =                  !empty($datos[30])  ? ($datos[30]) : '';
        $Id_Otra_Condicion  =                   !empty($datos[31])  ? ($datos[31]) : '';
        $Fecha_Ultima_Regla =                   !empty($datos[32])  ? ($datos[32]) : '';
        $Fecha_Solicitud_Hb =                   !empty($datos[33])  ? ($datos[33]) : '';
        $Fecha_Resultado_Hb  =                  !empty($datos[34])  ? ($datos[34]) : '';
        $Fecha_Registro =                       !empty($datos[35])  ? ($datos[35]) : '';
        $Fecha_Modificacion  =                  !empty($datos[36])  ? ($datos[36]) : '';
        $Id_Pais  =                             !empty($datos[37])  ? ($datos[37]) : '';
        $gruporiesgo_desc =                     !empty($datos[38])  ? ($datos[38]) : '';
        $condicion_gestante =                   !empty($datos[39])  ? ($datos[39]) : '';
        $peso_pregestacional =                  !empty($datos[40])  ? ($datos[40]) : '';
        $Id_dosis  =                            !empty($datos[41])  ? ($datos[41]) : '';
        $renipress  =                           !empty($datos[42])  ? ($datos[42]) : '';
        $Id_Institucion_Edu =                   !empty($datos[43])  ? ($datos[43]) : '';
        $Id_AplicacionOrigen =                  !empty($datos[44])  ? ($datos[44]) : '';
        $Alerta =                               !empty($datos[45])  ? ($datos[45]) : '';

        $insertar = "INSERT INTO nominal( 
            Id_Cita,                        
            Anio,                           
            Mes,                            
            Dia,                            
            Fecha_Atencion,                 
            Lote,                           
            Num_Pag,                        
            Num_Reg,                        
            Id_Ups,                         
            Id_Establecimiento,             
            Id_Paciente,                      
            Id_Personal,                      
            Id_Registrador,                   
            Id_Financiador,                   
            Id_Condicion_Establecimiento,     
            Id_Condicion_Servicio,            
            Edad_Reg,                         
            Tipo_Edad,                        
            Anio_Actual_Paciente,             
            Mes_Actual_Paciente,              
            Dia_Actual_Paciente,              
            Id_Turno,                         
            Codigo_Item,                      
            Tipo_Diagnostico,                 
            Valor_Lab,                        
            Id_Correlativo,                   
            Peso,                             
            Talla,                            
            Hemoglobina,                      
            Perimetro_Abdominal,              
            Perimetro_Cefalico,               
            Id_Otra_Condicion,                
            Fecha_Ultima_Regla,               
            Fecha_Solicitud_Hb,               
            Fecha_Resultado_Hb,               
            Fecha_Registro,                   
            Fecha_Modificacion,               
            Id_Pais,                          
            gruporiesgo_desc,                 
            condicion_gestante,               
            peso_pregestacional,              
            Id_dosis,                         
            renipress,                        
            Id_Institucion_Edu,               
            Id_AplicacionOrigen,              
            Alerta                           

        ) VALUES(
            '$Id_Cita',                       
            '$Anio',                           
            '$Mes',                            
            '$Dia',                            
            '$Fecha_Atencion',                 
            '$Lote',                           
            '$Num_Pag',                        
            '$Num_Reg',                        
            '$Id_Ups',                         
            '$Id_Establecimiento',             
            '$Id_Paciente',                     
            '$Id_Personal',                      
            '$Id_Registrador',                   
            '$Id_Financiador',                   
            '$Id_Condicion_Establecimiento',     
            '$Id_Condicion_Servicio',            
            '$Edad_Reg',                         
            '$Tipo_Edad',                        
            '$Anio_Actual_Paciente',             
            '$Mes_Actual_Paciente',              
            '$Dia_Actual_Paciente',              
            '$Id_Turno',                         
            '$Codigo_Item',                      
            '$Tipo_Diagnostico',                 
            '$Valor_Lab',                        
            '$Id_Correlativo',                   
            '$Peso',                             
            '$Talla',                            
            '$Hemoglobina',                      
            '$Perimetro_Abdominal',              
            '$Perimetro_Cefalico',               
            '$Id_Otra_Condicion',                
            '$Fecha_Ultima_Regla',               
            '$Fecha_Solicitud_Hb',               
            '$Fecha_Resultado_Hb',               
            '$Fecha_Registro',                   
            '$Fecha_Modificacion',               
            '$Id_Pais',                          
            '$gruporiesgo_desc',                 
            '$condicion_gestante',               
            '$peso_pregestacional',              
            '$Id_dosis',                         
            '$renipress',                        
            '$Id_Institucion_Edu',               
            '$Id_AplicacionOrigen',              
            '$Alerta'       

        )";
        mysqli_query($mysqli, $insertar);
    }

    echo '<div>' . $i . "). " . $linea . '</div>';
    $i++;
}


echo '<p style="text-aling:center; color:#333;">Total de Registros: ' . $cantidad_regist_agregados . '</p>';

?>

<a href="index.php">Atras</a>