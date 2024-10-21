<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>hello</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="http://localhost/pro/assets/css/style.css">
</head>
<body>


<!--
Tools
 - CSS - Margin, Padding, Display,Hover, After, Before, Cursor,scroller, Text, Position, Indexing, Tabs, Navingation, Hero section, Services, News , Notice,
 Blogs, Image card, Team Card, Location Card,tables,dropdown,css variables,select,Siderbar, collapes,button,(Griding),modal, badge,buttons,Tooltip,Video play, Images, Audio,  (Forms, Validations), Sliders, Normal Card and section.
 Advanced - - - -
 Drag drop, Bulk Imaged Upload, Text Editor, Dropbox, print, File Viewer,zoomer, Rating,

 Libraries
 -bootstrap
 -Jqueryscript.net
 - datatables
 - validator.js
 - many validator libraries according to need
 - select2

-->
    <div class="nav-section">
        <nav>
            <ul class="mt-2">
                <li><a href="#" data-page="home" class="tab active">Home</a></li>
                <li><a href="#" data-page="contact" class="tab">Contact</a></li>
                <li><a href="#" data-page="about" class="tab">About</a></li>
                <li><a href="#" data-page="settings" class="tab">Settings</a></li>
                <li><a href="#" data-page="settngsClone" class="tab">settngsClone</a></li>
            </ul>
        </nav>
    </div>
    <div class="page-show" id="pages">
       <?php   $data['countries'] = $countries; $this->load->view('tiny/home', $data); ?>
        <?php if ($this->session->flashdata('message')): ?>
            <div class="alert alert-info">
                <?php echo $this->session->flashdata('message'); ?>
            </div>
        <?php endif; ?>
    </div>
