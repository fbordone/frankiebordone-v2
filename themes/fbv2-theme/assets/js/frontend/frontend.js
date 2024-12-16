import '../../css/frontend/style.css';

import Navigation from './components/navigation';

function calculateScrollbarWidth() {
	document.documentElement.style.setProperty(
		'--scrollbar-width',
		`${window.innerWidth - document.documentElement.clientWidth}px`,
	);
}

function calculateScrollMarginTop() {
	const header = document.querySelector('.site-header');
	const headerHeight = header.offsetHeight;
	const scrollMarginTop = headerHeight - 1;

	document.documentElement.style.setProperty('--scroll-margin-top', `${scrollMarginTop}px`);
}

document.addEventListener('DOMContentLoaded', () => {
	// Navigation
	Navigation();

	// recalculate on resize
	window.addEventListener('resize', calculateScrollbarWidth, false);
	window.addEventListener('resize', calculateScrollMarginTop, false);

	// recalculate on dom load
	document.addEventListener('DOMContentLoaded', calculateScrollbarWidth, false);
	document.addEventListener('DOMContentLoaded', calculateScrollMarginTop, false);

	// recalculate on load (assets loaded as well)
	window.addEventListener('load', calculateScrollbarWidth);
	window.addEventListener('load', calculateScrollMarginTop);
});
