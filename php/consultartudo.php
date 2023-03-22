<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    
    <title>BM</title>
</head>

<style>
* {
  box-sizing: border-box;
}
 
body {
  font-family: Arial;                                                                                                      
  padding: 10px;
  background: #f1f1f1;
}

/* Header/Blog Title */
.header {
  padding: 30px;
                      
  text-align: center;   
  background: #043454;
}

.header h1 {
  font-size: 20px;
  color: white; 
  
}

.logo{
    width: 20px;
    height: 20px;
}

.card-img-top{
   height: 100px ;
   width: 100px;
}

.card-group{
  height: 800px;
  width: 400px;
  margin-left: 450px;

}

/* Style the top navigation bar */
.topnav{
  overflow: hidden;
  background-color: #blue;
  width: 850px;
  margin-left:1px;                               
  border: 2px solid gray;
  border-radius: 5px;
  
}

/* Style the topnav links */
.topnav a {
  float: left;       
  display: block;                       
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

/* Change color on hover */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}

/* Create two unequal columns that floats next to each other */
/* Left column */
.leftcolumn {   
  float: left;
  width: 75%;
}

/* Right column */
.rightcolumn {
  float: left;
  width: 25%;
  background-color: #f1f1f1;
  padding-left: 20px;
}

/* Fake image */
.fakeimg {
  background-color: #aaa;
  width: 100%;
  padding: 20px;
}

/* Add a card effect for articles */
.card {
  background-color: white;
  padding: 20px;
  margin-top: 20px;
}


/* Footer */
.footer {
  padding: 20px;
  text-align: center;
  background: #ddd;
  margin-top: 20px;
}


* {
  box-sizing: border-box;
}

/* Style the search field */
form.example input[type=text] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  width: 80%;
  background: #f1f1f1;
}

/* Style the submit button */
form.example button {                                                                                                                    
  float: left;
  width: 20%;
  padding: 10px;
  background: #2196F3;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none; /* Prevent double borders */
  cursor: pointer;
}

form.example button:hover {
  background: #0b7dda;
}

/* Clear floats */
form.example::after {
  content: "";
  clear: both;
  display: table;                          
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 800px) {
  .leftcolumn, .rightcolumn {   
    width: 100%;
    padding: 0;
  }
}

/* Responsive layout - when the screen is less than 400px wide, make the navigation links stack on top of each other instead of next to each other */
@media screen and (max-width: 400px) {
  .topnav a {
    float: none;
    width: 100%;
  }
}
</style>
</head>
<body>
                           
<div class="header">

<div class="logo">
            <img style="height: 200px; width: 200px; margin-top: -60px;"src="../img/logo.png" alt=""img>
        </div>
        
  <h1> A empresa que te move </h1>                            
                                                                                               
                                                                                                                                              
</div>

<div class="topnav">
 <form class="example" action="action_page.php">
  <input type="text" placeholder="Search.." name="search">            
  <button type="submit"><i class="fa fa-search"></i></button>
 </form>
</div> 


<div class="card-group">
  <div class="card">
    <img class="card-img-top" src="../img/caminhao.png" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">jeferson caminhoes</h5>      
      <p class="card-text">CNPJ:<br>Valor:<br>Cidade:<br>Uf:<br>Cep:<br>Telefone:<br>Retirada:      
    </div>                                                                                                    
  </div>

</div>

        
</body>
</html>   