<?php 
class ConfiguracionesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('configuraciones')->delete();

        Configuracion::create(array('opcion' => 'since_id'));
        Configuracion::create(array('opcion' => 'max_id'));

    	$this->command->info('Configuraciones cargadas');
    }

}
