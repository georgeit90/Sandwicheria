
	

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
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-user"></i>  <?php if(isset($this->title))echo $this->title ?>
                            </li>
                        </ol>
                    </div>
                </div>
               
               <div class="row placeholders">
              <div class="col-xs-6 col-sm-3 placeholder">
              <a href="<?php echo URL;?>sandwiches">
              <img alt="200x200" class="img-responsive" data-src="holder.js/200x200/auto/vine" src="<?php echo URL;?>public/images/sandwich2.png" data-holder-rendered="true">
             
              <h4>Sandwiches</h4>
              </a>
             <!--  <span class="text-muted">Something else</span> -->
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
                <a href="<?php echo URL;?>carnes">
              <img alt="200x200" class="img-responsive" data-src="holder.js/200x200/auto/sky" src="<?php echo URL;?>public/images/carnes.png" data-holder-rendered="true">
              <h4>Carnes</h4>
              </a>
             
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <a href="<?php echo URL;?>vegetales">
              <img alt="200x200" class="img-responsive" data-src="holder.js/200x200/auto/vine" src="<?php echo URL;?>public/images/vegetales.png" data-holder-rendered="true">
             
              <h4>Vegetales</h4>
              </a>
            
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <a href="<?php echo URL;?>pastas">
              <img alt="200x200" class="img-responsive" data-src="holder.js/200x200/auto/sky" src="<?php echo URL;?>public/images/pastas.png" data-holder-rendered="true">
             
              <h4>Pastas</h4>
               </a>
            
            </div>
           
          </div> 
                    
            </div>
            <!-- /.container-fluid -->

        </div>	
       
	    

      
