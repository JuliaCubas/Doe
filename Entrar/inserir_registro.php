<?php

    include_once("conexao.php");
	
	$nome = $_POST['usuario'];
    $email = $_POST['email'];
	$cpf = $_POST['cpf'];
    $tiposang = $_POST['tiposang'];
    $senha= ($_POST['senha']);
	$nivel = 0;

	$pegaEmail = mysqli_query($con, "SELECT * FROM usuarios WHERE email = '$email'");
	
	if( mysqli_num_rows($pegaEmail) == 1){
		echo "<script language='javascript' type='text/javascript'>alert('Este email ja esta cadastrado em nossos registros');window.location.href='cadastra.php'</script>";
	}
		else{



    $result_usuario = "INSERT INTO usuarios(nome, email, cpf, tiposang, senha, nivel) VALUES ('$nome','$email','$cpf','$tiposang','$senha', '$nivel')";
    $resultado_usuario = mysqli_query($con, $result_usuario);
	echo mysqli_affected_rows($con);
    if(mysqli_affected_rows($con) != 0){
               echo "<script language='javascript' type='text/javascript'>alert('Usuario cadastrado com sucesso!');window.location.href='login.php'</script>";;
            }else{
                echo "<script language='javascript' type='text/javascript'>alert('Nao foi possivel cadastrar este usuario');window.location.href='cadastrar.php'</script>";
            }
	}

?>
