function Navigation() {
	const menuToggle = document.querySelector('.site-header__navigation-toggle');
	const mobileNav = document.querySelector('.site-header__nav-mobile');
	const menuLinks = document.querySelectorAll('[data-scroll]');
	const header = document.querySelector('.site-header');

	/**
	 * Toggles the visibility of the mobile menu and updates attributes/styles accordingly.
	 */
	function toggleMenu() {
		const isExpanded = menuToggle.getAttribute('aria-expanded') === 'true';
		menuToggle.setAttribute('aria-expanded', !isExpanded);

		// Toggle the mobile nav visibility class
		mobileNav.classList.toggle('site-header__nav-mobile--show');
	}

	/**
	 * Smooth scrolls to the target section (for both header and footer)
	 *
	 * @param {Event} event - The click event.
	 */
	function handleSmoothScroll(event) {
		event.preventDefault();

		const anchor = event.target.closest('a');

		if (anchor && anchor.getAttribute('href')) {
			const targetId = anchor.getAttribute('href').slice(1);
			const targetElement = document.getElementById(targetId);

			if (targetElement) {
				const headerHeight = header.offsetHeight;
				const targetPosition =
					targetElement.getBoundingClientRect().top + window.scrollY - headerHeight;

				window.scrollTo({
					top: targetPosition,
					behavior: 'smooth',
				});
			}
		}

		// Close the mobile menu if it's open
		if (menuToggle.getAttribute('aria-expanded') === 'true') {
			toggleMenu();
		}
	}

	/**
	 * Initializes the navigation functionality.
	 */
	function init() {
		if (menuToggle && mobileNav) {
			menuToggle.addEventListener('click', toggleMenu);
		}

		if (menuLinks) {
			menuLinks.forEach((link) => link.addEventListener('click', handleSmoothScroll));
		}
	}

	init();
}

export default Navigation;
