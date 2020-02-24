@extends( 'layouts.master' )

@section( 'title' )
	Users Login
@stop

@section( 'content' )
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="panel-title">
						<span class="glyphicon glyphicon-log-in padding-r10"></span>
						Login
					</div>
				</div>
				<div class="panel-body">
					<form method="post" action="/auth/login" class="form-horizontal">
						<div class="form-group">
							<label for="email" class="control-label col-sm-3">Username</label>
							<div class="col-sm-9">
								<input type="text" name="username" class="form-control" id="username"  validate autofocus=true>
                                <?php if( $this->errors->has('username') ) : ?>
                                    <p class="help-block">
                                        {{ $this->errors->first( 'username' ) }}
                                    </p>
                                <?php endif; ?>
							</div>
						</div>

						<div class="form-group">
							<label for="password" class="control-label col-sm-3">Password</label>
							<div class="col-sm-9">
								<input type="password" name="password" class="form-control" id="password"  validate autofocus=true>
                                <?php if( $this->errors->has('password') ) : ?>
                                    <p class="help-block">
                                        {{ $this->errors->first( 'password' ) }}
                                    </p>
                                <?php endif; ?>
							</div>
						</div>

						<div class="form-group">
							
							<div class="col-sm-9 col-sm-offset-3">
								<button class="btn btn-success">Log In</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
				
@stop