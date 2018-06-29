<?php
require_once('inc/cabecalho.php');
if (isset($_SESSION['id_user'])){

// $id_user = $_GET['id_user'];

$sql="SELECT * FROM usuarios WHERE id_user=".$_SESSION['id_user'];
$result = mysqli_query($conexao, $sql);
$result_array = mysqli_fetch_array($result,MYSQLI_ASSOC);

?>

    <!-- Page Content -->
    <div class="container">
          <br>
          <br>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Início</a></li>
            <li class="breadcrumb-item active">Painel do Usuário</li>
          </ol> 

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
          <?php 
          if (isset($_SESSION['msg']) && $_SESSION['msg'] == 'Success') {
            $html = '
            <div class="alert alert-success alert-dismissible fade show">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Confirmado!</strong> Operação concluída com sucesso!
            </div>';
            echo $html;
            unset($_SESSION['msg']);
          }
          if (isset($_SESSION['msg']) && $_SESSION['msg'] == 'Erro') {
            $html = '
            <div class="alert alert-danger alert-dismissible fade show">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Erro ao executar a operação!</strong> Tente novamente!
            </div>';
            echo $html;
            unset($_SESSION['msg']);
          }
          ?>
 
          <h1 class="my-4">Painel do Usuário  
            <small><?php echo $_SESSION['user']; ?></small>
          </h1>
          <?php   
            $html1 ='

              <table class="table">
                  <thead>
                    <tr>
                    <th scope="col">id</th>
                    <th scope="col">Email</th>
                    <th scope="col">User</th>
                    <th scope="col">Senha</th>
                    <th scope="col">Operação</th>
                    </tr>
                  </thead>
                  <tbody>';
                  echo $html1;              

                 foreach($result as $paineluser){

                  
                  $html = '<tr>
                    <td>'.$paineluser['id_user'].'</td>
                    <td>'.$paineluser['email'].'</td>
                    <td>'.$paineluser['user'].'</td>
                    <td>*****</td>
                    <td>
                      <a class="btn btn-success" href="editar.php?id_user='.$paineluser['id_user'].'">
                        Editar</a>
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
                      <p>Controle seus posts</p>
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
    header("Location: ../index.php");
}
require_once('inc/rodape.php');
