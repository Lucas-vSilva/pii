<?php

    include('conexao.php');
    include('ValidacaoCnpj.php');

    class Empresa{
        public function cadastrarEmpresa(
            Conexao $conexao,
            string $cnpjDigitado,
            string $email,
            string $senha,
            string $nome,
            string $rua,
            string $bairro,
            string $numero,
            string $cep,
            string $telefone){
                
                try{
                    $cnpj = new  ValidacaoCnpj();
                    $valor = $cnpj->validarCnpj($cnpjDigitado);

                        if($valor){
                            $conn = $conexao->conectar();
                            $sql  = "insert into empresa (cnpj, email, senha, nome, rua, bairro, numero, cep, telefone) values('$cnpjDigitado', '$email', '$senha', '$nome','$rua','$bairro','$numero','$cep','$telefone')";
                            $result = mysqli_query($conn, $sql);
            
                            if($result){
                                echo "<br>Cadastrado com Sucesso!";
                                return;
                            }else{
                                return "Ops, algo deu errado! Por favor tente novamente!";
                            }//fim do else
                        }//fim do if
                        else{
                            return "CNPJ Inválido!";
                        }//fim do else valor
                   
                }catch(Exception $erro){
                        return $erro;
                    }//fim do catch
    
            }//fim da função

            public function executarCnpj(){
                $conexao = new Conexao();

                if(isset($_POST['submit'])){
                    echo $this-> cadastrarEmpresa($conexao, 
                    $_POST['tCnpj'], 
                    $_POST['tEmail'],
                    $_POST['tSenha'], 
                    $_POST['tNome'],  
                    $_POST['tRua'], 
                    $_POST['tBairro'],
                    $_POST['tNumero'],
                    $_POST['tCep'],
                    $_POST['tTelefone']);
                    return;
                }//fim do isset
            }//fim da função
    }//fim da class
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/inserirempresa.css">
    
</head>
<body>
    <nav>
        <div class="logo">
                <img style="height: 200px; width: 200px; margin-top: -60px;"src="../img/logo.png" alt=""img>
            </div>

            <div class="menu-btn">
                <i class="fa fa-bars fa-2x" onclick="menuShow()"></i>
            </div>

            <ul style="padding-bottom: 20px;">
                <li> <img style="height: 20px;width: 30px;"href="#"src="../img/iconeca.png" alt=""><a href="inserirAnuncios.php" class="active"> Anuncie </a> </li>
                <li> <img style="height: 20px;width: 20px;"href="#"src="../img/customers-icon-3.png" alt=""><a href="../Login.php" class="login1"> Logout</a> </li>
                <li> <img style="height: 20px;width: 20px;"href="#"src="../img/customers-icon-3.png" alt=""><a href="inserirCliente.php" class="login1"> Cadastre-se para Clientes</a> </li>
                <li> <img style="height: 20px;width: 30px;"href="#"src="../img/iconempresa.png" alt=""><a href="inserirEmpresa.php" class="login1"> Cadastre-se para Empresas</a> </li>
            </ul>
        
    </nav>
    
    <h1 id="linha2">Informe os dados para fazer o cadastro</h1>
    
    <form id= "campocliente" action="" method="POST">
        
        <label>CNPJ: </label>
        <script src="../js/mascaraCnpj.js"></script>
        <i onclick="mascaraCnpj()"><input type="text" name="tCnpj" maxlength="18"></i><br><br>


        <label>Email: </label>
        <input type="email" name="tEmail"><br><br>

        
        <label>Senha: </label>
        <input type="text" name="tSenha"><br><br>

        <label>Nome da Empresa: </label>
        <input type="text" name="tNome"><br><br>

        <label>Rua: </label>
        <input type="text" name="tRua"><br><br>

        <label>Bairro: </label>
        <input type="text" name="tBairro"><br><br>

        <label>Número da Empresa: </label>
        <input type="number" name="tNumero"><br><br>

        <label>CEP: </label>
        <input type="number" name="tCep" maxLenght="8"><br><br>

        <label>Telefone: </label>
        <input type="number" name="tTelefone" placeholder="(11)99212324" maxLength="11 "><br><br>

        <input type="submit" value="Cadastrar" name="submit" id="butCadastro">

        <?php 
            $excute = new Empresa();
            $excute->executarCnpj();
           
        ?>
    </form></label>
</body>
</html>