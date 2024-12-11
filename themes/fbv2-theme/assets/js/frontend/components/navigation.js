function Navigation() {
	const menuToggle = document.querySelector('.site-header__navigation-toggle');
	const mobileNav = document.querySelector('.site-header__nav-mobile');

	let scrollPosition = 0;

	/**
	 * Toggles the body lock to prevent or allow scrolling.
	 *
	 * @param {boolean} lock - Indicates whether to lock or unlock the body scroll.
	 */
	function toggleBodyLock(lock) {
		if (lock) {
			// Save the current scroll position
			scrollPosition = window.scrollY;

			// Lock the body and preserve the scroll position
			document.body.style.position = 'fixed';
			document.body.style.top = `-${scrollPosition}px`;
			document.body.style.width = '100%';
		} else {
			// Restore the scroll position
			document.body.style.position = '';
			document.body.style.top = '';
			document.body.style.width = '';
			window.scrollTo(0, scrollPosition);
		}
	}

	/**
	 * Toggles the visibility of the mobile menu and updates attributes/styles accordingly.
	 */
	function toggleMenu() {
		const isExpanded = menuToggle.getAttribute('aria-expanded') === 'true';
		menuToggle.setAttribute('aria-expanded', !isExpanded);

		// Toggle the mobile nav visibility class
		mobileNav.classList.toggle('site-header__nav-mobile--show');

		// Lock or unlock body scroll based on menu visibility
		toggleBodyLock(!isExpanded);
	}

	/**
	 * Initializes the navigation functionality.
	 */
	function init() {
		if (menuToggle && mobileNav) {
			menuToggle.addEventListener('click', toggleMenu);
		}
	}

	init();
}

export default Navigation;
