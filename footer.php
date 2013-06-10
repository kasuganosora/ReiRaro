   <footer id="footer">
            <ul class="widget-area">
              <?php if (function_exists('dynamic_sidebar')){ dynamic_sidebar('widget-area1');} ?>
            </ul>
            <ul class="widget-area">
                <?php if (function_exists('dynamic_sidebar')){ dynamic_sidebar('widget-area2');} ?>
            </ul>
            <ul class="widget-area">
              <?php if (function_exists('dynamic_sidebar')){ dynamic_sidebar('widget-area3');} ?>
            </ul>
        <div class="copyright">
           Created by @ReitsukiSion
        </div>
    </footer>

   <?php wp_footer(); ?>

</body>
</html>