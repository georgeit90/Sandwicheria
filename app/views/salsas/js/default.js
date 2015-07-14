
 
var h_conf=0;
var h_save=0;
var h_fields=0;
function Add(){
	$("#tblSalsas").append(
		"<tr id='tr_0'>" +
    	 "<td><input  id='txtIdSalsa' name='idSalsa' type='text' /></td>"+
		  "<td><input id='txtDescripcion' name='descripcion' type='text'/></td>"+
		  "<td><input id='txtCantidad' name='cantidad' type='text'/></td>"+
		  "<td><input id='txtUnidadMedida' name='unidadMedida'type='text'/></td>"+
		  "<td><input id='txtTotal' name='total'type='text'/></td>"+
		  "<td><button style='float: none;' id='s_new' rel='0' class='tabledit-save-button btn btn-sm btn-success' type='button'>Save</button>"+
		  "<button style='float: none;' id='d_new'rel='0' class='tabledit-delete-button btn btn-sm btn-default' type='button'><span class='glyphicon glyphicon-trash'></span></button>"+
		  "</td>" +
		  + "</tr>");	
		  $( '#s_new' ).show();
		$(".tabledit-save-button").bind("click", Save);	
		$(".tabledit-delete-button").bind("click", Delete);	
	
}; 
function List()
{
	 $.get('salsas/Listar',function(o){
		 
		 var cont=1;
		
		 $(jQuery.parseJSON(o)).each(function() {  
		
		 $('#tblSalsas').append("<tr id='tr_"+cont+"'><td>"+this.idSalsa+"</td><td>"
		+this.descripcion+"</td><td>"+this.cantidad+"</td><td>"+this.unidadMedida+"</td><td>"+this.total+"</td>" +
		 "<td><div class='tabledit-toolbar btn-toolbar' style='text-align: left;'>"+
		"<div class='btn-group btn-group-sm' style='float: none;'>"+
		 "<button style='float: none;' id='e_"+cont+"' rel='"+cont+"' class='tabledit-edit-button btn btn-sm btn-default' type='button'><span class='glyphicon glyphicon-pencil'></span></button>"+
		 "<button style='float: none;' id='d_"+cont+"'rel='"+cont+"' class='tabledit-delete-button btn btn-sm btn-default' type='button'><span class='glyphicon glyphicon-trash'></span></button>"+
		 "</div>"+
		 "<button style='float: none;' id='s_"+cont+"'rel='"+cont+"' class='tabledit-save-button btn btn-sm btn-success' type='button'>Save</button>"+
		 "<button style='float: none;' id='c_"+cont+"'rel='"+cont+"' class='tabledit-confirm-button btn btn-sm btn-danger' type='button'>Confirm</button>"+
		 "</div></td></tr>");
         cont+=1;
      
		});
		   $('#tblSalsas').DataTable();
		    $(".tabledit-edit-button").bind("click", Edit);	
			$(".tabledit-delete-button").bind("click", Delete);	
            $(".tabledit-save-button").bind("click", Save);	
            $(".tabledit-confirm-button").bind("click", Confirm);	
         
		 
	  });

}

function Show_Fields(ind,tdIdSalsa,tdDescripcion,tdCantidad,tdUnidadMedida,total)
{
	if(ind==0){
	tdIdSalsa.html("<input type='text' id='txtIdSalsa' name='idSalsa' value='"+tdIdSalsa.html()+"'/>");
	tdDescripcion.html("<input type='text' id='txtDescripcion' name='descripcion' value='"+tdDescripcion.html()+"'/>");
	tdCantidad.html("<input type='text' id='txtCantidad' name='cantidad' value='"+tdCantidad.html()+"'/>");
	tdUnidadMedida.html("<input type='text' id='txtUnidadMedida' name='unidadMedida' value='"+tdUnidadMedida.html()+"'/>");
	tdTotal.html("<input type='text' id='txtTotal' name='total' value='"+tdTotal.html()+"'/>");
	}else{
	tdIdSalsa.html(tdIdSalsa.children("input[type=text]").val());
	tdDescripcion.html(tdDescripcion.children("input[type=text]").val());
	tdCantidad.html(tdCantidad.children("input[type=text]").val());
	tdUnidadMedida.html(tdUnidadMedida.children("input[type=text]").val());
	tdTotal.html(tdTotal.children("input[type=text]").val());
	
	
	}

}
function Edit()
{
	var numRow= $(this).attr('rel');
	var id="#tr_"+numRow;
	var btn_d="#d_"+numRow;
    var btn_s="#s_"+numRow;
	
	var tdIdSalsa = $(id).children("td:nth-child(1)");
	var tdDescripcion = $(id).children("td:nth-child(2)");
	var tdCantidad = $(id).children("td:nth-child(3)");
	var tdUnidadMedida = $(id).children("td:nth-child(4)");
	var tdTotal = $(id).children("td:nth-child(5)");
	//var tdButtons = $(id).children("th:nth-child(9)");
    if(h_fields==0){
    Show_Fields(h_fields,tdIdSalsa,tdDescripcion,tdCantidad,tdUnidadMedida,tdTotal);
    h_fields=1;
	}else{
	Show_Fields(h_fields,tdIdSalsa,tdDescripcion,tdCantidad,tdUnidadMedida,tdTotal);
	h_fields=0;
	}
    
	$(".tabledit-delete-button").bind("click", Delete);	
    //$(".tabledit-save-button").bind("click", Save);	
	
	if(h_save==0){
	$( btn_d ).hide();
	$( btn_s ).show();
	h_save=1;
	}else{
	$( btn_d ).show();
	$( btn_s ).hide();
	h_save=0;	
	}
}

function Save(){
	
	var numRow=$(this).attr('rel');
	var id="#tr_"+numRow;
	var btn_d="#d_"+numRow;
    var btn_s="#s_"+numRow;
    
	var tdIdSalsa = $(id).children("td:nth-child(1)");
	var tdDescripcion = $(id).children("td:nth-child(2)");
	var tdCantidad = $(id).children("td:nth-child(3)");
	var tdUnidadMedida = $(id).children("td:nth-child(4)");
	
	var url= $('#FormSalsas').attr('action');
	var data= $('#FormSalsas').serialize();

	      
	if(id=="#tr_0"){
		//var pathname = window.location.pathname;
         url+="0";
         alert(data);
		 $.post(url, data,function(o){
		 $(jQuery.parseJSON(o)).each(function() { 
	    
		 Insert_Row(this.idSalsa,this.descripcion,this.cantidad,this.unidadMedida,this.total);
         
		  });

	    });
		 $('#tr_0').remove();
		 return false; 
		
	}else{
   
	
		 url+="1";
		 alert(data);
		 $.post(url, data,function(o){
//			 alert(data);
		 });
		
		 Show_Fields(1,tdIdSalsa,tdDescripcion,tdCantidad,tdUnidadMedida,tdTotal);	
		if(h_save==1){
			$( btn_d ).show();
	        $( btn_s ).hide();
	    h_save=0;
	   }else{
		   $( btn_d ).hide();
		   $( btn_s ).show();
		   h_save=1;	
	  }
		
		
		h_fields=0;
	}
	
   

	
}
function Delete()
{
    var numRow=$(this).attr('rel');
	var id="#c_"+numRow;
	var btn_d="#d_"+numRow;
	//if(btn_d=="#d_0"){
     // $('#tr_0').remove();
	//}else{
		if(h_conf==0){
		$( id ).show();
		 h_conf=1;
		}else{
		$( id ).hide();	
		 h_conf=0;
		}
	//}
	
	//$( id ).remove();	
	
}

function Confirm(){
	var numRow=$(this).attr('rel');
	var row="#tr_"+numRow;
	var btn_c="#tr_"+numRow;
	var id = $(row).children("td:nth-child(1)");
	
	$.post('salsas/borrar',{'id':id.html()},function(o){
	$( btn_c ).hide();	
	$( id ).remove();
	});
	
}

function Insert_Row(idSalsa,descripcion,cantidad,unidadMedida,total){
  $('#tblSalsas').append("<tr><td>"+idSalsa+"</td><td>"+descripcion+"</td><td>"+cantidad+"</td><td>"+
		  unidadMedida+"</td><td>"+  total+"</td>" +
		   +"<td><div class='tabledit-toolbar btn-toolbar' style='text-align: left;'>"+
			"<div class='btn-group btn-group-sm' style='float: none;'>"+
			 "<button style='float: none;' id='e_new' rel='0' class='tabledit-edit-button btn btn-sm btn-default' type='button'><span class='glyphicon glyphicon-pencil'></span></button>"+
			 "<button style='float: none;' id='d_new' rel='0' class='tabledit-delete-button btn btn-sm btn-default' type='button'><span class='glyphicon glyphicon-trash'></span></button>"+
			 "</div>"+
			 "<button style='float: none;' id='s_new'rel='0' class='tabledit-save-button btn btn-sm btn-success' type='button'>Save</button>"+
			 "<button style='float: none;' id='c_new'rel='0' class='tabledit-confirm-button btn btn-sm btn-danger' type='button'>Confirm</button>"+
			 "</div></td></tr>");	 	
}

$(function(){
	
	//Add, Save, Edit and Delete functions code
	List();
	//$(".btnEdit").bind("click", Edit);
	   
	//$(".btnEdit").bind("click", Edit);
	//$(".btnDelete").bind("click", Delete);
	//$("#btnAdd").bind("click", Add);



});






