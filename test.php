<?php

session_start();
ini_set("display_errors", 1);
ini_set("log_errors",1);
ini_set("error_log", "/tmp/error.log");
error_reporting( E_ALL & ~E_DEPRECATED & ~E_STRICT);
if (!isset($_SESSION["user"])){
 header( "Refresh:1; url=login.html", true, 303);
 }

$uid = $_GET['lic'];?>
<!DOCTYPE html>
<html>


<head>
  <meta charset="utf-8">
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/2.0.0/handlebars.min.js"></script>
  <script type="text/javascript" >

  var uid ="<?php echo $uid;?>";
  var resource_url = 'search.php?uid='+ uid;
  $.get(resource_url, function(data) {

          /* data will hold the php array as a javascript object */
          var template = Handlebars.compile(document.getElementById('doc-template').innerHTML);
          document.getElementById('content-placeholder').innerHTML = template(data);
  });

  function visible(){

    var v = document.getElementById("contact");
    v.style.display="block";
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
  </style>
</head>
<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">DocRx</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">Primary Doctor</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#services">Visited</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#portfolio">To-be Visited</a>
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
<h3>BetterDoctor - {{data.profile.first_name}} {{data.profile.last_name}}, {{data.profile.title}}</h3>
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


      <th onclick="visible()">Contact</th>
<div id="contact">
      {{#phones}}

      <td>{{number}}-{{type}}</td>
      {{/phones}}
</div>
    </tr>

    {{/data.practices}}
    </tbody>
    </table>
</script>
</body>


</html>
