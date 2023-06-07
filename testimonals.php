<div class="testimonals bg-info w-25">
    <?php
    $args = [
        'posts_per_page' => -1,
        'post_type'      => 'testimonals',
        'orderby'          => 'rand'
    ];

    $post_query = new WP_Query($args);
    ?>


    <h1 class="d-flex justify-content-center fw-5 text-secondary bg-dark h1-testimonals">Testimonals</h1>

    <div class="container container-testimonals">
        <div class="row">
            <div class="col-md-12">
                <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                    <div class="carousel-inner">

                        <?php
                        if ($post_query->have_posts()) :
                            $i = 0;
                            while ($post_query->have_posts()) :
                                $post_query->the_post();
                                $active_class = ($i === 0) ? 'active' : '';
                        ?>
                                <div class="carousel-item <?php echo $active_class; ?>">
                                    <div class="card card-testimonals">
                                        <div class="card-body">
                                            <h5 class="card-title title-testimonals"><?php the_title(); ?></h5>
                                            <p class="card-text text-testimonals"><?php the_excerpt(); ?></p>
                                        </div>
                                    </div>
                                </div>
                        <?php
                                $i++;
                            endwhile;
                        endif;
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        $('#quote-carousel').carousel({
            pause: true,
            interval: 10000,
        });
    });
</script>