<?php

$data = [
    
    'Ana Beata Rynkevič',
    
    'Andrius Kairys',
    
    'Mantas Zabiela',
    
    'Šarunas Čeponis',
    
    'Ježy Kozlovski',
    
    'Rokas Jackevičius',
    
    'Ana Višnevskaja',
    
    'Laura Kovarskytė',
    
    'Emilija Sinkevičiūtė',
    
    'Daniel Gurevich',
    
    'Tadas Jurkonis',
    
    'Laimonas Masionis',
    
    'Martyna Šėžaitė',
    
    // 'Tomas Petrauskas',
    
    'Marius Genys',
    
    'Vaidas Dačinskas',
    
    'Mindaugas Politika',
    
    'Vaida Eidžiulytė Grauslienė',
    
    'Eristida Siliūtė',
    
    // 'Žymantas Dansevičius',
    
    // 'Aleksandra Lovcova',
    
    'Gvidas Sibirskis',
    
    'Vaidminė Misiulytė Krasauskienė',
    
    'Donatas Grekas',
    
    'Martynas Pažusis',
    
    'Rasa Svirskė',
    
   
    'Raimundas Okmanas',
    
    'Andrius Urbonas',
    
    'Jokūbas Rybelis',
    
    'Andrejus Necvetnas',
    
    // 'Gabrielė Bašinskaitė',
    
 
    'Rugilė Gecevičiūtė'
    
    ];

    $A = [];

foreach($data as $key => $name) {
    $A[] = ['name' => $name, 'id' => $key+1];

}

file_put_contents('members.json', json_encode($A));