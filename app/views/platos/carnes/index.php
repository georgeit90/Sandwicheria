
	

	         <?php 	
	        if(isset($this->menu))
	   	    require $this->menu;
	        ?>
	      
	  
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
                                <a href="index.html">Dashboard</a>
                            </li>
                             <li>
                                <a  href="<?php echo URL;?>platos">Platos</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-user"></i>  <?php if(isset($this->title))echo $this->title ?>
                            </li>
                        </ol>
                    </div>
                </div>
                
                   <div class="col-lg-12">
                        <input id="Save" type="submit" name="Submit" value="Save" class="btn btn-default" style="display: none;"/>
	                     <input id="Cancel" type="button"Submit" value="Cancel" class="btn btn-default" onclick ="Cancel()"style="display: none;"/>
                         <button id="Add" class="btn btn-default" onclick="Add()" >Add</button>
                        <div class="table-responsive">
                            <table id="tblCarnes" class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
						              <th>idCarne</th>
						              <th>descripcion</th>
						              <th>cantidad</th>
						              <th>unidadMedida</th>
						              <th>edit</th>
						              <th>delete</th>
	                                </tr>
                                </thead>
                                <tbody>
                            
                                   
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
            <!-- /.container-fluid -->

        </div>	
       
	    

      
