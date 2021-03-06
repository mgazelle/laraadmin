<?php
/**
 * Controller genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace Dwij\Laraadmin\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Dwij\Laraadmin\Helpers\LAHelper;
use Dwij\Laraadmin\Models\LAConfigs;
use Config;

class LAConfigController extends Controller
{
	protected $skins;
	protected $layouts;

	public function __construct() {
		// for authentication (optional)
		$this->middleware('auth');
		$this->skins = Config::get('laraadmin.skins');
		$this->layouts = Config::get('laraadmin.layouts');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//$configs = LAConfigs::all();
		return View('la.la_configs.index', [
			'skins'	=> $this->skins,
			'layouts'	=> $this->layouts
		]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$all = $request->all();
		$all['sidebar_search'] = isset($all['sidebar_search']) ? 1 : 0;
		$all['show_messages'] = isset($all['show_messages']) ? 1 : 0;
		$all['show_notifications'] = isset($all['show_notifications']) ? 1 : 0;
		$all['show_tasks'] = isset($all['show_tasks']) ? 1 : 0;
		$all['show_rightsidebar'] = isset($all['show_rightsidebar']) ? 1 : 0;
		foreach($all as $key => $value) {
			LAConfigs::where('key',$key)->update(['value'=>$value]);
		}
		return View('la.la_configs.index', [
			'skins'	=> $this->skins,
			'layouts'	=> $this->layouts
		]);
	}
}
