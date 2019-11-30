
import { __ } from '@wordpress/i18n';
import { registerBlockType } from '@wordpress/blocks';
import { RichText } from '@wordpress/block-editor';

registerBlockType( 'wckochi/wckochi-gutenberg', {
	title: __( 'Gutenberg Example - WordCamp Kochi' ),
	icon: 'universal-access-alt',
	category: 'layout',
	edit: ( props ) => {
		return __( 'Hello World!' );
	},
	save: ( props ) => {
		return __( 'Hello Kochi!' );
	},
} );
