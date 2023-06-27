<?php
if( ! defined( 'ABSPATH' ) ) {
	exit();
}

?>

<div id="reviews" class="rx_review_summery_block">
	<div class="rx-reviewbox">
		<div class=" rx-flex-grid-container">
            <div class="rx-flex-grid-50 rx_recommended_wrapper">
                <div class="rx-temp-rating ">
                    <div class="rx_average_rating">
                        <div class="rx-temp-rating-number">
                            <p class="temp-rating_avg">
                                <?php
                                $rx_count_total_rating_avg = ! empty( $rx_count_total_rating_avg ) ? $rx_count_total_rating_avg : "";
                                echo esc_html( $rx_count_total_rating_avg );
                                ?>
                            </p>
                            <span class="temp-rating_5-star">/<?php esc_html_e('5', 'reviewx');?></span>
                        </div>
                        <div class="rx-temp-rating-star">
                            <?php echo reviewx_show_star_rating( $rx_count_total_rating_avg ); ?>
                        </div>
                    </div>
                    <div class="rx-temp-total-rating-count">
                        <p>
                            <?php
                            $rx_total_rating_count = ! empty( $rx_total_rating_count ) ? $rx_total_rating_count : "";
                            echo sprintf( __('Based on %d rating(s)', 'reviewx' ), $rx_total_rating_count );
                            ?>
                        </p>
                    </div>
                </div>
                <?php if( ! empty( $allow_recommendation ) && $allow_recommendation == 1 ) { ?>
                    <hr>
                    <div class="rx_recommended_box">
                        <div class="rx_recommended_icon_box">
                            <div class="rx_recommended_icon">
                                <img src="<?php echo esc_url( plugins_url( '/', __FILE__ ) . '../../../resources/assets/storefront/images/recommendation_icon.png' ); ?>">
                            </div>
                        </div>
                        <div class="rx_recommended_box-right">
                            <p class="rx_recommended_box_content">
                                <?php  if( ! empty( $prod_id ) && get_post_type( $prod_id ) == 'product' ) { ?>
                                    <span class="rx_recommended_box_heading">
                                    <?php
                                        if( reviewx_product_recommendation_count( $prod_id ) > 0 ){
                                            echo sprintf("%02d", reviewx_product_recommendation_count( $prod_id ));
                                        } else {
                                            echo sprintf("%d", reviewx_product_recommendation_count( $prod_id ));
                                        }
									?>                                        
                                    </span>                                
                                    <?php echo ! empty(get_theme_mod('reviewx_customer_recommendation_label') ) ? get_theme_mod('reviewx_customer_recommendation_label') : __( 'Customer(s) recommended this item', 'reviewx' ); ?>
                                <?php } else if( \ReviewX_Helper::check_post_type_availability( get_post_type( $prod_id ) ) == TRUE ) { ?>
                                    <?php echo __( 'Recommended by ', 'reviewx' ); ?>
                                    <?php
                                        if( reviewx_product_recommendation_count( $prod_id ) > 0 ){
                                            echo sprintf( "%02d", reviewx_product_recommendation_count( $prod_id ) );
                                        } else {
                                            echo sprintf( "%d", reviewx_product_recommendation_count( $prod_id ) );
                                        }
                                    ?> 
                                    <?php echo __( ' reviewer(s)', 'reviewx' ); ?>
                                <?php } ?>                                                                
                            </p>
                        </div>
                    </div>
                <?php } ?>
            </div>

			<!-- Start review chart -->
			<div class="rx-flex-grid-50 stfn_rate rx_rating_graph_wrapper">
				<div class="rx-horizontal flat rx-graph-style-2">
                    <?php
                        $percentage = 0;
                        if( \ReviewX_Helper::is_multi_criteria( get_post_type( $prod_id ) ) ) {
                            if( ! empty( $cri ) ) {
						    foreach ( $cri as $key => $single_criteria ) {
                                if ( isset( $criteria_arr[$key] ) && isset( $criteria_count[$key] ) ) {
                                    $percentage = intval( round( ($criteria_arr[$key] / $criteria_count[$key])*100/5 ) );
                                }
                            ?>
                            <div class="rx_style_two_free_progress_bar">
                                <h3 class="progressbar-title"><?php echo esc_html( str_replace( '-', ' ', $single_criteria ) ); ?></h3>
                                <div class="progress">
                                    <?php if( $percentage > 0 ) : ?>
                                        <div class="progress-bar" style="width: <?php echo esc_attr($percentage); ?>%;">
                                            <span><?php echo esc_attr($percentage); ?>%</span>
                                        </div>
                                    <?php  else: ?>
                                        <div class="progress-bar" style="width: 100%;">
                                            <span><?php echo __('100', 'reviewx');?>%</span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
					        <?php
                                }
                            }
                        } else {
                  
                            $rating_info = \ReviewX_Helper::total_rating_count($prod_id);  
                            rsort($rating_info['rating_count']);
                            foreach( $rating_info['rating_count'] as $rt ){
                                $percentage = \ReviewX_Helper::get_percentage($rating_info['review_count'][0]->total_review, isset($rt['total_review'])?$rt['total_review']:0);
                            ?>
                            <div class="rx_style_two_free_progress_bar">
                                <h3 class="progressbar-title"><?php printf( __( '%s Star', 'reviewx' ), round( $rt['rating'] ) ); ?></h3>
                                <div class="progress rx-tooltip" data-rating="<?php echo esc_attr( round( $rt['rating'] ) ); ?>">
                                    <div class="progress-bar" style="width: <?php echo esc_attr($percentage); ?>%;">
                                        <span><?php echo esc_attr($percentage); ?> %</span>
                                    </div>
                                    <span class="rx-tooltiptext"><?php echo sprintf( __('%d review(s)', 'reviewx' ), isset($rt['total_review'])?$rt['total_review']:0 ); ?></span>
                                </div>
                            </div>
                            <?php    
                            }
                        } 
				    ?>
				</div>
			</div>
		</div>
	</div>
</div>
