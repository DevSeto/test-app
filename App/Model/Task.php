<?php
namespace App\Model;

use App\Library\Model;

class Task extends Model{
	
	protected static $table_name = 'tasks';
	protected static $class = __CLASS__;

	protected static $db_fields = [
			'id',
			'email',
            'body',
            'name',
            'status',
            'edit_at',
			'created_at',
		];
}