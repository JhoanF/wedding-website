( function( api ) {

	// Extends our custom "classic-wedding" section.
	api.sectionConstructor['classic-wedding'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );