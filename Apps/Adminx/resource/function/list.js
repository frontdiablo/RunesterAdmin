function clickCheckbox(cnt,language_id){
for(i=0;i<language.length;i++){
if(language_id!=language[i]){
if(document.getElementById("product_"+language[i]+"_"+cnt).checked == true){
document.getElementById("product_"+language[i]+"_"+cnt).checked=false;
obj=document.getElementById("product_"+language[i]+"_"+cnt);
if(obj.checked==false){
var tr = obj.parentNode.parentNode;
tr.style.backgroundColor ="#FFFFFF";
}
}else{
document.getElementById("product_"+language[i]+"_"+cnt).checked=true;
obj=document.getElementById("product_"+language[i]+"_"+cnt);
if(obj.checked==true){
var tr = obj.parentNode.parentNode;
tr.style.backgroundColor ="#ccffff";
}}}}}
function select_all_product(chkName,frmName){
var frm=document.forms[frmName];
for(var i=0;i<frm.elements.length;i++){
var e =frm.elements[i];
if ((e.name != chkName) && (e.type=='checkbox')){    
if (chkName == 'check_all_bottom'){e.checked = frm.check_all_bottom.checked;}
}}}
function overbgcolor(id){
obj=document.getElementById(id);
if(obj.checked==false){
var tr = obj.parentNode.parentNode;
tr.style.backgroundColor ="#ccffff";
}		
}				
function outbgcolor(id){
obj=document.getElementById(id);
if(obj.checked==false){
var tr = obj.parentNode.parentNode;
tr.style.backgroundColor ="#FFFFFF";
}		
}
function tr_bgcolor(c){
var tr = c.parentNode.parentNode;
tr.style.backgroundColor = c.checked ? "#ccffff" : "#FFFFFF";
}
