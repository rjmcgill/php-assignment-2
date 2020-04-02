function confirmDelete(which) {
  if(which === "logo") {
    return confirm('Are you sure you want to change the logo? If you do, you will have to reupload the previous logo to get it back.');
  } else {
    return confirm('Are you sure you want to delete this?');
  }
}

function confirmLogoChange() {
}

function lightDarkMode() {

  let lightDark = 0; //0 is light, 1 is dark
  let style = document.createElement('style');
  let body = document.querySelector('body');
  let image = document.getElementById('lightDarkModeImg');
  image.class = "black";
  if(image.class == "white") {
    style.innerHTML = "body {background-color: white;} p {color: black;} h1 {color: black;} label {color: black;}";
    image.src = "assets/blackeye.png";
    body.appendChild(style);
    image.class = "black";
  } else {
    style.innerHTML = "body {background-color: #394147;} p {color: white;} h1 {color: white;} label {color: white;}";
    image.src = "assets/whiteye.png";
    body.appendChild(style);
    image.class = "white";
  }
}
