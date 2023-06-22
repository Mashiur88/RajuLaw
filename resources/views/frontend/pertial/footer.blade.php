	<footer class="footer bg-white">

		<section class="pb-3 pb-3 pt-5">
			<div class="container">

				<div class="row">
					<div class="col-lg-6 col-md-12">
						<div class="address">
							<div><i class="icofont-google-map"></i> {{ setting(2) }}</div>
							<div><i class="icofont-envelope"></i> <a href="mailto:info@rajlaw.com">{{ setting(5) }}</a></div>
							<div><i class="icofont-phone"></i> <a href="mailto:info@rajlaw.com">{{ setting(1) }}</a></div>
						</div>
					</div>
					<div class="col-lg-6 col-md-12">
						<div class="social_icons">
							<a href="{{ setting(3) }}"><i class="fab fa-facebook-f"></i></a>
							<a href="{{ setting(4) }}"><i class="fab fa-twitter"></i></a>
							<a href="{{ setting(7) }}"><i class="fab fa-linkedin"></i></a>
							<a href="{{ setting(8) }}"><i class="fab fa-instagram"></i></a>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col">
						<div class="footer-logo">
							<img src="{{ asset("assets/frontend/img/logo/footer-logo.png") }}">
							<hr class="w-100">
						</div>
					</div>
				</div>

				<div class="row mt-3">
					<div class="col-lg-6 col-md-12">
						<ul class="footer-links navbar-nav">
							<li><a href=""><i class="icofont-arrow-right"></i> {{ setting('37') }} </a></li>
							<li><a href="{{ route('legal_fees') }}"><i class="icofont-arrow-right"></i> {{ setting('38') }} </a></li>
							<li><a href=""><i class="icofont-arrow-right"></i> {{ setting('39') }} </a></li>
						</ul>
					</div>
					<div class="col-lg-6 col-md-12">
						<div class="social_icons">
							&copy; 2023, Raju Law. All Rights Reserved.
						</div>
					</div>
				</div>

			</div>
		</section>
		<div class="footer-img-box"><img class="skyimg" src="{{ asset("assets/frontend/img/footer.png") }}"></div>
		
	</footer>