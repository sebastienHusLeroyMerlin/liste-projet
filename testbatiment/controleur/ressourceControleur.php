<?php

    session_start();
    require_once('../model/Tools.php');

    if(isset($_GET['section']))
    {
        $section = Tools::validData($_GET['section']);

        if($section == 'eau') {
            $section = "eau";
        }
        elseif ($section == 'bois') {
            $section = "bois";
        }
        elseif ($section == 'argile') {
            $section = "argile";
        }
        elseif ($section == 'cire') {
            $section = "cire";
        }
        elseif ($section == 'nourriture') {
            $section = "nourriture";
        }
        elseif ($section == 'a') {
            # code...
        }
        elseif ($section == 'b') {
            # code...
        }

        $_SESSION['destination'] = 'ressource';
        $_SESSION['section'] = $section;

        header('Location:../index.php');
        exit;
    }