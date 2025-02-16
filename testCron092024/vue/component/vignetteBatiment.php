<?php
    require_once('../modele/manager/BatimentManager.php');
?>


<div class = "vignetteBatiment" >

    <h3><?= $batiment['nom_batiment']; ?> Niv <?php echo $batiment['niveau']; ?> </h3>

    <div class="encadrePhoto" title=<?= $batiment['nom_batiment'] ; ?><!-- contient la photo et le cout en ressource du batiment  -->

        <img src="../vue/asset/image/couveuse.png" title=<?= $batiment['nom_batiment'] ; ?> alt=<?= $batiment['nom_batiment'] ; ?> class="img"/>

        <h3>Coût pour le Niv <?= $batiment['niveau']+1;?> </h3>

        <p>

            Bois</br><?= $boisCouveuse ; ?></br></br>
            Cire</br><?= $cireCouveuse; ?></br></br>
            Eau</br><?=$eauCouveuse; ?></br></br>
            Durée</br><?=$dureeConstructionCouveuseConverti ; ?>

        </p>

        <form method="post" action="../modele/traitementConstructionBatiment.php" >
                            
            <input type="hidden" name="nomBatiment" id="nomBatiment" value="<?= $batiment['nom_batiment'] ; ?>"/>
                                        
            <input type="submit" value="Lancer la construction" />
                                            
        </form>

    </div>

     <!-- voir pour passer par un controleur qui appelera le traitement dans le manager -->
    

</div>
        
    
   