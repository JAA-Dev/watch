function loadXMLDoc(filename) {
  if (window.ActiveXObject) {
    xhttp = new ActiveXObject("Msxml2.XMLHTTP");
  } else {
    xhttp = new XMLHttpRequest();
  }
  xhttp.open("GET", filename, false);
  xhttp.send("");
  return xhttp.responseXML;
}

var xml = loadXMLDoc("data.xml");
var xsl = loadXMLDoc("transform.xsl");
var processor = new XSLTProcessor();
processor.importStylesheet(xsl);
var result = processor.transformToFragment(xml, document);
document.getElementById("output").appendChild(result);
 