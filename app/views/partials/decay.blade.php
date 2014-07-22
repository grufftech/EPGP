
<div class="jarviswidget jarviswidget-color-red" id="wid-id-decay" data-widget-editbutton="false" data-widget-deletebutton="false" data-widget-colorbutton="false">
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
	<h2><strong>Admin</strong><i>EPGP</i></h2>
</header>
<!-- widget div-->
<div role="content">

	
	<!-- widget content -->
	<div class="widget-body no-padding" style="min-height:15px;">
		{{Form::open(array('action' => 'AdminController@decay','class'=>'smart-form'))}}

		<footer>
			{{ Form::submit('Decay All',array('class'=>'btn btn-danger'));}}
		</footer>

		
		{{ Form::close() }}


		{{Form::open(array('action' => 'AdminController@recalculateAll','class'=>'smart-form'))}}

		<footer>
			{{ Form::submit('Recalculate All',array('class'=>'btn btn-danger'));}}
		</footer>

		
		{{ Form::close() }}
		
	</div>
	<!-- end widget content -->
	
</div>
<!-- end widget div -->

</div>
