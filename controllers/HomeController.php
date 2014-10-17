<?php

namespace Tee\Front\Controllers;

use Tee\System\Controllers\BaseController;
use View;

class HomeController extends BaseController {
	public function index()
	{
        // esta visualização está no tema,
        // por isso não usamos escopo com front::
        return View::make('home.index');
	}
}
