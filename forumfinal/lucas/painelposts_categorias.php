<?php
require_once('inc/cabecalho.php');

if (isset($_SESSION['id_user'])) {

  if(!isset($_SESSION['idct'])){
    $idct ='1';
  }else{
      $idct =$_SESSION['idct'];
  }


$sql = 'SELECT DISTINCT user,categorias.id_cat,categoria FROM posts,usuarios,categorias WHERE posts.id_user=usuarios.id_user AND posts.id_cat=categorias.id_cat AND usuarios.id_user='.$_SESSION['id_user'];

$result = mysqli_query($conexao, $sql);
$result_array = mysqli_fetch_all($result,MYSQLI_ASSOC);
$count = mysqli_num_rows($result);


?>

    <!-- Page Content -->
    <div class="container">
          <br>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
            <li class="breadcrumb-item "><?php echo '<a href="posts.php?id_cat='.$idct.'">Posts</a>';?></li>
            <li class="breadcrumb-item active">Painel Usuário - Categorias</li>
          </ol>

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
 
          <h1 class="my-4">Painel do Usuário  
            <small>Categorias</small>
          </h1>
          <?php
          if ($count == 0) {
            $html1=     
            '<br>
            <div class="alert alert-warning alert-dismissible fade show animated bounceInDown">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>Você não possui posts em nenhuma categoria!</strong>
           </div>';
           echo $html1;
          }
          foreach($result as $categorias){
            $html = '
              <a type="button" class="btn btn-primary btn-block" href="painelposts_listagem.php?id_ct='.$categorias['id_cat'].'">'.$categorias['categoria'].'</a>
            ';
            echo $html;
          }
          ?>
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
                      <p>Escolha uma das categorias</p>
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
