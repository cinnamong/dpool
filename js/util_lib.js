
// 가격에 원단위 컴마를 찍는다.
function won_Comma(price){
	if(price != null){
	   var pricelen = price.length;
	   var ii = pricelen%3;
	   var wonprice = price.substring(0,ii);
	   for(;ii<pricelen;ii+=3){
	      wonprice += "," + price.substring(ii,ii+3);
	   }
	   if((pricelen%3) == 0)
	   	wonprice = wonprice.substring(1,wonprice.length);
	   return wonprice;
	}
}


// 이메일 체크
function check_Email(email)
{  

	var email_1 = "";
	var email_2 = "";
	var check_point = 0;

	if (email.indexOf("@") < 0 ) {
		alert("e-mail에 @ 가 빠져있습니다.");
		return false;
	}
	if (email.indexOf(".") < 0 ) {
		alert("e-mail에 . 가 빠져있습니다.");
		return false;
	}

	if (email.indexOf("'") >= 0 ) {
		alert("e-mail에 ' 는 포함할수 없습니다..");
		return false;
	}
	if (email.indexOf("|") >= 0 ) {
		alert("e-mail에 | 는 포함할수 없습니다..");
		return false;
	}
	if (email.indexOf(">") >= 0 ) {
		alert("e-mail에 > 는 포함할수 없습니다..");
		return false;
	}
	if (email.indexOf("<") >= 0 ) {
		alert("e-mail에 < 는 포함할수 없습니다..");
		return false;
	}
	if (email.indexOf(" ") >= 0 ) {
		alert("e-mail에 스페이스는 포함할수 없습니다..");
		return false;
	}

          for (var j = 0 ; j < email.length; j++)
          {
               if ( email.substring(j, j + 1) != "@"  && check_point == 0 ) {
						email_1 = email_1 + email.substring(j, j + 1)
               } else if ( email.substring(j, j + 1) == "@" )  {
						check_point = check_point + 1;
               } else {
               		email_2 = email_2 + email.substring(j, j + 1);	
               }
          }

	//if (email_1.length < 3 ) {
	//	alert("e-mail에 @ 앞자리는 3자리이상 입력하셔야합니다.");
	//	form1.email.focus();
	//	return false;
	//}
	
	//if (email_2.length < 2 ) {
	//	alert("e-mail에 @ 뒷자리는 2자리이상 입력하셔야합니다.");
	//	form1.email.focus();
	//	return false;
	//}

	if (check_point > 1 ) {
		alert("e-mail에 @ 는 1번이상 들어갈수 없습니다.");
		return false;
	}

	if (email_2.indexOf("(") >= 0 ) {
		alert("e-mail에 ( 는 포함할수 없습니다..");
		return false;
	}
	if (email_2.indexOf("(") >= 0 ) {
		alert("e-mail에 ( 는 포함할수 없습니다..");
		return false;
	}
	if (email_2.indexOf(")") >= 0 ) {
		alert("e-mail에 ) 는 포함할수 없습니다..");
		return false;
	}
	if (email_2.indexOf(",") >= 0 ) {
		alert("e-mail에 , 는 포함할수 없습니다..");
		return false;
	}
	if (email_2.indexOf(";") >= 0 ) {
		alert("e-mail에 ; 는 포함할수 없습니다..");
		return false;
	}
	if (email_2.indexOf(":") >= 0 ) {
		alert("e-mail에 : 는 포함할수 없습니다..");
		return false;
	}
	if (email_2.indexOf("/") >= 0 ) {
		alert("e-mail에 / 는 포함할수 없습니다..");
		return false;
	}
	if (email_2.indexOf("[") >= 0 ) {
		alert("e-mail에 [ 는 포함할수 없습니다..");
		return false;
	}
	if (email_2.indexOf("]") >= 0 ) {
		alert("e-mail에 ] 는 포함할수 없습니다..");
		return false;
	}
	if (email_2.indexOf("{") >= 0 ) {
		alert("e-mail에 { 는 포함할수 없습니다..");
		return false;
	}
	if (email_2.indexOf("}") >= 0 ) {
		alert("e-mail에 } 는 포함할수 없습니다..");
		return false;
	}
	if (email_2.indexOf(" ") >= 0 ) {
		alert("e-mail에 스페이스는 포함할수 없습니다..");
		return false;
	}
	return true;
	
}

// 숫자 체크
function Check_Num(tocheck)
{
	var isnum = true;
	
	if (tocheck == null || tocheck == "")
	{
		isnum = false;
		return isnum;
	}
	
	for (var j = 0 ; j < tocheck.length; j++)
	{
		if (      tocheck.substring(j, j + 1) != "0"
			&&   tocheck.substring(j, j + 1) != "1"
			&&   tocheck.substring(j, j + 1) != "2"
			&&   tocheck.substring(j, j + 1) != "3"
			&&   tocheck.substring(j, j + 1) != "4"
			&&   tocheck.substring(j, j + 1) != "5"
			&&   tocheck.substring(j, j + 1) != "6"
			&&   tocheck.substring(j, j + 1) != "7"
			&&   tocheck.substring(j, j + 1) != "8"
			&&   tocheck.substring(j, j + 1) != "9" )
		{
			isnum = false;
		}
	}
	return isnum;
}

// 주민 등록 번호 체크
function check_ResidentNO(str_f_num, str_l_num)
{  

	var i3=0
	for (var i=0;i<str_f_num.length;i++)
	{
		var ch1 = str_f_num.substring(i,i+1);
		if (ch1<'0' || ch1>'9') { i3=i3+1 }
	}
	if ((str_f_num == '') || ( i3 != 0 ))
	{
		return (false);
	}

	var i4=0
	for (var i=0;i<str_l_num.length;i++)
	{
		var ch1 = str_l_num.substring(i,i+1);
		if (ch1<'0' || ch1>'9') { i4=i4+1 }
	}
	if ((str_l_num == '') || ( i4 != 0 ))
	{
		return (false);
	}
	
	if(str_f_num.substring(0,1) < 0)
	{
		return (false);
	}
	
	if(str_l_num.substring(0,1) > 2)
	{
		return (false);
	}
	
	if((str_f_num.length > 7) || (str_l_num.length > 8))
	{
		return (false);
	}
	
	if ((str_f_num == '72') || ( str_l_num == '18'))
	{
		return (false);
	}
	
	var f1=str_f_num.substring(0,1)
	var f2=str_f_num.substring(1,2)
	var f3=str_f_num.substring(2,3)
	var f4=str_f_num.substring(3,4)
	var f5=str_f_num.substring(4,5)
	var f6=str_f_num.substring(5,6)
	var hap=f1*2+f2*3+f3*4+f4*5+f5*6+f6*7
	var l1=str_l_num.substring(0,1)
	var l2=str_l_num.substring(1,2)
	var l3=str_l_num.substring(2,3)
	var l4=str_l_num.substring(3,4)
	var l5=str_l_num.substring(4,5)
	var l6=str_l_num.substring(5,6)
	var l7=str_l_num.substring(6,7)
	hap=hap+l1*8+l2*9+l3*2+l4*3+l5*4+l6*5
	hap=hap%11
	hap=11-hap
	hap=hap%10
	if (hap != l7) 
	{
		return (false);
	}
	
	return true; 
}

// 특수문자가있는지 체크
function Check_Char(id_text)
{
	var alpha = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	var numeric = '1234567890';
	var nonkorean = alpha+numeric; 
	
	var i ; 
	for ( i=0; i < id_text.length; i++ )  {
		if( nonkorean.indexOf(id_text.substring(i,i+1)) < 0) {
			break ; 
		}
	}
	
	if ( i != id_text.length ) {
		return false ; 
	}
	else{
		return true ;
	} 
	
	return true;
}

// 특수문자 체크
function Check_nonChar(id_text)
{
	var nonchar = '~`!@#$%^&*()-_=+\|<>?,./;:"';
	var numeric = '1234567890';
	var nonkorean = nonchar+numeric; 
	
	var i ; 
	for ( i=0; i < id_text.length; i++ )  {
		if( nonkorean.indexOf(id_text.substring(i,i+1)) > 0) {
			break ; 
		}
	}
	
	if ( i != id_text.length ) {
		return false ; 
	}
	else{
		return true ;
	} 
	
	return false;
}