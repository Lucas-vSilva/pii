<?php
    include_once("conexao.php");
    include_once("recebe_upload.php");

    $conn = new Conexao;
    $conn->conectar();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anúncios</title>
</head>
<body>
<h1> <?php function consultarAnuncio(Conexao $conexao){
            try{
                $conn = $conexao->conectar();
                $sql  = "select * from anuncios";
                $result = mysqli_query($conn, $sql);
                

                while ($registro = mysqli_fetch_assoc($result))
                {
                    $id = $registro['id'];
                    $caminho = $registro['caminho'];
                    $titulo = $registro['titulo'];
                    $cnpj = $registro['cnpj'];
                    $valor = $registro['valor'];    
                    $cidade = $registro['cidade'];
                    $uf = $registro['uf'];
                    $cep = $registro['cep'];
                    $telefone = $registro['telefone'];
                    $retirada = $registro['retirada'];

                    ?><p><div class="id"><?php echo "id ".$id." \n"; ?></div><?php 
                    ?><div class="caminho"><?php echo $caminho." \n"; ?></div><?php 
                    ?><div class="titulo"><?php echo $titulo." \n"; ?></div><?php 
                    ?><div class="cnpj"><?php echo $cnpj." \n"; ?></div><?php 
                    ?><div class="valor"><?php echo "R$ ".$valor." \n"; ?></div><?php 
                    ?><div class="cidade"><?php echo $cidade." \n"; ?></div><?php 
                    ?><div class="uf"><?php echo $uf." \n"; ?></div><?php 
                    ?><div class="cep"><?php echo $cep." \n"; ?></div><?php 
                    ?><div class="telefone"><?php echo $telefone." \n"; ?></div><?php 
                    ?><div class="retirada"><?php echo $retirada." \n"; ?></div></p><?php 
                    //echo $titulo;
                    //echo $valor;
                }
                mysqli_close($conn);
            }//fim do try
            catch(Exception $erro){
                return $erro;
            }//fim do catch
        }//fim da função() 
        echo consultarAnuncio($conn);
        ?></h1>
        
</body>
</html>