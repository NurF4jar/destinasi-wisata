	/* Custom filtering function which will search data in column four between two values */
			$.fn.dataTable.ext.search.push(
				function( settings, data, dataIndex ) {
					var start	= new Date ($('#start').val());
					var end		= new Date ($('#end').val());
					var date	= new Date (data[1]); // use data for the Date column
					
					if(date >= start && date <= end){
						return true;	
					}
						return false;					
				}
			);

/*
	$(document).ready(function() {
		var table = $('#report_table').DataTable();

		// Event listener to the two range filtering inputs to redraw on input
		$('#start-date, #end-date').keyup( function() {
			table.draw();
		} );
	} );
*/