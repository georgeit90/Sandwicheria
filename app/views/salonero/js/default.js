
function showTables(){
var idBtn= $(this).attr('id');

if(idBtn=="btnPiso1"){
  $( '#tables #piso1' ).show();
  $( '#tables #piso2' ).hide();
    $( "#btnPiso1" ).parent().addClass( "active" );
    $( "#btnPiso2" ).parent().removeClass( "active" );
}
if(idBtn=="btnPiso2"){
  $( '#tables #piso1' ).hide();
  $( '#tables #piso2' ).show();
  $( "#btnPiso2" ).parent().addClass( "active" );
   $( "#btnPiso1" ).parent().removeClass( "active" );
}
}


function Avail()
{

$.get('mesas/Disponibles',function(o){
	$("#Dispon").html(o);
	});
}

function List()
{   
	 $.get('mesas/Listar',function(o){
		
		 var cont=1;
		 var c_table="";
		 $(jQuery.parseJSON(o)).each(function() {  
		
		 
		 if(this.disponibilidad==0){
			 c_table="table-g";
			 link="href='orden/?idMesa="+this.idMesa+"'";
		 }else{
			  c_table="table-r";
			  link=0;
		 }
		 
		 if(this.piso==1){
		 $('#tables').append("<div  id='piso1' style='text-align: center;' class='col-xs-6 col-lg-3'>"+
						  "<a  role='button' "+link+" class=''><p><img src='public/images/"+c_table+".png' ></p>"+						 
						  "<h3 >Mesa "+this.idMesa+ "</h3></a>"+
						  "</div>");
						  
		 }else{
			 $('#tables').append("<div  id='piso2' style='text-align: center; display:none;' class='col-xs-6 col-lg-3'>"+
						  "<a  role='button' "+link+" class=''><p><img src='public/images/"+c_table+".png' ></p>"+						 
						  "<h3 >Mesa "+this.idMesa+ "</h3></a>"+
						  "</div>"); 
			 
		 }
         cont+=1;
      
		});
		     
		 
	  });

}


$(function(){
	
List();
Avail();
$(".btnPiso").bind("click", showTables);	
$( "#btnPiso1" ).parent().addClass( "active" );

});