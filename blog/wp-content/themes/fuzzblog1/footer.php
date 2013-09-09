<div class="art-Footer">
    <div class="art-Footer-inner">
                <a href="<?php bloginfo('rss2_url'); ?>" class="art-rss-tag-icon" title="RSS"></a>
                <div class="art-Footer-text">
<p>
<?php 
 global $default_footer_content;
 $footer_content = get_option('art_footer_content');
 if ($footer_content === false) $footer_content = $default_footer_content;
 echo $footer_content;
?>
</p>
</div>
    </div>
    <div class="art-Footer-background">
    </div>
</div>

		<div class="cleared"></div>
    </div>
</div>
<div class="cleared"></div>
<p class="art-page-footer">&nbsp;</p>
<div><?php wp_footer(); ?></div>
<?php
if ( function_exists( 'yoast_analytics' ) ) { 
  yoast_analytics(); 
}
?>
</body>
</html>
