
	

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
                            <li>
                            <a  href="<?php echo URL;?>ingredientes">Ingredientes</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-user"></i>  <?php if(isset($this->title))echo $this->title ?>
                            </li>
                        </ol>
                    </div>
                </div>
                
                   <div class="col-lg-12">
                        
                         <button id="Add" class="btn btn-default" onclick="Add()" >Add</button>
                          <form method="post" name="Panes" id = "FormPanes" action='<?php echo URL ;?>panes/guardar/'>
                        <div class="table-responsive">
                            <table id="tblPanes" class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
						              <th>idPanes</th>
						              <th>descripcion</th>
						              <th>cantidad</th>
						              <th>unidadMedida</th>
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
       
	    

      
