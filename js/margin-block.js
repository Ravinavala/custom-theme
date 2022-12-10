wp.blocks.registerBlockType( 'brad/border-box', {
    title: 'Margin Bottom',
    icon: 'smiely',
    category: 'common',
    attributes: {
        content: { type: 'string' },
    },

    //    /* This configures how the content and color fields will work, and sets up the necessary elements */

    edit: function( props ) {

        return React.createElement(
          'div',
          null,
          React.createElement( 'div', 'marginb-30', 'Margin bottom' ),
        );
    },
    save: function( props ) {
        const custombutn = 'custom_btn_link';
        return wp.element.createElement(
          'div',
          {
              className: 'marginb-30',
          },
        );
    }
} );

