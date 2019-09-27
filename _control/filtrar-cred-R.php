<link rel="stylesheet" href="../_estilo/estilo.css">
<style type="text/css">
  .btn-edit{
    float: right;
    font-size: 6px;
  }
</style>
<div>
  <section>
  <?php
    include 'Registro.php';
    $reg = new Registro();
    $row = $reg->filtrarCred($cred);?>
    <table>
      <thead>
        <form action="" method="post">
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Placa</th>
            <th scope="col">Modelo</th>
            <th scope="col">Cor</th>
            <th scope="col">Data</th>
            <th scope="col">Credencial</th>
            <th scope="col">Hora de entrada</th>
            <th scope="col">Hora de saída</th>  
          </tr>
        </form>
      </thead><?
        
      for($i = 0; $i < sizeof($row); $i++){?>
        <tbody>
           <tr>
            <span>
               <td scope="row"><?php echo $row[$i]['ID'];?></td>
            </span>
            <span>
               <td scope="row"><?php echo $row[$i]['PLACA'];?></td>
            </span>
            <span>
              <td scope="row"><?php echo $row[$i]['MODELO'];?></td>
            </span>
            <span>
              <td scope="row"><?php echo $row[$i]['COR'];?></td>
            </span>
            <span>
              <td scope="row"><?php echo $row[$i]['DATA'];?></td>
            </span>
            <span>
              <td scope="row"><?php echo $row[$i]['CORTESIA'];?></td>
            </span>
            <span>
              <td scope="row"><?php echo $row[$i]['HORAIN'];?></td>
            </span>
            <span>
              <td scope="row"><?php echo $row[$i]['HORAOUT'];?></td>      
            </span>
          </tr> 
        </tbody><?
      }
      ?>

    </table>
  </section>
</div>