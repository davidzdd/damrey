var validate = {
	isUserName:function(value){
		return /^[0-9a-zA-Z\u4e00-\u9fa5]+$/.test(value);
	},
	isCHN:function(value){
		return /^[\u4e00-\u9fa5]+$/.test(value);
	},
	isEmail:function(value){
		return /^([a-zA-Z0-9._-])+@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-])+/.test(value);
	},
	isMobile:function(value){
		return /(^[1][3,8][0-9]{9}$)|(^0[1][3,8][0-9]{9}$)/.test(value);
	},
	isPhone:function(value){
		return /^[0-9][0-9|-]+[0-9]$/.test(value);
	},
	isUrl:function(value){
		return /^(https?|ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(\#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/.test(value);
	},
	isIdCardNo:function(num) {
		/****--身份证号码验证-支持新的带x身份证****/
	    var factorArr = new Array(7,9,10,5,8,4,2,1,6,3,7,9,10,5,8,4,2,1);
	    var error;
	    var varArray = new Array();
	    var intValue;
	    var lngProduct = 0;
	    var intCheckDigit;
	    var intStrLen = num.length;
	    var idNumber = num;    
	    // initialize
	    if ((intStrLen != 15) && (intStrLen != 18)) {
	        //error = "输入身份证号码长度不对！";
	        //alert(error);
	        //frmAddUser.txtIDCard.focus();
	        return false;
	    }    
	    // check and set value
	    for(i=0;i<intStrLen;i++) {
	        varArray[i] = idNumber.charAt(i);
	        if ((varArray[i] < '0' || varArray[i] > '9') && (i != 17)) {
	            //error = "错误的身份证号码！.";
	            //alert(error);
	            //frmAddUser.txtIDCard.focus();
	            return false;
	        } else if (i < 17) {
	            varArray[i] = varArray[i]*factorArr[i];
	        }
	    }
	    if (intStrLen == 18) {
	        //check date
	        var date8 = idNumber.substring(6,14);
	        if (validate.checkDate(date8) == false) {
	            //error = "身份证中日期信息不正确！.";
	            //alert(error);
	            return false;
	        }        
	        // calculate the sum of the products
	        for(i=0;i<17;i++) {
	            lngProduct = lngProduct + varArray[i];
	        }        
	        // calculate the check digit
	        intCheckDigit = 12 - lngProduct % 11;
	        switch (intCheckDigit) {
	            case 10:
	                intCheckDigit = 'X';
	                break;
	            case 11:
	                intCheckDigit = 0;
	                break;
	            case 12:
	                intCheckDigit = 1;
	                break;
	        }        
	        // check last digit
	        if (varArray[17].toUpperCase() != intCheckDigit) {
	            //error = "身份证效验位错误!正确为： " + intCheckDigit + ".";
	            //alert(error);
	            return false;
	        }
	    } 
	    else{        //length is 15
	        //check date
	        var date6 = idNumber.substring(6,12);
	        if (validate.checkDate(date6) == false) {
	            //alert("身份证日期信息有误！.");
	            return false;
	        }
	    }
	    //alert ("Correct.");
	    return true;
	},
	checkDate:function(data){
		//未实现
		return true;
	}
}