@include('partials.header')

<!-- MAIN CONTENT -->
<div id="content" class="container">

	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 hidden-xs hidden-sm">
			<h1 class="txt-color-red login-header-big">The Drunk Tanks Admin</h1>
			<div class="well no-padding">
				{{Form::open(array('action' => array('AdminController@editCharacterPost',$character->id),'class'=>'smart-form client-form'))}}
					<header>
						Edit User > {{$character->name}}
					</header>

					<fieldset>
						<section>
							<label class="label">Character Name</label>
							<label class="input"> <i class="icon-append fa fa-user"></i>
								{{ Form::text('name',$character->name,array());}}
								<b class="tooltip tooltip-top-right"> Username</b></label>
						</section>
					</fieldset>
					<fieldset>
						<section>
							<label class="label">Character Class</label>
							<label class="input"> <i class="icon-append fa fa-external-link-square"></i>
								<select name="class" class="form-control input">
									<option value="">Select Class</option>
									<option value="warrior" {{{ $character->class=="warrior" ? "selected" : '' }}}>Warrior</option>
									<option value="stalker" {{{ $character->class=="stalker" ? "selected" : '' }}}>Stalker</option>
									<option value="engineer" {{{ $character->class=="engineer" ? "selected" : '' }}}>Engineer</option>
									<option value="medic" {{{ $character->class=="medic" ? "selected" : '' }}}>Medic</option>
									<option value="esper" {{{ $character->class=="esper" ? "selected" : '' }}}>Esper</option>
									<option value="spellslinger" {{{ $character->class=="spellslinger" ? "selected" : '' }}}>Spellslinger</option>
								</select>
						</section>
					</fieldset>
					<fieldset>
						<section>
							<label class="label">Character Role</label>
							<label class="input"> <i class="icon-append fa fa-external-link-square"></i>
								<select name="role" class="form-control input">
									<option value="" selected="selected">Select Primary Role</option>
									<option value="damage" {{{ $character->role=="damage" ? "selected" : '' }}}>Damage</option>
									<option value="tank" {{{ $character->role=="tank" ? "selected" : '' }}}>Tank</option>
									<option value="heal" {{{ $character->role=="heal" ? "selected" : '' }}}>Heal</option>
								</select>
						</section>
					</fieldset>
					<footer>
						{{ Form::submit('Save User',array('class'=>'btn btn-primary'));}}
					</footer>
				{{ Form::close() }}

			</div>						
		</div>
	</div>
@include('partials.footer')