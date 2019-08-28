$(document).ready(function() {
	app.init();
});

var app = {

	init: function() {
		var setup = this.setup;

		switch(pageID) {
			case 'HomePage':
				setup.homepage();
			case 'AboutPage':
				setup.aboutpage();
			case 'WhatWeOffer':
				setup.whatweoffer();
			case 'NewsCategory':
				setup.newscategory();
			case 'Product':
				setup.product();
				break;
		}

		setup.menu();
	},

	setup: {

		menu: function() {

		},

		homepage: function() {

			$('.hm_frame2-slider').slick({
			 	infinite: true,
				slidesToShow: 4,
				slidesToScroll:1,
				autoplay: true,
				speed: 2000,
				arrows: true,
				dots: false,
				// prevArrow: $('.prev-arrow'),
    //   			nextArrow: $('.next-arrow'),
      			responsive: [
		            {
		              breakpoint: 1100,
		              settings: {
		                slidesToShow: 3,
		                slidesPerRow: 1,
		                slidesToScroll: 1
		              }
		            },
		            {
		              breakpoint: 700,
		              settings: {
		                slidesToShow: 1,
		                slidesPerRow: 1,
		                slidesToScroll: 1,
		                arrows:false
		              }
		            }

	            ]

		      });
			$('.slick-prev').html('<i class="ion-chevron-left"></i>');
     	 	$('.slick-next').html('<i class="ion-chevron-right"></i');



     	 	$('.about-slider').slick({
     	 		centerMode: true,
			 	infinite: true,
				slidesToShow: 3,
				slidesToScroll:1,
				// autoplay: true,
				speed: 500,
				arrows: true,
				dots: false,
				// prevArrow: $('.prev-arrow'),
    //   			nextArrow: $('.next-arrow'),
      			responsive: [
		            {
		              breakpoint: 1100,
		              settings: {
		                slidesToShow: 3,
		                slidesPerRow: 1,
		                slidesToScroll: 1
		              }
		            },
		            {
		              breakpoint: 700,
		              settings: {
		                slidesToShow: 1,
		                slidesPerRow: 1,
		                slidesToScroll: 1,
		                arrows:false
		              }
		            }

	            ]

		      });
			$('.slick-prev').html('<i class="ion-chevron-left"></i>');
     	 	$('.slick-next').html('<i class="ion-chevron-right"></i');

     	 	$('.frame5_slider-hldr').slick({
			 	infinite: true,
				slidesToShow: 5,
				slidesToScroll:1,
				// autoplay: true,
				speed: 500,
				arrows: false,
				dots: false,
				// prevArrow: $('.prev-arrow'),
    //   			nextArrow: $('.next-arrow'),
      			responsive: [
		            {
		              breakpoint: 1100,
		              settings: {
		                slidesToShow: 3,
		                slidesPerRow: 1,
		                slidesToScroll: 1
		              }
		            },
		            {
		              breakpoint: 700,
		              settings: {
		                slidesToShow: 1,
		                slidesPerRow: 1,
		                slidesToScroll: 1,
		                arrows:false
		              }
		            }

	            ]

		      });
			$('.slick-prev').html('<i class="ion-chevron-left"></i>');
     	 	$('.slick-next').html('<i class="ion-chevron-right"></i');

     	 	$('.hm_frame6-slider').slick({
			 	infinite: true,
				slidesToShow: 4,
				slidesToScroll:1,
				// autoplay: true,
				speed: 500,
				arrows: false,
				dots: false,
				// prevArrow: $('.prev-arrow'),
    //   			nextArrow: $('.next-arrow'),
      			responsive: [
		            {
		              breakpoint: 1100,
		              settings: {
		                slidesToShow: 3,
		                slidesPerRow: 1,
		                slidesToScroll: 1
		              }
		            },
		            {
		              breakpoint: 700,
		              settings: {
		                slidesToShow: 1,
		                slidesPerRow: 1,
		                slidesToScroll: 1,
		                arrows:false
		              }
		            }

	            ]

		      });
			$('.slick-prev').html('<i class="ion-chevron-left"></i>');
     	 	$('.slick-next').html('<i class="ion-chevron-right"></i');




		},

		aboutpage: function() {
			$('.leader-cntnr:nth-child(2n)').addClass("flex");

		},

		whatweoffer: function() {

			$('.product-slider').slick({
			 	infinite: true,
				slidesToShow: 4,
				slidesToScroll:1,
				// autoplay: true,
				speed: 500,
				arrows: false,
				dots: false,
				// prevArrow: $('.prev-arrow'),
    //   			nextArrow: $('.next-arrow'),
      			responsive: [
		            {
		              breakpoint: 1100,
		              settings: {
		                slidesToShow: 3,
		                slidesPerRow: 1,
		                slidesToScroll: 1
		              }
		            },
		            {
		              breakpoint: 700,
		              settings: {
		                slidesToShow: 1,
		                slidesPerRow: 1,
		                slidesToScroll: 1,
		                arrows:false
		              }
		            }

	            ]

		      });
			$('.slick-prev').html('<i class="ion-chevron-left"></i>');
     	 	$('.slick-next').html('<i class="ion-chevron-right"></i');

     	 	$('.wo_frame4-left').slick({
			 	infinite: true,
				slidesToShow: 1,
				slidesToScroll:1,
				speed: 1000,
				arrows: false,
				dots: true,
				asNavFor: '.wo_frame4-right'
		    });

		    $('.wo_frame4-right').slick({
			 	infinite: true,
				slidesToShow: 1,
				slidesToScroll:1,
				speed: 1000,
				fade: true,
				arrows: false,
				dots: false
		    });

		    $('.testimonial-hldr').slick({
			 	infinite: true,
				slidesToShow: 3,
				slidesToScroll:1,
				speed: 1000,
				arrows: false,
				dots: true,
		    });
			

		},

		newscategory: function() {

			$('.blog-hldr').slick({
			 	infinite: true,
				slidesToShow: 1,
				slidesToScroll:1,
				speed: 1000,
				arrows: false,
				dots: true,
				asNavFor: ".img-hldr"
		    });

		    $('.img-hldr').slick({
			 	infinite: true,
				slidesToShow: 1,
				slidesToScroll:1,
				speed: 1000,
				fade: true,
				arrows: false,
				dots: false,
				asNavFor: ".blog-hldr"
		    });

		},

		product: function() {

			$('.selected-img').slick({
			 	infinite: true,
				slidesToShow: 1,
				slidesToScroll:1,
				speed: 1000,
				fade: true,
				arrows: false,
				dots: false,
				asNavFor: ".selector-hldr"
		    });

			$('.selector-hldr').slick({
			 	infinite: true,
				slidesToShow: 4,
				slidesToScroll:1,
				speed: 1000,
				arrows: false,
				dots: false,
				focusOnSelect:true,
				asNavFor: ".selected-img"
		    });


		},


			

	},

	form: {
		/**
		* SENDING FORM
		* - Identify the form name, button name, the url (controller route), and if you want to 'refresh' the page.	
		**/
		init: function(formName, btnName, routeVal, boolean) {
			var form = formName,
				btn = btnName,
				route = routeVal,
				bool = boolean;

			form.validate({
				submitHandler: function(form) {
					swal({
						title: 'Sending ...',
						text: '',
						timer: 2000,
						onOpen: function () {
							swal.showLoading()
						}
					})
					var vars = $(form).serialize();
					$.post(baseHref + route, vars, function(data) {
						switch(data.status) {
							case 0:
								setMessage(false,data.message);
							break;
							case 1: 
								setMessage(true,data.message);
								$(form).trigger('reset');
								if(bool == true) {
									
									window.location.reload(1);
									
								}

							break;
						}

					}, 'json');
				}
			});

			$(btn).on('click', function(e) {
				e.preventDefault();
				form.submit();

				//label error -- for mobile
				if($(window).width() < 900) {
					$('label.error').empty();
					$('label.error').text("*");
				}
			});

			function setMessage(status, msg) {
				if(status) {
					swal('',msg,'success')
				} else {
					swal('',msg,'error')
				}
			}
		},

		/**
		* SENDING FORM W/ ATTACHMENTS
		* - Bind the uploaded file first, before sending.
		* - Identify where the file should be uploaded, button name, and the url (controller route).	
		* - Requirements: 
					Javascript:
						  jquery.fileupload.js
						  jquery.iframe-transport.js
						  jquery.ui.widget.js
					Composer:
						  "gargron/fileupload": "~1.4.0"
					Silverstripe:
						   Controller: Create UploadController
						   ModelAdmin: Create an admin manager for back up purposes (list of emails received)
						   Assets: Create folder inside, depends on what you declared
						   Template Syntax: 
						   		<label id="file-selected-permit" for="fileupload-permit" class="custom-file-upload">Business/Mayor Permit <i class="ion-paperclip"></i></label>
								<input type="file" id="fileupload-permit" name="file" style="display: none;">
								<input type="hidden" id="file-image-permit" name="permit" value="">

		**/
		bindUploadField: function(fileUpload, fileImg, fileSelected, formBtn, url) {
			var $file_upload = fileUpload,
				$file_img = fileImg,
				$file_selected = fileSelected,
				$form_btn = formBtn,
				$url = url;

			$file_upload.fileupload({
		        url: baseHref + $url,
		        dataType: 'json',
				submit: function(e, data) {},
				done: function(e, data) {
					switch(data.result.status) {
						case 0: break;
						case 1: 
							
							$file_img.val(data.result.message);
							$file_selected.html(data.result.filename);
							$form_btn.fadeIn(); 

						break;
					}
				}
		    });
		}
	},
};
