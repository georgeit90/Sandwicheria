
var categ=["Carnes","Condimentos", "Frutas", "Panes","Pastas","Quesos","Salsas","Vegetales"];
var index =0;
var menuBef="";
var menuAft="";
var num=0;
var idCarnes=[];

var  id = getParameter('id');

function getParameter(paramName) {
  var searchString = window.location.search.substring(1),
      i, val, params = searchString.split("&");

  for (i=0;i<params.length;i++) {
    val = params[i].split("=");
    if (val[0] == paramName) {
      return val[1];
    }
  }
  return null;
}

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

function SelectedRow(){

$.get('../platillos/Consultar',{'id':id},function(o){
	
	 $(jQuery.parseJSON(o)).each(function() { 
		  $('#txtIdPlatillo').val(this.idPlatillo);
		  $('#txtNombre').val(this.nombre);
		  $('#txtDescrip').val(this.descripcion);
		  
		  $('#vtotal').text(this.total);
		  $("#total").val(this.total);
		  
   $.get('../tipoplatillos/Listar',function(o){
		 
		 var cont=1;
		
		 $(jQuery.parseJSON(o)).each(function() { 
		 
		 if(this.idtipoPlatillo==this.tipoPlatillo){
		 $('#cmbTipoPlatillo').append("<option selected value='"+this.idTipoPlatillo+"'>"+this.descripcion+"</option>");
		 }else{
		 $('#cmbTipoPlatillo').append("<option value='"+this.idTipoPlatillo+"'>"+this.descripcion+"</option>" );
		 }
		 
		});
      
   });		  
		  
		  
		 
		  
		    $.each(this.ingredientes,function(o,attr) {
			if(typeof(attr.carne) != 'undefined'){ 
			idCarnes.push(attr.carne);
			
			}
			num++
			  $("#listaIngre").append("<tr id='tr_"+num+"'><td>"
			      +"<span  id='"+attr.tipo+"_"+attr.id+"' data="+attr.tipo+" rel='"+num+"' class='glyphicon glyphicon-remove remove'></span>"
	              +"</td><td>"+attr.tipo+"</td><td>"+attr.nombre+"<input type='hidden' name='platillos["+attr.tipo+"][]' value='"+attr.id+"'> </td>"
	              +"<td><input rel='"+num+"' id='cant_"+num+"' class='cantidad' name='cantidad["+attr.tipo+"][]' value='"+attr.cantidad+"' type='text'> </td>"
	              +"<td><input rel='"+num+"' id='"+num+"' class='subTotales' name='sudTotal["+attr.tipo+"][]' value='"+attr.subtotal+"' type='textbox' ></td></tr>");
	              $(".subTotales").bind("keyup", calTotal);
				  
			 
			
            });
		  $(".remove").bind("click", Remove);
		 
      });

 });
}




function List(){


$.get('../carnes/Listar',function(o){
		 
		 var cont=1;
		 
		 $(jQuery.parseJSON(o)).each(function() { 
		if(idCarnes.indexOf(this.idCarne)>-1){
		 $('#Carnesmenu').append(
		   "<li>" 								
		   +"<a><input  disabled checked type='checkbox' class='carne' rel='"+cont+"' id='chkcarne_"+this.idCarne+"'  value='"+this.idCarne+"' aria-label='...'>"
		   +"<span id=carne_"+cont+"> "+this.descripcion +"</span></a>"					
		   +"</li>");
		   cont+=1;
		}else{
			 $('#Carnesmenu').append(
		   "<li>" 								
		   +"<a><input  type='checkbox' class='carne' rel='"+cont+"' id='chkcarne_"+this.idCarne+"'  value='"+this.idCarne+"' aria-label='...'>"
		   +"<span id=carne_"+cont+"> "+this.descripcion +"</span></a>"					
		   +"</li>");
		   cont+=1;
			
		}
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
		   +"<a><input type='checkbox' class='fruta' rel='"+cont+"' id='chkfrutas_"+cont+"'  value='"+this.idFruta+"'aria-label='...'> " +this.descripcion +"</a>"					
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
	var chkbox="#chk"+type+"_"+value;
	$(chkbox).prop("disabled",true);
	var name=$(idName).text();
	num++;
	$("#listaIngre").append("<tr id='tr_"+num+"'><td><span id='"+type+"_"+value+"' data="+type+" rel='"+num+"' class='glyphicon glyphicon-remove remove'></span>"
	+"</td><td>"+type+"</td><td>"+name+"<input type='hidden' name='platillos["+type+"][]' value='"+value+"'> </td>"
	+"<td><input rel='"+num+"' id='cant_"+num+"' class='cantidad' name='cantidad["+type+"][]' type='text'> </td>"
	+"<td><input rel='"+num+"' id='"+num+"' class='subTotales' name='sudTotal["+type+"][]'type='textbox' ></td></tr>");
	$(".subTotales").bind("keyup", calTotal);
	$(".remove").bind("click", Remove);
	
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

function Remove(){
var numRow=$(this).attr('rel');
var type=$(this).attr('data');
var chkbox= "#chk"+$(this).attr('id');

$(chkbox).prop("checked",false);
$(chkbox).prop("disabled",false);

var row="#tr_"+numRow;
$(row).remove();
}

$(function(){
 SelectedRow();
 List();

$("#left").bind("click", leftMenu);
$("#right").bind("click", RightMenu);	
$("#lblCat").html(categ[0]);



 $('#FormEditarPlatillo').submit(function(){
	 var url= $(this).attr('action');
	 var data=$(this).serialize(); 
	  alert(data);
	$.post(url, data,function(o){});
	 return false;
 });
  
	


});






