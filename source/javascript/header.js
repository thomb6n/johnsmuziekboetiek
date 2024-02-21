document.addEventListener("DOMContentLoaded", () => {
	const body = document.body;
	const toggleButton = document.querySelectorAll(".toggle-offcanvas");
	const offCanvasAll = document.querySelectorAll(".offcanvas");

	toggleButton.forEach((button) => {
		const offCanvas = document.querySelector(
			'[data-toggler="' + button.dataset.toggle + '"]'
		);
		console.log(offCanvas);

		// Remove inline display: none to prevent offcanvas showing up on page load
		offCanvas.removeAttribute("style");

		button.addEventListener("click", () => {
			offCanvas.classList.toggle("closed");
			offCanvas.classList.toggle("opened");
			button.classList.toggle("toggle-open");
			body.classList.toggle("offcanvas-open");
		});
	});

	offCanvasAll.forEach((offCanvas) => {
		const subMenuParent = offCanvas.querySelectorAll(".menu-item-has-children");

		subMenuParent.forEach((parent) => {
			if (!parent.querySelector(".fa-chevron-down")) {
				return;
			}
			parent
				.querySelector(".fa-chevron-down")
				.addEventListener("click", (e) => {
					const subMenu = parent.querySelector(".sub-menu");

					e.preventDefault();
					parent.classList.toggle("open");

					subMenu.classList.toggle("opened");
				});
		});
	});
});
