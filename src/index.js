
import { __ } from '@wordpress/i18n';
import { registerBlockType } from '@wordpress/blocks';
import { RichText } from '@wordpress/block-editor';

registerBlockType( 'wckochi/wckochi-gutenberg', {
	title: __( 'Gutenberg Example - WordCamp Kochi' ),
	description: __( 'Your block description.' ),
	icon: 'universal-access-alt',
	category: 'common',
	keywords: [ __( 'image' ), __( 'pics' ) ],
	edit: ( props ) => {
		return __( 'Hello World!' );
	},
	save: ( props ) => {
		return __( 'Hello Kochi!' );
	},
} );
