<?php

require_once 'upload.php';

class validation {
	
	public function check_name_length($object) {
		
		if (mb_strlen($object->file['original_filename']) > 100) {
			
			$object->set_error('File name is too long.');
			
		}

	}
	
}

$old_file = dirname(__FILE__)."/important/banding/file_banding.txt";
$get_old = file_get_contents($old_file);
$panjang_new = "File Belum Di upload";
$percent = 0;
$size_new = "0 byte";

if (!empty($_FILES['test'])) {
	
	$upload = Upload::factory('check_file/important/files');
	$upload->file($_FILES['test']);
	
	$validation = new validation;
	
	$upload->callbacks($validation, array('check_name_length'));
	$old_new_file = dirname(__FILE__)."/important/files/file_pembanding.txt";
	$results = $upload->upload('file_pembanding.txt');
	
	$get_new = file_get_contents($results['full_path']);
	$size_new = $results['size_in_bytes'];
	$panjang_new = strlen($get_new)." Karakter";
	$similiar = similar_text($get_old, $get_new,$percent);
}


?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Information Retrieval System</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/creative.min.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Similarity Checker</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#services">Checker</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">About</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <header class="masthead text-center text-white d-flex">
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <h1 class="text-uppercase">
              <strong>WELCOME TO SIMILARITY CHECKER</strong>
            </h1>
            <hr>
          </div>
          <div class="col-lg-8 mx-auto">
            <p class="text-faded mb-5">Similarity Check helps editors compare the text of submitted papers for similarity</p>
            <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">Find Out More</a>
          </div>
        </div>
      </div>
    </header>

    <section class="bg-primary" id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading text-white">Why using a Similarity Checker is Essential.</h2>
            <hr class="light my-4">
            <p class="text-faded mb-4">You’ve created a paper for presentation in your educational institution, and want to check content
			for originality. Or perhaps you’ve ordered papers from writing companies and want to check essay for 
			plagiarism. Whatever the reason, the purpose stays the same – you clearly need to check papers before 
			submission. To help users worldwide detect copied content, we’ve created free plagiarism checker! With 
			the assistance of this useful instrument, you can search for any stolen data and avoid it in your 
			document easily.
			When you are preparing assignments or writing research papers, quality is the first thing teachers 
			pay attention to. Of course, mistakes and typos strike the eye, but they can be easily fixed. However,
			many students duplicate content and attempt to pass it off as their own. As a result, college plagiarism 
			has become a common thing, and such works frequently are returned to students. To avoid facing such a
			problem, it is necessary to sift through text before submission. That’s why our plagiarism detector is 
			tool for you.
			If you decided to buy papers from professional authors, you might come across the same problem – 
			copied essays. Don’t give those so-called “helpers” the chance fool you! Use a plagiarism scanner to
			be sure the paper you’ve received is entirely authentic and is worth the money paid.</p>
            <a class="btn btn-light btn-xl js-scroll-trigger" href="#services">Get Started!</a>
          </div>
        </div>
      </div>
    </section>

    <section id="services">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">Similarity Checker</h2>
            <hr class="my-4">
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center ">
           
              <div class="panel panel-info">
					
					<div class="panel-body">
						<h4>File as a comparison</h4>
						<table class="table table-striped">
							<thead>
							<tr>
								<th>No</th>
								<th>Name File</th>
								<th>Link</th>
								<th>Action</th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td>1</td>
								<td>File compare</td>
								<td><a href="open.php" target="_blank">File<a></td>
								<td><a class="btn btn-success btn-sm" target="_blank" href="banding.php">Change File<a></td>
							</tr>
							</tbody>
						</table>
					</div>
				</div>
				<br/>
				<br/>
				<br/>
						<div class="panel panel-warning">

							<div class="panel-body">
								<h4>Files to be compared</h4>
								<form action="" method="post" enctype="multipart/form-data">
								
									<div class="form-group">
										<label for="file">File:</label>
										<input type="file" class="form-control" name="test" >
									</div>

									<button type="submit" class="btn btn-primary">Compare</button>
									
								</form>
							</div>
						</div>
						
						<div class="table-responsive">
							<div class="panel panel-success">
								<div class="panel-body">
								<br/>
								<br/>
								<br/>
									<h4>The Result </h4>
									<table class="table table-striped table-bordered">
										<thead>
											<tr>
												<th>File Name</th>
												<th>file length</th>
												<th>Action</th>
												<th colspan="2">Percentage of file similarities</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>File Compare</td>
												<td><?= strlen($get_old) ?> Characters</td>
												<td><a class="btn btn-info btn-sm" target="_blank" href="open.php">Show File<a></td>
												<td rowspan="2" align="center"><?= $percent ?> %</td>
											</tr>
											<tr>
												<td>File Compare </td>
												<td><?= $panjang_new ?> </td>
												<td><a class="btn btn-info btn-sm" target="_blank" href="open_pembanding.php">Show File<a></td>
											</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
        </div>
      </div>
    </section>
    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading">About Us</h2>
            <hr class="my-4">
            <p class="mb-5">Julia Pratiwi-161401014 | Yuri Utari Ollinka-161401014 | Hilda Suci Ardianti-161401053 | Aisyah Meirosi-161401092</p>
          </div>
        </div>
    </section>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/creative.min.js"></script>

  </body>

</html>
