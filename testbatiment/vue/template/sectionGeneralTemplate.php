<section class="conteneur">
				
	<?php 

		require_once('../vue/component/nav/navigation.php') ;

		?>

		<div class="divGeneral">

			<h2><?= ucfirst($destination); ?></h2>

			<?php
				var_dump($_SESSION);
				require_once('../vue/component/section/'. $section .'.php');
			?>

		</div>
										
</section>