function confirmDelete() {
  return confirm('Are you sure you want to delete this?');
}

function lightDarkMode() {

  let lightDark = 0; //0 is light, 1 is dark
  let style = document.createElement('style');
  let body = document.querySelector('body');
  let image = document.getElementById('lightDarkModeImg');
  if(image.class == "white") {
    style.innerHTML = "body {background-color: white;}p {color: black;}h1 {color: black;}label {color: black;}";
    image.src = "assets/blackeye.png";
    body.appendChild(style);
    image.class = "black";
  } else {
    style.innerHTML = "body {background-color: #394147;} p {color: white;} h1 {color: white;} label {color: white;} td {color: white;}";
    image.src = "assets/whiteye.png";
    body.appendChild(style);
    image.class = "white";
  }
}
