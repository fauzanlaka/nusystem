function chkpssw(){
    if(document.checkpassword.chkpssw_password.value != document.checkpassword.chkpssw_confirmpassword.value){
        alert('Kata password tidak sama');
        document.checkpassword.chkpssw_confirmpassword.focus();     
	return false;
    } 
	document.checkpassword.submit();
}