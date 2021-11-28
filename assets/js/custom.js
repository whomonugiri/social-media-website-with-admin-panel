//for preview the post image
var input = document.querySelector("#select_post_img");

input.addEventListener("change", preview);

function preview() {
    var fileobject = this.files[0];
    var filereader = new FileReader();

    filereader.readAsDataURL(fileobject);

    filereader.onload = function () {
        var image_src = filereader.result;
        var image = document.querySelector("#post_img");
        image.setAttribute('src', image_src);
        image.setAttribute('style', 'display:');
    }
}