<?php
	require_once 'system/config.php';
	require_once 'system/database.php';
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
  <a class="linha botao1" href="../pag/informacoes.php">Informa????es</a>
  <div class="dropdown1-content">
  
 <a href="../pag/informacoes.php#historia"><p class="dropdownsep">Hist??ria da doa????o de sangue</p></a>
 
  

  <a href="../pag/informacoes.php#situacao"> <p  class="dropdownsep">Situa????o atual da doa????o no pa??s</p></a>
  

  <a href="../pag/informacoes.php#imptemp"><p  class="dropdownsep">Impedimentos tempor??rios</p></a>

  
 
  <a href="../pag/informacoes.php#impdef"><p  class="dropdownsep">Impedimentos definitivos</p></a>
 
  
 
  <a href="../pag/informacoes.php#requisitos"><p  class="dropdownsep">Quais s??o os requisitos para doa????o de sangue?</p></a>
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

<li><img class="imgperfil" src="anexos/exemplo6.jpg" style="width: 50px;
    height: 50px;
    border-radius: 50px;
	"/> </li>

    </ul>
</nav>
</div>

	<?php
		$posts = DBRead('posts', "ORDER BY data DESC");

		if (!$posts)
			echo '<h2>Nenhuma postagem encontrada!</h2>';
		else
			foreach ($posts as $post): 
	?>
	<div class="post">
		<h2>
		<a>
			<?php echo $post['titulo']; ?>
		</a>
		</h2>


	<p>
		<i class="fas fa-user"></i> <b><?php echo $post['autor']; ?></b> - 
		<i class="far fa-clock"></i> <b><?php echo date('d/m/Y', strtotime($post['data'])) ?></b> |
		 Visitas <b><?php echo $post['visitas']; ?></b>
	</p>
	
		<?php
			$str = strip_tags($post['conteudo']);
			$len = strlen($str);
			$max = 500;

			if ($len <= $max)
				echo $str;
			else
				echo substr($str, 0, $max) . '...';
		?>
		
	 <p class="button"><a href="exibe.php?id=<?php echo $post['id']; ?>" title="<?php echo $post['titulo']; ?>" class="btn btn-info btn-sm">Ler Mais</a></p>
	
	</div>
<?php endforeach; ?>


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