<?php
require_once('inc/cabecalho.php');
if (isset($_SESSION['id_user'])) {

$id_post = $_GET['id_post'];
$id_ct = $_GET['id_ct'];
$_SESSION['idct'] = $id_ct;
    
    $sql = 'SELECT * FROM posts WHERE id_post='.$id_post;
    $result = mysqli_query($conexao , $sql);
    if(mysqli_num_rows($result) > 0){
      $dados= mysqli_fetch_array($result);
    } else{
      echo "erro";
      // header("Location: index.php"); 
    }
 
?>
    <!-- Page Content -->
    <div class="container">
         <br>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
             <li class="breadcrumb-item ">< <a href="posts.php">Posts</a></li>
            <li class="breadcrumb-item "><a href="painelposts_categorias.php">Painel Usuário - Categorias</a></li>
            <li class="breadcrumb-item "><?php echo '<a href="painelposts_listagem.php?id_ct='.$id_ct.'">Painel Usuário - Listagem</a>';?></li>
            <li class="breadcrumb-item active ">Editar</li>

          </ol> 

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
 
          <h1 class="my-4">Painel do Usuário 
            <small>Editar</small>
          </h1>
          
			<form method="POST" action="edita.php">

          <div class="form-group">
            <input type="Hidden" class="form-control" name="id_post" value="<?php echo $id_post ?>">
          </div>

          <div class="form-group">
			   		<input type="Hidden" class="form-control" name="id_cat" value="<?php echo $id_ct ?>">
			  	</div>
          	  	
			  	<div class="form-group">
			    	<label for="tiulo">Título</label>
			    	<input type="text" class="form-control" id="titulo" name="titulo" placeholder="Digite o título do seu post..." autofocus="titulo" required="titulo" value="<?php echo $dados['titulo'] ?>">
			  	</div>
			  	<div class="form-group">
			  		<label for="descricao">Conteúdo</label>
        			<textarea class="form-control" name="descricao" rows="8" cols="101" id="descricao" placeholder="Digite seu Post" required="descricao"><?php echo $dados['conteudo']; ?></textarea>
        		</div>

			  	<button type="submit" value="Editar" class="btn btn-primary btn-block">Confirmar Edição</button>
			</form>
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

                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="painelposts_categorias.php">Painel do Usuário</a>
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
