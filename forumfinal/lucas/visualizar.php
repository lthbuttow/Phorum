<?php
require_once('inc/cabecalho.php');
$id_post = $_GET['id_post'];
$id_ct = $_GET['id_ct'];

if (isset($_SESSION['id_user'])) {

$sql='SELECT user,titulo,conteudo,data FROM usuarios,posts WHERE usuarios.id_user=posts.id_user AND id_post='.$id_post.' AND usuarios.id_user='.$_SESSION['id_user'];
$result = mysqli_query($conexao, $sql);
$result_array = mysqli_fetch_array($result,MYSQLI_ASSOC);
    if(mysqli_affected_rows($conexao) == 0){
       header("Location: painelposts_listagem.php?id_ct=$id_ct");
    }


?>

    <!-- Page Content -->
    <div class="container">
        <br>
         <br>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item "><a href="posts.php">Posts</a></li>
            <li class="breadcrumb-item "><a href="painelposts_categorias.php">Painel Usuário - Categorias</a></li>
            <li class="breadcrumb-item "><?php echo '<a href="painelposts_listagem.php?id_ct='.$id_ct.'">Painel Usuário - Listagem</a>';?></li>
            <li class="breadcrumb-item active ">Visualizar</li>

          </ol> 

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
 
          <h1 class="my-4">Painel do Usuário  
            <small>Visualização de Post</small>
          </h1>
          <?php
          foreach($result as $posts){
            $html = '
                <div class="media text-muted pt-3">
                  <img src="https://icon-icons.com/icons2/1524/PNG/32/person_106357.png" alt="" class="mr-2 rounded">
                  <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                    <small>'.$posts['data'].'</small>
                    <strong class="d-block text-gray-dark">'.$posts['user'].'</strong>
                    <em class="d-block text-gray-dark">'.$posts['titulo'].'</em>
                    '.$posts['conteudo'].'
                  </p>
                </div>';
              echo $html;
            }
               //  else{
                //  echo "Disponível somente para usuários cadastrados!";
                // }
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
