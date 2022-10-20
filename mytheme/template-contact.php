<?php
/*
Template Name: Contact 
*/
?>
<?php //contactpage ?>




<?php get_header();?>



<section class="page-wrap">ar
<div class="container">
	

			<section class="row">


			<div class="col-lg-3">


						


			</div>


			<div class="col-lg-9">

		 <h3></h3>
            
            <p>Nutrition is defined as the intake of food, considered relating to the body's dietary needs. Good nutrition - an adequate, well-balanced diet combined with regular physical activity - is a cornerstone of good health. Poor nutrition can lead to reduced immunity, increased susceptibility to disease, impaired physical and mental development, and reduced productivity. The diet of an organism is what it eats, which is largely determined by the availability, processing, and palatability of foods. A healthy diet includes preparation of food and storage methods that preserve nutrients from oxidation, heat or leaching, and that reduce risk of foodborne illnesses.</p>



			<div class="row">
				

						<div class="col-lg-6">
							
						

						</div>

						<div class="col-lg-6">
							
							<?php get_template_part('includes/section','content');?>

						</div>

            </div>

                      <div class="col-lg-6">


					<?php get_template_part('includes/form','enquiry');?>

					
					<ul>
						
						<?php if(have_rows('features')):?>
						
							<?php 
							while( have_rows('features')): the_row();
							$feature = get_sub_field('feature');
							?>

							<li>
								
								<?php echo $feature;?>

							</li>

							<?php endwhile;?>

						<?php endif;?>

					</ul>

               </div>
               </div>

			
          </div>


 
		

</div>
</section>


<?php get_footer();?>