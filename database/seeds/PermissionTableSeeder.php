<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionTableSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      $permissions_admin = [
         'roles-listar',
         'roles-crear',
         'roles-editar',
         'roles-borrar',
         'usuarios-listar',
         'usuarios-crear',
         'usuarios-editar',
         'usuarios-borrar',
         'abejas-listar',
         'abejas-crear',
         'abejas-editar',
         'abejas-borrar',
         'aplicaciones-listar',
         'aplicaciones-crear',
         'aplicaciones-editar',
         'aplicaciones-borrar',
         'empresas-listar',
         'empresas-crear',
         'empresas-editar',
         'empresas-borrar',
      ];

      $permissions_encargado = [
         'abejas-listar',
         'abejas-crear',
         'abejas-editar',
         'abejas-borrar',
         'aplicaciones-listar',
         'aplicaciones-crear',
         'aplicaciones-editar',
         'aplicaciones-borrar',
      ];

      foreach ($permissions_admin as $permission) {
         Permission::create(['name' => $permission]);
      }

      $role = Role::create(['name' => 'Admin']);
      $role->syncPermissions($permissions_admin);

      $role = Role::create(['name' => 'Encargado de Campo']);
      $role->syncPermissions($permissions_encargado);
   }
}