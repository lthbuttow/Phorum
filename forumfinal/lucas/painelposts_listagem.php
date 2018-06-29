<?php
require_once('inc/cabecalho.php');
$id_ct = $_GET['id_ct'];


if (isset($_SESSION['id_user'])){

$sql="SELECT user,titulo,posts.id_post,categoria FROM posts,usuarios,categorias WHERE posts.id_user=usuarios.id_user AND posts.id_cat=categorias.id_cat AND posts.id_cat=".$id_ct." AND usuarios.id_user=".$_SESSION['id_user']." ORDER BY id_post DESC";
$result = mysqli_query($conexao, $sql);
$result_array = mysqli_fetch_array($result,MYSQLI_ASSOC);

?>

    <!-- Page Content -->
    <div class="container">
          <br>
          <br>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
            <li class="breadcrumb-item "><a href="posts.php">Posts</a></li>
            <li class="breadcrumb-item "><a href="painelposts_categorias.php">Painel Usuário - Categorias</a></li>
            <li class="breadcrumb-item active">Painel Usuário - Listagem</li>
          </ol> 

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
          <?php 
          if (isset($_SESSION['msg']) && $_SESSION['msg'] == 'Success') {
            $html = '
            <div class="alert alert-success alert-dismissible fade show animated bounceInDown">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Confirmado!</strong> Operação concluída com sucesso!
            </div>';
            echo $html;
            unset($_SESSION['msg']);
          }
          if (isset($_SESSION['msg']) && $_SESSION['msg'] == 'Erro') {
            $html = '
            <div class="alert alert-danger alert-dismissible fade show animated bounceInDown">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Erro ao executar a operação!</strong> Tente novamente!
            </div>';
            echo $html;
            unset($_SESSION['msg']);
          }
          ?>
 
          <h1 class="my-4">Painel do Usuário  
            <small><?php echo $result_array['categoria']; ?></small>
          </h1>
          <?php
          $html1 ='

          <a class="btn btn-primary" href="postar.php?id_categoria='.$id_ct.'">Novo Post</a>
          </br></br>
              <table class="table">
                  <thead>
                    <tr>
                    <th scope="col">id</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Operações</th>
                    </tr>
                  </thead>
                  <tbody>';
                  echo $html1;
                  

                 foreach($result as $listagem){

                  
                  $html = '<tr>
                    <td>'.$listagem['id_post'].'</td>
                    <td>'.$listagem['titulo'].'</td>
                    <td>
                      <a class="btn btn-info" href="visualizar.php?id_post='.$listagem['id_post'].'&id_ct='.$id_ct.'" target="_blank">
                        Visualizar</a>
                      <a class="btn btn-success" href="editar.php?id_post='.$listagem['id_post'].'&id_ct='.$id_ct.'">
                        Editar</a>
                      <a class="btn btn-danger" href="excluir.php?id_post='.$listagem['id_post'].'&id_ct='.$id_ct.'">Excluir</a>
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
    <div class="alert alert-danger alert-dismissible fade show animated bounceInDown">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Acesso restrito a usuários cadastrados!</strong> Logue-se ou cadastre-se!
    </div>';
    header("Location: ../index.php");
}
require_once('inc/rodape.php');
