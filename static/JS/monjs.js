function BasculeElement(_this){
	var Onglet_li = document.getElementById('ul_onglets').getElementsByTagName('li');
	for(var i = 0; i < Onglet_li.length; i++){
		if(Onglet_li[i].id){
			if(Onglet_li[i].id == _this.id){
				Onglet_li[i].className = 'active';
				document.getElementById('#' + _this.id).style.display = 'block';
			}
			else{
				Onglet_li[i].className = '';
				document.getElementById('#' + Onglet_li[i].id).style.display = 'none';
			}
		}
	}           
}
