<?php get_header();
?>

<section class="page-wrap">
<div class="container">



		<section class="row">


			<div class="col-lg-3">


						<?php if( is_active_sidebar('page-sidebar') ):?>

								<?php dynamic_sidebar('page-sidebar');?>


						<?php endif;?>


			</div>




			<div class="col-lg-9">


				
				<br>



				<?php if(has_post_thumbnail()):?>

					<img src="<?php the_post_thumbnail_url('blog-large');?>" alt="<?php the_title();?>" class="img-fluid mb-3 img-thumbnail">

				<?php endif;?>


				<?php get_template_part('includes/section','content');?>


			</div>

			        <style>
             body {
  background-color: lightgrey;
  color: black;
}

h1 {
  background-color: lightgrey;
  color: white;
}
</style>

			<h3></h3>
            
            <p>Nutrition is defined as the intake of food, considered relating to the body's dietary needs. Good nutrition - an adequate, well-balanced diet combined with regular physical activity - is a cornerstone of good health. Poor nutrition can lead to reduced immunity, increased susceptibility to disease, impaired physical and mental development, and reduced productivity. The diet of an organism is what it eats, which is largely determined by the availability, processing, and palatability of foods. A healthy diet includes preparation of food and storage methods that preserve nutrients from oxidation, heat or leaching, and that reduce risk of foodborne illnesses.</p>
          </div>


	</section>



</div>
</section>


<?php get_footer();
?>