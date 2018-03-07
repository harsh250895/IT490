
//var api_key = 'd6fb865f0d167679bbe87e722ea09bdc'; // Get your API key at developer.betterdoctor.com
var doctor_uid = '333d4bb6fcf640e18e93b11b00fe09eb';
//var resource_url = 'https://api.betterdoctor.com/2016-03-01/doctors/'+ doctor_uid + '?user_key=' + api_key;

var http = new XMLHttpRequest();
http.open('get','link.php?uid=' + doctor_uid);
http.onreadystatechange = function(){


  if(http.readyState == 4){
  var data = http.responseText;
  var data = JSON.parse(response);

//$.get(resource_url, function (data) {
  // data: { meta: {<metadata>}, data: {<Doctor>}
  var template = Handlebars.compile(document.getElementById('doc-template').innerHTML);
  document.getElementById('content-placeholder').innerHTML = template(data);
}
};
