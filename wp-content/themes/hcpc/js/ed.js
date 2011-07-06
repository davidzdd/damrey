(function($) {
	$.confirm = function(options){
		var opt = $.extend({},$.confirm.defaults,options);

		$.confirm.currentPrefix = "confirm";
		var ie6		= ($.browser.msie && $.browser.version < 7);
		var $body	= $(document.body);
		var $window	= $(window);

		//build the box and fade
		var msgbox = '<div class="confirmbox" id="confirmbox">';
			msgbox +='	<div class="confirm-fade"><iframe frameborder="0"></iframe></div>';	
			msgbox +='	<div class="confirm-wrap '+ opt.className +'" id="confirm-wrap"><table>';
			msgbox +='		<thead><tr><td class="wn"></td><td class="td-fade"></td><td class="ne"></td></tr></thead>';
			msgbox +='		<tbody><tr><td class="td-fade"></td><td><div class="confirm-main">';
			msgbox +='		<h5>'+ opt.title +'</h5><a class="skin confirm-close" title="关闭" href="#" id="confirm-close">关闭</a>';
			msgbox +='		<div class="confirm-msg">' + opt.msg +'</div></div>';
			msgbox +='		</td><td class="td-fade"></td></tr></tbody>';
			msgbox +='		<tfoot><tr><td class="sw"></td><td class="td-fade"></td><td class="es"></td></tr></tfoot></table>';
			msgbox +='	</div></div>';

		if($("#confirmbox")){
			$("#confirmbox").remove();
		}

		var $cbox	= $(msgbox).appendTo($body);

		/*这里做字数限制*/
		var $atxt = $cbox.find("textarea");
		if($atxt.attr("maxlength") > 0){
		 ed.limitinput($atxt);
		}

		var $confirm = $cbox.find("#confirm-wrap");
		var $closed = $cbox.find("#confirm-close");

		if($body.height() > $window.height()){
			$cbox.height($body.height());
		}else{
			$cbox.height($window.height());
		}
		
		var positionconfirm = function(){
			if($window.width() < 960){
				$cbox.width("960px");	
			}else{
				$cbox.width($window.width());
			}
			
			var w = $confirm.width();
			var h = $confirm.height();
			var x = ($window.width() - $confirm.width())/2;
			var y = ($window.height() - $confirm.height())/2 + $window.scrollTop();
			
			$confirm.css({left:x+"px",top:y+"px"});
		}
			
		var removeConfirm = function(callCallback){
			$cbox.remove();
			$("#cfSubSite").die("click");
		};

		var getKeyCode = function(e){
			var key = (window.event) ? event.keyCode : e.which;
			return key;
		};
		
		$window.resize(function(){positionconfirm();})
		$closed.click(function(){removeConfirm();return false});
		$(document).keydown(function(event){
			if(getKeyCode(event) == 27){removeConfirm()};
		});

		positionconfirm();
	};
	
	$.confirm.defaults = {
		callback: function(){},
		myclass:  "",
		title:    "",
		msg:      ""
	};

	$.confirm.close = function() {
		$('#'+ $.confirm.currentPrefix +'box').remove();
		$("#cfSubSite").die("click");
	};
	
})(jQuery);