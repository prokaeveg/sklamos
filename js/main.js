$(document).ready(function() {

	$(".style-grid").click(function(){
		$(".products-list").hide();
		$(".products-grid").show();
		$(".style-grid").addClass("active");
		$(".style-list").removeClass("active");

		$.cookie('select_style', 'grid');

	});

	$(".style-list").click(function(){
		$(".products-grid").hide();
		$(".products-list").show();
		$(".style-list").addClass("active");
		$(".style-grid").removeClass("active");

		$.cookie('select_style', 'list');
	});

	$(".select-sort").click(function(){
		$(".sorting-list").slideToggle(300);
	});

	if ($.cookie("select_style") == "grid") {
		$(".products-list").hide();
		$(".products-grid").show();
		$(".style-grid").addClass("active");
		$(".style-list").removeClass("active");
	}
	else if ($.cookie("select_style") == "list"){
		$(".products-grid").hide();
		$(".products-list").show();
		$(".style-list").addClass("active");
		$(".style-grid").removeClass("active");
	}


	$(".user-info").click(
	    function() {
	      $(".block-user").toggle(200);
	    }
	);
 
	$('#trackbar').trackbar({
        onMove : function() {
	        document.getElementById("start-price").value = this.leftValue;
	        document.getElementById("end-price").value = this.rightValue; 
        },
        width : 160,
        leftLimit : 1000,
        rightLimit : 200000,
        leftValue : 1000,
        rightValue : 100000,
        roundUp : 1000,
      });
    });
