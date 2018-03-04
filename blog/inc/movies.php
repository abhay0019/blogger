
<!MOVIES>

<div class="container-fluid">
    
	<div class="container-fluid" style="border-bottom:1px solid grey;box-shadow: 512px 125px 120px rgba(0,0,0,.4);">
		<?php
			$query="select * from movies order by id desc";
			$result=mysqli_query($con,$query);
			if(mysqli_num_rows($result)>0)
			{
				$row=mysqli_fetch_assoc($result);
				echo '<img src="img/movies/'.$row['image'].'" class="img-responsive">';	
			}
			else
			{
				echo '<img src="img/movies/main.jpg" class="img-responsive">';
			}
			?>

	</div>
    <div class="container" style="border-bottom:2px solid grey;">
     <h3>Most Recent Posts</h3>
    </div>

<div class="container">
 <div class="container-fluid">
	
	<!rowzzzz>
	<?php
		$query="select * from movies order by id desc";
		$result=mysqli_query($con,$query);
		if(mysqli_num_rows($result)>0)
		{
			echo '<div class="row story-list margin-story">';
			$i=1;
			while($row=mysqli_fetch_assoc($result))
			{
				echo '<div class="col-sm-4  story-item ">
		        <a data-id="'.$row['id'].'" data-type="movies" data-backdrop="static" data-toggle="modal" href="#content-modal">
		        <span class="mov-story">
		        <div class="panel panel-default">
				    <div class="panel-body zero-padding">
				        <img src="img/movies/'.$row['image'].'" class="img-responsive item-img">
				        <div class="overflow-control">
							<h3>'
							   .$row['heading'].'
							</h3>
					    </div>
		        	</div>
				</div>
				</span>
				</a>
			</div>	
			';
			$i++;
			if($i==3)
			{
				echo "<br>";
				$i=1;
			}
			}
			echo '</div>';
		}
		else
		{
			echo "No Blogs Yet!!!!";
		}
	?>

	    </div>
</div>
</div>