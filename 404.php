<?php get_template_part('templates/page', 'header'); ?>

		<main>

			<section id="page-hero">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1 u-pv80 u-aligncenter">
						<h3 class="u-mb20">OOPS...!</h3>
						<blockquote>The page you are trying to reach<br /> does not exist (anymore)...</blockquote>
					</div>
				</div>
			</section>

			<section id="page-members" class="u-pv60">
				<div class="row u-aligncenter u-mv40">
					<div class="col-xs-12">
						<h4>I'm afraid there's only one solution in this case:</h4>
						<a href="<?php echo home_url('/'); ?>" class="btn btn-primary btn-lg u-mt40">
							<i class="ion ion-home u-mr20"></i>
							return to the homepage
						</a>
					</div>
				</div>
				<div class="row u-aligncenter u-mt80">
					<div class="col-xs-12">
						<p><small>If this problem persists, you can always drop us a line:</small></p>
						<a href="mailto:info@yazane.com.tr" class="btn u-mt10">
							<i class="ion ion-email u-mr20"></i>
							info@yazane.com.tr
						</a>
					</div>
				</div>
			</section>

		</main>
