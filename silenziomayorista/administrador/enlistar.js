var countries=new Array();

countries[0]=new Array();
countries[0]['country']='Tejidos';
countries[0]['cities']=['Todos','Remeras','Cardigans','Camperitas','Poleras','Sweaters','Sacones'];
countries[1]=new Array();
countries[1]['country']='Tapados y Abrigos';
countries[1]['cities']=['Todos','Pilotos','Trench','Tapados','Chaquetas'];
countries[2]=new Array();
countries[2]['country']='Blazer';
countries[2]['cities']=['Todos','Clasicos','Diferenciados','Boyfriend'];
countries[3]=new Array();
countries[3]['country']='Pantalones';
countries[3]['cities']=['Todos','Recto','Bombilla','Palazo']; 
countries[4]=new Array();
countries[4]['country']='Jeans';
countries[4]['cities']=['Todos','Recto','Bombilla','Boyfriend']; 
countries[5]=new Array();
countries[5]['country']='Camisas y Blusas';
countries[5]['cities']=['Todos','Sin mangas','Manga Corta','Manga 3/4','Manga Larga']; 
countries[6]=new Array();
countries[6]['country']='Remeras';
countries[6]['cities']=['Todos','Musculosas','Sin Mangas','Manga corta','Manga 3/4','Manga larga','Saquitos']; 
countries[7]=new Array();
countries[7]['country']='Accesorios';
countries[7]['cities']=['Todos','Cinturones']; 


function initBoxes(box1,box2) {
var country=document.getElementById(box1);
var city=document.getElementById(box2);
for (i=0; i<countries.length; i++) {
  var x=document.createElement('option');
  var y=document.createTextNode(countries[i]['country']);
  if (window.attachEvent) { // for IE
  x.setAttribute('value',y.nodeValue);
  }
  x.appendChild(y);
  country.appendChild(x);
}

country.onchange=function() {
  if(this.value!="") {
   var list=document.getElementById(box2);
   while (list.childNodes[0]) {
    list.removeChild(list.childNodes[0])
   }
   fillBox2(city,this.value);
   }
  }

fillBox2(city,country.value);
}
function fillBox2(box2,country) {
for (i=0; i<countries.length; i++) {
  if (countries[i]['country']==country) {
   var cities=countries[i]['cities'];
  }
}
for (i=0; i<cities.length; i++) {
  var x=document.createElement('option');
  var y=document.createTextNode(cities[i]);
  x.appendChild(y);
  box2.appendChild(x);
  }
} 

window.onload=function() {initBoxes('country','city');} 