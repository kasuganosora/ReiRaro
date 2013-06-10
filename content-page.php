<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
 <article class="post" id="post-<?php the_ID(); ?>">
     <div class="inner">

         <div class="post-content">
             <?php
                if ( is_search() ) { // Only display Excerpts for Search
                    the_excerpt();
                 }else{
                    the_content('显示页面的剩下内容 &raquo;');
                 }
             ?>

         </div>
         <footer></footer>

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