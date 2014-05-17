@include('partials.header')

<!-- MAIN CONTENT -->
<div id="content" class="container">

	<div class="row">
		<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
			<h1 class="page-title txt-color-blueDark"> <a href=/>The Drunk Tanks</a> <span> > EPGP Standings </span></h1>
		</div>
	</div>

	<!-- widget grid -->
	<section id="widget-grid" class="">

		<!-- row -->
		<div class="row">

			<!-- NEW WIDGET START -->
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

				@include('partials.history')

			</article>
			<!-- WIDGET END -->


		</div>
		<!-- end row -->


	</section>
	<!-- end widget grid -->

	<div class="row">
		<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
			<a href='/admin'><i class="fa fa-gear"></i> Admin</a><?if (Auth::check()){?><br>   <a href='/logout'><i class="fa fa-sign-out"></i> Logout</a> <? } ?>
		</div>
	</div>

</div>
<!-- END MAIN CONTENT -->

@include('partials.footer')