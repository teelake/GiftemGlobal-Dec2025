<?php $enerzee_option = get_option('enerzee_options'); ?>
<?php the_content(); ?>
<?php
if (isset($enerzee_option['display_pre_next'])) {
    $options = $enerzee_option['display_pre_next'];
    if ($options == "yes") {
?>
        <?php if (is_singular('portfolio')) {
            // Previous/next post navigation.
            the_post_navigation(array(
                'next_text' => '<span class="meta-nav button-gradient" aria-hidden="true">' . esc_html__('Next', 'enerzee') . '</span> ' .
                    '<span class="screen-reader-text">' . esc_html__('Next post:', 'enerzee') . '</span> ',

                'prev_text' => '<span class="meta-nav button-gradient" aria-hidden="true">' . esc_html__('Previous', 'enerzee') . '</span> ' .
                    '<span class="screen-reader-text">' . esc_html__('Previous post:', 'enerzee') . '</span> ',
            ));
        }
        ?>

        <?php if (is_singular('post')) { ?>
            <a class="blog-user" href="<?php echo get_permalink(get_option('page_for_posts')); ?>"><i class="fa fa-th-large"></i></a>
<?php
        }
    }
}
?>