<?php
/**
Template Name: Homepage
 
 */

get_header();


?>

<div id="section">
				<section id="section-working" class="active" data-current="working|Working in the Middle East" data-previous="living|Living in the Middle East" data-next="about|Who Are Abdul Latif Jameel">
					<img src="assets/img/media/2.jpg" alt="" class="top-bg">
					<div class="b-top">
						<div class="top valign">
							<h1>Working in the Middle East</h1>
						</div>
					</div>
					<div class="block-2 block-content">
						<div class="section-slider-container">
							<div class="section-slider owl-carousel wow fadeIn" id="slider_working" data-wow-delay="1s">
								<?php
								$args = array( 
									   'post_type' => 'slider', 
									   'tax_query'=> array(
											'taxonomy' => 'slider',
											'terms' => array('Working in the Middle East'),
											'field' => 'slug',
										)
								);
								$loop = new WP_Query( $args );
								if( $loop->have_posts() ) {
												while ($loop->have_posts()) : $loop->the_post();
												
												?>
												<div>
																<span class="i-top"></span>
																<?php if ( has_post_thumbnail() ) {the_post_thumbnail('large'); }?>
																<span class="i-bottom"></span>
											    </div>
												<?php
												endwhile; 
																					
								}												
								wp_reset_query();
								?>
								
							</div>
							<div class="quote-container">
								<blockquote class="wow fadeIn" data-wow-delay=".6s">
									“It was refreshing to find new cultural experiences around almost every corner.”
								</blockquote>
								<p class="quote-desc wow fadeIn" data-wow-delay=".6s">David Bishop discussing Working in the Middle East.</p>
							</div>
						</div>
					</div>
					<div class="block-3 block-content" data-background-color="#c4c5c8" data-text-color="#fff">
						<div class="block-wrapper">
							<div class="content">
									<?php
												$args = array( 
													   'post_type' => 'post', 
													   'tax_query'=> array(
															'taxonomy' => 'post-category',
															'terms' => array('Working in the Middle East'),
															'field' => 'slug',
														)
												);
												$loop = new WP_Query( $args );
												if( $loop->have_posts() ) {
																while ($loop->have_posts()) : $loop->the_post();
																?>
																<h2 class="wow fadeInLeft" data-wow-delay="1s" data-wow-duration="2s"><?php echo the_title();?></h2>
																<?php
																echo the_content();
																endwhile; 
																									
												}												
												wp_reset_query();
												?>
							</div>
							<div class="img wow fadeInRight" data-wow-delay="1s" data-wow-duration="2s">
								<img src="<?php bloginfo('template_url'); ?>/assets/img/media/chairs.jpg" alt="">
							</div>
						</div>
					</div>
					<div class="block-4 block-content" data-background-color="#c4c5c8" data-text-color="#fff">
						<div class="block-wrapper" data-wow-delay="1s">
							<div class="content">
							<div class="testimonials owl-carousel">
									  <?php
										global $wpdb,$post; 
										$mtype = 'testimonial';
									
										$memberArgs=array(
												'post_type' => $mtype,
												'post_status' => 'publish',
												
													
										);
																			$my_query = null;
										
										$memberLoop = new WP_Query($memberArgs);
										if( $memberLoop->have_posts() ) {
								        $i=1;
										while ($memberLoop->have_posts()) : $memberLoop->the_post();
										?>
										<div class="testimonial">
								            <?php if($i==1){?>
											<div class="testimonial-content wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
											<?php }
											else {
												?>
								            <div class="testimonial-content">
								            <?php
											}
											?>
												<div class="inner">
																<div class="name"><?php echo get_post_meta(get_the_ID(), '_author', TRUE) ?></div>
																<div class="desc"><?php echo substr(get_the_excerpt(),0,200) ?></div>
																<a href="<?php echo get_post_meta(get_the_ID(), '_video_url', TRUE) ?>" class="button button-video">
																<i class="alj-play"></i>
																<span>
																<?php echo get_post_meta(get_the_ID(), '_link', TRUE) ?>
																</span>
																</a>
												</div>
											</div>
											<?php if($i==1){?>
											<div class="testimonial-img wow fadeInRight" data-wow-duration="1s" data-wow-delay="1s">
											<?php }
											else { ?>
											<div class="testimonial-img">
											<?php } ?>
											
												<?php if ( has_post_thumbnail() ) {the_post_thumbnail('large'); }?>
											</div>
								         </div>
												<?php
												$i++;
												endwhile; 
													
													wp_reset_query(); 
												}else{
												   echo "No Testimonial Listed";
												}
											
											?>
								
							</div>
						</div>
						</div>
					</div>
					<div class="block-5 block-content" data-background-color="#fff" data-text-color="#c4c5c8">
						<div class="content">
							<div class="block-tabs tabs-working">
								<ul>
									<li><a href="#tab-working-ksa">Saudi Arabia</a></li>
									<li><a href="#tab-working-uae">UAE</a></li>
								</ul>
								<div id="tab-working-ksa">
									<div class="tab-container">
										<div class="tab-inner wow fadeInLeft" data-wow-delay=".4s" data-wow-duration="2s">
											<h2>Working in Riyadh</h2>
											<p>Although many expatriates and their families love living in Saudi Arabia, it goes without saying that moving to Saudi Arabia is not for everyone. You must give careful consideration as to whether it is the right move for you. We hope this website will serve as a useful tool allowing you and your family to make your decision, prepare for your move and get the most out of your experience here.</p>
											<a href="#">Find more about Saudi Arabia</a>
										</div>
										<div class="tab-img wow fadeInRight" data-wow-delay=".4s" data-wow-duration="2s">
											<div class="img">
												<img src="<?php bloginfo('template_url'); ?>/assets/img/media/tabimg1.jpg" alt="">
											</div>
											<div class="img">
												<img src="<?php bloginfo('template_url'); ?>/assets/img/media/tabimg2.jpg" alt="">
											</div>
										</div>
									</div>
									<div class="tab-container">
										<div class="tab-inner">
											<div class="stats">
												<div class="stat-block stat-block-full">
													<h3>40+ Nationalities Employed</h3>
													<i class="alj-group"></i>
												</div>
												<div class="stat-block stat-block-full">
													<h3>Diverse Career Opportunities</h3>
													<i class="alj-hand"></i>
												</div>
												<div class="stat-block stat-block-full">
													<h3>Business Travel Allowance</h3>
													<i class="alj-travel"></i>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div id="tab-working-uae">
									<div class="tab-container">
										<div class="tab-inner">
											<h2>Working in Dubai</h2>
											<p>Working in the Middle East comes with many benefits and perks, tax free salaries,  great weather and the opportunity to travel world wide. At Abdul Latif Jameel we provide jobs that encourage skilled professionals to grow within our company to maximise their career potential. We reward our employees by providing the perfect professiaonl working enviroment.</p>
											<a href="#">Find more about UAE</a>
										</div>
										<div class="tab-img">
											<div class="img">
												<img src="<?php bloginfo('template_url'); ?>/assets/img/media/tabimg1.jpg" alt="">
											</div>
											<div class="img">
												<img src="<?php bloginfo('template_url'); ?>/assets/img/media/tabimg2.jpg" alt="">
											</div>
										</div>
									</div>
									<div class="tab-container">
										<div class="stats">
											<div class="stat-block stat-block-full">
												<h3>40+ Nationalities Employed</h3>
												<i class="alj-group"></i>
											</div>
											<div class="stat-block stat-block-full">
												<h3>Diverse Career Opportunities</h3>
												<i class="alj-hand"></i>
											</div>
											<div class="stat-block stat-block-full">
												<h3>Business Travel Allowance</h3>
												<i class="alj-travel"></i>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="block-6 block-content" data-background-color="#c4c5c8" data-text-color="#676668">
						<div class="content">
							<h3 class="wow fadeInUp" data-wow-delay=".75s" data-wow-duration="1s">Working in the Middle East can be truly rewarding</h3>
							<p class="wow fadeInUp" data-wow-delay="1s" data-wow-duration="1s">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur mollitia ea, iure expedita quae, dolor unde nesciunt qui, aliquam iusto error vel, accusantium aliquid enim animi voluptatum ratione dolores illo.
							</p>
							<div class="bottom-select-container wow fadeInUp" data-wow-delay="1.25s" data-wow-duration="1s">
								<select data-placeholder="Find Out More About The Region" class="select-bottom" name="countries" id="countries" style="width:100%">
									<option value=""></option>
									<option value="3">United Arab Emirates</option>
									<option value="4">Saudi Arabia</option>
								</select>
							</div>
							<a href="#" class="button button-bottom text-upper text-strong wow fadeInUp" data-wow-delay="1.35s" data-wow-duration="1s">View Our Job Opportunities</a>
							<div href="#" class="bottom-share share-working wow fadeInUp" data-wow-delay="1.50s" data-wow-duration="1s">
								<i class="alj-share"></i>
								<div class="share-expand">
									<a href="#">
										<i class="fa fa-linkedin"></i>
									</a>
									<a href="#">
										<i class="fa fa-facebook"></i>
									</a>
									<a href="#">
										<i class="fa fa-twitter"></i>
									</a>
									<a href="#">
										<i class="fa fa-google-plus"></i>
									</a>
								</div>
							</div>
						</div>
					</div>
				</section>
				<!-- Living -->
				<section id="section-living" class="hidden" data-current="living|Living in the Middle East" data-previous="about|Who Are Abdul Latif Jameel" data-next="working|Working in the Middle East">
					<img src="<?php bloginfo('template_url'); ?>/assets/img/media/1.jpg" alt="" class="top-bg">
					<div class="b-top">
						<div class="top valign">
							<h1>Living in the Middle East</h1>
						</div>
					</div>
					<div class="block-2 block-content">
						<div class="section-slider-container wow fadeInUpBig" data-wow-delay=".4s">
							<div class="section-slider owl-carousel" id="slider_living">
								<?php
								$args = array( 
									   'post_type' => 'slider', 
									   'tax_query'=> array(
											'taxonomy' => 'slider',
											'terms' => array('Living in the Middle East'),
											'field' => 'slug',
										)
								);
								$loop = new WP_Query( $args );
								if( $loop->have_posts() ) {
												while ($loop->have_posts()) : $loop->the_post();
												
												?>
												<div>
																<span class="i-top"></span>
																<?php if ( has_post_thumbnail() ) {the_post_thumbnail('large'); }?>
																<span class="i-bottom"></span>
											    </div>
												<?php
												endwhile; 
																					
								}												
								wp_reset_query();
								?>
							
							</div>
							<div class="quote-container">
								<blockquote>
									"It was refreshing to find new cultural experiences around almost every corner."
								</blockquote>
								<p class="quote-desc">David Bishop discussing Working in the Middle East.</p>
							</div>
						</div>
					</div>
					<div class="block-3 block-content" data-background-color="#558598" data-text-color="#fff">
						<div class="content wow fadeInLeft" data-wow-delay=".4s">
								<?php
												$args = array( 
													   'post_type' => 'post', 
													   'tax_query'=> array(
															'taxonomy' => 'post-category',
															'terms' => array('Working in the Middle East'),
															'field' => 'slug',
														)
												);
												$loop = new WP_Query( $args );
												if( $loop->have_posts() ) {
																while ($loop->have_posts()) : $loop->the_post();
																?>
																<h2 class="wow fadeInLeft" data-wow-delay="1s" data-wow-duration="2s"><?php echo the_title();?></h2>
																<?php
																echo the_content();
																endwhile; 
																									
												}												
												wp_reset_query();
												?>
						</div>
						<div class="img parallax image-background wow fadeInRight" data-wow-delay=".4s">
							<img src="assets/img/media/chairs.jpg" alt="">
						</div>
					</div>
					<div class="block-4 block-content" data-background-color="#558598" data-text-color="#fff">
						<div class="content">
							<div class="testimonials owl-carousel">
								  <?php
										global $wpdb,$post; 
										$mtype = 'testimonial';
										$memberArgs=array(
												'post_type' => $mtype,
												'post_status' => 'publish',
												'cat'=>'Working in the Middle East',
													
										);
										$my_query = null;
										$memberLoop = new WP_Query($memberArgs);
										if( $memberLoop->have_posts() ) {
								        $i=1;
										while ($memberLoop->have_posts()) : $memberLoop->the_post();
										?>
										<div class="testimonial">
								            <?php if($i==1){?>
											<div class="testimonial-content wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
											<?php }
											else {
												?>
								            <div class="testimonial-content">
								            <?php
											}
											?>
												<div class="inner">
																<div class="name"><?php echo get_post_meta(get_the_ID(), '_author', TRUE) ?></div>
																<div class="desc"><?php echo substr(get_the_excerpt(),0,200) ?></div>
																<a href="<?php echo get_post_meta(get_the_ID(), '_video_url', TRUE) ?>" class="button button-video">
																<i class="alj-play"></i>
																<span>
																<?php echo get_post_meta(get_the_ID(), '_link', TRUE) ?>
																</span>
																</a>
												</div>
											</div>
											<?php if($i==1){?>
											<div class="testimonial-img wow fadeInRight" data-wow-duration="1s" data-wow-delay="1s">
											<?php }
											else { ?>
											<div class="testimonial-img">
											<?php } ?>
											
												<?php if ( has_post_thumbnail() ) {the_post_thumbnail('large'); }?>
											</div>
								         </div>
												<?php
												$i++;
												endwhile; 
													
													wp_reset_query(); 
												}else{
												   echo "No Testimonial Listed";
												}
											
											?>
							
							</div>
						</div>
					</div>
					<div class="block-5 block-content" data-background-color="#fff" data-text-color="#c4c5c8">
						<div class="content wow fadeInLeft" data-wow-delay=".4s">
							<div class="block-tabs tabs-living">
								<ul>
									<li><a href="#tab-living-ksa">Saudi Arabia</a></li>
									<li><a href="#tab-living-uae">UAE</a></li>
								</ul>
								<div id="tab-living-ksa">
									<h2>Working in Riyadh</h2>
									<p>Although many expatriates and their families love living in Saudi Arabia, it goes without saying that moving to Saudi Arabia is not for everyone. You must give careful consideration as to whether it is the right move for you. We hope this website will serve as a useful tool allowing you and your family to make your decision, prepare for your move and get the most out of your experience here.</p>
									<div class="stats">
										<div class="stat-block stat-block-full">
											<h3>40+ Nationalities Employed</h3>
											<i class="alj-group"></i>
										</div>
										<div class="stat-block stat-block-full">
											<h3>Diverse Career Opportunities</h3>
											<i class="alj-hand"></i>
										</div>
										<div class="stat-block stat-block-full">
											<h3>Business Travel Allowance</h3>
											<i class="alj-travel"></i>
										</div>
									</div>
								</div>
								<div id="tab-living-uae">
									<h2>Working in Dubai</h2>
									<p>Working in the Middle East comes with many benefits and perks, tax free salaries,  great weather and the opportunity to travel world wide. At Abdul Latif Jameel we provide jobs that encourage skilled professionals to grow within our company to maximise their career potential. We reward our employees by providing the perfect professiaonl working enviroment.</p>
									<div class="stats">
										<div class="stat-block stat-block-full">
											<h3>40+ Nationalities Employed</h3>
											<i class="alj-group"></i>
										</div>
										<div class="stat-block stat-block-full">
											<h3>Diverse Career Opportunities</h3>
											<i class="alj-hand"></i>
										</div>
										<div class="stat-block stat-block-full">
											<h3>Business Travel Allowance</h3>
											<i class="alj-travel"></i>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="img parallax image-background wow fadeInRight" data-wow-delay=".4s">
							<img src="<?php bloginfo('template_url'); ?>/assets/img/media/chairs.jpg" alt="">
						</div>
					</div>
					<div class="block-6 block-content" data-background-color="#558598" data-text-color="#fff">
						<div class="content wow fadeInLeft" data-wow-delay=".4s">
							<h3>Living in the Middle East can be truly rewarding</h3>
							<p>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur mollitia ea, iure expedita quae, dolor unde nesciunt qui, aliquam iusto error vel, accusantium aliquid enim animi voluptatum ratione dolores illo.
							</p>
							<select class="select-bottom" name="countries" id="countries" style="width:300px;">
								<option value="">Find Out More About The Region</option>
								<option value="0">Egypt</option>
								<option value="1">Morocco</option>
								<option value="2">Qatar</option>
								<option value="3">United Arab Emirates</option>
								<option value="4">Saudi Arabia</option>
							</select>
							<a href="#" class="button button-bottom text-upper text-strong">View Our Job Opportunities</a>
							<div href="#" class="bottom-share share-living">
								<i class="alj-share"></i>
								<div class="share-expand">
									<a href="#">
										<i class="fa fa-linkedin"></i>
									</a>
									<a href="#">
										<i class="fa fa-facebook"></i>
									</a>
									<a href="#">
										<i class="fa fa-twitter"></i>
									</a>
									<a href="#">
										<i class="fa fa-google-plus"></i>
									</a>
								</div>
							</div>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
						</div>
					</div>
				</section>
				<section id="section-about" class="hidden" data-current="about|Who Are Abdul Latif Jameel" data-previous="working|Working in the Middle East" data-next="living|Living in the Middle East">
					<img src="<?php bloginfo('template_url'); ?>/assets/img/media/3.jpg" alt="" class="top-bg">
					<div class="b-top">
						<div class="top valign">
							<h1>Who Are Abdul Latif Jameel</h1>
						</div>
					</div>
					<div class="block-2 block-content">
						<div class="section-slider-container wow fadeInUpBig" data-wow-delay=".4s">
							<div class="section-slider owl-carousel" id="slider_living">
								<?php
								$args = array( 
									   'post_type' => 'slider', 
									   'tax_query'=> array(
											'taxonomy' => 'slider',
											'terms' => array('Who Are Abdul Latif Jameel'),
											'field' => 'slug',
										)
								);
								$loop = new WP_Query( $args );
								if( $loop->have_posts() ) {
												while ($loop->have_posts()) : $loop->the_post();
												
												?>
												<div>
																<span class="i-top"></span>
																<?php if ( has_post_thumbnail() ) {the_post_thumbnail('large'); }?>
																<span class="i-bottom"></span>
											    </div>
												<?php
												endwhile; 
																					
								}												
								wp_reset_query();
								?>
								
							</div>
							<div class="quote-container">
								<blockquote>
									"It was refreshing to find new cultural experiences around almost every corner."
								</blockquote>
								<p class="quote-desc">David Bishop discussing Working in the Middle East.</p>
							</div>
						</div>
					</div>
					<div class="block-3 block-content" data-background-color="#96B5AD" data-text-color="#fff">
						<div class="content wow fadeInLeft" data-wow-delay=".4s">
								<?php
												$args = array( 
													   'post_type' => 'post', 
													   'tax_query'=> array(
															'taxonomy' => 'post-category',
															'terms' => array('Working in the Middle East'),
															'field' => 'slug',
														)
												);
												$loop = new WP_Query( $args );
												if( $loop->have_posts() ) {
																while ($loop->have_posts()) : $loop->the_post();
																?>
																<h2 class="wow fadeInLeft" data-wow-delay="1s" data-wow-duration="2s"><?php echo the_title();?></h2>
																<?php
																echo the_content();
																endwhile; 
																									
												}												
												wp_reset_query();
								?>
						</div>
						<div class="img parallax image-background wow fadeInRight" data-wow-delay=".4s">
							<img src="<?php bloginfo('template_url'); ?>/assets/img/media/chairs.jpg" alt="">
						</div>
					</div>
					<div class="block-4 block-content" data-background-color="#96B5AD" data-text-color="#fff">
						<div class="content">
							<div class="testimonials owl-carousel">
								  <?php
										global $wpdb,$post; 
										$mtype = 'testimonial';
										$memberArgs=array(
												'post_type' => $mtype,
												'post_status' => 'publish',
												'cat'=>'Working in the Middle East',
													
										);
										$my_query = null;
										$memberLoop = new WP_Query($memberArgs);
										if( $memberLoop->have_posts() ) {
								        $i=1;
										while ($memberLoop->have_posts()) : $memberLoop->the_post();
										?>
										<div class="testimonial">
								            <?php if($i==1){?>
											<div class="testimonial-content wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
											<?php }
											else {
												?>
								            <div class="testimonial-content">
								            <?php
											}
											?>
												<div class="inner">
																<div class="name"><?php echo get_post_meta(get_the_ID(), '_author', TRUE) ?></div>
																<div class="desc"><?php echo substr(get_the_excerpt(),0,200) ?></div>
																<a href="<?php echo get_post_meta(get_the_ID(), '_video_url', TRUE) ?>" class="button button-video">
																<i class="alj-play"></i>
																<span>
																<?php echo get_post_meta(get_the_ID(), '_link', TRUE) ?>
																</span>
																</a>
												</div>
											</div>
											<?php if($i==1){?>
											<div class="testimonial-img wow fadeInRight" data-wow-duration="1s" data-wow-delay="1s">
											<?php }
											else { ?>
											<div class="testimonial-img">
											<?php } ?>
											
												<?php if ( has_post_thumbnail() ) {the_post_thumbnail('large'); }?>
											</div>
								         </div>
												<?php
												$i++;
												endwhile; 
													
													wp_reset_query(); 
												}else{
												   echo "No Testimonial Listed";
												}
											
											?>
							</div>
						</div>
					</div>
					<div class="block-5 block-content" data-background-color="#fff" data-text-color="#636264">
						<div class="content wow fadeInLeft" data-wow-delay=".4s">
							<div class="block-tabs tabs-about">
								<ul>
									<li><a href="#tab-about-ksa">Saudi Arabia</a></li>
									<li><a href="#tab-about-uae">UAE</a></li>
								</ul>
								<div id="tab-about-ksa">
									<h2>Our Ryiadh Office</h2>
									<p>Although many expatriates and their families love living in Saudi Arabia, it goes without saying that moving to Saudi Arabia is not for everyone. You must give careful consideration as to whether it is the right move for you. We hope this website will serve as a useful tool allowing you and your family to make your decision, prepare for your move and get the most out of your experience here.</p>
									<div class="stats">
										<div class="stat-block stat-block-full">
											<h3>40+ Nationalities Employed</h3>
											<i class="alj-group"></i>
										</div>
										<div class="stat-block stat-block-full">
											<h3>Diverse Career Opportunities</h3>
											<i class="alj-hand"></i>
										</div>
										<div class="stat-block stat-block-full">
											<h3>Business Travel Allowance</h3>
											<i class="alj-travel"></i>
										</div>
									</div>
								</div>
								<div id="tab-about-uae">
									<h2>Our Dubai Office</h2>
									<p>Working in the Middle East comes with many benefits and perks, tax free salaries,  great weather and the opportunity to travel world wide. At Abdul Latif Jameel we provide jobs that encourage skilled professionals to grow within our company to maximise their career potential. We reward our employees by providing the perfect professiaonl working enviroment.</p>
									<div class="stats">
										<div class="stat-block stat-block-full">
											<h3>40+ Nationalities Employed</h3>
											<i class="alj-group"></i>
										</div>
										<div class="stat-block stat-block-full">
											<h3>Diverse Career Opportunities</h3>
											<i class="alj-hand"></i>
										</div>
										<div class="stat-block stat-block-full">
											<h3>Business Travel Allowance</h3>
											<i class="alj-travel"></i>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="img parallax image-background wow fadeInRight" data-wow-delay=".4s">
							<img src="<?php bloginfo('template_url'); ?>/assets/img/media/chairs.jpg" alt="">
						</div>
					</div>
					<div class="block-6 block-content" data-background-color="#96B5AD" data-text-color="#636264">
						<div class="content">
							<h3 class="wow fadeInUp" data-wow-delay=".4s">At Abdul Latif Jameel you can realise your career potential</h3>
							<p class="wow fadeInUp" data-wow-delay=".4s">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur mollitia ea, iure expedita quae, dolor unde nesciunt qui, aliquam iusto error vel, accusantium aliquid enim animi voluptatum ratione dolores illo.
							</p>
							<select class="select-bottom" name="countries" id="countries" style="width:300px;">
								<option value="">Find Out More About The Region</option>
								<option value="0">Egypt</option>
								<option value="1">Morocco</option>
								<option value="2">Qatar</option>
								<option value="3">United Arab Emirates</option>
								<option value="4">Saudi Arabia</option>
							</select>
							<a href="#" class="button button-bottom text-upper text-strong">View Our Job Opportunities</a>
							<div href="#" class="bottom-share share-about">
								<i class="alj-share"></i>
								<div class="share-expand">
									<a href="#">
										<i class="fa fa-linkedin"></i>
									</a>
									<a href="#">
										<i class="fa fa-facebook"></i>
									</a>
									<a href="#">
										<i class="fa fa-twitter"></i>
									</a>
									<a href="#">
										<i class="fa fa-google-plus"></i>
									</a>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>

<?php get_footer(); ?>
