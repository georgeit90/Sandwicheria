<head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title><?php if(isset($this->title))echo $this->title?></title>
	
	<!-- Bootstrap Core CSS -->
    <link href='<?php echo URL;?>public/bootstrap/css/bootstrap.min.css' rel="stylesheet"/>
	   
	<!-- Custom CSS -->
	<link href='<?php echo URL;?>public/css/sb-admin.css' rel="stylesheet"/>
    
	<!-- Morris Charts CSS -->
    <!--<link href='<?php echo URL;?>public/css/plugins/morris.css' rel="stylesheet"> -->
   <!-- Custom Fonts -->
    <link href='<?php echo URL;?>public/font-awesome/css/font-awesome.min.css' rel="stylesheet" type="text/css">
	
   <link href='<?php echo URL;?>public/css/table-grid.css' rel="stylesheet" type="text/css">
    <!-- CSS -->
	<?php if(isset($this->css))
    foreach ($this->css as $css){
	echo "<link rel='stylesheet' href='". URL.'views/'.$css."' type='text/css'>";
	}
	?>
	<!-- <script type="text/javascript" src='<?php echo URL;?>public/js/jquery-1.6.3.js'></script>
	<script type="text/javascript" src='<?php echo URL;?>public/js/jquery-1.6.3.min.js'></script>
	
	<script type="text/javascript" src='<?php echo URL;?>public/js/jquery-ui.js'></script> -->
	<script type="text/javascript" src='<?php echo URL;?>public/js/jquery-2.0.3.min.js'></script>
	<?php if(isset($this->js))
    foreach ($this->js as $js){
	echo "<script type='text/javascript' src='". URL.'views/'.$js."'></script>";
	}
	?>

 
</head>

<body>
 
        
  <?php 	
   if(isset($this->layout))
   require $this->layout."header/header.php";
   ?>