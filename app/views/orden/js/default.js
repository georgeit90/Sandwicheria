
 
var h_conf=0;
var h_save=0;
var h_fields=0;
function Add(){
	$("#usuarios").append(
		"<tr id='tr_0'>" +
    	 "<td><input  id='txtIdUsuario' name='idUsuario' type='text' /></td>"+
		  "<td><input id='txtNombre' name='nombre' type='text'/></td>"+
		  "<td><input id='txtAppellido1' name='apellido1' type='text'/></td>"+
		  "<td><input id='txtAppellido2' name='apellido2'type='text'/></td>"+
		  "<td><input id='txtTelefono' name='telefono' type='text'/></td>"+
		  "<td><input id='txtCorreo' name='correo' type='text'/></td>"+
		  "<td><input type='text' id='txtPassword' name='password' type='password'/></td>"+
		  "<td><select id='cmbRol' name='rol'>"+
		  "<option value='1'>Admin" +
		  "</option><option value='2'>Cajero</option>" +
		  "</select></td>" +
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
	 $.get('usuarios/Listar',function(o){
		 
		 var cont=1;
		 $(jQuery.parseJSON(o)).each(function() {  
		
		 $('#usuarios').append("<tr id='tr_"+cont+"'><td>"+this.idUsuario+"</td><td>"
		+this.nombre+"</td><td>"+this.apellido1+"</td><td>"+this.apellido2+"</td>" +
		"<td>"+this.telefono+"</td>"+
		"<td>"+this.correo+"</td>" +
		"<td>"+this.password+"</td>"+
		"<td>"+ this.rol+"</td><td><div class='tabledit-toolbar btn-toolbar' style='text-align: left;'>"+
		"<div class='btn-group btn-group-sm' style='float: none;'>"+
		 "<button style='float: none;' id='e_"+cont+"' rel='"+cont+"' class='tabledit-edit-button btn btn-sm btn-default' type='button'><span class='glyphicon glyphicon-pencil'></span></button>"+
		 "<button style='float: none;' id='d_"+cont+"'rel='"+cont+"' class='tabledit-delete-button btn btn-sm btn-default' type='button'><span class='glyphicon glyphicon-trash'></span></button>"+
		 "</div>"+
		 "<button style='float: none;' id='s_"+cont+"'rel='"+cont+"' class='tabledit-save-button btn btn-sm btn-success' type='button'>Save</button>"+
		 "<button style='float: none;' id='c_"+cont+"'rel='"+cont+"' class='tabledit-confirm-button btn btn-sm btn-danger' type='button'>Confirm</button>"+
		 "</div></td></tr>");
         cont+=1;
      
		});
		   $('#usuarios').DataTable();
		    $(".tabledit-edit-button").bind("click", Edit);	
			$(".tabledit-delete-button").bind("click", Delete);	
            $(".tabledit-save-button").bind("click", Save);	
            $(".tabledit-confirm-button").bind("click", Confirm);	
         
		 
	  });

}

function Show_Fields(ind,tdIdUsuario,tdNombre,tdAppellido1,tdAppellido2,tdTelefono,tdCorreo,tdPassword,tdRol)
{
	if(ind==0){
	tdIdUsuario.html("<input type='text' id='txtIdUsuario' name='idUsuario' value='"+tdIdUsuario.html()+"'/>");
	tdNombre.html("<input type='text' id='txtNombre' name='nombre' value='"+tdNombre.html()+"'/>");
	tdAppellido1.html("<input type='text' id='txtAppellido1' name='apellido1' value='"+tdAppellido1.html()+"'/>");
	tdAppellido2.html("<input type='text' id='txtAppellido2' name='apellido2' value='"+tdAppellido2.html()+"'/>");
	tdTelefono.html("<input type='text' id='txtTelefono' name='telefono' value='"+tdTelefono.html()+"'/>");
	tdCorreo.html("<input type='text' id='txtCorreo' name='correo' value='"+tdCorreo.html()+"'/>");
	tdPassword.html("<input type='password' id='txtPassword' name='password' value='"+tdPassword.html()+"'/>");
	tdRol.html("<select id='cmbRol' name='rol'>"+
	"<option selected value='"+tdRol.html()+"'>Amdin</option><option value='2'>Cajero</option></select>");
	}else{
	tdIdUsuario.html(tdIdUsuario.children("input[type=text]").val());
	tdNombre.html(tdNombre.children("input[type=text]").val());
	tdAppellido1.html(tdAppellido1.children("input[type=text]").val());
	tdAppellido2.html(tdAppellido2.children("input[type=text]").val());
	tdTelefono.html(tdTelefono.children("input[type=text]").val());
	tdCorreo.html(tdCorreo.children("input[type=text]").val());
	tdPassword.html(tdPassword.children("input[type=password]").val());
	$( "#cmbRol option:selected" ).text();
	var selectedCmb=$( "#cmbRol option:selected" ).text();
	tdRol.html(selectedCmb);
	
	}

}
function Edit()
{
	var numRow= $(this).attr('rel');
	var id="#tr_"+numRow;
	var btn_d="#d_"+numRow;
    var btn_s="#s_"+numRow;
	
	var tdIdUsuario = $(id).children("td:nth-child(1)");
	var tdNombre = $(id).children("td:nth-child(2)");
	var tdAppellido1 = $(id).children("td:nth-child(3)");
	var tdAppellido2 = $(id).children("td:nth-child(4)");
	var tdTelefono = $(id).children("td:nth-child(5)");
	var tdCorreo = $(id).children("td:nth-child(6)");
	var tdPassword = $(id).children("td:nth-child(7)");
	var tdRol = $(id).children("td:nth-child(8)");
	//var tdButtons = $(id).children("th:nth-child(9)");
    if(h_fields==0){
    Show_Fields(h_fields,tdIdUsuario,tdNombre,tdAppellido1,tdAppellido2,tdTelefono,tdCorreo,tdPassword,tdRol);
    h_fields=1;
	}else{
	Show_Fields(h_fields,tdIdUsuario,tdNombre,tdAppellido1,tdAppellido2,tdTelefono,tdCorreo,tdPassword,tdRol);
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
    
	var tdIdUsuario = $(id).children("td:nth-child(1)");
	var tdNombre = $(id).children("td:nth-child(2)");
	var tdAppellido1 = $(id).children("td:nth-child(3)");
	var tdAppellido2 = $(id).children("td:nth-child(4)");
	var tdTelefono = $(id).children("td:nth-child(5)");
	var tdCorreo = $(id).children("td:nth-child(6)");
	var tdPassword = $(id).children("td:nth-child(7)");
	var tdRol = $(id).children("td:nth-child(8)");
	var url= $('#FormUsuarios').attr('action');
	var data= $('#FormUsuarios').serialize();

	      
	if(id=="#tr_0"){
		//var pathname = window.location.pathname;
         url+="0";
		 $.post(url, data,function(o){
		 $(jQuery.parseJSON(o)).each(function() { 
	     
		 Insert_Row(this.idUsuario,this.nombre,this.apellido1,this.apellido2,this.telefono,this.correo,this.password,this.rol);
         
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
		 return false; 
		 
		if(h_save==1){
			$( btn_d ).show();
	        $( btn_s ).hide();
	    h_save=0;
	   }else{
		   $( btn_d ).hide();
		   $( btn_s ).show();
		   h_save=1;	
	  }
		
		Show_Fields(1,tdIdUsuario,tdNombre,tdAppellido1,tdAppellido2,tdTelefono,tdCorreo,tdPassword,tdRol);	
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
	
	$.post('usuarios/borrar',{'id':id.html()},function(o){
	$( btn_c ).hide();	
	$( id ).remove();
	});
	
}

function Insert_Row(idUsuario,nombre,apellido1,apellido2,telefono,correo,password,rol){
  $('#usuarios').append("<tr><td>"+idUsuario+"</td><td>"+nombre+"</td><td>"+apellido1+"</td><td>"+
		  apellido2+"</td><td>"+telefono+"</td><td>"+correo+"</td><td>"+password+"</td><td>"+rol+"</td>" +
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






