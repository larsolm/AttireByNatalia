<?php
/**
 * Template Name: Shop My Instagram
 */
?>

<?php get_header(); ?>

<div class="container p-3">
	<div class="row">
		<div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12">
			<div id="ltkwidget-version-two319648762" data-appid="319648762" class="ltkwidget-version-two">
				<script>var rsLTKLoadApp="0",rsLTKPassedAppID="319648762";</script>
				<script type="text/javascript" src="https://widgets-static.rewardstyle.com/widgets2_0/client/pub/ltkwidget/ltkwidget.js"></script>
				<div widget-dashboard-settings="" data-appid="319648762" data-userid="318818" data-rows="10" data-cols="4" data-showframe="true" data-padding="4" data-profileid="a8affa08-d34a-11e9-8693-065b812fc28e">
					<div class="rs-ltkwidget-container">
						<div ui-view=""></div>
					</div>
				</div>
			</div>
		</div>

		<div class="right-column col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12">
			<?php sidebar(false); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>