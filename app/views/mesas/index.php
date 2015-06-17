
	

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
                          USUARIOS                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-user"></i>  usuarios                            </li>
                        </ol>
                    </div>
                </div>
                
                    <div class="col-lg-12">
                    <button onclick="Add()" class="btn btn-default" id="Add" style="">Add</button>
                    <form method="post" name="Usuario" id = "FormUsuarios" action='<?php echo URL ;?>usuarios/guardar/'>
                    <div class="table-responsive">
                            <table id="usuarios" class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
						              <th>idUsuario</th>
						              <th>nombre</th>
						              <th>apellido1</th>
						              <th>apellido2</th>
						              <th>telefono</th>
						              <th>correo</th>
						              <th>password</th>
						              <th>rol</th>
						              <th></th>
						            
	                                </tr>
                                </thead>
                                <tbody>
                            
                                   
                                </tbody>
                            </table>
                        </div>
                    </from>

            </div>
            <!-- /.container-fluid -->

        </div>
	    

      
