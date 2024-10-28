( function( api ) {

	// Extends our custom "solar-system-company" section.
	api.sectionConstructor['solar-system-company'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );