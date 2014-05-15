@include('partials.header')

<div id="main" role="main">

	<!-- MAIN CONTENT -->
	<div id="content" class="container">

	<div class="row">
		<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
			<h1 class="page-title txt-color-blueDark"> <a href=/>The Drunk Tanks</a> <span> > {{$character->name}}</span></h1>
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
			<a href='/admin'>Admin</a>
		</div>
	</div>

</div>
</div>
<!-- END MAIN CONTENT -->

@include('partials.footer')