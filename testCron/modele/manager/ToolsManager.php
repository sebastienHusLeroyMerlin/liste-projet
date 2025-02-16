<?php

    class ToolsManager{

        public static function validData($data){

            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;

        }

        public static function isIdentic($dataOne, $dataTwo)
        {
            if($dataOne == $dataTwo){
                return true;
            }
            return false;
        }

        public static function randomAlphanumericString($sizeOfString)
        {
            
            // charactere autorise pour la chaine alpha numerique generée
            $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
            
            //str_shuffle —> Mélange les caractères d'une chaîne de caractères
            return substr(str_shuffle($str_result),0, $sizeOfString);
        }

        public static function removeAccents($string)
        {
            $stringRemoved = str_replace('ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy', $string);
            return $stringRemoved;
        }
    }