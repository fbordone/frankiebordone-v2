/**
 * WordPress dependencies
 */
import { useBlockProps } from '@wordpress/block-editor';
import ServerSideRender from '@wordpress/server-side-render';

const BlockEdit = ({ attributes }) => {
	const blockProps = useBlockProps();

	return (
		<div {...blockProps}>
			<ServerSideRender block="fbv2-theme/portfolio-showcase" attributes={attributes} />
		</div>
	);
};

export default BlockEdit;
