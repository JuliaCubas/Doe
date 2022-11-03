<?php
session_start();
    include_once("conexao.php");
    if((isset($_POST['email'])) && (isset($_POST['senha']))){
        $usuario = mysqli_real_escape_string($con, $_POST['email']);
        $senha = mysqli_real_escape_string($con, $_POST['senha']);
        $senha = ($_POST['senha']);
        $result_usuario = "SELECT * FROM usuarios WHERE email = '$usuario' && senha = '$senha' LIMIT 1";
        $resultado_usuario = mysqli_query($con, $result_usuario);
        $resultado = mysqli_fetch_assoc($resultado_usuario);
        if(isset($resultado)){

	    $_SESSION['usuarioId'] = $resultado['id'];
            $_SESSION['usuarioNome'] = $resultado['nome'];
            $_SESSION['usuarioEmail'] = $resultado['email'];
			            $_SESSION['usuarioSangue'] = $resultado['tiposang'];
            $_SESSION['usuarioCpf'] = $resultado['cpf'];
	    $_SESSION['usuarioSenha'] = $resultado['senha'];

            header("Location: ../pag/inicio.php");
        }else{
            $_SESSION['loginErro'] = "<script language='javascript' type='text/javascript'>alert('Usuário ou senha Inválidos')</script>";
            header("location: login.php");
        }
    }else{
        $_SESSION['loginErro'] = "<script language='javascript' type='text/javascript'>alert('Usuário ou senha Inválidos')</script>";
        header("location: login.php");
    }
