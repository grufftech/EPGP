@include('partials.header')

<!-- MAIN CONTENT -->
<div id="content" class="container">

	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 hidden-xs hidden-sm">
			<h1 class="txt-color-red login-header-big">The Drunk Tanks Admin</h1>
			<div class="well no-padding">
				{{Form::open(array('action' => array('AdminController@giveLootPost',$character->id),'class'=>'smart-form client-form'))}}
					<header>
						Give Loot To {{$character->name}}
					</header>

					<fieldset>
						<section>
							<label class="label">URL (<a href=http://www.jabbithole.com/items target=_blank>Jabbit</a>)</label>
							<label class="input"> <i class="icon-append fa fa-external-link-square"></i>
								{{ Form::text('url','',array());}}
								<b class="tooltip tooltip-top-right"><i class="fa fa-external-link-square txt-color-teal"></i> jabbitURL</b></label>
						</section>
					</fieldset>
					<footer>
						{{ Form::submit('Give Loot',array('class'=>'btn btn-primary'));}}
					</footer>
				{{ Form::close() }}

			</div>						
		</div>
	</div>
@include('partials.footer')