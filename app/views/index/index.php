
       
         <?php 	
        if(isset($this->menu))
   	    require $this->menu;
        ?>
		 <!-- /.navbar-collapse -->
        </nav>
        <?php 	
        if(isset($this->layout))
        require $this->layout."admin/Content.php";
        ?>

      

