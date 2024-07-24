<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        

        \App\Models\User::create([
             'first_name' => 'Elmo',
             'second_name' => 'Jerry',
             'email' => 'elmojerry@example.com',
             'password' => bcrypt("123456789"),
             'gender' => 'masculino',
        ]);
        
        \App\Models\User::create([
            'first_name' => 'Paulo',
            'second_name' => 'Fernandes',
            'email' => 'paulofernandes@example.com',
            'password' => bcrypt("123456789"),
            'gender' => 'masculino',
       ]);
       
       \App\Models\User::create([
        'first_name' => 'Paula',
        'second_name' => 'Daniela',
        'email' => 'pauladaniela@example.com',
        'password' => bcrypt("123456789"),
        'gender' =>'feminino'
   ]);
        \App\Models\User::create([
            'first_name' => 'Isabel',
            'second_name' => 'Daniela',
            'email' => 'isabeldaniela@example.com',
            'password' => bcrypt("123456789"),
            'gender' =>'feminino'
        ]);


        \App\Models\Weapons::create([
            'name' => 'AK',
            'model' => '47',
            'type' => 'FUZIL DE ASSALTO',
            'qtd_weapons_bullets' => 75,
            'quantity_stock' => 10,
        ]);
        \App\Models\Weapons::create([
            'name' => 'CARABINA BRIGADE OD',
            'model' => 'GREEN CAL 9 MM',
            'type' => 'FUZIL DE ASSALTO',
            'qtd_weapons_bullets' => 75,
            'quantity_stock' => 30,
        ]);
        \App\Models\Weapons::create([
            'name' => 'GLOCK',
            'model' => 'G-19',
            'type' => 'PISTOLA',
            'qtd_weapons_bullets' => 75,
            'quantity_stock' => 60,
        ]);
        \App\Models\Weapons::create([
            'name' => 'SIG SAUER',
            'model' => 'P320 X',
            'type' => 'PISTOLA',
            'qtd_weapons_bullets' => 35,
            'quantity_stock' => 2,
        ]);
        \App\Models\Weapons::create([
            'name' => 'RIFLE M1A',
            'model' => 'SCOUT SQUAD NEW WAL',
            'type' => 'SEMI-AUTOMATICO',
            'qtd_weapons_bullets' => 40,
            'quantity_stock' => 5,
        ]);




        \App\Models\Police_officers::create([
            'name' => 'Nascimento',
            'division' => 'PIR',
            'category' => 'Capitão',
            'nip' => "200123847290",
        ]);
        \App\Models\Police_officers::create([
            'name' => 'Cardoso',
            'division' => 'SIC',
            'category' => 'Cabo',
            'nip' => "000123856296",
        ]);
        \App\Models\Police_officers::create([
            'name' => 'Bento',
            'division' => 'Ordem pública',
            'category' => 'Sargento',
                'nip' => "010123856292",
        ]);
        \App\Models\Police_officers::create([
            'name' => 'Erica',
            'division' => 'PIR',
            'category' => 'Capitão',
            'nip' => "000123843050533",
        ]);
        \App\Models\Police_officers::create([
            'name' => 'Delgada',
            'division' => 'SIC',
            'category' => 'Cabo',
            'nip' => "00912386529",
        ]);
        \App\Models\Police_officers::create([
            'name' => 'Elmo',
            'division' => 'SIC',
            'category' => 'Comandante',
            'nip' => "000123848444393",
        ]);





        \App\Models\Leave_weapons::create([
            'officer' => 'Elmo',
            'nip_officer' => '000123848444393',
            'qtd_bullets' => '20',
            'weapon' => 'GLOCK-G19',
            'weapon_number' => '3030LA18922',
        ]);
        \App\Models\Leave_weapons::create([
            'officer' => 'Delgada',
            'nip_officer' => '00912386529',
            'qtd_bullets' => '25',
            'weapon' => 'AK-47',
            'weapon_number' => '7080LA2390',
        ]);
        \App\Models\Leave_weapons::create([
            'officer' => 'Nascimento',
            'nip_officer' => '200123847290',
            'qtd_bullets' => '30',
            'weapon' => 'CARABINA BRIGADE OD-GREEN CAL 9 MM',
            'weapon_number' => '7813LA09831',
        ]);
        \App\Models\Leave_weapons::create([
            'officer' => 'Cardoso',
            'nip_officer' => '000123856296',
            'qtd_bullets' => '5',
            'weapon' => 'RIFLE M1A-SCOUT SQUAD NEW WAL',
            'weapon_number' => '0938LA928374',
        ]);
        \App\Models\Leave_weapons::create([
            'officer' => 'Bento',
            'nip_officer' => '010123856292',
            'qtd_bullets' => '45',
            'weapon' => 'SIG SAUER-P320 X',
            'weapon_number' => '00012384848893',
        ]);


        

        \App\Models\Receive_weapons::create([
            'officer' => 'Elmo',
            'nip_officer' => '000123848444393',
            'qtd_bullets' => '20',
            'weapon' => 'RIFLE M1A-SCOUT SQUAD NEW WAL',
            'weapon_number' => '0938LA928374',
        ]);
        \App\Models\Receive_weapons::create([
            'officer' => 'Delgada',
            'nip_officer' => '00912386529',
            'qtd_bullets' => '25',
            'weapon' => 'CARABINA BRIGADE OD-GREEN CAL 9 MM',
            'weapon_number' => '7813LA09831',
        ]);
        \App\Models\Receive_weapons::create([
            'officer' => 'Nascimento',
            'nip_officer' => '200123847290',
            'qtd_bullets' => '60',
            'weapon' => 'AK-47',
            'weapon_number' => '8594LA4038483',
        ]);
        \App\Models\Receive_weapons::create([
            'officer' => 'Cardoso',
            'nip_officer' => '000123856296',
            'qtd_bullets' => '23',
            'weapon' => 'GLOCK-G19',
            'weapon_number' => '0932LA20843',
        ]);




        \App\Models\Registers::create([
            'officer' => 'Elmo',
            'nip_officer' => '000123848444393',
            'qtd_bullets' => '20',
            'weapon' => 'GLOCK-G19',
            'weapon_number' => '3030LA18922',
            'status' => 'entregue'
        ]);
        \App\Models\Registers::create([
            'officer' => 'Delgada',
            'nip_officer' => '00912386529',
            'qtd_bullets' => '25',
            'weapon' => 'AK-47',
            'weapon_number' => '7080LA2390',
            'status' => 'não entregue'
        ]);
        \App\Models\Registers::create([
            'officer' => 'Nascimento',
            'nip_officer' => '200123847290',
            'qtd_bullets' => '30',
            'weapon' => 'CARABINA BRIGADE OD-GREEN CAL 9 MM',
            'weapon_number' => '7813LA09831',
            'status' => 'entregue'
        ]);
        \App\Models\Registers::create([
            'officer' => 'Cardoso',
            'nip_officer' => '000123856296',
            'qtd_bullets' => '5',
            'weapon' => 'RIFLE M1A-SCOUT SQUAD NEW WAL',
            'weapon_number' => '0938LA928374',
            'status' => 'não entregue'
        ]);
        \App\Models\Registers::create([
            'officer' => 'Bento',
            'nip_officer' => '010123856292',
            'qtd_bullets' => '45',
            'weapon' => 'SIG SAUER-P320 X',
            'weapon_number' => '00012384848893',
            'status' => 'entregue'
        ]);

    

        
   
    }
}
