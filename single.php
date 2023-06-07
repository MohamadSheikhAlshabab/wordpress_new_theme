<?php get_header(); ?>
<div class="container">
    <?php get_template_part('slider'); ?>

    <?php
    if (have_posts()) {
        while (have_posts()) {
            the_post();
    ?>
            <div class="main-post">
                <?php //the_title('<h3 class="post-title">','</h3>')
                ?>
                <?php edit_post_link('Edit'); ?>
                <h3 class="post-title">
                    <a href="<?php the_permalink(); ?>" rel="bookmark" title="Link to <?php the_title_attribute(); ?>">
                        <?php the_title(); ?>
                    </a>
                </h3>
                <span class="post-author">
                    <i class="fa fa-circle fa-fw" aria-hidden="true"></i>
                    <?php the_author_posts_link(); ?>
                </span>
                <span class="post-comments">
                    <?php comments_popup_link() ?>
                </span>
                <span class="post-date">
                    <?php the_date();
                    echo ('   ');
                    the_time(); ?>
                </span>
                <?php the_post_thumbnail('', [
                    'class'  => 'img-responsive img-thumbnail',
                    'title'  => 'post image'
                ]); ?>
                <p class="post-content">
                    <?php the_content();
                    ?>
                    <?php //the_excerpt(); 
                    ?>
                    <!-- <a href="<?php //echo get_permalink(); 
                                    ?>">Read more ...</a> -->
                </p>
                <hr>
                <p class="post-categories">
                    <?php the_category(', '); ?>
                </p>
                <p class="post-tags">
                    <?php
                    if (has_tag()) {
                        the_tags();
                    } else {
                        echo 'Tags: No Tags';
                    }
                    ?>
                </p>
            </div>
    <?php
        }
    }
    ?>
    <div class="comments-number">
        <?php
        $avatar_arguments = array(
            'class' => 'img-responsive img-thumbnail',
        );
        echo get_avatar(get_the_author_meta('ID', 96, '', 'User Avatar', $avatar_arguments));
        ?>
        <div><?php echo get_the_author_meta('display_name'); ?></div>
        <div><?php echo get_the_author_meta('user_email'); ?></div>
    </div>
    <hr>
    <div class="posts-link">
        <?php
        if (get_previous_post_link()) {
            previous_post_link();
        } else {
            echo 'No Previous';
        }
        if (get_next_post_link()) {
            next_post_link();
        } else {
            echo 'No Next';
        }
        ?>
    </div>
    <h3 class="comments-number">
        <?php comments_number(); ?>
    </h3>
    <hr>
    <?php comments_template(); ?>
    <hr>
    <?php comment_form(); ?>
</div>

<?php get_footer(); ?>