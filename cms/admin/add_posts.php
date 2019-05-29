<?php ob_start(); ?>
<?php include "../includes/db.php"; ?>
<?php include "includes/functions.php"; ?>
<?php include "includes/header.php"; ?>

    <div id="wrapper">
        <!-- Navigation -->
 <?php include "includes/navigation.php"; ?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Posts
                            <small>ver todos os posts</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Posts
                            </li>
                        </ol>

                          <div class="col-sm-12">

                            <?php
                                if(isset($_POST['adicionar'])){
                                    $post_nome = $_POST['post_nome'];
                                    $post_autor = $_POST['post_autor'];
                                    $post_imagem = $_FILES['post_imagem']['name'];
                                    
                                    //carrega a imagem
                                    $post_imagem_temp = $_FILES['post_imagem']['tmp_name'];
                                    //move para o diretorio de imagens
                                    move_uploaded_file($post_imagem_temp, '../images/' . $post_imagem);

                                    $post_conteudo = $_POST['post_conteudo'];

                                    $query = "INSERT INTO posts(post_nome, post_autor, post_data, post_conteudo, post_imagem) 
                                              VALUES('$post_nome', '$post_autor', now(), '$post_conteudo', '$post_imagem')";

                                    $add_post = mysqli_query($connection, $query);

                                    if(!$add_post){
                                        echo "Falha na inserção";
                                    }else{
                                        echo "Post adicionado com sucesso";
                                    }
                                }
                            ?>

                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Titulo do Post</label>
                                    <input type="text" class="form-control" name="post_nome" id="">
                                </div>

                                <div class="form-group">
                                    <label>Autor</label>
                                    <input type="text" class="form-control" name="post_autor" id="">
                                </div>
                                
                                <div class="form-group">
                                    <label>Imagem</label>
                                    <input type="file" class="form-control" name="post_imagem" id="">
                                </div>

                                <div class="form-group">
                                    <label>Conteudo</label>
                                    <textarea class="form-control" name="post_conteudo" cols="30" rows="10"></textarea>
                                </div>

                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" name="adicionar" value="Adicionar">
                                </div>
                            </form>


                          </div>

                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include "includes/footer.php"; ?>
