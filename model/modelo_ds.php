<?php
include_once 'conexion.php';

class Modelo_ds
{
    var $acceso;

    public function __construct()
    {
        $db = new conexionBD();
        $this->acceso = $db->conexionPDO();  // Llamamos al método conexionPDO() para obtener la conexión
    }

    function Total_registros()
    {
        $sql = "SELECT COUNT(*) AS Total_Registros FROM consolidado";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $resultado = $query->fetch(PDO::FETCH_ASSOC);
        if ($resultado && isset($resultado['Total_Registros'])) {
            return $resultado['Total_Registros'];  // Retornamos solo el valor total
        } else {
            return 0;  // En caso de no haber registros, devolvemos 0
        }
    }

    function Total_pacientes_unicos()
    {
        $sql = "SELECT COUNT(DISTINCT Numero_Documento_Paciente) AS Total_Pacientes_Unicos FROM consolidado";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $resultado = $query->fetch(PDO::FETCH_ASSOC);
        if ($resultado && isset($resultado['Total_Pacientes_Unicos'])) {
            return $resultado['Total_Pacientes_Unicos'];  // Retornamos el total de pacientes únicos
        } else {
            return 0;  // En caso de no haber registros, devolvemos 0
        }
    }

    function Total_pacientes_intervencion()
    {
        // Consulta para obtener los primeros 10 registros
        $sql = "SELECT id_cita, CONCAT_WS(' ', Apellido_Paterno_Paciente, Apellido_Materno_Paciente, Nombres_Paciente) AS Nombre_Paciente, Numero_Documento_Paciente
                FROM consolidado
                WHERE Codigo_Item IN ('99215', '99214.06','99207.04','90806', '90834', '90860','C0012','C0011','99207.01','C2111.01', '96100.01', '90847','99366') 
                AND Tipo_Diagnostico IN ('D', 'R')
                LIMIT 10";  // Limitar los resultados a los primeros 10
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
        
        // Consulta para obtener el total de registros
        $sqlTotal = "SELECT COUNT(*) AS Total FROM consolidado
                     WHERE Codigo_Item IN ('99215', '99214.06','99207.04','90806', '90834', '90860','C0012','C0011','99207.01','C2111.01', '96100.01', '90847','99366')
                     AND Tipo_Diagnostico IN ('D', 'R')";
        $queryTotal = $this->acceso->prepare($sqlTotal);
        $queryTotal->execute();
        $totalResultado = $queryTotal->fetch(PDO::FETCH_ASSOC);
        
        // Retornar ambos resultados
        return [
            'pacientes_intervencion' => $resultado,
            'total_intervencion' => $totalResultado['Total']
        ];
    }


    
}
?>
