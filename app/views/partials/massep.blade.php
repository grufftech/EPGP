
<div class="jarviswidget jarviswidget-color-orange" id="wid-id-massEP" data-widget-editbutton="false" data-widget-deletebutton="false" data-widget-colorbutton="false">
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
	<h2><strong>Mass</strong><i>EP</i></h2>
</header>
<!-- widget div-->
<div role="content">
	
	<!-- widget edit box -->
	<div class="jarviswidget-editbox">
		<!-- This area used as dropdown edit box -->
	</div>
	<!-- end widget edit box -->
	
	<!-- widget content -->
	<div class="widget-body no-padding">
		{{Form::open(array('action' => 'AdminController@massEffort','class'=>'smart-form'))}}
		
		
		<fieldset>
			<div class="row">
				<?php foreach ($characters as $toon){?>
				<section class="col col-2">
					<label>
						<input type="checkbox" class="checkbox style-0" name="chars[]" value="{{$toon->id}}" <?php if($toon->active == 1){echo "checked";}?>>
						<span>{{$toon->name}}</span>
					</label>
				</section>
				<? } ?>
			</div>
		</fieldset>
		<fieldset>
			<legend>Amount of EP</legend>
			<div class="form-group">
				<label class="col-md-2 control-label" for="select-1"></label>
				<div class="col-md-12">

					<select name="new_effort" class="form-control" id="select-1">
						<option value="start">Early to Raid Bonus</option>
						<option value="1hr">1 Hour Raiding</option>
						<option value="2hr">2 Hours Raiding</option>
						<option value="3hr">3 Hours Raiding</option>
						<option value="4hr">4 Hours Raiding</option>
						<option value="boss">Boss Kill</option>
						<option value="bigboss">Progression Boss Kill (Boss Kill * 2)</option>
						<option value="rapeboss">Double Progression Boss Kill (Final Pull Boss Kill * 2)</option>
						<option value="end">Raid End Bonus</option>
						<option value="attunement">Guild Attunement Attendence Bonus</option>
					</select> 

				</div>
			</div>
		</fieldset>
		<br>
		<div class="widget-footer">
			<footer>
				<button type="submit" class="btn btn-warning">
					Grant Effort
				</button>

			{{ Form::close() }}

			{{Form::open(array('action' => 'AdminController@massSelectAll','class'=>'smart-form'))}}
				<button type="submit" class="btn btn-warning">
					Select All
				</button>
			{{ Form::close() }}
			{{Form::open(array('action' => 'AdminController@massClearAll','class'=>'smart-form'))}}
				<button type="submit" class="btn btn-warning">
					Clear All
				</button>
			{{ Form::close() }}

			</footer>
		</div>


		
	</div>
	<!-- end widget content -->
	
</div>
<!-- end widget div -->

</div>