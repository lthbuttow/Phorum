<?php
require_once('inc/cabecalho.php');
if (isset($_GET['idcat'])) {
  $_SESSION['idct'] = $_GET['idcat'];
  $id_cat = $_SESSION['idct'];
}
else{
  $id_cat = $_SESSION['idct'];
}

// Páginação e Query
$qt_por_pag = 6;
$total = 0;
$sql = "SELECT COUNT(*) as contagem FROM posts WHERE id_cat=$id_cat";
$res = mysqli_query($conexao, $sql);
$res_contagem = mysqli_fetch_array($res,MYSQLI_ASSOC);
$total = $res_contagem['contagem'];
$paginas = $total / $qt_por_pag;

	$pg = 1;
	if (isset($_GET['p']) && !empty($_GET['p'])) {
	  $pg = $_GET['p'];
	}
	$p = ($pg-1) * $qt_por_pag;

	$sql = 'SELECT titulo,conteudo,user,data,categoria FROM posts,usuarios,categorias WHERE posts.id_user=usuarios.id_user AND posts.id_cat=categorias.id_cat AND posts.id_cat='.$id_cat.' ORDER BY id_post DESC LIMIT '. $p.','.$qt_por_pag.'';
	$result = mysqli_query($conexao, $sql);
	$result_array1 = mysqli_fetch_array($result,MYSQLI_ASSOC);
	$result_array = mysqli_fetch_all($result,MYSQLI_ASSOC);

?>

    <!-- Caminho de pão -->
    <div class="container">
        <br>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
          <li class="breadcrumb-item active">posts</li>
        </ol>  
      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
 
          <h1 class="my-4">Categoria - 
            <small><?php echo $result_array1['categoria']; ?></small>
          </h1>
          <?php
          if (!isset($_GET['p'])) {
              $_GET['p'] = 1;
            }  
            ?>
          <h5><small><strong>Página atual : <?php echo $_GET['p']; ?></strong></small></h5>
          <?php
          foreach($result as $posts){
          $html = '
            <div class="media text-muted pt-3">
              <img src="https://icon-icons.com/icons2/1524/PNG/32/person_106357.png" alt="Imagem de Perfil" class="mr-2 rounded">
              <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                <small>'.$posts['data'].'</small>
                <strong class="d-block text-gray-dark">'.$posts['user'].'</strong>
                <em class="d-block text-gray-dark">'.$posts['titulo'].'</em>
                '.$posts['conteudo'].'
              </p>
            </div>';
          echo $html;
          }
          echo '<ul class="pagination justify-content-center mb-4>';
          for($q=0; $q<$paginas; $q++){
          $paginacao = '  
               <li class="page-item"><a class="page-link" href="posts.php?p='.($q+1).'">'.($q+1).'</a></li>';
          echo $paginacao;
          }
          echo '</ul>';
          ?>

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
              	<?php
                if (isset($_SESSION['id_user'])) {
                
                $html = '
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="postar.php?id_categoria='.$id_cat.'">Postar</a>
                    </li>
                  </ul>
                </div>
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="painelposts_categorias.php">Painel do Usuário</a>
                    </li>
                  </ul>
                </div>';
                echo $html;
            	}
                else{
            		echo "Disponível somente para usuários cadastrados!";
            	}
                ?>
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
require_once('inc/rodape.php');
