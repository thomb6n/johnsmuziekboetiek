<?php
if ( ! is_user_logged_in() ) {
	return;
}

$current_user    = wp_get_current_user();
$user_first_name = $current_user->first_name;
?>
<section class="welcome-back">
	<div class="container">
		<?php
		if ( $user_first_name ) {
			printf(
				'<p class="greeting">%s, %s. %s</p>',
				__( 'Welcome back', 'toms' ),
				$user_first_name,
				__( 'Good to see you again!', 'toms' )
			);
		} else {
			printf(
				'<p class="greeting">%s. $s</p>',
				__( 'Welcome back', 'toms' ),
				__( 'Good to see you again!', 'toms' )
			);
		}
		?>
	</div>
</section>
