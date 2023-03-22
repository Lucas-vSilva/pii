<?php  
    include('conexao.php');
    include('ValidarCpf.php');

    class Cliente{
        public function cadastrarCliente(
            Conexao $conexao, 
            string $cpfDigitado,
            string $email,
            string $senha,
            string $nome,
            string $sobreNome,
            string $rua,
            string $bairro,
            string $numero,
            string $cepDigitado,
            string $telefone){

            try{
                $cpf = new ValidarCpf();
                $val = $cpf->validar($cpfDigitado);

                if($cepDigitado <8){
                    return "CEP Inválido";
                }

                    if($val){
                        $conn = $conexao->conectar();
                        $sql  = "insert into cliente(cpf, email, senha, nome, sobreNome, rua, bairro, numero, cep, telefone) values('$cpfDigitado', '$email', '$senha', '$nome', '$sobreNome', '$rua','$bairro','$numero','$cepDigitado','$telefone')";
                        $result = mysqli_query($conn, $sql);

                        if($result){
                            echo "<br>Cadastrado com Sucesso!";
                            return;
                        }else{
                            return "Ops, algo deu errado! Por favor tente novamente!";
                        }//fim do else
                }
                else{
                    return "CPF não é valido!";
                }
            }catch(Exception $erro){
                return $erro;
            }//fim do catch)
        }//fim da função

        public function executar(){
            $conexao = new Conexao();

            if(isset($_POST['submit'])){
                echo $this->cadastrarCliente($conexao, 
                $_POST['tCpf'], 
                $_POST['tEmail'], 
                $_POST['tSenha'],
                $_POST['tNome'], 
                $_POST['tSobreNome'], 
                $_POST['tRua'], 
                $_POST['tBairro'],
                $_POST['tNumero'],
                $_POST['tCep'],
                $_POST['tTelefone']);
                return;
                
           }//fim do isset 
        }//fim da funçaõ 
    }//fim da class

?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina inicial</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/inserircliente.css">
    
    <title>Cadastrar</title>
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


    <div id= "linha1"><h1>Informe os dados para fazer o cadastro</h1></div>
   
    <div id= "campocliente" class="inputs">  <form action="" method="POST">
        <label id="input1">CPF: </label>
        <i onclick="mascaraCpf()"><input type="text" name="tCpf" maxLength="14"></i><br><br>

        <script src="../js/mascaraCpf.js"></script>

        <label>Email: </label>
        <input type="email" name="tEmail"><br><br>

        
        <label>Senha: </label>
        <input type="text" name="tSenha"><br><br>

        <label>Nome: </label>
        <input type="text" name="tNome"><br><br>

        <label>Sobrenome: </label>
        <input type="text" name="tSobreNome"><br><br>

        <label>Rua: </label>
        <input type="text" name="tRua"><br><br>

        <label>Bairro: </label>
        <input type="text" name="tBairro"><br><br>

        <label>Número da Residência: </label>
        <input type="number" name="tNumero"><br><br>

        <label>CEP: </label>
        <input type="number" name="tCep"><br><br>

        <label>Telefone: </label>
        <input type="number" name="tTelefone" placeholder="(11)99212324"  maxlength="11"><br><br>

        <input id="butCadastro" type="submit" value="Cadastrar" name="submit">

    </form></div>
    <?php
        $exec = new Cliente();
        $exec->executar();    
    ?>
</body>
</html>