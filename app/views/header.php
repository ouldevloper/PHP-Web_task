<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Note Keeper</title>
  
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="app/views/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="app/views/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="app/views/dist/css/boot.css">
  <link rel="stylesheet" href="app/views/dist/css/main.css">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper" style="margin:0;padding:0px;";>
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white sticky-top">
    <div class="container">
      <a href="" class="navbar-brand">
        <img src="app/views/dist/img/notelogo.png" alt="Note Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Notes Keeper</span>
      </a>
      <ul class=" navbar-nav ">
        <li class="nav-item">
          <a class="nav-link"  href="" data-toggle="modal" data-target="#profile">
          <i class="fas fa-cogs" style='font-size:24px'></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link"  href="" data-toggle="modal" data-target="#newnote">
              <i class="fas fa-plus" style='font-size:24px'></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link"  href="/?p=logout">
            <i class='fas fa-sign-out-alt' style='font-size:24px'></i>
          </a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    

    <!-- Main content -->
    <div class="content">
        <div style="height:20px;"></div>
    <div class="modal fade" id="newnote" tabindex="-1" role="dialog" aria-labelledby="newnote" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="newnote">New Note</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closemodal">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="POST" id="noteform">
            <div class="form-group">
                <label for="date-note" class="col-form-label">Date:</label>
                <input name="date" type="text" class="form-control" id="recipient-name">
              </div>
              <div class="form-group">
                <label for="title-note" class="col-form-label">Title:</label>
                <input name="title" type="text" class="form-control" id="recipient-name322">
              </div>
              <div class="form-group">
                <label for="descriptipon-note" class="col-form-label">Message:</label>
                <textarea name="description" class="form-control" id="message-text"></textarea>
              </div>
              <div class="modal-footer">
                <input  name="addnote" type="submit" class="btn btn-success" value="Add New Note"/>
              </div>
            </form>
          </div>
          
        </div>
      </div>
    </div>

    <div class="modal fade" id="profile" tabindex="-1" role="dialog" aria-labelledby="profile" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="newnote">Edit Your Profile</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closemodal">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" id="editprofile" action="/?p=home&path=profile">
              <div class="form-group">
                <label for="date-note" class="col-form-label">Full Name:</label>
                <input name="fullname" value="<?= SYSTEM\Session::get('fullname');?>"required  type="text" class="form-control" id="recipient-name1">
              </div>
              <div class="form-group">
                <label for="title-note" class="col-form-label">Username:</label>
                <input name="username" value="<?= SYSTEM\Session::get('username');?>" required type="text" class="form-control" id="recipient-name2">
              </div>
              <div class="form-group">
                <label for="date-note" class="col-form-label">Email:</label>
                <input name="email" value="<?= SYSTEM\Session::get('email');?>" required type="email" class="form-control" id="recipient-name3">
              </div>
              <div class="form-group">
                <label for="title-note" class="col-form-label">Phone:</label>
                <input name="phone" value="<?= SYSTEM\Session::get('phone');?>" required type="phone" class="form-control" id="recipient-name4">
              </div>
              <div class="form-group">
                <label for="date-note" class="col-form-label">Password:</label>
                <input name="password" type="password" class="form-control" id="recipient-name5">
              </div>
              
              <div class="modal-footer">
                <input  name="editprofilebtn" type="submit" class="btn btn-success" value="Edit Profile"/>
              </div>
            </form>
          </div>
          
        </div>
      </div>
    </div>

