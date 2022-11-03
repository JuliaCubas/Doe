<?php
	require '../system/config.php';
	require '../system/database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Doe+</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->

	<link rel="stylesheet" type="text/css" href="../css/estilopost.css">	
<!--===============================================================================================-->
</head>
<body >

<div class="container-fluid">
<nav id="menu" class="menu">
 
    <ul>
	<li><img class= "linha logo" src="../anexos/logotcc.png"/> </li>
        <li><a class="linha botao1" href="../../pag/inicio.php">Inicio</a></li>
        <li><a class="linha botao1" href="../../pag/sobre.php">Sobre</a></li>
		<li class="dropdown1">
  <a class="linha botao1" href="../../pag/informacoes.php">Informações</a>
  <div class="dropdown1-content">
  
 <a href="../../pag/informacoes.php#historia"><p class="dropdownsep">História da doação de sangue</p></a>
 
  

  <a href="../../pag/informacoes.php#situacao"> <p  class="dropdownsep">Situação atual da doação no país</p></a>
  

  <a href="../../pag/informacoes.php#imptemp"><p  class="dropdownsep">Impedimentos temporários</p></a>

  
 
  <a href="../../pag/informacoes.php#impdef"><p  class="dropdownsep">Impedimentos definitivos</p></a>
 
  
 
  <a href="../../pag/informacoes.php#requisitos"><p  class="dropdownsep">Quais são os requisitos para doação de sangue?</p></a>
  </div>
</li>
		
        <li class="dropdown1">
  <a class="linha botao1" href="../index.php">Postagem</a>
  <div class="dropdown1-content">
  
 <a href=""><p class="dropdownsep">Postar</p></a>

  <a href="../../Entrar/Sair.php"><p  class="dropdownsep">Sair</p></a>
  </div>
</li>

<li><img class="imgperfil"src="../anexos/exemplo6.jpg" style="width: 50px; height: 50px; border-radius: 50px;"/> </li>

    </ul>
</nav>
</div>
	

	
	<?php
		
		if(isset($_POST['publicar'])){
		$form ['titulo'] 	= DBEscape(strip_tags( trim($_POST['titulo'])));
		$form ['autor'] 	= DBEscape(strip_tags( trim($_POST['autor'])));
		$form ['data']		= date('Y-m-d H:i:s');
		$form ['conteudo'] 	= str_replace('\r\n', "\n", DBEscape(trim($_POST['conteudo'])));
		$form = DBEscape ($form);

		if (empty($form['titulo']))
			echo "Preencha o campo Título.";
		else if (empty($form['autor']))
			echo "Preencha o campo Autor.";

		else if (empty($form['conteudo']))
			echo "Preencha o campo conteúdo.";
		else{

			$dbCheck = DBRead( 'posts', "WHERE titulo = '". $form['titulo'] ."'");
			if ($dbCheck)
				echo "Desculpe mas já existe uma postagem com este título.";
			else {

				if (DBCreate('posts', $form))
					echo "Sua postagem foi enviada com sucesso!";
				else
					echo "Desculpe, ocorreu um erro...";
			}
		}

	echo '<hr>';
	}
	?>
	<br></br>
	<br></br>
	<br></br>
	<br></br>
	<br></br>
	<br></br>
	<br></br>
	<br></br>
	<br></br>
	<br></br>
	<br></br>
	<br></br>
	

	<form class="contatoposi" action="" method="post">
<div class="contato" id="contato">
<h1>Adicionar postagem</h1>
		<p class="txtb">
			<label>Titulo</label><br>
			<input type="text" name="titulo">
		</p>

		<p class="txtb">
			<label>Autor</label><br>
			<input type="text" name="autor">
		</p>

		<p class="txtb">
			<label>Conteúdo</label><br>
			<textarea name="conteudo" cols="50" rows="15"></textarea>
		</p>

		<input  type="submit" class="btn" name="publicar" value="Publicar">
		</div>
	</form>

	<br></br>
	<br></br>
	<br></br>
	<br></br>
<div class="fim"></div>
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->


</body>
</html>