
	

	         <?php 	
	        if(isset($this->menu))
	   	    require $this->menu;
	        ?>
	       <!-- /.navbar-collapse -->
           </nav>
	  
	          <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                          <?php if(isset($this->title))echo strtoupper( $this->title )?>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>
                                <a href="../dashboard">Dashboard</a>
                            </li>
                            <li>
                                <a  href="<?php echo URL;?>platillos">Platillos</a>
                            </li> 
                            <li class="active">
                                <i class="glyphicon glyphicon-plus"></i>  <?php if(isset($this->title))echo $this->title ?>
                            </li>
                        </ol>
                    </div>
                </div>
                
                   <div class="col-lg-12">
                        
                         
                       <form method="post" name="AgregarPlatillo" id = "FormAgregarPlatillo" action='<?php echo URL ;?>platillos/guardar/0'>
                        <div class="panel panel-default">
						 <div class="panel-body">
							<div class="form-group">
                                <label>Nombre</label>
                                <input type="text" name="nombre" class="form-control">
                            </div>
							<div class="form-group">
                                <label>Descripcion</label>
                                <textarea rows="3" class="form-control" name="descripcion"></textarea>
                            </div>
							<div class="form-group">
                                <label>Tipo de Platillo</label>
                                 <select class="form-control" id="cmbTipoPlatillo" name="tipoPlatillo">
                                   
                                </select>
                            </div>
							<div class="row">
							  <div class="col-sm-3">
							 
                                <label>Ingredientes</label>
                           
                               
								<div class="sidebar-nav">
								  <div class="navbar navbar-default" role="navigation">
									<div class="navbar-header">
									  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									  </button>
									  <span class="visible-xs navbar-brand">Sidebar menu</span>
									</div>
									<div class="navbar-collapse collapse sidebar-navbar-collapse">
                                        <ul class="nav nav-pills">                                       
									    <li class="active nav-header" style="text-align:center">
										<i  id="left" class="glyphicon glyphicon-chevron-left"></i>
										<label id="lblCat">  </label>
										<i id="right" class="glyphicon glyphicon-chevron-right"></i>
										</li>	
                                        </ul>   
                                        										
										 <ul id="Carnesmenu" class="nav navbar-nav">	
										
										 </ul>
										 <ul id="Condimentosmenu" class="nav navbar-nav ingretMenu">	
											  
											  
											  
										 </ul>
										  <ul id="Frutasmenu" class="nav navbar-nav ingretMenu">	
											  
											  
										 </ul>
										  <ul id="Panesmenu" class="nav navbar-nav ingretMenu">	
											  
											  
										 </ul>
										  <ul id="Pastasmenu" class="nav navbar-nav ingretMenu">	
											  
											  
										 </ul>
										 <ul id="Quesosmenu" class="nav navbar-nav ingretMenu">	
											  
											  
										 </ul>
										 
										  <ul id="Salsasmenu" class="nav navbar-nav ingretMenu">	
											  
											  
										 </ul>
										  <ul id="Vegetalesmenu" class="nav navbar-nav ingretMenu">	
											  
											  
										 </ul>
									
									</div><!--/.nav-collapse -->
								  </div>
								</div>
							  </div>
							  <div class="col-sm-9">
							 <label>Lista</label>
							 <table id="listaIngre" class="table table-hover">
							 <thead>
							 <tr>
							     <th>  </th>
								 <th>Tipo</th>
								 <th>Ingrediente </th>
								 <th>Cantidad </th>
								 <th>SudTotal </th>
							 </tr>
							 </thead>
							 <tbody>
							 <tr>
						
							 </tr>
							 </tbody>
							 </table>
							 <label>Total <label><span id="vtotal"> </span><input id="total" type="hidden" name="total" value="">
							  </div>
							</div>
					        
						  </div>
						  	<div class="form-group">                 
                                <button id="subPlatillo" class="btn btn-default" type="submit">Save</button>
                            </div>
						 </div>
                       
                       </form>
                    </div>
                </div>
            <!-- /.container-fluid -->

        </div>	
       
	    

      
