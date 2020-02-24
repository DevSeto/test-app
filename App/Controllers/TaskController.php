<?php
namespace App\Controllers;

use App\Controllers\Controller;
use App\Library\Redirect;
use App\Library\Request;
use App\Library\Response;
use App\Library\Validator;
use App\Model\Product;
use App\Model\Task;

class TaskController extends Controller
{
	public function index()
	{

	}

	public function postAddTask(
	    Request $request
    ){
        $validator = Validator::make( $request->all(), [
            'email' => 'required|email|',
            'name' => 'required|min:6',
            'body' => 'required|min:6',
        ]);
        if( $validator->fails() )
            return Response::json([
                'success' => false,
                'data' => $validator->errors->all()
            ], 301);
        $task = new Task();

        $task->email = $request->input( 'email' );
        $task->name = $request->input( 'name' );
        $task->body = $request->input( 'body' );
        if( $task->save() )
        {
            return Response::json([
                'success' => true,
            ], 200);
        }

        return Response::json([
            'success' => false,
            'data' => ['something wrong']
        ], 301);
    }

    public function postChangeComment(
        $task,
        Request $request
    ){
	    if( !$this->session->isLoggedIn() )
            return Response::json([
                'success' => false,
                'data' => ['unauthorized'=>true]
            ], 401);
        $validator = Validator::make( $request->all(), [
            'body' => 'required|min:6',
        ]);
        if( $validator->fails() )
            return Response::json([
                'success' => false,
                'data' => $validator->errors->all()
            ], 301);

        $task->body = $request->input( 'body' );
        $task->edit_at = true;
        if( $task->save() )
        {
            return Response::json([
                'success' => true,
            ], 200);
        }

        return Response::json([
            'success' => false,
            'data' => ['something wrong']
        ], 301);

    }

    public function closeTaskt($id, $status){

        $task = Task::findById($id);
        $task->status = $status;
        if( $task->save() )
        {
            return Response::json([
                'success' => true,
            ], 200);
        }

        return Response::json([
            'success' => false,
            'data' => ['something wrong']
        ], 301);

    }

}