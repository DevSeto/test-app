<?php
namespace App\Controllers;

use App\Controllers\Controller;
use App\Library\Response;
use App\Model\Product;
use App\Library\App;
use App\Model\Task;
use Cassandra\Time;

class IndexController extends Controller
{
	public function index()
	{
	    $task = (new Task())->pagination(3);
		return Response::view( 'home', compact('task') );
	}

}