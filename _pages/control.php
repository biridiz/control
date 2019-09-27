 <!-- ******************************************************************* -->
                 <!-- BACK-END, VALIDAÇÃO DE ACESSO -->
  <!-- ******************************************************************* -->
  
<?php
  session_start();
  if(!isset($_SESSION['usuario']) & !isset($_SESSION['inicio'])){
    echo "Esta página é restrita a usuarios autenticados. Por gentileza volte para a página
    de <a href=\"login.php\">login</a>";
    die(); // Interrompe a navegação
  };
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
      <meta charset="utf-8"><!--faz o site aceitar o padrao universao de caracteres com acentos e cedilha-->
      <!--SEO BASICO-->
      <meta name="author" content="Luiz Dendena">
      <meta name="description" content="control">
      <!--Design Responsivo-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <title id="title">Controle</title>
      <link rel="stylesheet" href="../_estilo/estilo.css"><!--importando o arquivo css-->
    </head>
    <body id="body-control">
      
      <div>
        <header>
          <?php include_once "../_include/conexao.php"; ?>
          <form id="form-control" action="" method="post">
            <span class="btn-control">
               <button type="submit" name="registros">Registros</button>
            </span>
            <span class="btn-control">
               <button type="submit" name="users">Funcionários</button>
            </span>
            <span class="btn-control">
               <button type="submit" name="clientes">Clientes</button>
            </span>
            <span class="btn-control">
               <button type="submit" name="eventos">Eventos</button>
            </span>
            <span>
              <a href="index.php">Voltar</a>
            </span>
          </form>
        </header>
      </div>

      <form action="" method="post">
        <div>
          <section>
            <?php
            if(isset($_POST['registros'])){?>
                <div>
                  <button type="submit" name="ls">Listar todos</button>
                  <button type="submit" name="pesq">Pesquisar</button>
                  <button type="submit" name="edit">Editar</button>
                  <button type="submit" name="delet">Excluir</button><br>
                </div>
                <label>Filtrar por:</label><br>
                <span>
                  <input name="id" type="text" placeholder="ID">
                </span>
                <span>
                  <input name="placa" type="text" placeholder="PLACA">
                </span>
                <span>
                  <input name="cor" type="text" placeholder="COR">
                </span>
                <span>
                  <input name="modelo" type="text" placeholder="MODELO">
                </span>
                <span>
                  <input name="data" type="date" placeholder="DIA ">
                </span>
                <span>
                  <input name="cred" type="text" placeholder="CREDENCIAL">
                </span>
                <span>
              </form> <br> <hr> <br><?
            }
            ?>
          </section>
        </div><?
        if(isset($_POST['edit'])) include 'editar-R.php';
        if(isset($_POST['delet'])) include 'excluir-R.php';
        if(isset($_POST['ls'])){
          include '../_control/listar-todos-R.php';
        }
        if(isset($_POST['pesq'])){
          $id = $_POST['id'];
          $placa = $_POST['placa'];
          $modelo = $_POST['modelo'];
          $cor = $_POST['cor'];
          $data = $_POST['data'];
          $cred = $_POST['cred'];

          if(empty($id)) true;
          else include '../_control/filtrar-id-R.php';
          
          if(empty($placa)) true;
          else include '../_control/filtrar-placa-R.php';

          if(empty($modelo)) true;
          else include '../_control/filtrar-modelo-R.php';

          if(empty($cor)) true;
          else include '../_control/filtrar-cor-R.php';

          if(empty($data)) true;
          else include '../_control/filtrar-data-R.php';

          if(empty($cred)) true;
          else include '../_control/filtrar-cred-R.php';
        }?>

        <div>
          <section>
            <?php
            if(isset($_POST['users'])){?>
                <div>
                  <button type="submit" name="ls">Listar todos</button>
                  <button type="submit" name="pesq">Pesquisar</button><br>
                </div>
                <label>Filtrar por:</label><br>
                <span>
                  <input name="id" type="text" placeholder="ID">
                </span>
                <span>
                  <input type="text" placeholder="NOME">
                </span>
                <span>
                  <input type="text" placeholder="TELEFONE">
                </span>
              </form> <br> <hr> <br><?
            }
            ?>
          </section> 
        </div><?
        if(isset($_POST['ls-reg'])){
          include '../_control/listar-todos-R.php';
        }?>
        <div>
          <section>
            <?php
            if(isset($_POST['clientes'])){?>
                <div>
                  <button type="submit" name="ls">Listar todos</button>
                  <button type="submit" name="pesq">Pesquisar</button><br>
                </div>
                <label>Filtrar por:</label><br>
                <span>
                  <input type="text" placeholder="ID">
                </span>
                <span>
                  <input type="text" placeholder="NOME">
                </span>
                <span>
                  <input type="text" placeholder="TELEFONE">
                </span>
                <span>
                  <input type="text" placeholder="CPF">
                </span>
              </form> <br> <hr> <br><?
            }
            ?>
          </section> 
        </div>

        <div>
          <section>
            <?php
            if(isset($_POST['eventos'])){?>
                <div>
                  <button type="submit" name="ls">Listar todos</button>
                  <button type="submit" name="pesq">Pesquisar</button><br>
                </div>
                <label>Filtrar por:</label><br>
                <span>
                  <input type="text" placeholder="ID">
                </span>
                <span>
                  <input type="text" placeholder="NOME">
                </span>
                <span>
                  <input type="text" placeholder="CIDADE">
                </span>
              </form> <br> <hr> <br><?
            }
            ?>
          </section> 
        </div>
      </form>


    </body>
</html>