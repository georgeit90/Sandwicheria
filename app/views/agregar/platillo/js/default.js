
var categ=["Carnes","Condimentos", "Frutas", "Panes","Pastas","Quesos","Salsas","Vegetales"];
var index =0;
var menuBef="";
var menuAft="";
var num=0;
function leftMenu(){
if(index==0){
	index=categ.length-1;
    $("#lblCat").html(categ[index]);
	
	menuBef="#"+categ[0]+"menu";
	$(menuBef).hide();
	menuAft="#"+categ[index]+"menu";
	$( menuAft ).slideDown( "slow" );
	}else{
	index=index-1;
	$("#lblCat").html(categ[index]);
 	 menuBef="#"+categ[index+1]+"menu";
	 $(menuBef).hide();
	  menuAft="#"+categ[index]+"menu";
	 $( menuAft ).slideDown( "slow" );
	}

}

function RightMenu(){

	if(index==categ.length-1){
	index=0;
    $("#lblCat").html(categ[index]);
 	 menuBef="#"+categ[categ.length-1]+"menu";
	 $(menuBef).hide();
	  menuAft="#"+categ[index]+"menu";
	 $( menuAft ).slideDown( "slow" );	
	}else{
	 index=index+1;
	 $("#lblCat").html(categ[index]);
      menuBef="#"+categ[index-1]+"menu";
	 $(menuBef).hide();
	  menuAft="#"+categ[index]+"menu";
	 $( menuAft ).slideDown( "slow" );
	 
	}

}


function List(){
	
$.get('../tipoplatillos/Listar',function(o){
		 
		 var cont=1;
		
		 $(jQuery.parseJSON(o)).each(function() { 
		 $('#cmbTipoPlatillo').append(
		 "<option value='"+this.idTipoPlatillo+"'>"+this.descripcion+"</option>"
		   );
		});
      
});
$.get('../carnes/Listar',function(o){
		 
		 var cont=1;
		
		 $(jQuery.parseJSON(o)).each(function() { 
		 $('#Carnesmenu').append(
		   "<li>" 								
		   +"<a><input type='checkbox' class='carne' rel='"+cont+"' id='chkCarnes_"+cont+"'  value='"+this.idCarne+"' aria-label='...'>"
		   +"<span id=carne_"+cont+"> "+this.descripcion +"</span></a>"					
		   +"</li>");
		   cont+=1;
		});
		
        $(".carne").bind("click", InsertRow);			 
		
	
});

$.get('../condimentos/Listar',function(o){
		 
		 var cont=1;
		
		 $(jQuery.parseJSON(o)).each(function() { 
		  $('#Condimentosmenu').append(
		   "<li>" 								
		   +"<a><input type='checkbox' class='condimento' rel='"+cont+"' id='chkCondimentos_"+cont+"'  value='"+this.idCondimento+" 'aria-label='...'>"
		   +"<span id='condimento_"+cont+"'> " +this.descripcion +"</span></a>"					
		   +"</li>");
		    cont+=1;
		 });
          $(".condimento").bind("click", InsertRow);		 
});

$.get('../frutas/Listar',function(o){
		 
		 var cont=1;
		
		 $(jQuery.parseJSON(o)).each(function() { 
		  $('#Frutasmenu').append(
		   "<li>" 								
		   +"<a><input type='checkbox' class='fruta' rel='"+cont+"' id='chkFrutas_"+cont+"'  value='"+this.idFruta+"'aria-label='...'> " +this.descripcion +"</a>"					
		   +"</li>");
		 });	
});

$.get('../panes/Listar',function(o){
		 
		 var cont=1;
		
		 $(jQuery.parseJSON(o)).each(function() { 
		  $('#Panesmenu').append(
		   "<li>" 								
		   +"<a><input type='checkbox' name='panes[]' value='"+this.idPan+" ' aria-label='...'> " +this.descripcion +"</a>"					
		   +"</li>");
		 });	
});

$.get('../pastas/Listar',function(o){
		 
		 var cont=1;
		
		 $(jQuery.parseJSON(o)).each(function() { 
		  $('#Pastasmenu').append(
		   "<li>" 								
		   +"<a><input type='checkbox' name='pastas[]' value='"+this.idPasta+" ' aria-label='...'> " +this.descripcion +"</a>"					
		   +"</li>");
		 });	
});

$.get('../quesos/Listar',function(o){
		 
		 var cont=1;
		
		 $(jQuery.parseJSON(o)).each(function() { 
		  $('#Quesosmenu').append(
		   "<li>" 								
		   +"<a><input type='checkbox' name='quesos[]' value='"+this.idQueso+" ' aria-label='...'> " +this.descripcion +"</a>"					
		   +"</li>");
		 });	
});

$.get('../salsas/Listar',function(o){
		 
		 var cont=1;
		
		 $(jQuery.parseJSON(o)).each(function() { 
		  $('#Salsasmenu').append(
		   "<li>" 								
		   +"<a><input type='checkbox' name='salsas[]' value='"+this.idSalsa+" ' aria-label='...'> " +this.descripcion +"</a>"					
		   +"</li>");
		 });	
});

$.get('../vegetales/Listar',function(o){
		 
		 var cont=1;
		
		 $(jQuery.parseJSON(o)).each(function() { 
		  $('#Vegetalesmenu').append(
		   "<li>" 								
		   +"<a><input type='checkbox' name='vegetales[]' value='"+this.idVegetal+" ' aria-label='...'> " +this.descripcion +"</a>"					
		   +"</li>");
		 });	
});

}


function InsertRow(){
	var type= $(this).attr('class');
	var value= $(this).attr('value');
	var row= $(this).attr('rel');
	var idName="#"+type+"_"+row;
	var name=$(idName).text();
	num++;
	$("#listaIngre").append("<tr><td><span class='glyphicon glyphicon-remove remove'></span>"
	+"</td><td>"+type+"</td><td>"+name+"<input type='hidden' name='platillos["+type+"][]' value='"+value+"'> </td>"
	+"<td><input rel='"+num+"' id='cant_"+num+"' class='cantidad' name='cantidad["+type+"][]' type='text'> </td>"
	+"<td><input rel='"+num+"' id='"+num+"' class='subTotales' name='sudTotal["+type+"][]'type='textbox' ></td></tr>");
	$(".subTotales").bind("keyup", calTotal);
	
}
function calTotal(){
	var row= $(this).attr('rel');
    var id="#"+row;
	var sudTotal=0;
	var total=0;
    for(i=1;i<=num;i++){
	  id="#"+i;
	  sudTotal=parseInt($(id).val());
	  total+=sudTotal;  
	}
	$("#vtotal").empty();
    $("#vtotal").append(total);
	$("#total").val(total);
}

$(function(){
 List();
$("#left").bind("click", leftMenu);
$("#right").bind("click", RightMenu);	
$("#lblCat").html(categ[0]);



 $('#FormAgregarPlatillo').submit(function(){
	 var url= $(this).attr('action');
	 var data=$(this).serialize(); 
	  alert(data);
	$.post(url, data,function(o){});
	 return false;
 });
  
	


});






