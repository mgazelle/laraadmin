<?php

use Illuminate\Database\Seeder;

use Dwij\Laraadmin\Models\Module;
use Dwij\Laraadmin\Models\ModuleFields;
use Dwij\Laraadmin\Models\ModuleFieldTypes;
use Dwij\Laraadmin\Models\Menu;
use Dwij\Laraadmin\Models\LAConfigs;

use App\Role;
use App\Permission;
use App\Department;

class DatabaseSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{

		/* ================ LaraAdmin Seeder Code ================ */

		// Generating Module Menus
		$modules = Module::all();
		foreach ($modules as $module) {
			if($module->name != "Backups") {
				Menu::create([
					"name" => $module->name,
					"url" => $module->name_db,
					"icon" => $module->fa_icon,
					"type" => 'module',
					"parent" => 0
				]);
			}
		}

		// Create Administration Department
	   	$dept = new Department;
		$dept->name = "Administration";
		$dept->tags = "[]";
		$dept->color = "#000";
		$dept->save();

		// Create Super Admin Role
		$role = new Role;
		$role->name = "SUPER_ADMIN";
		$role->display_name = "Super Admin";
		$role->description = "Full Access Role";
		$role->parent = 0;
		$role->dept = $dept->id;
		$role->save();

		// Set Full Access For Super Admin Role
		foreach ($modules as $module) {
			Module::setDefaultRoleAccess($module->id, $role->id, "full");
		}

		// Create Admin Panel Permission
		$perm = new Permission;
		$perm->name = "ADMIN_PANEL";
		$perm->display_name = "Admin Panel";
		$perm->description = "Admin Panel Permission";
		$perm->save();

		$role->attachPermission($perm);

		// Generate LaraAdmin Default Configurations

		$laconfig = new LAConfigs;
		$laconfig->key = "sitename_part1";
		$laconfig->value = "__sitename_part1__";
		$laconfig->save();

		$laconfig = new LAConfigs;
		$laconfig->key = "sitename_part2";
		$laconfig->value = "__sitename_part2__";
		$laconfig->save();

		$laconfig = new LAConfigs;
		$laconfig->key = "sitename_short";
		$laconfig->value = "__sitename_short__";
		$laconfig->save();

		$laconfig = new LAConfigs;
		$laconfig->key = "site_version";
		$laconfig->value = "__site_version__";
		$laconfig->save();

		$laconfig = new LAConfigs;
		$laconfig->key = "default_email_address";
		$laconfig->value = "__default_email_address__";
		$laconfig->save();

		$laconfig = new LAConfigs;
		$laconfig->key = "default_email_name";
		$laconfig->value = "__default_email_name__";
		$laconfig->save();

		$laconfig = new LAConfigs;
		$laconfig->key = "sidebar_search";
		$laconfig->value = "1";
		$laconfig->save();

		$laconfig = new LAConfigs;
		$laconfig->key = "show_messages";
		$laconfig->value = "1";
		$laconfig->save();

		$laconfig = new LAConfigs;
		$laconfig->key = "show_notifications";
		$laconfig->value = "1";
		$laconfig->save();

		$laconfig = new LAConfigs;
		$laconfig->key = "show_tasks";
		$laconfig->value = "1";
		$laconfig->save();

		$laconfig = new LAConfigs;
		$laconfig->key = "show_rightsidebar";
		$laconfig->value = "1";
		$laconfig->save();

		$laconfig = new LAConfigs;
		$laconfig->key = "skin";
		$laconfig->value = "skin-white";
		$laconfig->save();

		$laconfig = new LAConfigs;
		$laconfig->key = "layout";
		$laconfig->value = "fixed";
		$laconfig->save();
	}
}
