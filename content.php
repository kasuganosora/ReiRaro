<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
 <article class="post" id="post-<?php the_ID(); ?>">
     <div class="inner">
         <div class="navigation clearfix">
           <div class="alignleft"><?php previous_post_link('&laquo; %link') ?></div>
           <div class="alignright"><?php next_post_link('%link &raquo;') ?></div>
         </div>

         <div class="byline">
              <time datetime="<?php the_time('Y-m-d H:i:s') ?>"><?php the_author() ?> 发布于 <?php the_time('Y年M月d日 D') ?></time>
              <p class="tags"><?php the_tags('','','') ?></p>
         </div>
         <h1 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
         <div class="post-content">
             <?php
                if ( is_search() ) { // Only display Excerpts for Search
                    the_excerpt();
                 }else{
                    the_content('显示文章的剩下内容 &raquo;');
                 }
             ?>

         </div>
         <footer>
             <ul class="post-info">
                 <li>分类: <?php the_category(', ') ?></li>

                 <li><?php comments_popup_link('没有评论', '1个评论', '% 个评论'); ?></li>
                 <li><?php edit_post_link("编辑"); ?></li>
             </ul>
         </footer>

         <div class="comment-area">

             <?php comments_template(); ?>

            <?php endwhile; ?>
         </div>
     </div>
  </article>
   <?php else: ?>
   <article class="post notfound" >
       <div class="inner">
          <p>没有找到你想要的.</p>
        </div>
   </article>
   <?php endif; ?>