
<!-- top-brands -->
<div class="top-brands">
<div class="container">
	<h3>Top Brands</h3>
	<div class="sliderfig">
		<ul id="flexiselDemo1">			
			<li>
				<img src="<?=$ROOT?>images/tb1.jpg" alt=" " class="img-responsive" />
			</li>
			<li>
				<img src="<?=$ROOT?>images/tb2.jpg" alt=" " class="img-responsive" />
			</li>
			<li>
				<img src="<?=$ROOT?>images/tb3.jpg" alt=" " class="img-responsive" />
			</li>
			<li>
				<img src="<?=$ROOT?>images/tb4.jpg" alt=" " class="img-responsive" />
			</li>
			<li>
				<img src="<?=$ROOT?>images/tb5.jpg" alt=" " class="img-responsive" />
			</li>
		</ul>
	</div>

</div>
</div>
<!-- //top-brands --> 
	<!-- newsletter -->
	<div class="newsletter">
		<div class="container">
			<div class="col-md-6 w3agile_newsletter_left">
				<h3>Search products</h3>
				<p>Excepteur sint occaecat cupidatat non proident, sunt.</p>
			</div>
			<div class="col-md-6 w3agile_newsletter_right">
				<form action="#" method="post">
					<input type="text" name="search" placeholder="Search" required="">
					<input type="submit" value="" />
				</form>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<!-- //newsletter -->
	<!-- footer -->
	<div class="footer">
		<div class="container">
			<div class="w3_footer_grids">
				<div class="col-md-3 w3_footer_grid">
					<h3>Contact</h3>
					<p>Duis aute irure dolor in reprehenderit in voluptate velit esse.</p>
					<ul class="address">
						<li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>1234k Avenue, 4th block, <span>New York City.</span></li>
						<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:info@example.com">info@example.com</a></li>
						<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+1234 567 567</li>
					</ul>
				</div>
				<div class="col-md-3 w3_footer_grid">
					<h3>Information</h3>
					<ul class="info"> 
						<li><a href="about">About Us</a></li>
						<li><a href="contact">Contact Us</a></li>
						<li><a href="codes.html">Short Codes</a></li>
						<li><a href="faq.html">FAQ's</a></li>
						<li><a href="products.html">Special Products</a></li>
					</ul>
				</div>
				<div class="col-md-3 w3_footer_grid">
					<h3>Category</h3>
					<ul class="info"> 
						<li><a href="products.html">Mobiles</a></li>
						<li><a href="products1.html">Laptops</a></li>
						<li><a href="products.html">Purifiers</a></li>
						<li><a href="products1.html">Wearables</a></li>
						<li><a href="products2.html">Kitchen</a></li>
					</ul>
				</div>
				<div class="col-md-3 w3_footer_grid">
					<h3>Profile</h3>
					<ul class="info"> 
						<li><a href="mainpage">Home</a></li>
						<li><a href="products.html">Today's Deals</a></li>
					</ul>
					<h4>Follow Us</h4>
					<div class="agileits_social_button">
						<ul>
							<li><a href="#" class="facebook"> </a></li>
							<li><a href="#" class="twitter"> </a></li>
							<li><a href="#" class="google"> </a></li>
							<li><a href="#" class="pinterest"> </a></li>
						</ul>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="footer-copy">
			<div class="footer-copy1">
				<div class="footer-copy-pos">
					<a href="#home1" class="scroll"><img src="<?=$ROOT?>images/arrow.png" alt=" " class="img-responsive" /></a>
				</div>
			</div>
			<div class="container">
				<p>&copy; 2017 Electronic Store. All rights reserved | Design by <a href="http://chinmali.com/">Rashid</a></p>
			</div>
		</div>
	</div>
	<!-- //footer --> 
	<!-- cart-js -->
	<!-- js -->
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
	function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="<?=$ROOT?>js/minicart.js"></script>
<script src="<?=$ROOT?>js/jquery.magnific-popup.js" type="text/javascript"></script>
<script src="<?=$ROOT?>js/jquery.countdown.js"></script>
<script src="<?=$ROOT?>js/jquery.wmuSlider.js"></script> 
<script type="text/javascript" src="<?=$ROOT?>js/jquery.flexisel.js"></script>
<script src="<?=$ROOT?>js/script.js"></script>
<script defer src="<?=$ROOT?>js/jquery.flexslider.js"></script>
<script src="<?=$ROOT?>js/imagezoom.js"></script>
<script src="<?=$ROOT?>js/easyResponsiveTabs.js" type="text/javascript"></script>
<script src="<?=$ROOT?>js/jquery.cookie.js" type="text/javascript"></script>


<script type="text/javascript">
	$(document).ready(function() {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
		$('#horizontalTab2').easyResponsiveTabs({
			type: 'default', //Types: default, vertical, accordion           
			width: 'auto', //auto or any width like 600px
			fit: true   // 100% fit in a container
		});
		$('#horizontalTab1').easyResponsiveTabs({
			type: 'default', //Types: default, vertical, accordion           
			width: 'auto', //auto or any width like 600px
			fit: true   // 100% fit in a container
		});
	});

	$(window).load(function() {
		$("#flexiselDemo2").flexisel({
			visibleItems: 4,
			animationSpeed: 1000,
			autoPlay: true,
			autoPlaySpeed: 3000,    		
			pauseOnHover: true,
			enableResponsiveBreakpoints: true,
			responsiveBreakpoints: { 
				portrait: { 
					changePoint:480,
					visibleItems: 1
				}, 
				landscape: { 
					changePoint:640,
					visibleItems:2
				},
				tablet: { 
					changePoint:768,
					visibleItems: 3
				}
			}
		});
		$("#flexiselDemo1").flexisel({
			visibleItems: 4,
			animationSpeed: 1000,
			autoPlay: true,
			autoPlaySpeed: 3000,    		
			pauseOnHover: true,
			enableResponsiveBreakpoints: true,
			responsiveBreakpoints: { 
				portrait: { 
					changePoint:480,
					visibleItems: 1
				}, 
				landscape: { 
					changePoint:640,
					visibleItems:2
				},
				tablet: { 
					changePoint:768,
					visibleItems: 3
				}
			}
		});
		$('.flexslider').flexslider({
			animation: "slide",
			controlNav: "thumbnails"
		});
	});



	$('.example1').wmuSlider();         

	$('.value-plus1').on('click', function(){
		var divUpd = $(this).parent().find('.value1'), newVal = parseInt(divUpd.text(), 10)+1;
		divUpd.text(newVal);
	});

	$('.value-minus1').on('click', function(){
		var divUpd = $(this).parent().find('.value1'), newVal = parseInt(divUpd.text(), 10)-1;
		if(newVal>=1) divUpd.text(newVal);
	});



        w3ls.render();

        w3ls.cart.on('w3sb_checkout', function (evt) {
        	var items, len, i;

        	if (this.subtotal() > 0) {
        		items = this.items();

        		for (i = 0, len = items.length; i < len; i++) { 
        		}
        	}
        });
    </script>  
	<!-- //cart-js -->   
</body>
</html>