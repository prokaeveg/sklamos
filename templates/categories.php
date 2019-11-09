<div class="block-categories">
	<p class="header-title">Категории товаров</p>
	<ul>
		<li><a id="index1" class=""><span class="mobile-svg"><i class="fa fa-mobile" aria-hidden="true"></i></span><span class="block-title">Мобильные телефоны</span></a>
			<ul class="category-section">
				<li><a href="view_cat.php?type=mobile"><strong>Все модели</strong></a></li>	

				<?php 
					$result = mysqli_query($connection, "SELECT * FROM categories WHERE product_type='mobile'");
					if(mysqli_num_rows($result) > 0){
						$row = mysqli_fetch_array($result);
						do {
							echo '
								<li><a href="view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["product_type"].'">'.$row["brand"].'</a></li>
							 ';
						}
						while ($row = mysqli_fetch_array($result));
					}

				 ?>
	

			</ul>


		</li>

		<li><a id="index2" class=""><span class="mobile-svg"><i class="fa fa-laptop" aria-hidden="true"></i></span><span class="block-title">Ноутбуки</span></a>
			<ul class="category-section">			
				<li><a href="view_cat.php?type=notebook"><strong>Все модели</strong></a></li>	
				
				<?php

  					$result = mysqli_query($connection, "SELECT * FROM categories WHERE product_type='notebook'");
  
					If (mysqli_num_rows($result) > 0)
					{
						$row = mysqli_fetch_array($result);
						do
						{
							echo '
						    
						  <li><a href="view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["product_type"].'">'.$row["brand"].'</a></li>
						    
						    ';
						}
						 while ($row = mysqli_fetch_array($result));
					} 
						
					?>

			</ul>


		</li>

		<li><a id="index3" class=""><span class="mobile-svg"><i class="fa fa-tablet" aria-hidden="true"></i></span><span class="block-title">Планшеты</span></a>
			<ul class="category-section">
				<li><a href="view_cat.php?type=notepad"><strong>Все модели</strong></a></li>	
				
				<?php

				$result = mysqli_query($connection, "SELECT * FROM categories WHERE product_type='notepad'");
				  
				If (mysqli_num_rows($result) > 0)
				{
					$row = mysqli_fetch_array($result);
					do
					{
						echo '
					    
					  <li><a href="view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["product_type"].'">'.$row["brand"].'</a></li>
					    
					    ';
					}
					 while ($row = mysqli_fetch_array($result));
				} 
					
				?>

			</ul>


		</li>
	</ul>

</div>