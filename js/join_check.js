// �Է°� üũ
function inputCheck(frm){
   
   if(frm.id.value.length < 4 || frm.id.value.length > 12){
      alert("���̵�� 4 ~ 12�ڸ��� �����մϴ�.");
      frm.id.focus();
      return false;
   }else{
      if(!Check_Char(frm.id.value)){
         alert("���̵�� Ư�����ڸ� ����Ҽ� �����ϴ�.");
         frm.id.focus();
         return false;
      }
   }

   if(frm.passwd.value.length < 4 || frm.passwd.value.length > 12){
      alert("��й�ȣ�� 4 ~ 12�ڸ��Դϴ�");
      frm.passwd.focus();
      return false;
   }
   if(frm.passwd2.value.length < 4 || frm.passwd2.value.length > 12){
      alert("��й�ȣ�� 4 ~ 12�ڸ��Դϴ�");
      frm.passwd2.focus();
      return false;
   }
   if(frm.passwd.value != frm.passwd2.value){
      alert("��й�ȣ�� ��ġ���� �ʽ��ϴ�");
      frm.passwd.focus();
      return false;
   }

   if(frm.name.value == ""){
      alert("�̸��� �Է��ϼ���");
      frm.name.focus();
      return false;
   }else{
      if(!Check_nonChar(frm.name.value)){
         alert("�̸����� Ư�����ڰ� �� �� �����ϴ�");
         frm.name.focus();
         return false;
      }
   }

   if(frm.resno.value == ""){
      alert("�ֹι�ȣ�� �Է��ϼ���");
      frm.resno.focus();
      return false;
   }
   if(frm.resno2.value == ""){
      alert("�ֹι�ȣ�� �Է��ϼ���");
      frm.resno2.focus();
      return false;
   }
   if(!check_ResidentNO(frm.resno.value, frm.resno2.value)){
      alert("�ֹι�ȣ�� �ùٸ��� �ʽ��ϴ�");
      frm.resno.value == "";
      frm.resno2.value == "";
      frm.resno.focus();
      return false;
   }
   
   if(frm.post.value == ""){
      alert("�����ȣ�� �Է��ϼ���");
      frm.post.focus();
      return false;
   }
   if(frm.post2.value == ""){
      alert("�����ȣ�� �Է��ϼ���");
      frm.post2.focus();
      return false;
   }
   if(frm.post.value.length != 3 || frm.post2.value.length != 3){
      alert("�����ȣ�� �ùٸ��� �ʽ��ϴ�");
      frm.post.focus();
      return false;
   }
   if(frm.address.value == ""){
      alert("�ּҸ� �Է��ϼ���");
      frm.address.focus();
      return false;
   }
   if(frm.address2.value == ""){
      alert("���ּҸ� �Է��ϼ���");
      frm.address2.focus();
      return false;
   }
   
   if(frm.tphone.value == ""){
      alert("��ȭ��ȣ�� �Է��ϼ���");
      frm.tphone.focus();
      return false;
   }else if(!Check_Num(frm.tphone.value)){
      alert("������ȣ�� ���ڸ� �����մϴ�.");
      frm.tphone.focus();
      return false;
   }
   if(frm.tphone2.value == ""){
      alert("��ȭ��ȣ�� �Է��ϼ���");
      frm.tphone2.focus();
      return false;
   }else if(!Check_Num(frm.tphone2.value)){
      alert("������ ���ڸ� �����մϴ�.");
      frm.tphone2.focus();
      return false;
   }
   if(frm.tphone3.value == ""){
      alert("��ȭ��ȣ�� �Է��ϼ���");
      frm.tphone3.focus();
      return false;
   }else if(!Check_Num(frm.tphone3.value)){
      alert("��ȭ��ȣ�� ���ڸ� �����մϴ�");
      frm.tphone3.focus();
      return false;
   }
   
   if(frm.email.value == ""){
      alert("�̸����� �Է��ϼ���.");
      frm.email.focus();
      return false;
   }else if(!check_Email(frm.email.value)){
      frm.email.focus();
      return false;
   }
   
   if(frm.recom.value != ""){
      if(frm.recom.value == frm.id.value){
         alert("�ڱ� �ڽ��� ��õ���� �� �� �����ϴ�.");
         frm.recom.value = "";
         return false;
      }
   }
}

// ���̵� �ߺ�Ȯ��
function searchId(){
   var id = document.frm.id.value;
   var url = "search_id.php?id=" + id;
   window.open(url, "searchId", "height=220, width=423, menubar=no, scrollbars=no, resizable=no, toolbar=no, status=no, left=150, top=150");
}

// �����ȣ ã��
function searchPost(){
   document.frm.address.focus();
   var url = "search_post.php";
   window.open(url, "searchPost", "height=300, width=440, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no, left=50, top=50");
}