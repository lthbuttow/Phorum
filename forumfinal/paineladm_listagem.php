<?php
require_once('inc/cabecalho.php');

if (isset($_SESSION['id_user']) && $_SESSION['adm'] == 1){

$sql="SELECT * FROM usuarios ORDER BY id_user ASC";
$result = mysqli_query($conexao, $sql);
$result_array = mysqli_fetch_array($result,MYSQLI_ASSOC);

?>

    <!-- Page Content -->
    <div class="container">
          <br>
          <br>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <!-- <li class="breadcrumb-item "><a href="painelposts_categorias.php">Painel Usuário - Categorias</a></li> -->
            <li class="breadcrumb-item active">Painel do Administrador - Listagem</li>
          </ol> 

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
          <?php 
          if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
          }
          ?>
 
          <h1 class="my-4">Painel do Administrador 
            <small><?php echo $_SESSION['user']; ?></small>
          </h1>
          <?php
          $html1 ='
              <a class="btn btn-primary" href="paineladm_add.php">Adicionar categoria</a>
              </br></br>
              <table class="table">
                  <thead>
                    <tr>
                    <th scope="col">id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Senha</th>
                    <th scope="col">Admin</th>
                    <th scope="col">Operações</th>
                    </tr>
                  </thead>
                  <tbody>';
                  echo $html1;
                  

                 foreach($result as $listagem){

                  
                  $html = '<tr>
                    <td>'.$listagem['id_user'].'</td>
                    <td>'.$listagem['user'].'</td>
                    <td>'.$listagem['email'].'</td>
                    <td>'.$listagem['senha'].'</td>
                    <td>'.$listagem['admin'].'</td>                    
                    <td>
                      <a class="btn btn-info" href="paineladm_editar.php?id_user='.$listagem['id_user'].'">
                        Editar</a>
                      <a class="btn btn-danger" href="paineladm_excluir.php?id_user='.$listagem['id_user'].'">Excluir</a>
                    </td>
                    </tr>';
                  echo $html;
                }
                ?>
                </tbody>
              </table>

          <!-- Pagination -->

        </div>


        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">
        <?php 
        require_once('inc/banners.php');
        ?>

          <!-- Categories Widget -->
          <div class="card my-4">
            <h5 class="card-header">Opções do Usuário</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-12">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <p>Painel administrativo do seu fórum</p>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
<?php
}
else{
    $_SESSION['msg'] = 
    '<br>
    <div class="alert alert-danger alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Acesso restrito a usuários cadastrados!</strong> Logue-se ou cadastre-se!
    </div>';
    header("Location:index.php");
}
require_once('inc/rodape.php');
