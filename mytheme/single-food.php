
<?php get_header();?>

<section class="page-wrap">
<div class="container">
	
	
	<?php //*custom food blog ?>

<h2><?php the_title();?></h2>

			
			<?php if(has_post_thumbnail()):?>
				<div class="gallery">
					<a href="<?php the_post_thumbnail_url('blog-large');?>">
						<img src="<?php the_post_thumbnail_url('blog-large');?>" alt="<?php the_title();?>" class="img-fluid mb-3 img-thumbnail">
					</a>
				</div>
			<?php endif;?>

       <div class="row">
					

				<div class="col-lg-6">
					

							<?php get_template_part('includes/section','food');?>
							<?php wp_link_pages();?>

				</div>


				<div class="col-lg-6">


					<?php get_template_part('includes/form','enquiry');?>

				<br>	
				<div class="col-lg-3">



			</div>


           </div>



	</div>
			

/div>
</section>


<?php get_footer();?>