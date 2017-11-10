<html>
<head>
  <title>simple contact form in php with ajax validation</title>
  <script type="text/javascript" src="jquery.js"></script>
  <link rel="stylesheet" href="style.css">
	<script type="text/javascript" src="ajax.js"></script>
</head>
<body class="container">
  <div class="col-md-5">
    <h1 class="text-center">simple contact form in php with ajax validation</h1>
    <form role="form" id="contactForm" class="contact-form" data-toggle="validator" class="shake">
      <div class="form-group">
        <div class="controls">
          <input type="text" id="name" class="form-control" placeholder="Name">
          <span class="name text-danger"></span>
        </div>
      </div>
      <div class="form-group">
        <div class="controls">
          <input type="email" class="email form-control" id="email" placeholder="Email" >
          <span class="email text-danger"></span>
        </div>
      </div>
      <div class="form-group">
        <div class="controls">
          <input type="text" id="msg_subject" class="form-control" placeholder="Subject" >
          <span class="subject text-danger"></span>
        </div>
      </div>
      <div class="form-group">
        <div class="controls">
          <textarea id="message" rows="4" placeholder="Massage" class="form-control"></textarea>
          <span class="message text-danger"></span>
        </div>  
      </div>
      <button type="submit" id="submit" class="btn btn-success"><i class="fa fa-check"></i> Submit</button>
    </form>
  </div>
</body>
</html>