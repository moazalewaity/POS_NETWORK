(function ($) {
    
"use strict";

// Search
$(document).on("click", function(e){
    if($(e.target).is("#show-search")){
      $("#search-res").show();
    }else{
        $("#search-res").hide();
    }
});

// Menu
var Dashboard = function () {
	var global = {
		tooltipOptions: {
			placement: "right"
		},
		menuClass: ".c-menu"
	};

	var menuChangeActive = function menuChangeActive(el) {
		var hasSubmenu = $(el).hasClass("has-submenu");
		$(global.menuClass + " .is-active").removeClass("is-active");
		$(el).addClass("is-active");
	};

	var sidebarChangeWidth = function sidebarChangeWidth() {
		var $menuItemsTitle = $("li .menu-item__title");

		$("body").toggleClass("sidebar-is-reduced sidebar-is-expanded");
		$(".btn-toggle").toggleClass("is-opened");

		if ($("body").hasClass("sidebar-is-expanded")) {
			$('[data-toggle="tooltip"]').tooltip("destroy");
		} else {
			$('[data-toggle="tooltip"]').tooltip(global.tooltipOptions);
		}
	};

	return {
		init: function init() {
			$(".js-hamburger").on("click", sidebarChangeWidth);

			$(".js-menu li").on("click", function (e) {
				menuChangeActive(e.currentTarget);
			});

			$('[data-toggle="tooltip"]').tooltip(global.tooltipOptions);
		}
	};
}();

Dashboard.init();
//# sourceURL=pen.js

// Login - show password
$('#show-password').click(function(){
    $(this).children().toggleClass('show-pass');
    let input = $(this).prev();
    input.attr('type', input.attr('type') === 'password' ? 'text' : 'password');
});


// Slider
var owl = $('.owl-carousel');
owl.owlCarousel({
    loop: false,
    dots: false,
    nav: true,
    responsive: {
        0: {
        items: 1
        },
        600: {
        items: 1
        },
        1000: {
        items: 1
        }
    }
});


//DataTable
$(document).ready(function() {
    $('#opened-Auctions').DataTable();

    var table = $('#opened-Auctions').DataTable();
    // #myInput is a <input type="text"> element
    $('.tb-search').on( 'keyup', function () {
        table.search( this.value ).draw();
    } );
} );


// switch
$(document).ready(function(e) {
    $('input').lc_switch();   
});
    
// map page
$(document).ready(function(){
    $("#show").click(function(){
      $("#map-div").show(1000);
    });
    $("#hide").click(function(){
        $("#map-div").hide(1000);
      });
  });

// Gallery Images
(function() {
    var $gallery = new SimpleLightbox('.gallery a', {});
})();


// upload images
$('#demo').FancyFileUpload({
    params : {
      action : 'fileuploader'
    },
    maxfilesize : 1000000
  });

// Calendar date
$(function() {
	$('[data-toggle="datepicker"]').datepicker({
	  autoHide: true,
	  zIndex: 2048,
	});
  });


// upload profile image
  $(document).ready(function() {
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.profile-pic').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $(".file-upload").on('change', function(){
        readURL(this);
    });
    
    $(".upload-button").on('click', function() {
       $(".file-upload").click();
    });
});

// upload file
$(function() {

    // We can attach the `fileselect` event to all file inputs on the page
    $(document).on('change', ':file', function() {
      var input = $(this),
          numFiles = input.get(0).files ? input.get(0).files.length : 1,
          label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
      input.trigger('fileselect', [numFiles, label]);
    });
  
    // We can watch for our custom `fileselect` event like this
    $(document).ready( function() {
        $(':file').on('fileselect', function(event, numFiles, label) {
  
            var input = $(this).parents('.input-group').find(':text'),
                log = numFiles > 1 ? numFiles + ' files selected' : label;
  
            if( input.length ) {
                input.val(log);
            } else {
                if( log ) alert(log);
            }
  
        });
    });
    
  });
    

//   Open popup when select option == vehicles offers
$(".selectbox").change(function () {
    if ($(this).val() == "#renew-modal") {
        $('#renew-modal').modal('show');
      }
    if ($(this).val() == "#stop-modal") {
        $('#stop-modal').modal('show');
      }
    if ($(this).val() == "#edit-modal") {
        $('#edit-modal').modal('show');
      }
    if ($(this).val() == "#delete-modal") {
        $('#delete-modal').modal('show');
      }
 });

// select and change div == vehicles offers
$(function() {
    $('#theSelect').change(function(){
        $('.opt-select').hide();
        $('#' + $(this).val()).show();
    });
});

//   Open popup when select option == Users Page
$(".selectbox").change(function () {
    if ($(this).val() == "#preview-user") {
        $('#preview-user').modal('show');
      }
    if ($(this).val() == "#change-status") {
        $('#change-status').modal('show');
      }
    if ($(this).val() == "#change-pass") {
        $('#change-pass').modal('show');
    }
 });


// add new vehicle
$(document).ready(function () {
      
  // add item
  $("#add").click(function () {
    $('.item').append('<div class="vec-no-res "><p> <span class="output-text" id="result1"> A B C  </span> - <sapn class="output-no" id="result2"> 1 2 3 4 5 6 </sapn></p> <button class="btn remove" type="button" value="Remove" > Delete </button></div>')
  });

  // add input value
  function outputInfo() {
    var pLett = document.getElementById('platesLett').value;
    var pNo = document.getElementById('platesNo').value;
 
    var pLettRes = pLett; 
    var pNoRes = pNo;
 
    document.getElementById('result1').innerHTML = pLettRes;
    document.getElementById('result2').innerHTML = pNoRes;
  }
  document.getElementById('add').addEventListener('click', outputInfo);

  // delete item
  $(document).on('click', 'button.remove', function () {
      $(this).closest(".vec-no-res").remove();
  });

});

// add new Packages
$(document).ready(function () {
  // add item
  $("#addServ").click(function () {
    $('.serv-name').append('<div class="vec-no-res"> <p class="output-text" id="resultServ"> Service Name Here </p>  <span> 50 SAR </span> <button class="btn remove" type="button"> Delete </button></div>')
  });

  // add input value
  function outputInfo() {
    var servNm = document.getElementById('servName').value;
 
    document.getElementById('resultServ').innerHTML = servNm;
  }
  document.getElementById('addServ').addEventListener('click', outputInfo);

  // delete item
  $(document).on('click', 'button.remove', function () {
      $(this).closest(".vec-no-res").remove();
  });

});












})(jQuery); 


