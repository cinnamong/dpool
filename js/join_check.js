// 입력값 체크
function inputCheck(frm){
   
   if(frm.id.value.length < 4 || frm.id.value.length > 12){
      alert("아이디는 4 ~ 12자리만 가능합니다.");
      frm.id.focus();
      return false;
   }else{
      if(!Check_Char(frm.id.value)){
         alert("아이디는 특수문자를 사용할수 없습니다.");
         frm.id.focus();
         return false;
      }
   }

   if(frm.passwd.value.length < 4 || frm.passwd.value.length > 12){
      alert("비밀번호는 4 ~ 12자리입니다");
      frm.passwd.focus();
      return false;
   }
   if(frm.passwd2.value.length < 4 || frm.passwd2.value.length > 12){
      alert("비밀번호는 4 ~ 12자리입니다");
      frm.passwd2.focus();
      return false;
   }
   if(frm.passwd.value != frm.passwd2.value){
      alert("비밀번호가 일치하지 않습니다");
      frm.passwd.focus();
      return false;
   }

   if(frm.name.value == ""){
      alert("이름을 입력하세요");
      frm.name.focus();
      return false;
   }else{
      if(!Check_nonChar(frm.name.value)){
         alert("이름에는 특수문자가 들어갈 수 없습니다");
         frm.name.focus();
         return false;
      }
   }

   if(frm.resno.value == ""){
      alert("주민번호를 입력하세요");
      frm.resno.focus();
      return false;
   }
   if(frm.resno2.value == ""){
      alert("주민번호를 입력하세요");
      frm.resno2.focus();
      return false;
   }
   if(!check_ResidentNO(frm.resno.value, frm.resno2.value)){
      alert("주민번호가 올바르지 않습니다");
      frm.resno.value == "";
      frm.resno2.value == "";
      frm.resno.focus();
      return false;
   }
   
   if(frm.post.value == ""){
      alert("우편번호를 입력하세요");
      frm.post.focus();
      return false;
   }
   if(frm.post2.value == ""){
      alert("우편번호를 입력하세요");
      frm.post2.focus();
      return false;
   }
   if(frm.post.value.length != 3 || frm.post2.value.length != 3){
      alert("우편번호가 올바르지 않습니다");
      frm.post.focus();
      return false;
   }
   if(frm.address.value == ""){
      alert("주소를 입력하세요");
      frm.address.focus();
      return false;
   }
   if(frm.address2.value == ""){
      alert("상세주소를 입력하세요");
      frm.address2.focus();
      return false;
   }
   
   if(frm.tphone.value == ""){
      alert("전화번호를 입력하세요");
      frm.tphone.focus();
      return false;
   }else if(!Check_Num(frm.tphone.value)){
      alert("지역번호는 숫자만 가능합니다.");
      frm.tphone.focus();
      return false;
   }
   if(frm.tphone2.value == ""){
      alert("전화번호를 입력하세요");
      frm.tphone2.focus();
      return false;
   }else if(!Check_Num(frm.tphone2.value)){
      alert("국번은 숫자만 가능합니다.");
      frm.tphone2.focus();
      return false;
   }
   if(frm.tphone3.value == ""){
      alert("전화번호를 입력하세요");
      frm.tphone3.focus();
      return false;
   }else if(!Check_Num(frm.tphone3.value)){
      alert("전화번호는 숫자만 가능합니다");
      frm.tphone3.focus();
      return false;
   }
   
   if(frm.email.value == ""){
      alert("이메일을 입력하세요.");
      frm.email.focus();
      return false;
   }else if(!check_Email(frm.email.value)){
      frm.email.focus();
      return false;
   }
   
   if(frm.recom.value != ""){
      if(frm.recom.value == frm.id.value){
         alert("자기 자신은 추천인이 될 수 없습니다.");
         frm.recom.value = "";
         return false;
      }
   }
}

// 아이디 중복확인
function searchId(){
   var id = document.frm.id.value;
   var url = "search_id.php?id=" + id;
   window.open(url, "searchId", "height=220, width=423, menubar=no, scrollbars=no, resizable=no, toolbar=no, status=no, left=150, top=150");
}

// 우편번호 찾기
function searchPost(){
   document.frm.address.focus();
   var url = "search_post.php";
   window.open(url, "searchPost", "height=300, width=440, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no, left=50, top=50");
}