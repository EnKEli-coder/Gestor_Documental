<?php
    if (filter_input_array(INPUT_POST)) {
        $_usuario = trim(filter_input(INPUT_POST, 'usuario'));
        $_pswd = trim(filter_input(INPUT_POST, 'pswd'));
        include_once '../model/usuarios.php';
        $loginok = usuarios::login($_usuario, $_pswd);
        //echo '<br> LoginOk = ';
        print_r($loginok);
        if ($loginok){
        header("location: ../index.php?menu=tabla");
        } else{
            echo "<script>
            alert('Usuario No Existe o Password Incorrecto');
            window.location= '../index.php?menu=login'
            </script>";
        }
        }

?>

