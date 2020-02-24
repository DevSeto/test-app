@extends( 'layouts.master' )


@section( 'content' )
    @include( 'forms.create_task' )
	<div class="panel panel-default">
		<div class="panel-body text-center">
            <button type="button" class="btn btn-info btn-lg " data-toggle="modal" data-target="#add-task">Add task</button>
            <?php if( $this->task['items'] ): ?>
                @include( 'task.includes.table' )
            <?php endif ?>
            @include( 'includes.pagination' )
        </div>
	</div>
@stop