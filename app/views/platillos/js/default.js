
 
var h_conf=0;
var h_save=0;
var h_fields=0;

function List(){
	 $.get('platillos/Listar',function(o){
		 
		 var cont=1;
		
		 $(jQuery.parseJSON(o)).each(function() {  
		
		 $('#tblPlatillos').append("<tr id='tr_"+cont+"'><td>"+this.tipo+"</td><td>"
		+this.nombre+"</td><td>"+this.descripcion+"</td><td>"+this.total+"</td>" +
		 "<td><div class='tabledit-toolbar btn-toolbar' style='text-align: left;'>"+
		"<div class='btn-group btn-group-sm' style='float: none;'>"+
		 "<a href='editar/platillos?id="+this.idPlatillo+"' style='float: none;' id='e_"+cont+"' rel='"+cont+"' class='tabledit-edit-button btn btn-sm btn-default' type='button'><span class='glyphicon glyphicon-pencil'></span></a>"+
		 "<button style='float: none;' id='d_"+cont+"'rel='"+cont+"' class='tabledit-delete-button btn btn-sm btn-default' type='button'><span class='glyphicon glyphicon-trash'></span></button>"+
		 "</div>"+
		 "<button style='float: none;' id='s_"+cont+"'rel='"+cont+"' class='tabledit-save-button btn btn-sm btn-success' type='button'>Save</button>"+
		 "<button style='float: none;' id='c_"+cont+"'rel='"+cont+"' class='tabledit-confirm-button btn btn-sm btn-danger' type='button'>Confirm</button>"+
		 "</div></td></tr>");
         cont+=1;
      
		});
		   $('#tblPlatillos').DataTable();
		   
			$(".tabledit-delete-button").bind("click", Delete);	
            $(".tabledit-save-button").bind("click", Save);	
            $(".tabledit-confirm-button").bind("click", Confirm);	
         
		 
	  });

}

function Show_Fields(ind,tdIdMermaCarne,tdpan,tdCantidad,tdFechaCreacion)
{
	if(ind==0){
	tdIdMermaCarne.html("<input type='text' id='txtIdUsuario' name='idMermaCarne' value='"+tdIdMermaCarne.html()+"'/>");
	tdpan.html("<input type='text' id='txtNombre' name='pan' value='"+tdpan.html()+"'/>");
	tdCantidad.html("<input type='text' id='txtAppellido1' name='cantidad' value='"+tdCantidad.html()+"'/>");
	tdFechaCreacion.html("<input type='text' id='txtAppellido2' name='fechaCreacion' value='"+tdFechaCreacion.html()+"'/>");
	}else{
	tdIdMermaCarne.html(tdIdMermaCarne.children("input[type=text]").val());
	tdPan.html(tdPan.children("input[type=text]").val());
	tdCantidad.html(tdCantidad.children("input[type=text]").val());
	tdFechaCreacion.html(tdFechaCreacion.children("input[type=text]").val());
	
	
	}

}
function Edit()
{
	var numRow= $(this).attr('rel');
	var id="#tr_"+numRow;
	var btn_d="#d_"+numRow;
    var btn_s="#s_"+numRow;
	
	var tdIdMermaCarne = $(id).children("td:nth-child(1)");
	var tdPan = $(id).children("td:nth-child(2)");
	var tdCantidad = $(id).children("td:nth-child(3)");
	var tdFechaCreacion = $(id).children("td:nth-child(4)");
	
	//var tdButtons = $(id).children("th:nth-child(9)");
    if(h_fields==0){
    Show_Fields(h_fields,tdIdMermaCarne,tdPan,tdCantidad,tdFechaCreacion);
    h_fields=1;
	}else{
	Show_Fields(h_fields,tdIdMermaCarne,tdPan,tdCantidad,tdFechaCreacion);
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
    
	var tdIdMermaCarne = $(id).children("td:nth-child(1)");
	var tdPan = $(id).children("td:nth-child(2)");
	var tdCantidad = $(id).children("td:nth-child(3)");
	var tdFechaCreacion = $(id).children("td:nth-child(4)");
	
	var url= $('#FormMermaCarnes').attr('action');
	var data= $('#FormMermaCarnes').serialize();

	if(id=="#tr_0"){
		//var pathname = window.location.pathname;
         url+="0";


		 $.post(url, data,function(o){
			 alert(data);
		 $(jQuery.parseJSON(o)).each(function() { 
	    
		 Insert_Row(this.idMermaCarne,this.carne,this.fechaCreacion,this.cantidad);
         
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
		
		 Show_Fields(1,tdIdMermaCarne,tdPan,tdFechaCreacion,tdCantidad);	
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
	
	$.post('carnes/borrar',{'id':id.html()},function(o){
	$( btn_c ).hide();	
	$( id ).remove();
	});
	
}



$(function(){
	
	List();

});






