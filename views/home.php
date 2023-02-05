<section class="block-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-lg-9">
				<div class=" watch-post mb-30">
					<div class="ts-heading-item">
						<h2 class="ts-title">
							<span>Berita Populer</span>
						</h2>
					</div>
					<div class="row">
						<div class="col-lg-7">
							<?php foreach ($top as $r) { ?>
								<div class="tab-content featured-post" id="nav-tabContent">
									<div class="tab-pane ts-overlay-style fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
										<div class="item" style="background-image: url(<?= base_url('berkas/berita/') . $r->foto_berita ?>)">

											<a class="post-cat ts-orange-bg" href="#"> <?= $r->nama_kat ?></a>

											<div class="overlay-post-content">
												<div class="post-content">
													<h3 class="post-title md">
														<a href="<?= site_url('home/berita/post/') . $r->slug ?>"> <?= $r->judul ?></a>
													</h3>
													<ul class="post-meta-info">

														<li>
															<i class="fa fa-clock-o"></i>
															<?= $r->upload_at ?>
														</li>
														<li class="active">
															<i class="fa fa-eye"></i>
															<?= $r->visitor ?>
														</li>
													</ul>
												</div>
											</div>
											<!-- overlay post content-->
										</div>
										<!-- item end-->
									</div>
									<!--tab-pane ts-overlay-style end-->

									<!--tab-pane ts-overlay-style end-->
								</div><?php } ?>

						</div>
						<!-- col end-->

						<div class="col-lg-5">
							<div class="nav post-list-box" id="nav-tab" role="tablist">
								<?php foreach ($po as $r) { ?> <a class="nav-item nav-link active" href="<?= site_url('home/berita/post/') . $r->slug ?>" aria-selected="true">
										<div class="post-content media">
											<img class="d-flex" src="<?= base_url('berkas/berita/') . $r->foto_berita ?>" alt="">
											<div class="media-body align-self-center">
												<h4 class="post-title">
													<?= $r->judul ?>
												</h4>
												<span class="post-date-info">
													<i class="fa fa-clock-o"></i>
													<?= $r->upload_at ?>
												</span>
											</div>
										</div>
									</a><?php } ?>
								<!-- nav item end-->

								<!-- nav item end-->
							</div>
							<!-- watch list post end-->
						</div>
						<!-- col end -->
					</div>
					<!-- row end-->
				</div>
				<!-- ts-populer-post-box end-->
				<div class="ts-heading-item">
					<h2 class="ts-title">
						<span>Semua Berita</span>
					</h2>
				</div>
				<div class="row">
					<?php foreach ($blmt as $r) { ?>
						<div class="col-lg-4 col-md-6">
							<div class="ts-grid-box ts-grid-content">
								<a class="post-cat ts-orange-bg" href="<?= site_url('home/berita/post/') . $r->slug ?>"><?= $r->nama_kat ?></a>
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
							</div>
							<!-- ts grid box-->
						</div>
					<?php } ?>
				</div>

				<!-- row end-->


			</div>
			<!-- col end-->
			<div class="col-lg-3">
				<div class="right-sidebar-1">
					<div class="widgets widgets-item">
						<h3 class="widget-title">
							<span>Ikuti kami</span>
						</h3>
						<?php foreach ($opd as $r) { ?>
							<ul class="ts-block-social-list">
								<li class="ts-facebook">
									<a href="<?= $r->facebook ?>">
										<i class="fa fa-facebook"></i>
										<b>facebook </b>

									</a>

								</li>
								<li class="ts-youtube">
									<a href="<?= $r->youtube ?>">
										<i class="fa fa-youtube"></i>
										<b>Youtube </b>

									</a>

								</li>
								<li class="ts-twitter">
									<a href="<?= $r->twiter ?>">
										<i class="fa fa-twitter"></i>
										<b>Twitter </b>

									</a>

								</li>
								<li class="ts-pinterest">
									<a href="<?= $r->instagram ?>">
										<i class="fa fa-instagram"></i>
										<b>Instagram </b>

									</a>

								</li>




							</ul><?php } ?>
					</div>
					<!-- end-->
					<div class="widgets widgets-item widget-banner">
						<a href="https://pekanbaru.go.id" target="_blank">
							<img class="img-fluid" src="<?= base_url('assets/vendor/'); ?>images/banner/pkugo.jpg" alt="">
						</a>
					</div>
					<!-- widgets end-->
					<div class="widgets widgets-item ts-grid-item  widgets-populer-post">
						<h3 class="widget-title">
							<span>Berita Terbaru</span>
						</h3>
						<div class="ts-overlay-style">
							<div class="item">

								<div class="overlay-post-content">
									<div class="post-content">
										<h3 class="post-title">
											<a href="#"></a>
										</h3>
										<ul class="post-meta-info">
											<li>
												<i class="fa fa-clock-o"></i>

											</li>
										</ul>
									</div>
								</div>


							</div>
						</div>
						<!-- ts-overlay-style  end-->
						<?php foreach ($baru as $r) { ?>
							<div class="post-content media">
								<img class="d-flex sidebar-img" src="<?= base_url('berkas/berita/') . $r->foto_berita ?>" alt="">
								<div class="media-body align-self-center">
									<h4 class="post-title">
										<a href="<?= site_url('home/berita/post/') . $r->slug ?>"><?= $r->judul ?> </a>
									</h4>
								</div>
							</div> <?php } ?>
						<!-- post content end-->

						<!-- post content end-->
					</div>
					<!-- widgets end-->
					<div class="widgets widgets-item">
						<h3 class="widget-title">
							<span>Kategori berita</span>
						</h3>
						<ul class="ts-block-social-list">
							<?php foreach ($kb as $r) { ?>
								<li class="ts-google-plus">
									<a href="">

										<b><?= $r->nama_kat ?> </b>

									</a>

								</li> <?php } ?>



						</ul>
					</div>
				</div>

			</div>
		</div>
	</div>
</section>

<section class="block-wrapper mb-45">
	<div class="container">
		<div class="ts-grid-box ts-grid-box-heighlight">
			<h2 class="ts-title">Galeri Kegiatan</h2>

			<div class="owl-carousel" id="more-news-slider">
				<?php foreach ($gk as $r) { ?>
					<div class="ts-overlay-style">
						<div class="item">
							<div class="ts-post-thumb">
								<a href="#">
									<img height="250" src="<?= base_url('berkas/galery/') . $r->file; ?>" alt="">
								</a>
							</div>
							<a class="post-cat ts-green-bg" href="#"><?= $r->nama_galkat; ?></a>
							<div class="overlay-post-content">
								<div class="post-content">
									<h3 class="post-title">
										<a href="#"><?= $r->ket; ?></a>
									</h3>
									<span class="post-date-info">
										<i class="fa fa-clock-o"></i>
										<?= $r->tgl_upload; ?>
									</span>
								</div>
							</div>
						</div>
						<!-- end item-->
					</div> <?php } ?>

				<!-- ts-overlay-style end-->
			</div>
			<!-- most-populers end-->
		</div>
		<!-- ts-populer-post-box end-->
	</div>
	<!-- container end-->
</section>

<section class="block-wrapper mb-30 hot-topics-heighlight">
	<div class="container">

		<div class="ts-grid-box">
			<h2 class="ts-title">Data Publikasi</h2>

			<div class="owl-carousel" id="hot-topics-slider">
				<?php foreach ($pk as $r) { ?>
					<div class="item ts-pink-light-heighlight heighlight">
						<div class="ts-post-thumb">
							<a href="<?= site_url('berkas/filepub/') . $r->file ?>" target=" _blank">
								<img height="200" src="<?= base_url('berkas/icon/pdff.png'); ?>" alt="">
							</a>
							<a class="post-cat" href="#"><?= $r->nama_kat ?></a>
						</div>

						<div class="post-content">

							<h3 class="post-title">
								<a href="<?= site_url('berkas/filepub/') . $r->file ?>" target=" _blank"><?= $r->nama_pub ?></a>
							</h3>
							<span class="post-date-info">
								<i class="fa fa-clock-o"></i>
								<?= $r->tgl_upload ?>
							</span>
						</div>
					</div>
				<?php } ?>


				<!-- ts-grid-box end-->
			</div>
			<!-- most-populers end-->
		</div>
		<!-- ts-populer-post-box end-->
	</div>
	<!-- container end-->
</section>