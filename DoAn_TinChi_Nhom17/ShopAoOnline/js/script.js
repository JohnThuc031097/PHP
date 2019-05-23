var host = "localhost";
	domain = "ShopAoOnline";
function readURL(input, idPic) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function (e) {$('#'+idPic).attr('src', e.target.result);}
		reader.readAsDataURL(input.files[0]);
	}
}

function addCart(mamh){
	window.location.replace("http://"+host+"/"+domain+"/TrangChu.php?addcard="+mamh+"&posx="+window.scrollY);
}

function redictPage(offset, page){
	window.location.replace("http://"+host+"/"+domain+"/TrangChu.php?offset="+offset+"&page="+page);
}

function redictTH(math, loai){
	if(loai=="0"){
		var sl = document.getElementById("frmTuiHang").elements.namedItem("txtSL-"+math).value;
			lg = document.getElementById("frmTuiHang").elements.namedItem("cmbGia-"+math).value;
		window.location.replace("http://"+host+"/"+domain+"/TuiHang.php?cn=0&math="+math+"&sl="+sl+"&lg="+lg+"&posx="+window.scrollY);	
	}else{
		window.location.replace("http://"+host+"/"+domain+"/TuiHang.php?cn=1&math="+math+"&posx="+(window.scrollY-261));	
	}
}
function redictSearch(){
	var strSearch = document.getElementById("frmTrangChu").elements.namedItem("txtSearch").value;
		window.location.replace("http://"+host+"/"+domain+"/TrangChu.php?tmh=");
}

function redictXH(mah){
	window.location.replace("http://"+host+"/"+domain+"/XemMatHang.php?mah="+mah+"&posx="+window.scrollY);
}
