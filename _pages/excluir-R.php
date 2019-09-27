<?php
include_once '../_control/Registro.php';
$reg = new Registro();
?>
<h3 id="tt-delet">Excluir Registros</h2>
<div id="box-delet">
  <section>
    <form action="" method="post">
    Informe o ID do registro que deseja excluir!
    <input class="form-delet" type="text" name="id" placeholder="ID"><br>
    <button class="form-delet" type="submit" id="Confirma" onclick="return confirm('Tem certeza de que deseja excluir este registro?')" name="Confirma">Confirma</button>
    <?php
    $i = 0;
    if(isset($_POST['Confirma'])){ 
      if(isset($_POST['id'])){
        $id = $_POST['id'];
        if(!empty($id)){
          if($reg->deletar($id)){?>
            <script>
              alert("O registro foi apagado!");
            </script><?
          }
        }
      }
    }?>
</section>
</div>