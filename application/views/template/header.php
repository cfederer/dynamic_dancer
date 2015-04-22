<!DOCTYPE html> 
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="author" content="Andrew Paulman" />
    <title>Dynamic Dance Costume Inventory</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo base_url('css/demo_table.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('css/layout.css'); ?>">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="<?php echo base_url('js/jquery.dataTables.min.js'); ?>"></script>
   </head>
  <body>
  	<div class="container-fluid bighead">
  		<h1 id = "mainTitle">Dynamic Dance Costume Inventory</h1>
  	</div>
  	<div class="container-fluid">
  		<div class="row">
  			<div class="col-md-12">
  				<a href="<?php echo site_url('home/view'); ?>">Home</a>&nbsp;&nbsp;&nbsp;
  				<a href="<?php echo site_url('dancer/view'); ?>">Dancers</a>&nbsp;&nbsp;&nbsp;
  				<a href="<?php echo site_url('dance/view'); ?>">Dances</a>&nbsp;&nbsp;&nbsp;
  				<a href="<?php echo site_url('costume/view'); ?>">Costumes</a>&nbsp;&nbsp;&nbsp;
  				<a href="<?php echo site_url('costumePart/view'); ?>">Costume Parts</a>
  			</div>
  		</div>
  	</div>
