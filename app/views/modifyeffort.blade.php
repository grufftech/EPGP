@include('partials.header')

<!-- MAIN CONTENT -->
<div id="content" class="container">

	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 hidden-xs hidden-sm">
			<h1 class="txt-color-red login-header-big">The Drunk Tanks Admin</h1>
			<div class="well no-padding">
				{{Form::open(array('action' => array('AdminController@modifyEffortPost',$character->id),'class'=>'smart-form client-form'))}}
					<header>
						Modifying Effort for {{$character->name}}.
					</header>

					<fieldset>
						<section>
							<label class="label">Reason</label>
							<label class="input"> <i class="icon-append fa fa-comments-o"></i>
								{{ Form::text('reason','',array('placeholder'=>'FIFTY DKP MINUS'));}}
								<b class="tooltip tooltip-top-right"> FIFTY DKP MINUS</b></label>
						</section>
						<section>
							<label class="label">Value</label>
							<label class="input"> <i class="icon-append fa fa-money"></i>
								{{ Form::text('value','',array('placeholder'=>'-50'));}}
								<b class="tooltip tooltip-top-right"> -50</b></label>
						</section>
					</fieldset>
					<footer>
						{{ Form::submit('Modify Effort',array('class'=>'btn btn-primary'));}}
					</footer>
				{{ Form::close() }}

			</div>						
		</div>
	</div>
@include('partials.footer')


