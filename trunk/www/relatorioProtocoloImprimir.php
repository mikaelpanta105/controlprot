<? session_start();?>
<body >
<html>
  <head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
  <script language=\"JavaScript\" src=\"util.js\"></script>
<link href="default.css" rel="stylesheet" type="text/css" />
  </head>
  <body onload="window.print()">
<?php

require 'conectar.php';
require 'util.php';


        $sql = "select codProtocolo,dataCriacao,status,quantidadeContratos,dataEnvio,codUsuario from protocolo
        where dataEnvio BETWEEN '".$_SESSION['dtInicial']."' and '".$_SESSION['dtFinal']."';";
        $resultado = mysql_query($sql) or die ("erro sql".mysql_error());
        $resultado_w = mysql_query($sql) or die ("erro sql".mysql_error());





echo "<h2>Protocolo enviado por data</h2>";

echo "<br>";
echo "<table border=\"1\" width=\"800\" cellspacing=\"0\" bordercolor=\"black\">
    <tr>
        <th >Protocolo</th>
        <th >Criado em:</th>
        <th >Enviado em:</th>
        <th >Qte Contratos</th>
        <th >Usu�rio</th>
    </tr>
    ";
while ($linha = mysql_fetch_assoc($resultado_w)){
    echo"
        <tr>
        <td class=\"resultadoImpressao\">".$linha['codProtocolo']."</td>
        <td class=\"resultadoImpressao\">".$linha['dataCriacao']."</td>
        <td class=\"resultadoImpressao\">".$linha['dataEnvio']."</td>
        <td class=\"resultadoImpressao\">".$linha['quantidadeContratos']."</td>
        <td class=\"resultadoImpressao\">".$linha['codUsuario']."</td>
        </tr>";
    }
    $total = mysql_num_rows($resultado);
    echo"
    <tr>
        <th colspan=\"8\">Total de Registros:$total</th>
    </tr>
    </table>";

?>
  </body>
</html>
