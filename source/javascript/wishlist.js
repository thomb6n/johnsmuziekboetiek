const addToWishlistButtons = document.querySelectorAll(".add-to-wishlist");

addToWishlistButtons.forEach((button) => {
	button.addEventListener("click", async (e) => {
		e.preventDefault();
		const productId = button.dataset.productId;
		try {
			const response = await fetch(toms.ajax_url, {
				method: "POST",
				headers: {
					"Content-Type": "application/x-www-form-urlencoded",
				},
				body: `action=add_to_wishlist&product_id=${productId}`,
			});
			if (!response.ok) {
				throw new Error(`Request failed with status ${response.status}`);
			}
			await response.text();
			location.reload();
		} catch (error) {
			console.error(error);
		}
	});
});

const removeFromWishlistButtons = document.querySelectorAll(".remove-from-wishlist");

removeFromWishlistButtons.forEach((button) => {
	button.addEventListener("click", async (e) => {
		e.preventDefault();
		const productId = button.dataset.productId;
		try {
			const response = await fetch(toms.ajax_url, {
				method: "POST",
				headers: {
					"Content-Type": "application/x-www-form-urlencoded",
				},
				body: `action=remove_from_wishlist&product_id=${productId}`,
			});
			if (!response.ok) {
				throw new Error(`Request failed with status ${response.status}`);
			}
			await response.text();
			location.reload();
		} catch (error) {
			console.error(error);
		}
	});
});
