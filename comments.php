<?php // Do not delete these lines
  if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
    die ('Please do not load this page directly. Thanks!');

  if (!empty($post->post_password)) { // if there's a password
    if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
      ?>

      <p>This post is password protected. Enter the password to view comments.</p>

      <?php
      return;
    }
  }

  /* This variable is for alternating comment background */
  $oddcomment = 'class="alt" ';
?>

<!-- You can start editing here. -->

 <?php if ($comments) : ?>

 <ol class="comments">
 <?php foreach ($comments as $comment) : ?>
     <li <?php echo $oddcomment; ?>id="comment-<?php comment_ID() ?>" >
        <div class="comment-wrap">
            <h6 class="comment-info">
                <?php comment_author_link() ?>
                <time datetime="<?php comment_date('Y-m-d') ?> <?php comment_time() ?>"><?php comment_date('Y年m月d日 D ') ?> <?php comment_time() ?></time>
            </h6>
            <div class="comment-avatar">
                <?php echo get_avatar( $comment, 64 ); ?>
            </div>
           <p><?php comment_text() ?></p>
           <div class="comment-action">
             <?php edit_comment_link('编辑','&nbsp;&nbsp;',''); ?>
           </div>
        </div>
     </li>
        <?php
          /* Changes every other comment to a different class */
          $oddcomment = ( empty( $oddcomment ) ) ? 'class="alt" ' : '';
        ?>

        <?php endforeach; /* end for each comment */ ?>
 </ol>
 <?php else : // this is displayed if there are no comments so far ?>

   <?php if ('open' == $post->comment_status) : ?>
     <!-- If comments are open, but there are no comments. -->

    <?php else : // comments are closed ?>
     <!-- If comments are closed. -->
     <p><em>不容许评论</em></p>

   <?php endif; ?>


 <?php endif; ?>

<?php if ('open' == $post->comment_status) : ?>
 <h3>发表评论</h3>
<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
    <p>你必须<a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">登录</a>后才能发表评论.</p>
  <?php else : ?>

  <?php if ( $user_ID ) : ?>
    <p class="comment-login-info">以<a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>身份发表 <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" class="logout" title="登出这个帐号">注销</a></p>
   <?php endif; ?>


 <form class="post-comment" id="post-comment" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="POST">
     <textarea name="comment" id="comment" cols="30" rows="10"></textarea>

     <?php if ( !$user_ID ) : ?>
     <div class="comment-post-info">
         <div class="post-comment-panel">
             <label for="author">昵称(必须):</label>
             <input type="text" id="author" name="author" placeholder="e.g.ReitsukiSion"/>
         </div>
         <div class="post-comment-panel">
             <label for="email">E-mail(必须):</label>
             <input type="text" id="email" name="email" placeholder="e.g.download@ccav.com"/>
         </div>
         <div class="post-comment-panel">
             <label for="website">个人网站(可选):</label>
             <input type="text" id="website" name="website" placeholder="e.g.http://blog.hcg.im/"/>
         </div>
     </div>
      <?php endif; ?>
     <div>
         <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
         <input type="submit" id="submit" name="submit" value="提交评论" class="btn-submit">
     </div>
     <?php do_action('comment_form', $post->ID); ?>
 </form>

 <?php endif; // If registration required and not logged in ?>
 <?php endif; // if you delete this the sky will fall on your head ?>