
	

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
                                <a href="dashboard">Dashboard</a>
                            </li>
                   
                            <li class="active">
                                <i class="fa fa-user"></i>  <?php if(isset($this->title))echo $this->title ?>
                            </li>
                        </ol>
                    </div>
                </div>
                
                   <div class="col-lg-12">
                        
                          <a  class="btn btn-default" href="<?php echo URL;?>agregar/platillos"> <i class="glyphicon glyphicon-plus"></i> Agregar Platillos</a>
                          <form method="post" name="Platillos" id = "FormPlatillos" action='<?php echo URL ;?>platillos/guardar/'>
                        <div class="table-responsive">
                            <table id="tblPlatillos" class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
						               
						               <th>Tipo platillo</th>
						               <th>Nombre</th>
						               <th>Descripcion</th>
						               <th>Total</th>
						              <th></th>
	                                </tr>
                                </thead>
                                <tbody>
                            
                                   
                                </tbody>
                            </table>
                        </div>
                       </form>
                    </div>
                </div>
            <!-- /.container-fluid -->

        </div>	
       
	    

      
