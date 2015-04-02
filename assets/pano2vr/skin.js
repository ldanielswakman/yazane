// Garden Gnome Software - Skin
// Pano2VR 4.0/3102S
// Filename: arayuz.ggsk
// Generated Per 4. Eyl 14:06:35 2014

function pano2vrSkin(player,base) {
	var me=this;
	var flag=false;
	var nodeMarker=new Array();
	var activeNodeMarker=new Array();
	this.player=player;
	this.player.skinObj=this;
	this.divSkin=player.divSkin;
	var basePath="";
	// auto detect base path
	var scripts = document.getElementsByTagName('script');
	for(var i=0;i<scripts.length;i++) {
		var src=scripts[i].src;
		if (src.indexOf('skin.js')>=0) {
			var p=src.lastIndexOf('/');
			if (p>=0) {
				basePath=src.substr(0,p+1);
			}
		}
	}

	this.elementMouseDown=new Array();
	this.elementMouseOver=new Array();
	var cssPrefix='';
	var domTransition='transition';
	var domTransform='transform';
	var prefixes='Webkit,Moz,O,ms,Ms'.split(',');
	var i;
	for(i=0;i<prefixes.length;i++) {
		if (typeof document.body.style[prefixes[i] + 'Transform'] !== 'undefined') {
			cssPrefix='-' + prefixes[i].toLowerCase() + '-';
			domTransition=prefixes[i] + 'Transition';
			domTransform=prefixes[i] + 'Transform';
		}
	}
	
	this.player.setMargins(0,0,0,0);
	
	this.updateSize=function(startElement) {
		var stack=new Array();
		stack.push(startElement);
		while(stack.length>0) {
			e=stack.pop();
			if (e.ggUpdatePosition) {
				e.ggUpdatePosition();
			}
			if (e.hasChildNodes()) {
				for(i=0;i<e.childNodes.length;i++) {
					stack.push(e.childNodes[i]);
				}
			}
		}
	}
	
	parameterToTransform=function(p) {
		return 'translate(' + p.rx + 'px,' + p.ry + 'px) rotate(' + p.a + 'deg) scale(' + p.sx + ',' + p.sy + ')';
	}
	
	this.findElements=function(id,regex) {
		var r=new Array();
		var stack=new Array();
		var pat=new RegExp(id,'');
		stack.push(me.divSkin);
		while(stack.length>0) {
			e=stack.pop();
			if (regex) {
				if (pat.test(e.ggId)) r.push(e);
			} else {
				if (e.ggId==id) r.push(e);
			}
			if (e.hasChildNodes()) {
				for(i=0;i<e.childNodes.length;i++) {
					stack.push(e.childNodes[i]);
				}
			}
		}
		return r;
	}
	
	this.preloadImages=function() {
		var preLoadImg=new Image();
		preLoadImg.src=basePath + 'skinimages/button_10__o.png';
	}
	
	this.addSkin=function() {
		this._image_13=document.createElement('div');
		this._image_13.ggId='Image 13';
		this._image_13.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._image_13.ggVisible=true;
		this._image_13.ggUpdatePosition=function() {
			this.style[domTransition]='none';
			if (this.parentNode) {
				h=this.parentNode.offsetHeight;
				this.style.top=(-246 + h) + 'px';
			}
		}
		hs ='position:absolute;';
		hs+='left: 0px;';
		hs+='top:  -246px;';
		hs+='width: 239px;';
		hs+='height: 208px;';
		hs+=cssPrefix + 'transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		this._image_13.setAttribute('style',hs);
		this._image_13__img=document.createElement('img');
		this._image_13__img.setAttribute('src',basePath + 'skinimages/image_13.png');
		this._image_13__img.setAttribute('style','position: absolute;top: 0px;left: 0px;');
		me.player.checkLoaded.push(this._image_13__img);
		this._image_13.appendChild(this._image_13__img);
		this._text_14=document.createElement('div');
		this._text_14.ggId='Text 14';
		this._text_14.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._text_14.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: -7px;';
		hs+='top:  0px;';
		hs+='width: 250px;';
		hs+='height: 203px;';
		hs+=cssPrefix + 'transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		hs+='border: 0px solid #000000;';
		hs+='color: #000000;';
		hs+='text-align: center;';
		hs+='white-space: nowrap;';
		hs+='white-space: nowrap;';
		hs+='padding: 0px 1px 0px 1px;';
		hs+='overflow: hidden;';
		this._text_14.setAttribute('style',hs);
		this._text_14.innerHTML="<div id=\"mapdiv\" style=\"width:252px; height:196px\">map goes here!<\/div>";
		this._image_13.appendChild(this._text_14);
		this.divSkin.appendChild(this._image_13);
		this._image_17=document.createElement('div');
		this._image_17.ggId='Image 17';
		this._image_17.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._image_17.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: 0px;';
		hs+='top:  0px;';
		hs+='width: 2600px;';
		hs+='height: 1870px;';
		hs+=cssPrefix + 'transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		this._image_17.setAttribute('style',hs);
		this._image_17__img=document.createElement('img');
		this._image_17__img.setAttribute('src',basePath + 'skinimages/image_17.png');
		this._image_17__img.setAttribute('style','position: absolute;top: 0px;left: 0px;');
		me.player.checkLoaded.push(this._image_17__img);
		this._image_17.appendChild(this._image_17__img);
		this.divSkin.appendChild(this._image_17);
		this._loading_bar=document.createElement('div');
		this._loading_bar.ggId='loading bar';
		this._loading_bar.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._loading_bar.ggVisible=false;
		this._loading_bar.ggUpdatePosition=function() {
			this.style[domTransition]='none';
			if (this.parentNode) {
				w=this.parentNode.offsetWidth;
				this.style.left=(-80 + w/2) + 'px';
				h=this.parentNode.offsetHeight;
				this.style.top=(50 + h/2) + 'px';
			}
		}
		hs ='position:absolute;';
		hs+='left: -80px;';
		hs+='top:  50px;';
		hs+='width: 180px;';
		hs+='height: 22px;';
		hs+=cssPrefix + 'transform-origin: 0% 50%;';
		hs+='visibility: hidden;';
		hs+='border: 0px solid #000080;';
		hs+='background-color: #070707;';
		this._loading_bar.setAttribute('style',hs);
		this.divSkin.appendChild(this._loading_bar);
		this._loading_text=document.createElement('div');
		this._loading_text.ggId='loading text';
		this._loading_text.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._loading_text.ggVisible=true;
		this._loading_text.ggUpdatePosition=function() {
			this.style[domTransition]='none';
			if (this.parentNode) {
				w=this.parentNode.offsetWidth;
				this.style.left=(-79 + w/2) + 'px';
				h=this.parentNode.offsetHeight;
				this.style.top=(52 + h/2) + 'px';
			}
		}
		hs ='position:absolute;';
		hs+='left: -79px;';
		hs+='top:  52px;';
		hs+='width: 180px;';
		hs+='height: 18px;';
		hs+=cssPrefix + 'transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		hs+='border: 0px solid #000000;';
		hs+='color: #ffffff;';
		hs+='text-align: left;';
		hs+='white-space: nowrap;';
		hs+='white-space: nowrap;';
		hs+='padding: 0px 1px 0px 1px;';
		hs+='overflow: hidden;';
		this._loading_text.setAttribute('style',hs);
		this._loading_text.ggUpdateText=function() {
			this.innerHTML="<b>"+(me.player.getPercentLoaded()*100.0).toFixed(0)+"%<\/b>";
		}
		this._loading_text.ggUpdateText();
		this.divSkin.appendChild(this._loading_text);
		this._image_19=document.createElement('div');
		this._image_19.ggId='Image 19';
		this._image_19.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._image_19.ggVisible=true;
		this._image_19.ggUpdatePosition=function() {
			this.style[domTransition]='none';
			if (this.parentNode) {
				w=this.parentNode.offsetWidth;
				this.style.left=(-103 + w/2) + 'px';
				h=this.parentNode.offsetHeight;
				this.style.top=(-1 + h/2) + 'px';
			}
		}
		hs ='position:absolute;';
		hs+='left: -103px;';
		hs+='top:  -1px;';
		hs+='width: 220px;';
		hs+='height: 44px;';
		hs+=cssPrefix + 'transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		this._image_19.setAttribute('style',hs);
		this._image_19__img=document.createElement('img');
		this._image_19__img.setAttribute('src',basePath + 'skinimages/image_19.png');
		this._image_19__img.setAttribute('style','position: absolute;top: 0px;left: 0px;');
		me.player.checkLoaded.push(this._image_19__img);
		this._image_19.appendChild(this._image_19__img);
		this.divSkin.appendChild(this._image_19);
		this._image_1=document.createElement('div');
		this._image_1.ggId='Image 1';
		this._image_1.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._image_1.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: -3px;';
		hs+='top:  -62px;';
		hs+='width: 2488px;';
		hs+='height: 140px;';
		hs+=cssPrefix + 'transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		this._image_1.setAttribute('style',hs);
		this._image_1__img=document.createElement('img');
		this._image_1__img.setAttribute('src',basePath + 'skinimages/image_1.png');
		this._image_1__img.setAttribute('style','position: absolute;top: 0px;left: 0px;');
		me.player.checkLoaded.push(this._image_1__img);
		this._image_1.appendChild(this._image_1__img);
		this.divSkin.appendChild(this._image_1);
		this._button_2=document.createElement('div');
		this._button_2.ggId='Button 2';
		this._button_2.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._button_2.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: 35px;';
		hs+='top:  8px;';
		hs+='width: 200px;';
		hs+='height: 40px;';
		hs+=cssPrefix + 'transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		hs+='cursor: pointer;';
		this._button_2.setAttribute('style',hs);
		this._button_2__img=document.createElement('img');
		this._button_2__img.setAttribute('src',basePath + 'skinimages/button_2.png');
		this._button_2__img.setAttribute('style','position: absolute;top: 0px;left: 0px;');
		me.player.checkLoaded.push(this._button_2__img);
		this._button_2.appendChild(this._button_2__img);
		this._button_2.onclick=function () {
			me.player.openUrl("/", "_self");
		}
		this.divSkin.appendChild(this._button_2);
		this._image_3=document.createElement('div');
		this._image_3.ggId='Image 3';
		this._image_3.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._image_3.ggVisible=true;
		this._image_3.ggUpdatePosition=function() {
			this.style[domTransition]='none';
			if (this.parentNode) {
				h=this.parentNode.offsetHeight;
				this.style.top=(-65 + h) + 'px';
			}
		}
		hs ='position:absolute;';
		hs+='left: 0px;';
		hs+='top:  -65px;';
		hs+='width: 2500px;';
		hs+='height: 149px;';
		hs+=cssPrefix + 'transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		this._image_3.setAttribute('style',hs);
		this._image_3__img=document.createElement('img');
		this._image_3__img.setAttribute('src',basePath + 'skinimages/image_3.png');
		this._image_3__img.setAttribute('style','position: absolute;top: 0px;left: 0px;');
		me.player.checkLoaded.push(this._image_3__img);
		this._image_3.appendChild(this._image_3__img);
		this.divSkin.appendChild(this._image_3);
		this._container_22=document.createElement('div');
		this._container_22.ggId='Container 22';
		this._container_22.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._container_22.ggVisible=true;
		this._container_22.ggUpdatePosition=function() {
			this.style[domTransition]='none';
			if (this.parentNode) {
				w=this.parentNode.offsetWidth;
				this.style.left=(-137 + w/2) + 'px';
				h=this.parentNode.offsetHeight;
				this.style.top=(-41 + h) + 'px';
			}
		}
		hs ='position:absolute;';
		hs+='left: -137px;';
		hs+='top:  -41px;';
		hs+='width: 309px;';
		hs+='height: 39px;';
		hs+=cssPrefix + 'transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		this._container_22.setAttribute('style',hs);
		this._button_12=document.createElement('div');
		this._button_12.ggId='Button 12';
		this._button_12.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._button_12.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: 284px;';
		hs+='top:  5px;';
		hs+='width: 23px;';
		hs+='height: 30px;';
		hs+=cssPrefix + 'transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		hs+='cursor: pointer;';
		this._button_12.setAttribute('style',hs);
		this._button_12__img=document.createElement('img');
		this._button_12__img.setAttribute('src',basePath + 'skinimages/button_12.png');
		this._button_12__img.setAttribute('style','position: absolute;top: 0px;left: 0px;');
		me.player.checkLoaded.push(this._button_12__img);
		this._button_12.appendChild(this._button_12__img);
		this._button_12.onclick=function () {
			flag=(me._image_13.style.visibility=='hidden');
			me._image_13.style[domTransition]='none';
			me._image_13.style.visibility=flag?'inherit':'hidden';
			me._image_13.ggVisible=flag;
		}
		this._container_22.appendChild(this._button_12);
		this._button_7=document.createElement('div');
		this._button_7.ggId='Button 7';
		this._button_7.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._button_7.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: 109px;';
		hs+='top:  7px;';
		hs+='width: 23px;';
		hs+='height: 28px;';
		hs+=cssPrefix + 'transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		hs+='cursor: pointer;';
		this._button_7.setAttribute('style',hs);
		this._button_7__img=document.createElement('img');
		this._button_7__img.setAttribute('src',basePath + 'skinimages/button_7.png');
		this._button_7__img.setAttribute('style','position: absolute;top: 0px;left: 0px;');
		me.player.checkLoaded.push(this._button_7__img);
		this._button_7.appendChild(this._button_7__img);
		this._button_7.onmouseout=function () {
			me.elementMouseDown['button_7']=false;
		}
		this._button_7.onmousedown=function () {
			me.elementMouseDown['button_7']=true;
		}
		this._button_7.onmouseup=function () {
			me.elementMouseDown['button_7']=false;
		}
		this._button_7.ontouchend=function () {
			me.elementMouseDown['button_7']=false;
		}
		this._container_22.appendChild(this._button_7);
		this._button_6=document.createElement('div');
		this._button_6.ggId='Button 6';
		this._button_6.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._button_6.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: 6px;';
		hs+='top:  11px;';
		hs+='width: 28px;';
		hs+='height: 23px;';
		hs+=cssPrefix + 'transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		hs+='cursor: pointer;';
		this._button_6.setAttribute('style',hs);
		this._button_6__img=document.createElement('img');
		this._button_6__img.setAttribute('src',basePath + 'skinimages/button_6.png');
		this._button_6__img.setAttribute('style','position: absolute;top: 0px;left: 0px;');
		me.player.checkLoaded.push(this._button_6__img);
		this._button_6.appendChild(this._button_6__img);
		this._button_6.onmouseout=function () {
			me.elementMouseDown['button_6']=false;
		}
		this._button_6.onmousedown=function () {
			me.elementMouseDown['button_6']=true;
		}
		this._button_6.onmouseup=function () {
			me.elementMouseDown['button_6']=false;
		}
		this._button_6.ontouchend=function () {
			me.elementMouseDown['button_6']=false;
		}
		this._container_22.appendChild(this._button_6);
		this._button_5=document.createElement('div');
		this._button_5.ggId='Button 5';
		this._button_5.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._button_5.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: 41px;';
		hs+='top:  9px;';
		hs+='width: 28px;';
		hs+='height: 23px;';
		hs+=cssPrefix + 'transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		hs+='cursor: pointer;';
		this._button_5.setAttribute('style',hs);
		this._button_5__img=document.createElement('img');
		this._button_5__img.setAttribute('src',basePath + 'skinimages/button_5.png');
		this._button_5__img.setAttribute('style','position: absolute;top: 0px;left: 0px;');
		me.player.checkLoaded.push(this._button_5__img);
		this._button_5.appendChild(this._button_5__img);
		this._button_5.onmouseout=function () {
			me.elementMouseDown['button_5']=false;
		}
		this._button_5.onmousedown=function () {
			me.elementMouseDown['button_5']=true;
		}
		this._button_5.onmouseup=function () {
			me.elementMouseDown['button_5']=false;
		}
		this._button_5.ontouchend=function () {
			me.elementMouseDown['button_5']=false;
		}
		this._container_22.appendChild(this._button_5);
		this._button_4=document.createElement('div');
		this._button_4.ggId='Button 4';
		this._button_4.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._button_4.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: 79px;';
		hs+='top:  7px;';
		hs+='width: 23px;';
		hs+='height: 28px;';
		hs+=cssPrefix + 'transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		hs+='cursor: pointer;';
		this._button_4.setAttribute('style',hs);
		this._button_4__img=document.createElement('img');
		this._button_4__img.setAttribute('src',basePath + 'skinimages/button_4.png');
		this._button_4__img.setAttribute('style','position: absolute;top: 0px;left: 0px;');
		me.player.checkLoaded.push(this._button_4__img);
		this._button_4.appendChild(this._button_4__img);
		this._button_4.onmouseout=function () {
			me.elementMouseDown['button_4']=false;
		}
		this._button_4.onmousedown=function () {
			me.elementMouseDown['button_4']=true;
		}
		this._button_4.onmouseup=function () {
			me.elementMouseDown['button_4']=false;
		}
		this._button_4.ontouchend=function () {
			me.elementMouseDown['button_4']=false;
		}
		this._container_22.appendChild(this._button_4);
		this._button_9=document.createElement('div');
		this._button_9.ggId='Button 9';
		this._button_9.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._button_9.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: 157px;';
		hs+='top:  5px;';
		hs+='width: 30px;';
		hs+='height: 30px;';
		hs+=cssPrefix + 'transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		hs+='cursor: pointer;';
		this._button_9.setAttribute('style',hs);
		this._button_9__img=document.createElement('img');
		this._button_9__img.setAttribute('src',basePath + 'skinimages/button_9.png');
		this._button_9__img.setAttribute('style','position: absolute;top: 0px;left: 0px;');
		me.player.checkLoaded.push(this._button_9__img);
		this._button_9.appendChild(this._button_9__img);
		this._button_9.onmouseout=function () {
			me.elementMouseDown['button_9']=false;
		}
		this._button_9.onmousedown=function () {
			me.elementMouseDown['button_9']=true;
		}
		this._button_9.onmouseup=function () {
			me.elementMouseDown['button_9']=false;
		}
		this._button_9.ontouchend=function () {
			me.elementMouseDown['button_9']=false;
		}
		this._container_22.appendChild(this._button_9);
		this._button_11=document.createElement('div');
		this._button_11.ggId='Button 11';
		this._button_11.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._button_11.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: 242px;';
		hs+='top:  6px;';
		hs+='width: 28px;';
		hs+='height: 30px;';
		hs+=cssPrefix + 'transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		hs+='cursor: pointer;';
		this._button_11.setAttribute('style',hs);
		this._button_11__img=document.createElement('img');
		this._button_11__img.setAttribute('src',basePath + 'skinimages/button_11.png');
		this._button_11__img.setAttribute('style','position: absolute;top: 0px;left: 0px;');
		me.player.checkLoaded.push(this._button_11__img);
		this._button_11.appendChild(this._button_11__img);
		this._button_11.onclick=function () {
			me.player.toggleFullscreen();
		}
		this._container_22.appendChild(this._button_11);
		this._button_8=document.createElement('div');
		this._button_8.ggId='Button 8';
		this._button_8.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._button_8.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: 198px;';
		hs+='top:  5px;';
		hs+='width: 30px;';
		hs+='height: 30px;';
		hs+=cssPrefix + 'transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		hs+='cursor: pointer;';
		this._button_8.setAttribute('style',hs);
		this._button_8__img=document.createElement('img');
		this._button_8__img.setAttribute('src',basePath + 'skinimages/button_8.png');
		this._button_8__img.setAttribute('style','position: absolute;top: 0px;left: 0px;');
		me.player.checkLoaded.push(this._button_8__img);
		this._button_8.appendChild(this._button_8__img);
		this._button_8.onmouseout=function () {
			me.elementMouseDown['button_8']=false;
		}
		this._button_8.onmousedown=function () {
			me.elementMouseDown['button_8']=true;
		}
		this._button_8.onmouseup=function () {
			me.elementMouseDown['button_8']=false;
		}
		this._button_8.ontouchend=function () {
			me.elementMouseDown['button_8']=false;
		}
		this._container_22.appendChild(this._button_8);
		this.divSkin.appendChild(this._container_22);
		this._button_21=document.createElement('div');
		this._button_21.ggId='Button 21';
		this._button_21.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._button_21.ggVisible=true;
		this._button_21.ggUpdatePosition=function() {
			this.style[domTransition]='none';
			if (this.parentNode) {
				h=this.parentNode.offsetHeight;
				this.style.top=(-42 + h) + 'px';
			}
		}
		hs ='position:absolute;';
		hs+='left: 9px;';
		hs+='top:  -42px;';
		hs+='width: 24px;';
		hs+='height: 40px;';
		hs+=cssPrefix + 'transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		hs+='cursor: pointer;';
		this._button_21.setAttribute('style',hs);
		this._button_21__img=document.createElement('img');
		this._button_21__img.setAttribute('src',basePath + 'skinimages/button_21.png');
		this._button_21__img.setAttribute('style','position: absolute;top: 0px;left: 0px;');
		me.player.checkLoaded.push(this._button_21__img);
		this._button_21.appendChild(this._button_21__img);
		this._button_21.onclick=function () {
			flag=me._container_22.ggPositonActive;
			if (me.player.transitionsDisabled) {
				me._container_22.style[domTransition]='none';
			} else {
				me._container_22.style[domTransition]='all 1000ms ease-out 0ms';
			}
			if (flag) {
				me._container_22.ggParameter.rx=0;me._container_22.ggParameter.ry=0;
				me._container_22.style[domTransform]=parameterToTransform(me._container_22.ggParameter);
			} else {
				me._container_22.ggParameter.rx=0;me._container_22.ggParameter.ry=150;
				me._container_22.style[domTransform]=parameterToTransform(me._container_22.ggParameter);
			}
			me._container_22.ggPositonActive=!flag;
			flag=me._image_3.ggPositonActive;
			if (me.player.transitionsDisabled) {
				me._image_3.style[domTransition]='none';
			} else {
				me._image_3.style[domTransition]='all 1000ms ease-out 0ms';
			}
			if (flag) {
				me._image_3.ggParameter.rx=0;me._image_3.ggParameter.ry=0;
				me._image_3.style[domTransform]=parameterToTransform(me._image_3.ggParameter);
			} else {
				me._image_3.ggParameter.rx=0;me._image_3.ggParameter.ry=150;
				me._image_3.style[domTransform]=parameterToTransform(me._image_3.ggParameter);
			}
			me._image_3.ggPositonActive=!flag;
			flag=me._image_1.ggPositonActive;
			if (me.player.transitionsDisabled) {
				me._image_1.style[domTransition]='none';
			} else {
				me._image_1.style[domTransition]='all 1000ms ease-out 0ms';
			}
			if (flag) {
				me._image_1.ggParameter.rx=0;me._image_1.ggParameter.ry=0;
				me._image_1.style[domTransform]=parameterToTransform(me._image_1.ggParameter);
			} else {
				me._image_1.ggParameter.rx=0;me._image_1.ggParameter.ry=-150;
				me._image_1.style[domTransform]=parameterToTransform(me._image_1.ggParameter);
			}
			me._image_1.ggPositonActive=!flag;
			flag=me._button_10.ggPositonActive;
			if (me.player.transitionsDisabled) {
				me._button_10.style[domTransition]='none';
			} else {
				me._button_10.style[domTransition]='all 1000ms ease-out 0ms';
			}
			if (flag) {
				me._button_10.ggParameter.rx=0;me._button_10.ggParameter.ry=0;
				me._button_10.style[domTransform]=parameterToTransform(me._button_10.ggParameter);
			} else {
				me._button_10.ggParameter.rx=0;me._button_10.ggParameter.ry=-150;
				me._button_10.style[domTransform]=parameterToTransform(me._button_10.ggParameter);
			}
			me._button_10.ggPositonActive=!flag;
			flag=me._image_13.ggPositonActive;
			if (me.player.transitionsDisabled) {
				me._image_13.style[domTransition]='none';
			} else {
				me._image_13.style[domTransition]='all 1000ms ease-out 0ms';
			}
			if (flag) {
				me._image_13.ggParameter.rx=0;me._image_13.ggParameter.ry=0;
				me._image_13.style[domTransform]=parameterToTransform(me._image_13.ggParameter);
			} else {
				me._image_13.ggParameter.rx=-280;me._image_13.ggParameter.ry=0;
				me._image_13.style[domTransform]=parameterToTransform(me._image_13.ggParameter);
			}
			me._image_13.ggPositonActive=!flag;
		}
		this.divSkin.appendChild(this._button_21);
		this._button_10=document.createElement('div');
		this._button_10.ggId='Button 10';
		this._button_10.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._button_10.ggVisible=true;
		this._button_10.ggUpdatePosition=function() {
			this.style[domTransition]='none';
			if (this.parentNode) {
				w=this.parentNode.offsetWidth;
				this.style.left=(-42 + w) + 'px';
			}
		}
		hs ='position:absolute;';
		hs+='left: -42px;';
		hs+='top:  12px;';
		hs+='width: 30px;';
		hs+='height: 30px;';
		hs+=cssPrefix + 'transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		hs+='cursor: pointer;';
		this._button_10.setAttribute('style',hs);
		this._button_10__img=document.createElement('img');
		this._button_10__img.setAttribute('src',basePath + 'skinimages/button_10.png');
		this._button_10__img.setAttribute('style','position: absolute;top: 0px;left: 0px;');
		me.player.checkLoaded.push(this._button_10__img);
		this._button_10.appendChild(this._button_10__img);
		this._button_10.onclick=function () {
			me.player.openUrl("https:\/\/www.facebook.com\/Yazaneistanbul","_blank");
		}
		this._button_10.onmouseover=function () {
			me._button_10__img.src=basePath + 'skinimages/button_10__o.png';
		}
		this._button_10.onmouseout=function () {
			me._button_10__img.src=basePath + 'skinimages/button_10.png';
		}
		this.divSkin.appendChild(this._button_10);
		this.preloadImages();
		this.divSkin.ggUpdateSize=function(w,h) {
			me.updateSize(me.divSkin);
		}
		this.divSkin.ggViewerInit=function() {
		}
		this.divSkin.ggLoaded=function() {
			me._image_17.style[domTransition]='none';
			me._image_17.style.visibility='hidden';
			me._image_17.ggVisible=false;
			me._loading_bar.style[domTransition]='none';
			me._loading_bar.style.visibility='hidden';
			me._loading_bar.ggVisible=false;
			me._loading_text.style[domTransition]='none';
			me._loading_text.style.visibility='hidden';
			me._loading_text.ggVisible=false;
			me._image_19.style[domTransition]='none';
			me._image_19.style.visibility='hidden';
			me._image_19.ggVisible=false;
		}
		this.divSkin.ggReLoaded=function() {
			me._image_17.style[domTransition]='none';
			me._image_17.style.visibility='inherit';
			me._image_17.ggVisible=true;
			me._loading_bar.style[domTransition]='none';
			me._loading_bar.style.visibility='inherit';
			me._loading_bar.ggVisible=true;
			me._loading_text.style[domTransition]='none';
			me._loading_text.style.visibility='inherit';
			me._loading_text.ggVisible=true;
			me._image_19.style[domTransition]='none';
			me._image_19.style.visibility='inherit';
			me._image_19.ggVisible=true;
		}
		this.divSkin.ggEnterFullscreen=function() {
		}
		this.divSkin.ggExitFullscreen=function() {
		}
		this.skinTimerEvent();
	};
	this.hotspotProxyClick=function(id) {
	}
	this.hotspotProxyOver=function(id) {
	}
	this.hotspotProxyOut=function(id) {
	}
	this.changeActiveNode=function(id) {
		var newMarker=new Array();
		var i,j;
		var tags=me.player.userdata.tags;
		for (i=0;i<nodeMarker.length;i++) {
			var match=false;
			if (nodeMarker[i].ggMarkerNodeId==id) match=true;
			for(j=0;j<tags.length;j++) {
				if (nodeMarker[i].ggMarkerNodeId==tags[j]) match=true;
			}
			if (match) {
				newMarker.push(nodeMarker[i]);
			}
		}
		for(i=0;i<activeNodeMarker.length;i++) {
			if (newMarker.indexOf(activeNodeMarker[i])<0) {
				if (activeNodeMarker[i].ggMarkerNormal) {
					activeNodeMarker[i].ggMarkerNormal.style.visibility='inherit';
				}
				if (activeNodeMarker[i].ggMarkerActive) {
					activeNodeMarker[i].ggMarkerActive.style.visibility='hidden';
				}
				if (activeNodeMarker[i].ggDeactivate) {
					activeNodeMarker[i].ggDeactivate();
				}
			}
		}
		for(i=0;i<newMarker.length;i++) {
			if (activeNodeMarker.indexOf(newMarker[i])<0) {
				if (newMarker[i].ggMarkerNormal) {
					newMarker[i].ggMarkerNormal.style.visibility='hidden';
				}
				if (newMarker[i].ggMarkerActive) {
					newMarker[i].ggMarkerActive.style.visibility='inherit';
				}
				if (newMarker[i].ggActivate) {
					newMarker[i].ggActivate();
				}
			}
		}
		activeNodeMarker=newMarker;
	}
	this.skinTimerEvent=function() {
		setTimeout(function() { me.skinTimerEvent(); }, 10);
		var hs='';
		if (me._loading_bar.ggParameter) {
			hs+=parameterToTransform(me._loading_bar.ggParameter) + ' ';
		}
		hs+='scale(' + (1 * me.player.getPercentLoaded() + 0) + ',1.0) ';
		me._loading_bar.style[domTransform]=hs;
		this._loading_text.ggUpdateText();
		if (me.elementMouseDown['button_7']) {
			me.player.changeTilt(1,true);
		}
		if (me.elementMouseDown['button_6']) {
			me.player.changePan(1,true);
		}
		if (me.elementMouseDown['button_5']) {
			me.player.changePan(-1,true);
		}
		if (me.elementMouseDown['button_4']) {
			me.player.changeTilt(-1,true);
		}
		if (me.elementMouseDown['button_9']) {
			me.player.changeFovLog(-1,true);
		}
		if (me.elementMouseDown['button_8']) {
			me.player.changeFovLog(1,true);
		}
	};
	function SkinHotspotClass(skinObj,hotspot) {
		var me=this;
		var flag=false;
		this.player=skinObj.player;
		this.skin=skinObj;
		this.hotspot=hotspot;
		this.elementMouseDown=new Array();
		this.elementMouseOver=new Array();
		this.__div=document.createElement('div');
		this.__div.setAttribute('style','position:absolute; left:0px;top:0px;visibility: inherit;');
		
		this.findElements=function(id,regex) {
			return me.skin.findElements(id,regex);
		}
		
		{
			this.__div=document.createElement('div');
			this.__div.ggId='hotspot';
			this.__div.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
			this.__div.ggVisible=true;
			hs ='position:absolute;';
			hs+='left: 432px;';
			hs+='top:  161px;';
			hs+='width: 5px;';
			hs+='height: 5px;';
			hs+=cssPrefix + 'transform-origin: 50% 50%;';
			hs+='visibility: inherit;';
			this.__div.setAttribute('style',hs);
			this.__div.onclick=function () {
console.log("opening url " + me.hotspot.url + " in target " + me.hotspot.target);
				me.player.openUrl(me.hotspot.url,me.hotspot.target);
				me.skin.hotspotProxyClick(me.hotspot.id);
			}
			this.__div.onmouseover=function () {
				me.player.hotspot=me.hotspot;
				me.skin.hotspotProxyOver(me.hotspot.id);
			}
			this.__div.onmouseout=function () {
				me.player.hotspot=me.player.emptyHotspot;
				me.skin.hotspotProxyOut(me.hotspot.id);
			}
			this._button_16=document.createElement('div');
			this._button_16.ggId='Button 16';
			this._button_16.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
			this._button_16.ggVisible=true;
			hs ='position:absolute;';
			hs+='left: -38px;';
			hs+='top:  -8px;';
			hs+='width: 40px;';
			hs+='height: 40px;';
			hs+=cssPrefix + 'transform-origin: 50% 50%;';
			hs+='visibility: inherit;';
			hs+='cursor: pointer;';
			this._button_16.setAttribute('style',hs);
			this._button_16__img=document.createElement('img');
			this._button_16__img.setAttribute('src',basePath + 'skinimages/button_16.png');
			this._button_16__img.setAttribute('style','position: absolute;top: 0px;left: 0px;');
			me.player.checkLoaded.push(this._button_16__img);
			this._button_16.appendChild(this._button_16__img);
			this._button_16.onmouseover=function () {
				me._button_16__img.src=basePath + 'skinimages/button_16__o.png';
			}
			this._button_16.onmouseout=function () {
				me._button_16__img.src=basePath + 'skinimages/button_16.png';
			}
			this.__div.appendChild(this._button_16);
		}
	};
	this.addSkinHotspot=function(hotspot) {
		return new SkinHotspotClass(me,hotspot);
	}
	this.addSkin();
};
