<?php

    namespace modele\manager;

    //require_once (__DIR__ . '/../../Enums/TypeFile.php');
    class ToolsManager{

//        /**
//         * TypeFile : corresponde aux type de fichier que je souhaite exemple ControleurGeneral, Manager ect ...
//         */
//        public static function spl_autoload_register(string $fileName, TypeFile $typeFile) {
//
//                $dir = __DIR__ ;
//                $dir = substr($dir,0,-15);
//                $file = $dir . '/' . $typeFile->value . '/' . $fileName . $typeFile->value . '.php';
//
//                var_dump($file);
//                // Vérifier si le fichier existe et l'inclure
//                if (file_exists($file)) {
//
//                    require_once $file;
//                    //print_r(get_included_files());
//                }
//            }


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