var site = {
	getValue:function(id){
		return $.trim($("#"+id).val());
	},
	getEncodeValue:function(id){
		return encodeURIComponent($.trim($("#"+id).val()));
	},
	ajaxSubmit:function(url, data, callback){
		jQuery.ajax({
			type:'post',
			url:url,
			data:data,
			dataType:'json',
			success:function(data){
				callback(data);
			},
			error:function(){
				//alert("未知错误，请重试");
			}
		})	
	},
	ajaxFileUpload:function(url, fileId, callback){
		//先上传图片：成功后，上传数据
    	$.ajaxFileUpload({
    		url:url,
    		secureuri:false,
    		fileElementId:fileId,
    		dataType:'json',
    		success:function(data){
    			callback(data);
    		},
    		error:function(data, status, e){
    			//alert('未知错误，请重试');
    		}
    	})
	},
	confirm:function(title, content, callback, submitButtonName, cancelButtonName, cancelCallback, className){
		if($.trim(className)==''){
			className = 'confirm-tips';
		}
		if($.trim(submitButtonName)==''){
			submitButtonName = '确定';
		}
		if($.trim(cancelButtonName)==''){
			cancelButtonName = '取消';
		}
		var content = '<div class="tips-txt">'+content+'</div>';
		content += '<div class="tips-btn">';
		content += '<span class="inp_sm"><a id="cfSubSite" href="#" title="">'+submitButtonName+'</a></span>';
		content += '<span class="inp_esc"><a id="cfCancelSite" href="#" title="">'+cancelButtonName+'</a></span>';
		content += '</div>';
		$("#cfSubSite").live("click",function(){
			if(callback == undefined){
				$("#cfSubSite").die("click");
				$.confirm.close();;
			}else{
				var param = callback();
				if(param != false){
					$("#cfSubSite").die("click");
					$.confirm.close();
				}
			}
		});
		$("#cfCancelSite").live("click",function(){
			if(cancelCallback == undefined){
				$("#cfCancelSite").die("click");
				$.confirm.close();
			}else{
				var param = cancelCallback();
				if(param != false){
					$("#cfCancelSite").die("click");
					$.confirm.close();
				}
			}
		});
		$.confirm({title:title,msg:content,className:className});
	},
	closeConfirm:function(){
		$("#cfSubSite").die("click");
		$("#cfCancelSite").die("click");
		$.confirm.close();
	},
	validateText:function(id,min,max,nameTip){
		var symbol = true;
		var text = site.getValue(id);
		var textLength =text.length;
		if(textLength<=min){
			site.confirm("验证提示","请输入"+nameTip);
			symbol = false;
		}else if(textLength>=max){
			site.confirm("验证提示",nameTip+"不能超过"+max+"个字");
			symbol = false;
		}
		return symbol;
	},
	validateDigit:function(id,nameTip){
		var symbol = true;
		var value = site.getValue(id);
		var symbol = /^\d+$/.test(value);
		if(symbol == false){
			site.confirm("验证提示",nameTips+"不是数字，请重新输入");
			symbol = false;
		}
		return symbol;
	}
}