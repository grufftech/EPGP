<!-- Widget ID (each widget will need unique ID)-->
<div class="jarviswidget jarviswidget-color-darken" id="wid-id-standings" data-widget-editbutton="false" data-widget-deletebutton="false">
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
		<h2>EPGP Player Standings</h2>
	</header>

	<!-- widget div-->
	<div>

		<!-- widget edit box -->
		<div class="jarviswidget-editbox">
			<!-- This area used as dropdown edit box -->

		</div>
		<!-- end widget edit box -->

		<!-- widget content -->
		<div class="widget-body">
			<p>
				EPGP is a relational reward system for WildStar. It is an alternative DKP system in which your loot buying power is defined by the ratio of your effort and rewards points instead of their difference.
			</p>
			<table class="table table-bordered table-striped table-hover">
				<thead>
					<tr>
						<th>Name</th>
						<?if (Auth::check()){?>
						<th>Admin EP</th>
						<th>Admin GP</th>
						<? } ?>
						<th>Class</th>
						<th>Role</th>
						<th>Effort Points</th>
						<th>Gear Points</th>
						<th>Loot Priority</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach($characters as $char){ ?>
					<tr>
						<td><a href={{$url = action('HomeController@characterHistory',array('id' => $char->id))}}>{{ucfirst($char->name)}}</a></td>
						<?if (Auth::check()){?>
						<td><a href={{action('AdminController@modifyEffort', $char->id)}}>Modify Effort</a></td>
						<td><a href={{action('AdminController@giveLoot', $char->id)}}>Award Gear</a></td>
						<? } ?>
						<td>{{ucfirst($char->class)}}</td>
						<td>{{ucfirst($char->role)}}</td>
						<td>{{$char->ep}}</td>
						<td>{{$char->gp}}</td>
						<td>{{$char->pr}}</td>
					</tr>
				<?php } ?>
					
				</tbody>
			</table>

		</div>
		<!-- end widget content -->

	</div>
	<!-- end widget div -->

</div>
<!-- end widget -->

