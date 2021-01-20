<!-- bundle -->
<!-- Vendor js -->
<script src="{{asset('assets/js/vendor.min.js')}}"></script>
@yield('script')
<!-- App js -->
<script src="{{asset('assets/js/app.min.js')}}"></script>
<script src="{{asset('assets/js/waitMe.min.js')}}"></script>
<script src="{{asset('assets/js/sweetalert2.js')}}"></script>
<script type="text/javascript">
	function startLoader(element) {
		// check if the element is not specified
		if(typeof element == 'undefined') {
			element = "body";
		}

		// set the wait me loader
		$(element).waitMe({
			effect : 'stretch',
			text : 'Please Wait..',
			bg : 'rgba(255,255,255,0.7)',
			//color : 'rgb(66,35,53)',
			color : 'green',
			sizeW : '20px',
			sizeH : '20px',
			source : ''
		});
	}

	/**
	 * Start the loader on the particular element
	 */
	function stopLoader(element) {
	  // check if the element is not specified
	  if(typeof element == 'undefined') {
	    element = 'body';
	  }

	  // close the loader
	  $(element).waitMe("hide");
	}
</script>
@yield('script-bottom')
