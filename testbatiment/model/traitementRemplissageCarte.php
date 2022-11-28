<?php

    //Note algo test pour remplir est constituer une carte

    //Etape 0 : Requete pour verifier s il y a deja un enregistrement dans la bdd 

    //Etape 1 : la grille existe t elle ? ( y a til un enregistrement dans la grille (bdd))
        // OUI donc je continue de la remplir

        // NON 
        // donc a - je determine la position de la premiere inscription
        //combien de case vide avant implantation
        $nbEmptyBox = rand(1,4);
        var_dump('nbEmptyBox deb : ' . $nbEmptyBox);/*********************************************************** */
        // b - puis je genere la carte 
        $xBase = 5;
        $yBase = 3;
            $xMax = $xBase;//8
            $yMax = $yBase;//6
            $lastXMax = 0;
            $lastYMax = 0;

        // c - je rempli la carte  avec la premiere inscription

            // je prends les coordonnées x et y du dernier inscrit ( requete ) 
            // note repere de la carte commence a [1;1]
            $xLastRegistration = 3 ; // dependra d une requete en bdd xlastr de base a 0 et ylastr de base a 1 
            $yLastRegistration = 1 ;

            //pour determiner les coordonnées de x j'ajoute le nombre de cases vide aux coordonné du dernier inscrit
            $xCoordinate = $xLastRegistration + $nbEmptyBox ;
                
            //si les coordonnées sur x sont plus grande que la carte de base ( $xMax )
                if($xCoordinate > $xMax ){
                    
                    //je monte sur l axe des y de deux
                    $yLastRegistration += 2 ;

                    var_dump('xLastRegistration 1 if : ' . $xLastRegistration);
                    var_dump('yLastRegistration 1 if : ' . $yLastRegistration);

                    // je determine combien de cases vide il reste
                    $restNbEmptyBox = $xMax - $xLastRegistration ;
                    $newNbEmptyBox = $nbEmptyBox - $restNbEmptyBox ;
                    //var_dump('newNbEmptyBox : ' . $newNbEmptyBox);

                    // si en montant de deux je depasse le $yMax
                    var_dump('yLastRegistration xxxxxxx if : ' . $yLastRegistration);
                    if($yLastRegistration > $yMax){
                        //je renseigne les last x et y
                        $lastXMax = $xMax;
                        $lastYMax = $yMax;
                        var_dump('lastXMax : ' . $lastXMax);
                        var_dump('lastYMax : ' . $lastYMax);

                        //j'augmente le $xMax 8 de et le $yMax de 6
                        $xMax += $xBase;
                        $yMax += $yBase;
                        var_dump('xMax : ' . $xMax);
                        var_dump('yMax : ' . $yMax);

                        //je determine les coordonnées
                        $xCoordinate = $lastXMax + $newNbEmptyBox ; 
                        $xLastRegistration = $xCoordinate ;

                        $yCoordinate = 0 ;
                        $yLastRegistration = $yCoordinate ;
                    }
                    //si je ne depasse pas le $yMax
                    else{

                        /*$restNbEmptyBox = $xMax - $xLastRegistration ;
                        $newNbEmptyBox = $nbEmptyBox - $restNbEmptyBox ;*/

                        //ordre important 
                        $xLastRegistration = -1;//sans doute a changer qd grille s agrandira 

                        $xCoordinate = $xLastRegistration + $newNbEmptyBox ; 
                        $xLastRegistration = $xCoordinate ;

                        $yCoordinate = $yLastRegistration ;
                    }

                    if($xCoordinate % 2 > 0){
                        $yCoordinate = $yLastRegistration + 1;
                    }
                    else{
                        $yCoordinate = $yLastRegistration;                      
                    }

                }
                //si je ne depasse pas le $xMax
                else {
                    $xLastRegistration = $xCoordinate ;

                    if($xCoordinate % 2 > 0){
                        $yCoordinate = $yLastRegistration + 1;
                    }
                    else{
                        $yCoordinate = $yLastRegistration;                      
                    }
                }

                
                var_dump('xLastRegistration fin : ' . $xLastRegistration);
                var_dump('yLastRegistration fin : ' . $yLastRegistration);
                var_dump('xCoordinate fin : ' . $xCoordinate);
                var_dump('yCoordinate fin : ' . $yCoordinate);

            /*
                -> dans la table carte : definir le xMax = 6 , le yMax = 4 

            */