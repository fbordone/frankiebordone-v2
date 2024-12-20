/**
 * WordPress dependencies
 */
import { __ } from '@wordpress/i18n';
import { RichText, useBlockProps } from '@wordpress/block-editor';

const BlockEdit = (props) => {
	const { attributes, setAttributes } = props;
	const { numberPanel, title, description } = attributes;

	const blockProps = useBlockProps();

	return (
		<div {...blockProps}>
			<div className="wp-block-fbv2-theme-feature-panel__header">
				<RichText
					className="wp-block-fbv2-theme-feature-panel__number"
					tagName="span"
					placeholder={__('Enter a number...', 'fbv2-theme')}
					value={numberPanel}
					onChange={(value) => setAttributes({ numberPanel: value })}
				/>

				<RichText
					className="wp-block-fbv2-theme-feature-panel__title"
					tagName="h3"
					placeholder={__('Enter a title...', 'fbv2-theme')}
					value={title}
					onChange={(value) => setAttributes({ title: value })}
				/>
			</div>

			<RichText
				className="wp-block-fbv2-theme-feature-panel__description"
				tagName="p"
				placeholder={__('Enter a description...', 'fbv2-theme')}
				value={description}
				onChange={(value) => setAttributes({ description: value })}
			/>
		</div>
	);
};
export default BlockEdit;
