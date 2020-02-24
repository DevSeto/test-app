
<div class="modal fade" id="add-task" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="/task/add-task" id="add-task">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Name</label>
                        <input type="text" class="form-control"  name="name" >
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Email address</label>
                        <input type="email" class="form-control"   name="email">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Body</label>
                        <textarea class="form-control"  rows="3" name="body"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" >Add</button>
                    </div>
                </form>
            </div>

        </div>

    </div>
</div>
