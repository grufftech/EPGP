<!-- start reg widget -->
<div class="jarviswidget jarviswidget-color-green" id="wid-id-reg"  data-widget-editbutton="false" data-widget-deletebutton="false" data-widget-colorbutton="false">
	<!-- widget options:
	usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

	data-widget-colorbutton="false"
	data-widget-editbutton="false"
	data-widget-togglebutton="false"
	data-widget-deletebutton="false"
	data-widget-fullscreenbutton="false"
	data-widget-custombutton="false"
	data-widget-collapsed="true"
	data-widget-sortable="false"

	-->
	<header>
		<span class="widget-icon"> <i class="fa fa-user"></i> </span>
		<h2><strong>EPGP</strong><i> Raid Registration</i></h2>
	</header>

	<!-- widget div-->
	<div role="content">

		<!-- widget content -->
		<div class="widget-body">

			<div class="row">
				{{Form::open(array('action' => 'HomeController@newCharacterPost'))}}
					<div id="bootstrap-wizard-1" class="col-sm-12">
						<div class="row">
							<div class="col-sm-12">
								@if(Session::has('message'))
								<div class="alert adjusted alert-danger fade in">
									<button class="close" data-dismiss="alert">
										×
									</button>
									<i class="fa-fw fa-lg fa fa-exclamation"></i>
									{{Session::get('message')}}
								</div>
								@endif
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-user"></i></span>
										{{ Form::text('name','',array('class'=>'form-control input','placeholder'=>'Character Name'));}}
									</div>
								</div>
							</div>
						</div>

						<div class="row">	
							<div class="col-sm-12">
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-star"></i></span>
										<select name="class" class="form-control input">
											<option value="" selected="selected">Select Class</option>
											<option value="warrior">Warrior</option>
											<option value="stalker">Stalker</option>
											<option value="engineer">Engineer</option>
											<option value="medic">Medic</option>
											<option value="esper">Esper</option>
											<option value="spellslinger">Spellslinger</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-puzzle-piece"></i></span>
										<select name="role" class="form-control input">
											<option value="" selected="selected">Select Primary Role</option>
											<option value="damage">Damage</option>
											<option value="tank">Tank</option>
											<option value="heal">Heal</option>
										</select>
									</div>
								</div>
							{{ Form::submit('Create Character',array('class'=>'btn btn-success'));}}
							{{ Form::close() }}
							</div>

						</div>
					</div>
				</form>
			</div>
		</div>
		<!-- end widget content -->

	</div>
	<!-- end widget div -->

</div>
<!-- end widget -->