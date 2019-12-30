<html>
    <head>
        <title>SGA - index</title>
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    </head>
    <body>
        <?php require_once 'processa.php'; ?>
        
        <?php 
        //Alerta de menssagem
        if (isset($_SESSION['message'])): ?>
        <div class="alert alert-<?=$_SESSION['msg_type']?>">
            <?php 
             echo $_SESSION['message'];
             unset($_SESSION['message']); 
            ?>
        </div>
        <?php endif ?>
        <div class="container">
        <?php 
        $mysqli = new mysqli('localhost', 'root', '', 'bd-sga') or die (mysqli_error($mysqli));
        $result = $mysqli->query("SELECT * FROM utilizadores") or die ($mysqli->error);
        //pre_r($result);
        //pre_r($result ->fetch_assoc());
        ?>
        <div class="row justify-content-center">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Utilizador</th>
                        <th>Email</th>
                        <th>Data Criação</th>
                        <th>Situação</th>
                        <th>Nivel de Acesso</th>
                        <th>Data Modificação</th>
                        <th colspan="2">Ações</th>
                    </tr>
                </thead>
                <?php 
                        while ($row = $result->fetch_assoc()):?>
                <tr>
                    <td><?php echo $row['utilizador']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['dt_criacao']; ?></td>
                    <td><?php echo $row['situacoe_id']; ?></td>
                    <td><?php echo $row['niveis_acesso_id']; ?></td>
                    <td><?php echo $row['dt_modificacao']; ?></td>
                    <td>
                        <a href="index.php?edit=<?php echo $row['id']; ?>"
                           class="btn btn-info">Editar</a>
                        <a href="processa.php?delete=<?php echo $row['id']; ?>"
                           class="btn btn-danger">Eliminar</a>
                    </td>
                        
                    
                </tr>
                <?php endwhile; ?>
            </table>
        </div>
        
                <?php
                function pre_r($array){

                    echo '<pre>';
                    print_r($array);
                    echo '<pre>';
                }
                ?>

        <div class="row justify-content-center">
            <form action="processa.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="form-group">
            <label>utilizador:</label>
            <input type="text" name="utilizador" class="form-control" value="<?php echo $utilizador; ?>" placeholder="Utilizador">
                </div>
                <div class="form-group">
            <label>email:</label>
            <input type="email" name="email" class="form-control" value="<?php echo $email; ?>"placeholder="email">
                </div>
                <div class="form-group">
            <label>Senha:</label>
            <input type="password" name="senha" class="form-control" value="<?php echo $senha; ?>" placeholder="Senha">
                </div>                
                <div class="form-group">
            <label>Situação:</label>
            <input type="text" name="situacoe_id" class="form-control" value="<?php echo $situacoe_id; ?>" placeholder="situação">
                </div>
                 <div class="form-group">
            <label>Niveil de Acesso:</label>
            <input type="text" name="niveis_acesso_id" class="form-control" value="<?php echo $niveis_acesso_id; ?>" placeholder="Nivel de Acesso">
                </div>
                 <div class="form-group">
            <label>Data Criação:</label>
            <input type="timestamp" name="dt_criacao" class="form-control" value="<?php echo $dt_criacao; ?>" placeholder="Data de Criação">
                </div>               
                  <div class="form-group">
            <label>Data Modificação:</label>
            <input type="timestamp" name="dt_modificacao" class="form-control" value="<?php echo $dt_modificacao; ?>" placeholder="Data de Modificação">
                </div>              
                <div class="form-group">
                    
                   <?php 
                   //alterar o botão para atualizar
                   if ($update == true):
                   
                   ?>
                <button type="submit" calss="btn btn-info" name="update">Atualizar</button>
                <?php else: ?>
                <button type="submit" calss="btn btn-info" name="Guardar">Guardar</button>
                <button type="reset" calss="btn btn-primary" name="Limpar">Limpar</button>
                <?php endif;?>

                </div>
        </div>
            </form>
        </div>
    </body>
</html>
