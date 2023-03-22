<?php
    include('php/Conexao.php');
    include('php/Consultar.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>BM</title>
</head>
<body>
    <nav>

    <div class="logo">
            <img style="height: 200px; width: 200px; margin-top: -60px;"src="img/logo.png" alt=""img>
        </div>

        <div class="menu-btn">
            <i class="fa fa-bars fa-2x" onclick="menuShow()"></i>
        </div>

        <ul style="padding-bottom: 20px;">
            <li> <img style="height: 20px;width: 30px;"href="#"src="img/iconeca.png" alt=""><a href="php/inserirAnuncios.php" class="active"> Anuncie </a> </li>
            <li> <img style="height: 20px;width: 20px;"href="#"src="img/customers-icon-3.png" alt=""><a href="php/inserirCliente.php" class="login1"> Cadastre-se para Clientes</a> </li>
            <li> <img style="height: 20px;width: 30px;"href="#"src="img/iconempresa.png" alt=""><a href="php/inserirEmpresa.php" class="login1"> Cadastre-se para Empresas</a> </li>
        </ul>
        
    </nav>
        
    <script src="js/main.js"></script>

    <script>
        function openTab(evt, tabName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length;  i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.className += " active";}
    </script>

</div>

    <style>
        .tab {
        overflow: hidden;
        border: 1px solid #ccc;
        background-color: #f1f1f1;
        display: flex;
        }
        html{
            color: #ccc;
        }
        .tab button {
        background-color: inherit;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        flex-grow: 1;
        font-size: 18px;
        transition: background-color 0.3s;
        }

        .tab button:hover {
        background-color:#3a8dc488;
        }

        .tab button.active {
        background-color:  #04273f;
        }

        .tabcontent {
        display: none;
        padding: 6px 12px;
        border: 1px solid #043454;
        border-top: none;
        }


    </style>
    <div class="container1">      
        <h1>Cliente</h1>
        <form method="POST">
            <label>CPF: </label>
            <input type="text" name="tCpf" id="tCpf">
            <p><label>Senha: </label>
            <input type="text" name="tSenha1"></p>
    </div> 
    <div class="container2">
        <h1>Empresa</h1>
        <label>CNPJ: </label>
        <input type="text" name="tCnpj" id="tCnpj">
        <p><label>Senha: </label>
        <input type="text" name="tSenha2"></p>
    </div>
    <input class="botaoEntrar" name = "submit" value="Entrar" type="submit">
    <?php
        if(isset($_POST['submit'])){

            if($_POST['tCpf'] != "" && $_POST['tSenha1'] != ""){
                $conn = new Conexao;
                $conn->conectar();

                $inser = new Consultar;
            
                setcookie('user', $_POST['tCpf'], $_POST['tSenha1']);
                $inser->logarCliente($conn, $_POST['tCpf'], $_POST['tSenha1']);
            }elseif($_POST['tCnpj'] != "" && $_POST['tSenha2'] != ""){
                    $conn = new Conexao;
                    $conn->conectar();
                    $inser = new Consultar;
            
                    setcookie('user1', $_POST['tCnpj'], $_POST['tSenha2']);
                    $inser->logarEmpresa($conn, $_POST['tCnpj'], $_POST['tSenha2']);
                }else{
                    return "algo está errado!";
                }//fim do else
        }//fim do isset
//                            <div id="tab1" class="tabcontent" style="display: block;">
//                <h3 style="margin-bottom: 10px; margin-left: 620.6px;">Efetue o Login Cliente</h3>
//                <form method="POST">
//                    <label style="margin-bottom: 10px; margin-left: 620.6px;"> CPF: </label>
//                    <input style="margin-bottom: 10px; margin-left: 7.6px;" type="text" name="tCpf"><br>
//                    <label style="margin-bottom: 10px; margin-left: 620.6px;"> Senha: </label>
//                    <input style="margin-bottom: 10px; margin-left: 7.6px;" type="text" name="tSenha1"><br>
//                    
//                    <div id="tab2" class="tabcontent">
//                        <h3 style="margin-bottom: 10px; margin-left: 620.6px;">Efetue o Login Empresa</h3>
//                        <label style="margin-bottom: 10px; margin-left: 620.6px;"> CNPJ: </label>
//                        <input style="margin-bottom: 10px; margin-left: 7.6px;" type="text" name="tCnpj"><br>
//                        <label style="margin-bottom: 10px; margin-left: 620.6px;"> Senha: </label>
//                        <input style="margin-bottom: 10px; margin-left: 7.6px;" type="text" name="tSenha2"><br>
//                    </div>
                        ?>
                    </form>
            </div>        
            
                    
        </div>
    </body>
</html>  
      


    

	

