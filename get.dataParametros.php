<?php
/*
Static Info to Load Screen 1
*** PARAMETERS REQUIRED: ***
    
*/
$StaticInfo = array(
    'zoom' => 12,
    'latcenter'=> -12.0167,
    'longcenter'=> -77.1167,
    'datos' => [
        ['Id'=>1,
         'Name' => 'Aeropuerto',
         'latitude'=> -12.0167,
         'longitude'=> -77.1167],
        ['Id'=>2,
         'Name' => 'Estadio',
         'latitude'=> -12.0673,
         'longitude'=> -77.0337],
        ['Id'=>3,
         'Name' => 'Comedor',
         'latitude'=> -12.0689,
         'longitude'=> -77.1637],
         ['Id'=>4,
         'Name' => 'Piscina',
         'latitude'=> -12.1689,
         'longitude'=> -77.2637]
    ]
    
    // Maybe I could include Alerts
);
echo json_encode($StaticInfo);
?>
