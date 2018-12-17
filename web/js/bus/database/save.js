$(document).ready(function(){

	$('.save').click(function(){

		if( confirm('Vous êtes sur le point d\'enregistrer l\'ensemble des données et de vider la base actuelle!') )
		{
			var name_of_new_database = $('.name_of_new_database').text();
			var name_of_new_database_decompose = name_of_new_database.split('_');
			var name = '';
			switch( name_of_new_database_decompose[0] )
			{
				case 'janvier':
					name='1_'+name_of_new_database_decompose[1];
					break;
				case 'fevrier':
					name='2_'+name_of_new_database_decompose[1];
					break;
				case 'mars':
					name='3_'+name_of_new_database_decompose[1];
					break;
				case 'avril':
					name='4_'+name_of_new_database_decompose[1];
					break;
				case 'mai':
					name='5_'+name_of_new_database_decompose[1];
					break;
				case 'juin':
					name='6_'.name_of_new_database_decompose[1];
					break;
				case 'juillet':
					name='7_'+name_of_new_database_decompose[1];
					break;
				case 'aout':
					name='8_'.name_of_new_database_decompose[1];
					break;
				case 'septembre':
					name='9_'+name_of_new_database_decompose[1];
					break;
				case 'octobre':
					name='10_'+name_of_new_database_decompose[1];
					break;
				case 'novembre':
					name='11_'+name_of_new_database_decompose[1];
					break;
				case 'decembre':
					name='12_'+name_of_new_database_decompose[1];
					break;
			}
			
			window.location.href = Routing.generate('bus_database_save', {name_of_new_database: name} );
		}
	});
	
});