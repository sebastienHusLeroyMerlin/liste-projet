<section class="conteneurBatiment" >

	<?php 
		require_once('alerteMessage.php');
	?>
							
	<div class="encadreGeneral"><!-- Ne devra pas etre visible  -->
							
        <h3>Test de script</h3>

		<div class="carre">

        <?php
            //require_once('../model/traitementRemplissageCarte.php');
			///require_once('../controleur/remplissageCarteControleur.php');
			//require_once('../controleur/controleurTest.php');
$index = 8 ;

			for ($i=0; $i < $index ; $i++) { 
				?>
					<div class="hexagon"></div>  
				<?php
			}
        ?>

		</div>
<!--
<canvas id ="canvas1" width="400" height="300" style="border:5px solid black;">
</canvas>

<script language="javascript" type="text/javascript">
var c1=document.getElementById("canvas1");
var pinceau=c1.getContext("2d");
 
var unit = 40; // longueur d'un coté de l'hexagone
trace_map(pinceau, unit); //tracer la carte hexa (mis en fonction pour lisibilité)
var offset_y = 2; // décalage vertical du y=0 pour ne pas l'avoir en haut du graphe
add_coordinates(pinceau, offset_y);
 
 
 
 
/*========================== fonctions ============================================*/
 
/** add coordinates in each block of the hexagonal map
  la barre des X est inclinée, mais ça se comporte comme un système de coordonnées carthésien
 
 @param pinceau : type returned by a .getContext("2d") call
 @param offset_y : shift (in number of block) of the vertical (Y) origin
*/
function add_coordinates(pinceau, offset_y) {
 
   var sin_unit = unit * Math.sin(30*Math.PI/180);
   var cos_unit = unit * Math.cos(30*Math.PI/180);
 
   /* ---- tracer les lignes de repère ---- */
   pinceau.beginPath();
   //axe Y (vertical)
   pinceau.moveTo(sin_unit + unit/2, 0);
   pinceau.lineTo(sin_unit + unit/2, c1.height);
 
   //axe X (incliné)
   //le +0.4 est pour que la ligne soit ~verticalement centrée dans les hexagones
   var vertical_offset = (offset_y * 2 + 0.4)* cos_unit;
   pinceau.moveTo(0, vertical_offset);
   pinceau.lineTo(c1.width, vertical_offset + c1.width * (cos_unit / (unit + sin_unit)) );
 
   pinceau.lineWidth = 5;
   pinceau.strokeStyle = "#BBF"; //bleu clair
   pinceau.stroke();
 
 
   /* ---- ajout coordonnées dans chaque case ---- */
 
   pinceau.beginPath();
   pinceau.font = '10pt Calibri';
   pinceau.textAlign = 'center';
   pinceau.fillStyle = 'green';
 
   //point de départ horizontal (la case la plus haute d'une colonne sur deux)
   //sur une meme 'ligne', la valeur Y ne bouge pas (puisque c'est axe vertical)
   count_x = 0;
   count_y = offset_y;
   for(w = sin_unit + unit/2 ; w < c1.width ; w += 2 * (unit + sin_unit) ) {
      temp_x = count_x;
      //la distance entre le centre de 2 cases successives est de :
      //-horizontalement : unit + unit*sin(30°)
      //-verticalement   : unit*cos(30°)
      for(width = w, h = cos_unit ; width < c1.width && h < c1.height ; width += unit + sin_unit, h += cos_unit ) {
         pinceau.fillText("y"+count_y+"x"+temp_x, width, h);
         temp_x ++;
      }
      count_x += 2;
      count_y ++;
   }
 
   //point de départ vertical (chaque case de l'axe vertical, sauf la 1ere qui a déjà été remplie par l'autre boucle)
   count_y = offset_y - 1;
 
   for( h = 3 * cos_unit ; h < c1.height ; h += 2 * cos_unit ) {
      count_x = 0;
      for( w = sin_unit + unit/2, height = h ; w < c1.width && height < c1.height ; w += unit + sin_unit, height += cos_unit  ) {
         pinceau.fillText("y"+count_y+"x"+count_x, w, height);
         count_x ++;
      }
      count_y --;
   }
 
   pinceau.stroke();
}
 
 
 
 
/** draws an hexagon blocks map
 
   @param pinceau : type returned by a .getContext("2d") call
   @param unit : length of a side of the hexagon
*/
function trace_map(pinceau, unit) {
 
   pinceau.beginPath();
 
   var sin_unit = unit * Math.sin(30*Math.PI/180);
   var cos_unit = unit * Math.cos(30*Math.PI/180);
 
   //trace the diagonals
   var count = 0;
 
   for(var w = 0 ; w < c1.width ; w += unit + sin_unit) {
      if( count % 2 == 1) {
         pinceau.moveTo(w , 0); //point de depart
         for(var h = 0 ; h < c1.height ; h += 2 * cos_unit) {
            pinceau.lineTo(w + sin_unit , h + cos_unit); /* \ */
            pinceau.lineTo(w , h + 2 * cos_unit);        /* / */
         }
      } else {
         pinceau.moveTo(w + sin_unit, 0); //point de depart
         for(var h = 0 ; h < c1.height ; h += 2 * cos_unit) {
            pinceau.lineTo(w , h + cos_unit);               /* / */
            pinceau.lineTo(w + sin_unit, h + 2 * cos_unit); /* \ */
         }
      }
      count++;
   }
 
   //trace the lines
   count = 0;
 
   for(var w = 0 ; w < c1.width ; w += unit + sin_unit) {
      if( count % 2 == 1) {
         for(var h = 0 ; h < c1.height ; h += 2 * cos_unit) {
            pinceau.moveTo(w + sin_unit, h + cos_unit); //point de depart
            pinceau.lineTo(w + sin_unit + unit , h + cos_unit);
         }
      } else {
         for(var h = cos_unit ; h < c1.height ; h += 2 * cos_unit) {
            pinceau.moveTo(w + sin_unit, h + cos_unit); //point de depart
            pinceau.lineTo(w + sin_unit + unit , h + cos_unit);
         }
      }
      count++;
   }
   pinceau.stroke();
}
</script>
       		
	</div>-->
					
</section>