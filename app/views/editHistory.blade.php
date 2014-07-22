@include('partials.header')

<!-- MAIN CONTENT -->
<div id="content" class="container">

	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 hidden-xs hidden-sm">
			<h1 class="txt-color-red login-header-big">The Drunk Tanks Admin</h1>
			<div class="well no-padding">
				{{Form::open(array('action' => array('AdminController@editHistoryPost',$history->id),'class'=>'smart-form client-form'))}}
					<header>
						Modifying History for {{$character->name}}.
					</header>

					<fieldset>
						<section>
							<label class="label">Change</label>
							<label class="input"> <i class="icon-append fa fa-comments-o"></i>
								{{ Form::select('change', array('ep' => 'EP', 'gp' => 'GP'), $history->change);}}
								<b class="tooltip tooltip-top-right"> FIFTY DKP MINUS</b></label>
						</section>
						<section>
							<label class="label">Value</label>
							<label class="input"> <i class="icon-append fa fa-money"></i>
								{{ Form::text('value',$history->value,array('placeholder'=>$history->value));}}
								</label>
						</section>
						<section>
							<label class="label">Reason</label>
							<label class="input"> <i class="icon-append fa fa-comments-o"></i>
								{{ Form::text('reason',$history->reason,array('placeholder'=>''));}}
								<b class="tooltip tooltip-top-right"> One Raid Hour</b></label>
						</section>
						<section>
							<label class="label">Item Name</label>
							<label class="input"> <i class="icon-append fa fa-comments-o"></i>
								{{ Form::text('loot_name',$history->loot_slot,array('placeholder'=>''));}}
								<b class="tooltip tooltip-top-right"> Project Legacy: The Wright</b></label>
						</section>
						<section>
							<label class="label">Item Type</label>
							<label class="input"> <i class="icon-append fa fa-comments-o"></i>
								{{ Form::text('loot_slot',$history->loot_slot,array('placeholder'=>''));}}
								<b class="tooltip tooltip-top-right"> WeaponPrimary</b></label>
						</section>
						<section>
							<label class="label">Item URL</label>
							<label class="input"> <i class="icon-append fa fa-comments-o"></i>
								{{ Form::text('loot_url',$history->loot_url,array('placeholder'=>''));}}
								<b class="tooltip tooltip-top-right"> http://wildstar.datminer.com/item/40091/Project_Legacy:_The_Wright</b></label>
						</section>
						<section>
							<label class="label">Date</label>
							<label class="input"> <i class="icon-append fa fa-comments-o"></i>
								{{ Form::text('created_at',$history->created_at,array('placeholder'=>''));}}
								</label>
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


