//Корзина
function showCart(cart){
    $('#cart-modal .modal-body').html(cart);
    $('#cart-modal').modal();
}

function clearCart(){
    $.ajax({
        url: '/cart/clear',
        type: 'GET',
        success: function(res){
            if(!res) alert("Error clear-cart");
            showCart(res);
        }
    })
}

$('#cart-view').on('click',function(e) {
    e.preventDefault();
    $.ajax({
        url: '/cart/',
        type: 'GET',
        success: function(res){
            if(!res) alert("Error clear-cart");
            showCart(res);

        }
    });
});


$('.add-to-cart').on('click', function(e) {
    e.preventDefault();
    let id = $(this).data('id'),
        qty = $('#qty').val();
    $.ajax({
        url : '/cart/add',
        data : {
            id: id,
            qty: qty,
        },
        type : 'GET',
        success : function (res) {
            if (!res) alert ('Error!');
            //$.stickr({note:'Это ошибка.<br />Чтобы привлечь ваше внимание, она будет оставаться на месте до тех пор, пока вы не закроете её',className:'classic error',sticked:true});
            showCart(res);
        },
        error : function () {
            alert ('error add-to-cart' + e);
        }
    })
});

function del_item_handler(e) {
    e.preventDefault();
    let id = $(this).data('id');
    $.ajax({
        url: '/cart/del-item',
        data: {id: id},
        type: 'GET',
        success: function (res) {
            showCart(res);
        },
        error: function (e) {
            alert ('error del-item' + e.message);
        }
    })
}
$('#cart .del-item').on('click',  del_item_handler );
$('#cart-modal .modal-body').on('click', '.del-item', del_item_handler );


function change_count_handler (e) {
    e.preventDefault();
    let id = $(this).data('id');
    let qty = $(this).data('value');
    $.ajax({
        url: '/cart/add',
        data: {
            id: id,
            qty: qty,
        },
        type: 'GET',
        success: function (res) {
            showCart(res);
        },
        error: function (e) {
            alert ('error change-count' + e);
        }
    })
}
$('#cart .change-count').on('click', change_count_handler );
$('#cart-modal .modal-body').on('click', '.change-count', change_count_handler );

//Создание выпадающего меню
$('#catalog').dcAccordion({
    'speed' : 200,
});



//Было изначально
//--------------------------------------------
$('#sl2').slider();

var RGBChange = function() {
    $('#RGB').css('background', 'rgb('+r.getValue()+','+g.getValue()+','+b.getValue()+')')
};

/*scroll to top*/
$(document).ready(function(){
	$(function () {
		$.scrollUp({
	        scrollName: 'scrollUp', // Element ID
	        scrollDistance: 300, // Distance from top/bottom before showing element (px)
	        scrollFrom: 'top', // 'top' or 'bottom'
	        scrollSpeed: 300, // Speed back to top (ms)
	        easingType: 'linear', // Scroll to top easing (see http://easings.net/)
	        animation: 'fade', // Fade, slide, none
	        animationSpeed: 200, // Animation in speed (ms)
	        scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
					//scrollTarget: false, // Set a custom target element for scrolling to the top
	        scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
	        scrollTitle: false, // Set a custom <a> title if required.
	        scrollImg: false, // Set true to use image
	        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
	        zIndex: 2147483647 // Z-Index for the overlay
		});
	});
});
