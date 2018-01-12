<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		/*Prueba para poder inserat un solo registro en la tabla users*/
		/*DB::table('users')->insert([
			'name' => 'Paulina Grom',
			'email' => 'paulina@gmail.com',
			'password' => bcrypt('paulina'),
			'type' => 'member'
		]);*/

		/*Ejecutamos un model factory
			1)El nombre del modelo con su ruta
			2)el numero entero que desee de hacer el registro

			--Luego le pasamos la funcion create para que los inserte
		*/
		factory(App\User::class , 10)->create();
		factory(App\Category::class , 1)->create();
	}
}
