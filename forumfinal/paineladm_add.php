<?php
require_once('inc/cabecalho.php');

if (isset($_SESSION['id_user']) && $_SESSION['adm'] == 1) {

?>
    <!-- Page Content -->
    <div class="container">
        <br>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item "><a href="paineladm_listagem.php">Painel do Administador</a></li>
          <li class="breadcrumb-item active">Nova Categoria</li>
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
 
          <h1 class="my-4">Nova Categoria
          </h1>
          
    			<form id="form" method="POST" action="paineladm_adiciona.php" >
               	
    			  	<div class="form-group">
    			    	<label for="titulo">Categoria</label>
    			    	<input type="text" class="form-control" id="cat" name="cat" placeholder="Digite o nome da categoria..." autofocus="cat" required="cat">
    			  	</div>

    			  	<button type="submit" class="btn btn-primary btn-block" >Adicionar</button>
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
              	<?php
                if (isset($_SESSION['id_user'])) {
                
                $html = '
 
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
            		echo "Não disponível ao usuário";
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

<?php
}
else{
    $_SESSION['msg'] = 
    '<br>
    <div class="alert alert-danger alert-dismissible fade show animated bounceInDown">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Acesso restrito a usuários cadastrados!</strong> Logue-se ou cadastre-se!
    </div>';
    header("Location: index.php");
}
require_once('inc/rodape.php');
