$(function(){
  List();

 $('#formUsuarios').submit(function()
 {  var url= $(this).attr('action');
   
	 var data=$(this).serialize();
	 $.post(url, data,function(o){
     
	 });
	 
	 return false;
    });
 
});

function Insert(id,desc,estado)
{
 $('#puestos').append("<tr><th><a href='#' class='select' rel='"+id+"'>"+id+"</a></th><th>"+desc+"</th><th>"+estado+"</th></tr>");	 	
}
function Update(id,desc,estado)
{
	 tr="#tr_"+id;
	 $("#puestos "+tr+" .descrip").text(desc);
	 $("#puestos  "+tr+" .estado").text(estado);
	
}
function List()
{
	 $.get('usuarios/Listar',function(o){
		 
		 $('#usuarios').append('<tbody>');
		 $(jQuery.parseJSON(o)).each(function() {  
		 $('#usuarios').append("<tr id='tr_"+this.idUsuario+"'><th><a href='#' class='select' rel='"+this.idUsuario+"'>"+this.idUsuario+"</a></th><th class='nombre'>"
		+this.nombre+"</th><th class='apellido1'>"+this.apellido1+"</th><th class='apellido2'>"+this.apellido2+"</th>" +
		"<th class='telefono'>"+this.telefono+"</th><th class='correo'>"+this.correo+"</th>" +
		"<th class='password'>"+this.password+"</th><th class='rol'>"
		+this.rol+"<th class='edit'><a href='#' class='edit' rel='"+this.idUsuario+"'>"+this.idUsuario+"</a></th>" +
				"<th class='delete'><a href='#' class='delete' rel='"+this.idUsuario+"'>"+this.idUsuario+"</a></th></tr>");
		 });
		  $('#usuarios').append('<tbody>');
		 
		  $('#usuarios').dataTable();
		  SelectRow();
		  Delete();
		
		 
	  });
}
function SelectRow(){
	 $('.select').click(function()
	 { 
		var id=$(this).attr('rel');
		alert(id);
	});
}


function Delete(){
	 $('.delete').click(function()
			 { 
				var id=$(this).attr('rel');
				alert(id);
			});
} 

function Add(){
	//alert("Hello");
	$('#Save').css('display','');
	$('#Cancel').css('display','');
	$('#Add').css('display','none');
    $('#usuarios').append("<tr id='rowAdd'>" +
    		              "<td><input name='idUsuario' type='text' /></td>"+
		                  "<td><input name='nombre' type='text'/></td>"+
		                  "<td><input name='apellido1' type='text'/></td>"+
		                  "<td><input name='apellido2'type='text'/></td>"+
		                  "<td><input name='telefono' type='text'/></td>"+
		                  "<td><input name='correo' type='text'/></td>"+
		                  "<td><input name='password'type='password'/></td>"+
		                  "<td><select name='rol'><option value='1'>Admin" +
		                  "</option><option value='2'>Cajero</option>" +
		                  "</select></td>" +
		                  "<td></td>" +
		                  "<td></td>" +
		                  "</tr>");	 	
    $('#usuarios').dataTable();
   
}

function Cancel(){
	$('#Save').css('display','none');
	$('#Cancel').css('display','none');
	$('#Add').css('display','');
	$( "#rowAdd" ).remove();
	
	
}

