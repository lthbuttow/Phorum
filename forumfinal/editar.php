<?php
require_once('inc/cabecalho.php');
if (isset($_SESSION['id_user'])) {

$id_user = $_GET['id_user'];
    
    $sql = 'SELECT * FROM usuarios WHERE id_user='.$id_user;
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
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item "><?php echo '<a href="paineluser.php?id_user='.$id_user.'">Painel Usuário - Listagem</a>';?></li>
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
            <input type="Hidden" class="form-control" name="id_user" value="<?php echo $id_user ?>">
          </div>
          	  	
			  	<div class="form-group">
			    	<label for="tiulo">Email</label>
			    	<input type="text" class="form-control" id="email" name="email" placeholder="Digite seu email" autofocus="email" required="email" value="<?php echo $dados['email'] ?>">
			  	</div>

          <div class="form-group">
            <label for="tiulo">User</label>
            <input type="text" class="form-control" id="user" name="user" placeholder="Digite seu user" autofocus="user" required="user" value="<?php echo $dados['user'] ?>">
          </div>

          <div class="form-group">
            <label for="tiulo">Senha</label>
            <input type="text" class="form-control" id="senha" name="senha" placeholder="Digite seu senha" autofocus="senha" required="senha" value="<?php echo $dados['senha'] ?>">
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
    <div class="alert alert-danger alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Acesso restrito a usuários cadastrados!</strong> Logue-se ou cadastre-se!
    </div>';
    header("Location: ../index.php");
}
require_once('inc/rodape.php');
