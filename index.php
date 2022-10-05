<?php
$conexion= new mysqli('localhost','root','','adventureworks');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi page</title>
</head>
<body>
    <?php
   echo "<form action='index.php' method='POST'>";
   echo "<select name='categoria'>";
   echo "<option value='0'>Todas las categorias...</option>";
   $cargarSelect= "Call sp_select_categoria";
   $ex= mysqli_query($conexion,$cargarSelect);
   while($listaSelect=mysqli_fetch_array($ex)){ 
         echo"<option value='".$listaSelect['ProductCategoryID']."'>".$listaSelect['Name']."</option>";
   }  
   echo " </select> <br>  <br>";
  
   echo "<input type='submit' value='Mostrar'>";
   echo "</form>";

   $categoria=(isset($_POST['categoria']) ? $_POST['categoria']:"");   

     echo "<table border='1'>
      <tr>
          <th>SubCategoriaID</th>
          <th>Nombre</th>
          <th>Fila</th>
      <tr>";
    if($categoria==0){
    $con= new mysqli('localhost','root','','adventureworks');
      $consultaTabla= "Call sp_todas_subcategorias";
      $ejexutarConsulta= mysqli_query($con,$consultaTabla);
      while($fila1=mysqli_fetch_array($ejexutarConsulta)){
     echo"<tr>
              <td>".$fila1['ProductSubcategoryID']."</td>
              <td>".$fila1['Name']."</td>
              <td>".$fila1['rowguid']."</td>
          </tr>";
         }
     echo "</table>"; 
        }
     
    
        else{
            $conn= new mysqli('localhost','root','','adventureworks');
            $consultaTabla= "Call sp_ver_subcategoria($categoria)";
            $ejexutarConsulta= mysqli_query($conn,$consultaTabla);
            while($fila1=mysqli_fetch_array($ejexutarConsulta)){
           echo"<tr>
                    <td>".$fila1['ProductSubcategoryID']."</td>
                    <td>".$fila1['Name']."</td>
                    <td>".$fila1['rowguid']."</td>
                </tr>";
               }
           echo "</table>"; 
         
        }
        
    ?> 
</body>
</html>