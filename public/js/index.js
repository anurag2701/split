var menu = document.querySelector('.nav__list');
var burger = document.querySelector('.burger');
var doc = $(document);
var l = $('.scrolly');
var panel = $('.panel');
var vh = $(window).height();

var openMenu = function() {
  burger.classList.toggle('burger--active');
  menu.classList.toggle('nav__list--active');
};

// reveal content of first panel by default
panel.eq(0).find('.panel__content').addClass('panel__content--active');

var scrollFx = function() {
  var ds = doc.scrollTop();
  var of = vh / 4;
  
  // if the panel is in the viewport, reveal the content, if not, hide it.
  for (var i = 0; i < panel.length; i++) {
    if (panel.eq(i).offset().top < ds+of) {
     panel
       .eq(i)
       .find('.panel__content')
       .addClass('panel__content--active');
    } else {
      panel
        .eq(i)
        .find('.panel__content')
        .removeClass('panel__content--active')
    }
  }
};

var scrolly = function(e) {
  e.preventDefault();
  var target = this.hash;
  var $target = $(target);

  $('html, body').stop().animate({
      'scrollTop': $target.offset().top
  }, 300, 'swing', function () {
      window.location.hash = target;
  });
}

var init = function() {
  burger.addEventListener('click', openMenu, false);
  window.addEventListener('scroll', scrollFx, false);
  window.addEventListener('load', scrollFx, false);
  $('a[href^="#"]').on('click',scrolly);
};

doc.on('ready', init);

function setTwoNumberDecimal(event) {
    this.value = parseFloat(this.value).toFixed(2);
}


/* Create groups */
var myDialog = new ax5.ui.dialog({
    title: '<i class="axi axi-ion-alert"></i> Success',
    onStateChanged: function(){
    
    }
});
$(function() {
	  $('#myForm').submit(function(event) {
		 
	    event.preventDefault(); // Prevent the form from submitting via the browser
	    var mask = new ax5.ui.mask();
	    mask.open();
	    
	    var form = $(this);
	    $.ajax({

		      type: form.attr('method'),
		      url: form.attr('action'),
		      data: form.serialize()

		    }).done(function(data) {
			   // console.log(data);
				var msg='';
			    if(data!=null){
					$.each(data,function(index,item){
						
						msg="<li>"+item+"</li>"+msg;
					})
			    }
			    
    		    $("#myForm")[0].reset();
    	   		mask.close();
    	   		debugger;
    	   		if(msg=='<li>Email already Exists</li>')
	   			{}else{
	   				msg='Group Created !!<br/>'+msg;
	   			}
    	   		
    	    	myDialog.alert({
    	            msg: msg
    	        });
	    })
	    .fail(function(e){
	    	console.log(e);
	    	mask.close();
	    	myDialog.alert({
	            msg: "Email already used"
	        });
	    })
	    ;
	  });
	});


/* on change of groups*/


/* toggleIcon */
$("th").click( function(e) {
	   if($(this).hasClass( "glyphicon-plus" ))
	   {
		   	$(this).removeClass("glyphicon-plus").addClass("glyphicon-minus");
	   }
	   else
	   {	
		   	$(this).removeClass("glyphicon-minus").addClass("glyphicon-plus");
	   }
	});
