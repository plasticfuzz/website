<?php get_header(); ?>
<div class="art-contentLayout">
<?php include (TEMPLATEPATH . '/sidebar1.php'); ?><div class="art-content">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?> 
<div class="art-Post">
    <div class="art-Post-cc"></div>
    <div class="art-Post-body">
<div class="art-Post-inner art-article">
<?php ob_start(); ?>
<h2 class="art-PostHeader">

<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'kubrick'), the_title_attribute('echo=0')); ?>">
<?php the_title(); ?>
</a>
</h2>
<?php $icons = array(); ?>
<?php if (!is_page()): ?><?php ob_start(); ?>
<?php the_time(__('F jS, Y', 'kubrick')) ?>
<?php $icons[] = ob_get_clean(); ?><?php endif; ?><?php if (current_user_can('edit_post', $post->ID)): ?><?php ob_start(); ?><?php edit_post_link(__('Edit', 'kubrick'), ''); ?>
<?php $icons[] = ob_get_clean(); ?><?php endif; ?><?php if (0 != count($icons)): ?>
<div class="art-PostHeaderIcons art-metadata-icons">
<?php echo implode(' | ', $icons); ?>

</div>
<?php endif; ?>
<?php $metadataContent = ob_get_clean(); ?>
<?php if (trim($metadataContent) != ''): ?>
<div class="art-PostMetadataHeader">
<?php echo $metadataContent; ?>

</div>
<?php endif; ?>
<div class="art-PostContent">

          <?php if (is_search()) the_excerpt(); else the_content(__('Read the rest of this entry &raquo;', 'kubrick')); ?>
          <?php if (is_page() or is_single()) wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
        
</div>
<div class="cleared"></div>
<?php $icons = array(); ?>
<?php if (!is_page() && get_the_tags()): ?><?php ob_start(); ?><?php the_tags(__('Tags:', 'kubrick') . ' ', ', ', ' '); ?>
<?php $icons[] = ob_get_clean(); ?><?php endif; ?><?php if (0 != count($icons)): ?>
<div class="art-PostFooterIcons art-metadata-icons">
<?php echo implode(' | ', $icons); ?>

</div>
<?php endif; ?>

</div>

		<div class="cleared"></div>
    </div>
</div>

<?php comments_template(); ?>
<?php endwhile; endif; ?>

</div>

</div>
<div class="cleared"></div>

<?php get_footer(); ?>