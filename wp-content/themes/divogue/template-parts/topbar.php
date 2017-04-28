<?php
// Get Content
$topbar_left = is_active_sidebar( 'hoot-topbar-left' );
$topbar_right = is_active_sidebar( 'hoot-topbar-right' );

// Template modification Hook
do_action( 'hoot_template_before_topbar', $topbar_left, $topbar_right );

// Display Topbar
if ( !empty( $topbar_left ) || !empty( $topbar_right ) ) :

	?>
	<div class="topbar-wrap">
	<div <?php hybridextend_attr( 'topbar', '', 'inline_nav grid-stretch' ); ?>>
		<div class="grid">
			<div class="grid-span-12">

				<div class="topbar-inner table">
					<?php if ( $topbar_left ): ?>
						<div id="topbar-left" class="table-cell-mid">
							<?php dynamic_sidebar( 'hoot-topbar-left' ); ?>
						</div>
					<?php endif; ?>

					<?php if ( $topbar_right ): ?>
						<div id="topbar-right" class="table-cell-mid">
							<div class="topbar-right-inner">
								<?php
								dynamic_sidebar( 'hoot-topbar-right' );
								?>
							</div>
						</div>
					<?php endif; ?>
				</div>

			</div>
		</div>
	</div>
	</div>
	<?php

endif;

// Template modification Hook
do_action( 'hoot_template_after_topbar', $topbar_left, $topbar_right );