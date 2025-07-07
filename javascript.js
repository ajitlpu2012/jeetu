const images = ["slider1.jpg", "slider2.jpg", "slider3.jpg"];
let index = 0;

function changeImage() {
    const sliderImage = document.getElementById("sliderImage");
    index = (index + 1) % images.length;
    sliderImage.src = images[index];
}

setInterval(changeImage, 3000);
