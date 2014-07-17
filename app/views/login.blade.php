@include('partials.header')

<!-- MAIN CONTENT -->
<div id="content" class="container">

	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 hidden-xs hidden-sm">
			<h1 class="txt-color-red login-header-big">The Drunk Tanks Admin</h1>
			<div class="well no-padding">
				{{Form::open(array('action' => 'AdminController@loginPost','class'=>'smart-form client-form'))}}
					<header>
						Sign In
					</header>

					<fieldset>
						<section>
							<label class="label">Username</label>
							<label class="input"> <i class="icon-append fa fa-user"></i>
								{{ Form::text('username','',array());}}
								<b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> Please enter email address/username</b></label>
						</section>

						<section>
							<label class="label">Password</label>
							<label class="input"> <i class="icon-append fa fa-lock"></i>
								{{ Form::password('password','',array());}}
								<b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> Enter your password</b> </label>
						</section>
					</fieldset>
					<footer>
						{{ Form::submit('Sign in',array('class'=>'btn btn-primary'));}}
					</footer>
				{{ Form::close() }}

			</div>						
		</div>
	</div>
</div>


<div id="content" class="container">

	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 hidden-xs hidden-sm">
			<h1 class="txt-color-red login-header-big">Create User Password</h1>
			<div class="well no-padding">
				{{Form::open(array('action' => 'AdminController@createUser','class'=>'smart-form client-form'))}}
					<header>
						Create User Password
					</header>

					<fieldset>
						<section>
							<label class="label">Password</label>
							<label class="input"> <i class="icon-append fa fa-lock"></i>
								{{ Form::password('password','',array());}}
								<b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> Enter your password</b> </label>
						</section>
					</fieldset>
					<footer>
						{{ Form::submit('Create Account',array('class'=>'btn btn-primary'));}}
					</footer>
				{{ Form::close() }}

			</div>						
		</div>
	</div>
</div>
@include('partials.footer')
		