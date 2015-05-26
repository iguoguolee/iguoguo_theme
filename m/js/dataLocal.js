var lstorage = (function(){
	var ls  = window.localStorage?window.localStorage:null;

	return {
		isSupport :function (){
			return ls!=null;
		},
		add:function(key,value){
			ls[key] = value;
			return this;
		},
		get:function(key){
			return ls[key];
		},
		addJson:function(key,json){
			console.warn(json);
			ls[key] = JSON.stringify(json);
			console.warn(key)
			return this;
		},
		getJson:function(key){
			if(ls[key]&&ls[key]!=""){
				return JSON.parse(ls[key]);
			}else
			{
				return false;
			}
			
		},
		remove:function(key)
		{
			ls.removeItem(key);
			return this;
		}
	}
})();
var userSession = (function(ls){
		return {
			login:function(uid,username,psw,email)
			{
				ls.add("uid",uid).add("username",username).add("psw",psw).add("email",email);
			},
			logout:function(){
				ls.remove("uid").remove("username").remove("psw").remove("email");
			},
			uname:function(){
				return ls.get("username")
			},
			uid:function(){
				return ls.get("uid")
			}
		}
})(lstorage);
var postStorage = (function(ls){
	return {
		setPost:function(id,json){
			var key = "post_"+id;
			ls.addJson(key,json);
		},
		getPost:function(id){
			var key = "post_"+id;
			return ls.getJson(key);
		},
		setCat:function(catid,page,json)
		{
			var key="cat_"+catid+"_page_"+page;
			ls.addJson(key,json);
		},
		getCat:function(catid,page)
		{
			if(!page||page<1)page=1;
			var key = "cat_"+catid+"_page_"+page;
			return ls.getJson(key);
		}
	}
})(lstorage);