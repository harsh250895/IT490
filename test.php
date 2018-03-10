<?php

session_start();
ini_set("display_errors", 1);
ini_set("log_errors",1);
ini_set("error_log", "/tmp/error.log");
error_reporting( E_ALL & ~E_DEPRECATED & ~E_STRICT);
if (!isset($_SESSION["user"])){
 header( "Refresh:1; url=login.html", true, 303);
 }

?>
<!DOCTYPE html>
<html>


<head>
  <meta charset="utf-8">
  <link href="startbootstrap-creative-gh-pages/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="startbootstrap-creative-gh-pages/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

  <!-- Plugin CSS -->
  <link href="startbootstrap-creative-gh-pages/vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="startbootstrap-creative-gh-pages/css/creative.min.css" rel="stylesheet">
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/2.0.0/handlebars.min.js"></script>
  <script type="text/javascript" >

  var uid ="<?php $uid = $_GET['lic']; echo $uid;?>";
  var resource_url = 'search.php?uid='+ uid;
  $.get(resource_url, function(data) {

          /* data will hold the php array as a javascript object */
          var template = Handlebars.compile(document.getElementById('doc-template').innerHTML);
          document.getElementById('content-placeholder').innerHTML = template(data);
  });

  function f(){
  var name = "<?php $name = $_GET['name']; echo $name;?>";

  var d = document.getElementById('date');
  var date = d.value;


  var url='http://localhost/tobevisited.php?name='+name + '&uid=' + uid + '&date=' + date + '&type=add';


window.open(url);


  }
  function p(){
  var name = "<?php $name = $_GET['name']; echo $name;?>";

  var p = document.getElementById('p');
  var pri = p.value;


  var url='http://localhost/primarydoc.php?uid='+pri + '&type=add';


window.open(url);


  }
  </script>

  <style>
  body {
    font-family: ProximaNovaReg, 'Helvetica Neue', Helvetica, Arial, sans-serif;
}

h3 {
    color: #bb3794;
}
a {
    text-decoration: none;
}

a, a:visited {
    color: rgb(84, 180, 210);
}

a:hover {
    color: rgb(51,159,192);
}

th {
    text-align: left;
}

td, th {
  padding-right: 20px;
}

.address {
    font-size: 0.8em;
    color: #888;
}

#contact{
  display:none;

}
form{
  display:block;
  padding-top: 5%;
}
#mainNav {
    background-color: #f05f40;
}

#content-placeholder{

  padding-top:5%;
}
  </style>
</head>
<body id="page-top">

  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="searchpage.php">DocRx</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="primarydoc.php">Primary</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="visited.php">Visited</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="tobevisited.php">To-be Visited</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
<div id="content-placeholder"></div>
<script id="doc-template" type="text/x-handlebars-template">

<h3 id="name">BetterDoctor - {{data.profile.first_name}} {{data.profile.last_name}}, {{data.profile.title}}</h3>
    <p class="address">

    </p>
    <p class="bio">{{data.profile.dynamic_bio}}</p>
    <table>
        <tr>

            <td><a href="{{data.attribution_url}}" target="_new">{{data.attribution_url}}</a></td>
        </tr>
        <tr>
            <th>Picture</th>
            <td><img src="{{data.profile.image_url}}"></img></td>
        </tr>
        <tr>
            <th>Specialties</th>
            <td>
            {{#data.specialties}}
            {{name}}<br>
            {{/data.specialties}}
            </td>
        </tr>


<tr>
      {{#data.practices}}

          <th>Practice</th>
      <td>{{name}}<br></td>

      <th>Address</th>
      <td>{{visit_address.street}}<br>
      {{visit_address.city}}, {{visit_address.state}} {{visit_address.zip}}</td>


      <th>Contact</th>
      {{#phones}}

      <td>{{number}}-{{type}}</td>
      {{/phones}}

</tr>

    {{/data.practices}}

    <tr>
      <td><input type=text placeholder="yyyy-dd-mm 00:00:00" id="date">Enter Date</td>
      <td><input type=button value="Schedule" id="b" onclick="f()"></td>
      <td><a href="primarydoc.php?uid={{data.uid}}&type=add">Make Primary</td>
    </tr>
    </tbody>
    </table>
</script>
</body>


</html>
