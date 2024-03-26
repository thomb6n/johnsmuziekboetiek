document.addEventListener('facetwp-loaded', () => {
	let timeout;
	let wait = 1000;
	let searchInputs = document.querySelectorAll('.facetwp-type-search');

	searchInputs.forEach((input) => {
		// Check if FacetWP has auto refresh enabled, otherwise continue loop (return is used in JS)
		if ( FWP.settings[input.dataset.name].auto_refresh && FWP.settings[input.dataset.name].auto_refresh !== 'yes' ) {
			return;
		}
		const inputField = input.querySelector('input');

		// On keyup of search inputs, temporarily disable auto refresh
		inputField.addEventListener('keyup', () => {
			FWP.auto_refresh = false;

			if ( inputField.value ) {
				clearTimeout(timeout);

				// Start timeout to create time for user to type and manually run FacetWP refresh
				timeout = setTimeout(() => {
					FWP.auto_refresh = true;
					FWP.refresh();
				}, wait);
			}
		});
	});
});
