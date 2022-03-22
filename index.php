<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <style>
        .error {

            color: red;
        }
    </style>
</head>
<body>
    <form method="POST" action=" ">

        <h1>Formulário com PHP 8</h1> <br>

        Nome : <input required name="nome" type="text" ><span class="error">*</span><br><br>

        E-mail : <input required name="email" type="email" ><span class="error">*</span><br><br>

        Website : <input name="web" type="url" ><br><br>

        Comentário : <textarea type="text" name="comentario" cols="30" rows="3"></textarea><br><br>

        Gênero : <input type="radio" name="genero" value="masculino"> Masculino
                 <input type="radio" name="genero" value="feminino"> Feminino
                 <input type="radio" name="genero" value="outros"> Desejo não informar

                 <br><br>

        <button name="enviado" type="submit">Enviar</button>         
   
       <h1>Dados Enviados:</h1>

            <?php

            if(isset($_POST['enviado'])) {

                if (empty($_POST['nome']) || strlen($_POST['nome']) < 3 || strlen($_POST['nome'] > 100)) {
                    echo '<p class="error">Preencha o campo nome</p>';
                    die();

                }  

                if (empty($_POST['email']) || filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                    echo '<p class="error">Preencha o campo e-mail</p>';
                    die();

                } 

                if (empty($_POST['web']) || filter_var($_POST['web'], FILTER_VALIDATE_URL)) {
                    echo '<p class="error">Preencha o campo do site</p>';
                    die();
                }

                    $genero = "Não Selecionado";

                    if(isset($_POST['genero'])) {

                            $genero = $_POST['genero'];
                        }

                          if($genero != "masculino" && $genero != "feminino" && $genero != "outros" )   
                          echo '<p class="error">Preencha corretamente o gênero</p>';  
                    
                    echo "<p><b>Nome: </b>" . $_POST['nome'] . "</p>";
                    echo "<p><b>E-mail: </b>" . $_POST['email'] . "</p>";
                    echo "<p><b>Website: </b>" . $_POST['web'] . "</p>";
                    echo "<p><b>Comentários: </b>" . $_POST['comentario'] . "</p>";
                    echo "<p><b>Gênero: </b>" . $genero ."</p>";
                
            }

            ?>  
    </form>
    
</body>
</html>