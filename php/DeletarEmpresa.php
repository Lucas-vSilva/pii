<?php
    include('conexao.php');
    include('ValidacaoCnpj.php');


    class DeletarEmpresa{
        public function DeletarEmpresa(
          Conexao $conec,
          string $cnpjDigitacao){
            try {
              $cnpj = new ValidacaoCnpj();
              $valorCnpj = $cnpj->validarCnpj($cnpjDigitacao);

              if($valorCnpj){
                  $conn = $conec->conectar();
                  $sql =  "delete from empresa where cnpj = '$cnpj'";
                  $result = mysqli_query($conn, $sql);

                  if($result){
                      echo "<br>Anúncio cadastrado com sucesso!<br>";
                      return;
                  }else{
                      return "Ops... Algo deu errado, tente novamente!";
                  }//fim do else
              }//fim do if
              else{
                  echo "CNPJ Inválido!";
              }//fim do else
          } catch (Exception $erro) {
              return $erro;
          }//fim do catch

      }//fim da função

      public function executeCnpj(){
          $conexao = new Conexao();

          if(isset($_POST['submit'])){
              echo $this->anuncios($conexao,
              $_POST['tTitulo'],  
              $_POST['tCnpj'], 
              $_POST['tValor'],
              $_POST['tCidade'],
              $_POST['tUf'], 
              $_POST['tCep'],  
              $_POST['tTelefone'], 
              $_POST['tRetirada']);
              return;  
         }//fim do isset 
      }//fim da função
    }

?>