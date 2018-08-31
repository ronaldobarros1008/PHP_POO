<?php
    //require_once 'classes/Usuarios.php';
    function __autoload($class) {
        require_once 'classes/' . $class . '.php';
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>phpOO - Orientado a Objeto</title>

        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        
        <script>
            var ch = '<?php echo sha1(time()); ?>';
        </script>
    </head>
    <body>

        <div class="container">

            <header>
                <img src="imagens/logo.png"/>
                <div class="well">
                    <h1 class="text-center">PhpOO Crud - Orientado a Objeto -> <span class="text-primary">Ronaldo Barros</span></h1>
                </div>
            </header>

            <!-- Form cadastrar -->
            <div style="margin: 100px 0; text-align: center">
                
                <?php
                    $usuario = new Usuarios();
                    
                    // Cadastro de Usuario
                    if ( isset($_POST['cadastrar']) ):
                        
                        $nome  = $_POST['nome'];
                        $email = $_POST['email'];
                        
                        $usuario->setNome($nome);
                        $usuario->setEmail($email);
                        
                        if ($usuario->insert()) {
                        
                        echo '<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>OK!</strong> Incluido com sucesso!!! </div>';
                        
                    } else {
                        echo '<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>OK!</strong> Erro ao alterar!!! </div>';
                    }
                    endif;
                    
                    
                    //exclusao de Usuario
                    if (isset($_POST['excluir_ui'])){
                        
                        $id = $_POST['id_ui'];
                        
                        $usuario->delete($id);
                        
                    }
                    
                    // Alterar Usuario
                    if ( isset($_POST['alterar']) ) {
                        $id    = $_POST['id_uii'];
                        $nome  = $_POST['nome'];
                        $email = $_POST['email'];
                        
                        $usuario->setNome($nome);
                        $usuario->setEmail($email);
                        
                        $usuario->update($id);
                        
                    }
                ?>
                

                <legend>Formulário Cadastrar</legend>
                <form class="form-inline" method="post">
                    <div class="input-group">
                        <span class="input-group-addon glyphicon glyphicon-user"></span>
                        <input name="nome" type="text" class="form-control" required >
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">@</span>
                        <input name="email" type="email" class="form-control">
                    </div>

                    <input name="cadastrar" type="submit" class="btn btn-success" value="Cadastrar">
                </form>
            </div>
            <!-- Fim form cadastrar -->


            <!-- Inicio da tabela -->
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr class="active">
                        <th>Nome</th>
                        <th>E-mail</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuario->findAll() as $key => $value) { ?>
          
                    <tr>
                        <td> <?php echo $value->nome;?> </td>

                        <td> <?php echo $value->email;?> </td>

                        <td>

                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" onclick="load_modal('<?php echo $value->nome;?>', '<?php echo $value->email;?>', <?php echo $value->id;?>);">
                                Alterar</button>
                            
                            <form class="form_excluir" method="post" style="float: left; margin: 0 15px;">
                                <input name="id_ui" type="hidden" value="<?php echo $value->id;?>"/>
                                <button name="excluir_ui" type="submit" onclick="fn_excluir();" class="btn btn-danger">Excluir</button>
                            </form>
                        </td>

                    </tr>
                    
                    <?php } ?>
                </tbody>
            </table>
            <!-- Fim da tabela -->

  

            <!-- Modal para alterar Usuário -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Alterando Usuário</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-inline" method="post">
                                <div class="input-group">
                                    <span class="input-group-addon glyphicon glyphicon-user"></span>
                                    <input id="text_nome" name="nome" type="text" class="form-control" required value="" >
                                </div>

                                <div class="input-group">
                                    <span class="input-group-addon">@</span>
                                    <input id="text_email" name="email" type="email" class="form-control">
                                </div>
                                <input id="id_uii" name="id_uii" type="hidden" value=""/>
                                <input name="alterar" type="submit" class="btn btn-warning" value="Alterar">
                            </form>
                        </div>
                    </div>
                </div>
            </div> <!-- fim Modal -->




        </div> <!-- fim cantainer -->





        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery-3.2.1.min.js"></script>

        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>

        <script src="js/script.js"></script>

    </body>
</html>