
	

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
                        <h1 class="page-header"> Orden</h1>
                         
                        <ol class="breadcrumb">
                            <li>
                                <i class=""></i> Fecha  <a href=""> </a>
                            </li>
                          
                        </ol>
                    </div>
                </div>
                
                    <div class="col-lg-12">
                    
                    <form method="post" name="Orden" id = "FormOrden" action='<?php echo URL ;?>orden/guardar/'>
                   <div class="panel panel-default">
                        <div class="panel-heading">
                            Mesa <?php if(isset($this->mesa))echo $this->mesa;  ?>
	      
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                  
                                        
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div> 
					
				
                    </from>

            </div>
            <!-- /.container-fluid -->

        </div>
	    

      
