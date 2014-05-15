
<!-- Widget ID (each widget will need unique ID)-->
<div class="jarviswidget jarviswidget-color-red" id="wid-id-hist" data-widget-editbutton="false" data-widget-deletebutton="false" data-widget-colorbutton="false">
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
		<span class="widget-icon"> <i class="fa fa-table"></i> </span>
		<h2>Character EP&GP History</h2>
	</header>

	<!-- widget div-->
	<div>

		<!-- widget content -->
		<div class="widget-body">
			
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>Member Name</th>
						<th>Change</th>
						<th>Value</th>
						<th>Reason</th>
						<th>Item Type</th>
						<th>Item</th>
						<th>Date</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach($history as $h){?>
					<tr>
						<td>{{$h->name}}</td>
						<td>{{$h->change}}</td>
						<td>{{$h->value}}</td>
						<td>{{$h->reason}}</td>
						<td>{{$h->loot_slot}}</td>
						<td><a target=_blank href={{$h->loot_url}}>{{$h->loot_name}}</a></td>
						<td>{{$h->created_at}}</td>
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