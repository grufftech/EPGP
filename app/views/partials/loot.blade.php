				<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget jarviswidget-color-red" id="wid-id-loots" data-widget-editbutton="false" data-widget-deletebutton="false">
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
						<h2>Latest Loot Distribution</h2>
					</header>

					<!-- widget div-->
					<div>

						<!-- widget content -->
						<div class="widget-body">

							<table class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Member Name</th>
										<th>Item Type</th>
										<th>Item</th>
										<th>Date</th>
									</tr>
								</thead>
								<tbody>
								<?php foreach($loots as $loot){?>
									<tr>
										<td>{{$loot->character_id}}</td>
										<td>{{$loot->loot_slot}}</td>
										<td><a target=_blank href={{$loot->loot_url}}>{{$loot->loot_name}}</a></td>
										<td>{{$loot->created_at}}</td>
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