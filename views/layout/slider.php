	<!-- block wrapper start-->
	<section class="block-wrapper mt-15">
		<div class="container">
			<div class="row post-style-3">
				<div class="col-lg-9 col-md-12">
					<div id="featured-slider" class="owl-carousel ts-overlay-style ts-featured">


						<?php foreach ($sli as $r) { ?>
							<div class="item" style="background-image:url(<?= base_url('berkas/slide/') . $r->slider1 ?>)">

								<div class="overlay-post-content">
									<div class="post-content">
										<h2 class="post-title lg">
											<a href="#"></a>
										</h2>

									</div>
								</div>
								<!--/ Featured post end -->

							</div>
							<div class="item" style="background-image:url(<?= base_url('berkas/slide/') . $r->slider2 ?>)">

								<div class="overlay-post-content">
									<div class="post-content">
										<h2 class="post-title lg">
											<a href="#"></a>
										</h2>

									</div>
								</div>
								<!--/ Featured post end -->

							</div>
							<div class="item" style="background-image:url(<?= base_url('berkas/slide/') . $r->slider3 ?>)">

								<div class="overlay-post-content">
									<div class="post-content">
										<h2 class="post-title lg">
											<a href="#"></a>
										</h2>

									</div>
								</div>
								<!--/ Featured post end -->

							</div>
							<div class="item" style="background-image:url(<?= base_url('berkas/slide/') . $r->slider4 ?>)">

								<div class="overlay-post-content">
									<div class="post-content">
										<h2 class="post-title lg">
											<a href="#"></a>
										</h2>

									</div>
								</div>
								<!--/ Featured post end -->

							</div>

						<?php } ?>

						<!-- Item 1 end -->

						<!-- Item 3 end -->
					</div>
					<!-- Featured owl carousel end-->
				</div>
				<div class="col-lg-3">
					<?php foreach ($new as $r) { ?>
						<!-- ts single post item end-->
						<div class="ts-grid-box ts-grid-content">
							<a class="post-cat ts-pink-bg" href="#"><?= $r->nama_kat ?></a>
							<div class="ts-post-thumb">
								<a href="<?= site_url('home/berita/post/') . $r->slug ?>">
									<img class="img-fluid" src="<?= base_url('berkas/berita/') . $r->foto_berita ?>" alt="">
								</a>
							</div>
							<div class="post-content">
								<h3 class="post-title">
									<a href="<?= site_url('home/berita/post/') . $r->slug ?>"><?= $r->judul ?></a>
								</h3>
								<span class="post-date-info">
									<i class="fa fa-clock-o"></i>
									<?= $r->upload_at ?>
								</span>
							</div>
						</div><?php } ?>
					<!-- ts single post item end-->
				</div>
				<!-- col end-->

			</div>
			<!-- row end-->
		</div>
		<!-- container end-->
	</section>