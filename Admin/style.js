var imageInput = document.getElementById("image_input");
var displayImage = document.getElementById("display_image");
imageInput.addEventListener("change",function(event){
  if(event.target.files.length == 0){
    return;
  }
  var tempUrl = URL.createObjectURL(event.target.files[0]);
  displayImage.setAttribute("src", tempUrl);
});