<?php

    session_start();

    include 'classes/client.class.php';

    if(isset($_SESSION['name'])!="") {
        header("Location: dashboard.php");
    }
        
        $client = new client;
        // $hashed_password = password_hash($pwd, PASSWORD_DEFAULT);
        $auth = $client->login($email,$pwd);
        if($auth === false)
        {
            $auth_error = 'Incorrect Email or Password!!!';
        } else {
            session_start();
            $_SESSION['name'] = $auth['name'];
            $_SESSION['email'] = $auth['email'];
            header("Location: dashboard.php");
        }
    }
    error:
    include 'login.phtml';