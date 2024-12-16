import { __ } from '@wordpress/i18n';
import { registerBlockStyle } from '@wordpress/blocks';

registerBlockStyle('core/image', [
	{
		name: 'tilt',
		label: __('Tilt', 'fbv2-theme'),
	},
]);
