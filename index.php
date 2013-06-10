<?php get_header(); ?>
     <!--==  content:S ==-->
     <div class="content" id="content">
     <?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content',"list"); ?>
	<?php endwhile; ?>
     <?php else: ?>
      <article class="post notfound" >
          <div class="inner">
             <p>没有找到你想要的.</p>
           </div>
      </article>
     <?php endif; ?>
     </div>
       <!--==  content:E ==-->
     <div class="pagination">
         <div class="alignleft">
            <?php next_posts_link('&laquo; 上一页'); ?>
         </div>
         <div class="alignright">
            <?php previous_posts_link('下一页 &raquo;'); ?>
         </div>
     </div>
<?php get_footer(); ?>