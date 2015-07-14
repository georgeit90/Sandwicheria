
	

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
                                <i class="fa fa-dashboard"></i>  <a href="dashboard">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-user"></i>  <?php if(isset($this->title))echo $this->title ?>
                            </li>
                        </ol>
                    </div>
                </div>
               
               <div class="row placeholders">
              <div class="col-xs-6 col-sm-3 placeholder">
              <a href="<?php echo URL;?>mermas/panes">
              <img alt="200x200" class="img-responsive" data-src="holder.js/200x200/auto/vine" src="<?php echo URL;?>public/images/sandwich2.png" data-holder-rendered="true">
             
              <h4>Panes</h4>
              </a>
             <!--  <span class="text-muted">Something else</span> -->
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
                <a href="<?php echo URL;?>mermas/carnes">
              <img alt="200x200" class="img-responsive" data-src="holder.js/200x200/auto/sky" src="<?php echo URL;?>public/images/carnes.png" data-holder-rendered="true">
              <h4>Carnes</h4>
              </a>
             
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <a href="<?php echo URL;?>mermas/vegetales">
              <img alt="200x200" class="img-responsive" data-src="holder.js/200x200/auto/vine" src="<?php echo URL;?>public/images/vegetales.png" data-holder-rendered="true">
             
              <h4>Vegetales</h4>
              </a>
            
            </div>
              <div class="col-xs-6 col-sm-3 placeholder">
              <a href="<?php echo URL;?>mermas/frutas">
              <img alt="200x200" class="img-responsive" data-src="holder.js/200x200/auto/vine" src="<?php echo URL;?>public/images/fruta.png" data-holder-rendered="true">
             
              <h4>Frutas</h4>
              </a>
            
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <a href="<?php echo URL;?>mermas/pastas">
              <img alt="200x200" class="img-responsive" data-src="holder.js/200x200/auto/sky" src="<?php echo URL;?>public/images/pastas.png" data-holder-rendered="true">
             
              <h4>Pastas</h4>
               </a>
            
            </div>
           
    
           <!--
            <div class="col-xs-6 col-sm-3 placeholder">
              <a href="<?php echo URL;?>condimentos">
              <img alt="200x200" class="img-responsive" data-src="holder.js/200x200/auto/sky" src="<?php echo URL;?>public/images/condimentos.png" data-holder-rendered="true">
             
             <h4>Condimentos</h4>
               </a>
            
            </div>
             <div class="col-xs-6 col-sm-3 placeholder">
              <a href="<?php echo URL;?>quesos">
              <img alt="200x200" class="img-responsive" data-src="holder.js/200x200/auto/sky" src="<?php echo URL;?>public/images/quesos.png" data-holder-rendered="true">
             
              <h4>Quesos</h4>
               </a>
            
            </div>
           
             <div class="col-xs-6 col-sm-3 placeholder">
              <a href="<?php echo URL;?>mermas/salsas">
              <img alt="200x200" class="img-responsive" data-src="holder.js/200x200/auto/sky" src="<?php echo URL;?>public/images/salsas.png" data-holder-rendered="true">
             
              <h4>Salsas</h4>
               </a>
            
            </div>
              -->  
            </div>
            <!-- /.container-fluid -->

        </div>	
       
	    

      
	            
	    

      
