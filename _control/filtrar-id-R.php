<link rel="stylesheet" href="../_estilo/estilo.css">
<div>
  <section>
  <?php
    include 'Registro.php';
    $reg = new Registro();
    $row = $reg->filtrarId($id);?>
    <table>
      <thead>
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
        </thead><?
        for($i = 0; $i < sizeof($row); $i++){?>
          <tbody>
            <tr>
              <th scope="row"><?php echo $row[$i]['ID'];?></td>
                <th scope="row"><?php echo $row[$i]['PLACA'];?></td>
                <th scope="row"><?php echo $row[$i]['MODELO'];?></td>
                <th scope="row"><?php echo $row[$i]['COR'];?></td>
                <th scope="row"><?php echo $row[$i]['DATA'];?></td>
                <th scope="row"><?php echo $row[$i]['CORTESIA'];?></td>
                <th scope="row"><?php echo $row[$i]['HORAIN'];?></td>
                <th scope="row"><?php echo $row[$i]['HORAOUT'];?></td>      
              </tr>
          </tbody><?
        }?>
      </table>
  </section>
</div>