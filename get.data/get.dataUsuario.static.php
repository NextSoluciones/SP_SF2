<?php
$Usuario=array(
	'IdUser'=>1,
	'NomUser'=>'Gustavo',
	'Estacion'=>[
		[
		'Id'=>1,
		'Name'=>'Estacion 1',
		'CodeName'=>'Uno',
		'Description'=>'Estadio Nacional',
		'Lat'=>-11.94684,
		'Lng'=>-77.10984,
		'Parameters'=>
			[
				'Id'=>1,
				'CodeName'=>'Sensor 1',
				'Name'=>'Parametro 1',
				'State'=>1,
				 ]
			
		],
		[
		'Id'=>2,		
        'Name' => 'Estacion 2',
        'CodeName'=>'Dos',
        'Description'=>'Mar',
        'Lat'=> -11.94877,
        'Lng'=> -77.09439,
		'Parameters'=>
			[
				'Id'=>1,
				'CodeName'=>'Sensor 1',
				'Name'=>'Parametro 1',
				'State'=>0
				 ]
			
		],
		[
		'Id'=>3,		
        'Name' => 'Estacion 3',
        'CodeName'=>'Tres',
        'Description'=>'Mar',
        'Lat'=> -11.94457,
        'Lng'=> -77.09147,
		'Parameters'=>
			[
				'Id'=>1,
				'CodeName'=>'Sensor 1',
				'Name'=>'Parametro 1',
				'State'=>1
				 ]
			
		],[
		'Id'=>4,		
        'Name' => 'Estacion 4',
        'CodeName'=>'Cuatro',
        'Description'=>'Mar',
        'Lat'=> -11.94205,
        'Lng'=> -77.08825,
		'Parameters'=>
			[
				'Id'=>1,
				'CodeName'=>'Sensor 1',
				'Name'=>'Parametro 1',
				'State'=>0
				 ]
			
		]
	],
	 'map' => [ 
    'zoom'=>15,
    'latcenter'=>-11.94877,
    'lngcenter'=>-77.09439   
		]
	);
echo json_encode($Usuario);

?>