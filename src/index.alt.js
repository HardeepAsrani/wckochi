
import { __ } from '@wordpress/i18n';
import { registerBlockType } from '@wordpress/blocks';
import { RichText } from '@wordpress/block-editor';

registerBlockType( 'wckochi/wckochi-gutenberg', {
	title: __( 'Gutenberg Example - WordCamp Kochi' ),
	icon: 'universal-access-alt',
	category: 'layout',
	attributes: {
		content: {
			type: 'array',
			source: 'children',
			selector: 'p',
		},
	},
	edit: ( props ) => {
		const { attributes: { content }, setAttributes, className } = props;
		const onChangeContent = ( newContent ) => {
			setAttributes( { content: newContent } );
		};
		return (
			<RichText
				tagName="p"
				className={ className }
				onChange={ onChangeContent }
				value={ content }
			/>
		);
	},
	save: ( props ) => {
		return <RichText.Content tagName="p" value={ props.attributes.content } />;
	},
} );
