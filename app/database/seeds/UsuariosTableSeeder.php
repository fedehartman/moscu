<?php 
class UsuariosTableSeeder extends Seeder {

    public function run()
    {
        DB::table('usuarios')->delete();

        Usuario::create(array('nombre' => 'Administrador','usuario' => 'admin','clave' => Hash::make('admin') ));

    	$this->command->info('Usuarios cargados');
    }

}
