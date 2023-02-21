function changeImage() {
  var image = document.getElementById('myImage');
  if (image.src.match("maybach.jpeg")) {
    image.src = "images/keitruck.jpeg";
  } else {
    image.src = "images/maybach.jpeg";
  }
}

function changeText()
{
    document.getElementById("hidden").innerHTML = "You found the secret!";
    setTimeout(changeText2, 2000);
}

function changeText2()
{
    document.getElementById("hidden").innerHTML = "Click the Car to change it."
}