function Navigation() {
	const menuToggle = document.querySelector('.site-header__navigation-toggle');
	const mobileOverlay = document.querySelector('.site-header__mobile-overlay');

	function toggleMenu() {
		// Check the current state of the aria-expanded attribute
		const isExpanded = menuToggle.getAttribute('aria-expanded') === 'true';

		// Toggle the aria-expanded attribute
		menuToggle.setAttribute('aria-expanded', !isExpanded);

		// Toggle the visibility of the mobile overlay
		if (mobileOverlay) {
			mobileOverlay.classList.toggle('is-visible', !isExpanded);
		}
	}

	function init() {
		if (menuToggle) {
			menuToggle.addEventListener('click', toggleMenu);
		}
	}

	init();
}

export default Navigation;
