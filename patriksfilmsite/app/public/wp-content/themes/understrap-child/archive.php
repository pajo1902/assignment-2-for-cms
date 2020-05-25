<?php

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

$container = get_theme_mod('understrap_container_type');
?>
<div class="wrapper container-fluid" id="archive-wrapper">
        <div class="col-md content-area" id="primary">
            <main class="site-main content" id="main">
                <?php 
                
                $movie = new WP_Query(
                    array(
                        'post_type' => 'movies',
                        // 'meta_key' => 'yasr_overall_rating', //kolla på yasr
                        // 'orderby'   => 'meta_value_num', //ska kolla på värdet där i meta keyn
                        // 'order' => 'DESC', //sen ska det sorteras med högsta värdet högst upp
                        // 'posts_per_page' => -1,
                    )
                );

                usort( $movie->posts, 'orderByRating' );
                // echo $pages2;

                function orderByRating( $b, $a ) {
                    $a_title = intval(YasrDatabaseRatings::getVisitorVotes($a->ID)[0]->sum_votes);
                    $b_title = intval(YasrDatabaseRatings::getVisitorVotes($b->ID)[0]->sum_votes);
                    return ( strcmp($a_title, $b_title ) > 0 ) ? 1 : -1;
                }

                // wp_pagenavi();
                if ($movie->have_posts()) {
                    ?> 
                    
                    <div class="row mb-3 justify-content-center">
                        <?php 
                            while ($movie->have_posts()) {
                                $movie->the_post();
                                // $meta = $movie->get_post_meta($post->ID, 'wporg_box_id', true);
                                $meta = get_post_meta( get_the_ID(), '_wporg_meta_key', true );
                                $rating = get_post_meta( get_the_ID(), 'yasr_overall_rating', true );
                                ?>

                                    <div class="card col-md-3 mr-3">
                                        <!-- <img class="card-img-top" src="..." alt="Card image cap"> -->
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo get_the_title(); ?></h5>
                                            <p class="card-text"><?php echo get_the_content(); ?></p>
                                            <!-- <p class="card-text">Post-ID: <?php //echo $post->ID ?></p> -->
                                            <?php
                                            $votes = YasrDatabaseRatings::getVisitorVotes($post->ID);
                                            $voteSum = $votes[0];
                                            $rating = do_shortcode('[yasr_visitor_votes postid="'.$post->ID.'"]');
                                            // $test = do_shortcode('[helloworld]');
                                            ?>
                                            <p class="card-text">Rating: <?php echo $votes[0]->sum_votes; ?></p>
                                            <div><?php echo $rating; ?></div>
                                            <a href="<?php echo $meta ?>" class="btn btn-primary">Go to IMDB</a>
                                        </div>
                                    </div>
                                <?php
                            }
                            // wp_pagenavi();
                        ?>
                    </div>
                    <?php
                }
                
                ?>
            </main>
        </div>
</div><!-- #index-wrapper -->

<?php get_footer(); ?>