<?php get_header(); ?>
<?php //get_template_part('slider'); ?>
<div class="main-container">
    <?php get_sidebar(); ?>
    <div class="container">
        <div class="row">
            <?php
            if (have_posts()) {
                while (have_posts()) {
                    the_post();
            ?>
                    <div class="col-sm-6">
                        <div class="main-post">
                            <?php //the_title('<h3 class="post-title">','</h3>')
                            ?>
                            <h3 class="post-title">
                                <a href="<?php the_permalink(); ?>" rel="bookmark" title="Link to <?php the_title_attribute(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h3>
                            <span class="post-author">
                                <i class="fa fa-circle fa-fw" aria-hidden="true"></i>
                                <?php the_author_posts_link(); ?> ,
                            </span>
                            <span class="post-comments">
                                <?php comments_popup_link() ?> ,
                            </span>
                            <span class="post-date">
                                <?php the_date();
                                echo ('  at  ');
                                the_time(); ?>
                            </span>
                            <?php the_post_thumbnail('', [
                                'class'  => 'img-responsive img-thumbnail',
                                'title'  => 'post image'
                            ]); ?>
                            <p class="post-content">
                                <?php //the_content(); 
                                ?>
                                <?php the_excerpt(); ?>
                                <a href="<?php echo get_permalink(); ?>">Read more ...</a>
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
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
    <div class="posts-link">
        <span class="prev">
            <?php
            if (get_previous_posts_link()) {
                previous_posts_link('Prev');
            } else {
                echo 'No Previous';
            }
            ?>
        </span>
        <span class="next">
            <?php
            if (get_next_posts_link()) {
                next_posts_link();
            } else {
                echo 'No Next';
            }
            ?>
        </span>
    </div>
</div>
<?php get_template_part('testimonals'); ?>
<?php get_footer(); ?>