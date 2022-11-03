<?php
	require_once 'system/config.php';
	require_once 'system/database.php';

	if (!isset($_GET['id']) || empty($_GET['id']))
		header('Location: index.php');
	else {

		$id 	= DBEscape (strip_tags(trim($_GET['id'])));
		$post 	= DBRead('posts', "WHERE id = '{$id}' LIMIT 1");

		if ($post) {
			$post = $post[0];
			$upVisitas = array(
				'visitas' => $post['visitas'] + 1
			);
			DBUpdate('posts', $upVisitas, "id = '{$id}'");
		}

	}
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

	<link rel="stylesheet" type="text/css" href="css/estilo.css">
		
<!--===============================================================================================-->
</head>
<body >
	<div class="container-fluid">
<nav id="menu" class="menu">
 
    <ul>
	<li><img class= "linha logo" src="anexos/logotcc.png"/> </li>
        <li><a class="linha botao1" href="../pag/inicio.php">Inicio</a></li>
        <li><a class="linha botao1" href="../pag/sobre.php">Sobre</a></li>
		<li class="dropdown1">
  <a class="linha botao1" href="../pag/informacoes.php">Informações</a>
  <div class="dropdown1-content">
  
 <a href="../pag/informacoes.php#historia"><p class="dropdownsep">História da doação de sangue</p></a>
 
  

  <a href="../pag/informacoes.php#situacao"> <p  class="dropdownsep">Situação atual da doação no país</p></a>
  

  <a href="../pag/informacoes.php#imptemp"><p  class="dropdownsep">Impedimentos temporários</p></a>

  
 
  <a href="../pag/informacoes.php#impdef"><p  class="dropdownsep">Impedimentos definitivos</p></a>
 
  
 
  <a href="../pag/informacoes.php#requisitos"><p  class="dropdownsep">Quais são os requisitos para doação de sangue?</p></a>
     <a href="../pag/informacoes.php#tipos"><p  class="dropdownsep">Tipos de sangue</p></a>
  </div>
</li>
		
        <li class="dropdown1">
  <a class="linha botao1" href="index.php">Postagem</a>
  <div class="dropdown1-content">
  
 <a href="painel/add-post.php"><p class="dropdownsep">Postar</p></a>

  <a href="../Entrar/Sair.php"><p  class="dropdownsep">Sair</p></a>
  </div>
</li>

<li><img class="imgperfil"src="anexos/exemplo6.jpg" style="width: 50px;
    height: 50px;
    border-radius: 50px;
	"/> </li>

    </ul>
</nav>
</div>

<div class="post">
	<h2>
	<a>
		<?php echo (!$post) ? 'Erro 404!' : $post['titulo']; ?> 
	</a>
	</h2>

	<?php if ($post): ?>

	<p>
			<i class="fas fa-user"></i> <b><?php echo $post['autor']; ?></b> -
		<i class="far fa-clock"><b><?php echo date('d/m/Y', strtotime($post['data'])) ?></b> |
		Visitas <b><?php echo $post['visitas']; ?></b>
	</p>

	
	<p>
		<?php echo $post['conteudo']; ?>
	</p>
	    <p class="button"><a href="index.php" class="btn btn-info btn-sm">Voltar</a></p>
</div>
	<?php endif; ?>

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
	<script src="js/main.js"></script>



</body>
</html>