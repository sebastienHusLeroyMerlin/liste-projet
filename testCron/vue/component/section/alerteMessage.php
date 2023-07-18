<?php 
	if(isset($_SESSION['message']))
	{
		?>
			<div class="message">
				<p>
				
					<?php  echo $_SESSION['message'] ; ?>
					
				</p>
			</div>
		<?php
	}
	unset($_SESSION['message']) ;
								
?>