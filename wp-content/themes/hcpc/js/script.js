$(function(){
	var _obj = $("#scroll"),
		_list = _obj.find("ul"),
		_item = _obj.find("li"),
		_iwid = 210,
		_num = _item.length,
		_width = (_iwid +8) * _num,
		_btn = $("#scroll-btn"),
		_prev = $("#scroll-prev"),
		_next = $("#scroll-next"),
		int = 0;

	_list.width(_width);

	function indexScroll(way) {
		if (int === 1) return false;
		if (way) {
			_list.find("li:last").width(0).prependTo(_list).animate({"width": _iwid }, 800, function(){
				int = 0;
			});
		} else {
			_list.find("li:first").animate({"width": 0 }, 800, function(){
				$(this).appendTo(_list).width(_iwid);
				int = 0;
			});
		}
	}

	if ( _num > 4) {

		var S = setInterval(function(){indexScroll()}, 3000);

		_list.find("li").hover(function(){
			clearInterval(S);
		},function(){
			S = setInterval(function(){indexScroll()}, 3000);
		})

		_btn.find("a").hover(function(){
			clearInterval(S);
		},function(){
			S = setInterval(function(){indexScroll()}, 3000);
		})

		_obj.hover(function(){
			$(this).addClass("scroll-hover");
		},function(){
			$(this).removeClass("scroll-hover");
		});

		_prev.click(function(){
			indexScroll();
			int = 1;
		})

		_next.click(function(){
			indexScroll("right");
			int = 1;
		})
	} else {
		_list.css("margin-left",0);
	}

	
	_list.find("li").hover(function(){
		$(this).addClass("hover");
	},function(){
		$(this).removeClass("hover");
	});

	// selectBox
	function selectBox(trig, options) {
		var _self = this,
			_target = trig.find("dd"),
			_defaults = {replace:1};
		_options = $.extend(_defaults, options);

		trig.each(function(index, callback) {
			var _self = $(this),
				_obj = _self.find("dd");
			
			_self.hover(function() {
				_obj.show();
			}, function() {
				_obj.hide();
			});
			
			_obj.find("a").click(function(ev) {
				_options.replace ? _self.find("dt").html(this.innerHTML) : "";
				_obj.hide();
			});
		});
	}

	selectBox($(".select"), {replace:0});

	$(".menu-drop").hover(function(){
		$(this).addClass("menu-drop-hover");
	},function(){
		$(this).removeClass("menu-drop-hover");
	});

	// scrollSlide
	var _count = $("#count"),
		_clen = _count.find("li").length,
		_tt;
	if (_clen > 1) {
		_tt = setInterval(function(){
			scrollSlide();
		}, 5000);
	}

	function scrollSlide() {
		var _list = _count.find("li"),
			_first = _count.find("li:first");
		_list.addClass("on");
		_first.css({"opacity":1}).animate({"opacity":0}, 1200, function(){
			_first.appendTo(_count);
			_count.find("li:first").animate({"opacity":1}, 1200);
		});
	}

});