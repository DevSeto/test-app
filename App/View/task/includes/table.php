<div class="table-responsive">
	<table class="table table-hover table-stripped table-borderedw" id="task-table">
		<thead>
			<tr>
				<th class="col-xs-1 ">
                    <a href="<?=base_url.'?offset='.$this->task['current_page'].($this->task['orderby'] != 'id'? '&orderby=id' : '' )?>">
                        Id
                    </a>
                </th>
                <th>Name</th>
                <th>
                    <a href="<?=base_url.'?offset='.$this->task['current_page'].($this->task['orderby'] != 'email'? '&orderby=email' : '' )?>">
                        Email
                    </a>
                </th>
                <th>Body</th>
				<th>Status</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach(  $this->task['items'] as $i=>$task ): ?>
				<tr>
					<td class="text-left"><?= $task->id; ?></td>
					<td class="text-left"><?= $task->name; ?></td>
					<td class="text-left"><?= $task->email; ?></td>
					<td class="text-left">
                        <?php if( $this->session->isLoggedIn() ): ?>
                            <textarea data-action="<?=base_url.'task/change-comment/'.$task->id?>" onchange="updateComment(event)"
                                      >
                                    <?= $task->body;  ?>
                            </textarea>

                        <?php else: ?>
                            <?= $task->body;  ?>
                        <?php endif ?>
                    </td>
					<td class="text-left">
                        <?php if(!$task->status):?>
                            <button class="toDone" data-href="<?=base_url.'/task/close-taskt/'.$task->id.'/1'?>">to done</button>
                        <?php else: ?>
                            closed
                        <?php endif; ?>
                    </td>
					<td class="text-right">
                        <?php if($task->edit_at):?>
                            Changed By Admin
                        <?php endif;?>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
