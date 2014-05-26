@include('partials.header')

<!-- MAIN CONTENT -->
<div id="content" class="container">

	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 hidden-xs hidden-sm">
			<h1 class="txt-color-red login-header-big">The Drunk Tanks | Error </h1>
			<div class="well no-padding">

				@if(Session::has('message'))
				<div class="alert adjusted alert-danger fade in">
					<button class="close" data-dismiss="alert">
						×
					</button>
					<i class="fa-fw fa-lg fa fa-exclamation"></i>
					{{Session::get('message')}}
				</div>
				@endif
			</div>						
		</div>
	</div>
@include('partials.footer')
		