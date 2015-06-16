
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
                        <h1 class="page-header"> Ordenes </h1>
                     
                        <ol class="breadcrumb">
                            <li>
                               <i class=""></i><a href="">Time <?php  $dt = new DateTime("now"); 
                                                           print $dt->format("r");?></a>
                            </li>
                        </ol>
                    </div>
                </div>
                
                    <div class="col-lg-12">
                   
                    <form method="post" name="" id = "" action='<?php echo URL ;?>/guardar/'>
                    <div class="table-responsive">
                            <table id="usuarios" class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
						              <th>Mesa</th>
						              <th># Orden</th>
						              <th>Plato</th>
						              <th>Cantidad</th>
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
	    

      


      

