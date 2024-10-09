var gallery = document.getElementById("article-gallery");
var text = document.getElementById("gallery-track");
var title = document.getElementById("gallery-title");
var description = document.getElementById("gallery-desc");

var images = [
    'https://picsum.photos/800/400',
    'https://picsum.photos/800/401',
    'https://picsum.photos/800/402',
    'https://picsum.photos/800/403',
    'https://picsum.photos/800/404'
];
var current = 0;

var t1 = document.getElementById("AT-1");
var t2 = document.getElementById("AT-2");
var t3 = document.getElementById("AT-3");
var t4 = document.getElementById("AT-4");
var t5 = document.getElementById("AT-5");

var d1 = document.getElementById("AD-1");
var d2 = document.getElementById("AD-2");
var d3 = document.getElementById("AD-3");
var d4 = document.getElementById("AD-4");
var d5 = document.getElementById("AD-5");

document.addEventListener('DOMContentLoaded', function() {
    current = -1;
    ChangeGalleryP();
    setTitle();
    setDesc();
});

function setTitle() {
    t1.textContent = galleryTitle[5];
    t2.textContent = galleryTitle[6];
    t3.textContent = galleryTitle[7];
    t4.textContent = galleryTitle[8];
    t5.textContent = galleryTitle[9];
}

function setDesc() {
    d1.textContent = galleryDesc[5];
    d2.textContent = galleryDesc[6];
    d3.textContent = galleryDesc[7];
    d4.textContent = galleryDesc[8];
    d5.textContent = galleryDesc[9];
}

function ChangeGallery() {
    if (galleryTitle === undefined || galleryTitle.length == 0) {
        alert('Error: galleryTitle is empty');
        galleryTitle = ['Empty 0', 'Empty 1', 'Empty 2', 'Empty 3', 'Empty 4', 'Empty 5', 'Empty 6', 'Empty 7', 'Empty 8', 'Empty 9'];
    }

    if (galleryDesc === undefined || galleryDesc.length == 0) {
        alert('Error: galleryDescription is empty');
        galleryDescription = ['Empty 0', 'Empty 1', 'Empty 2', 'Empty 3', 'Empty 4', 'Empty 5', 'Empty 6', 'Empty 7', 'Empty 8', 'Empty 9'];
    }

    if (images === undefined || images.length == 0) {
        alert('Error: images is empty');
        images = ['Empty 0', 'Empty 1', 'Empty 2', 'Empty 3', 'Empty 4', 'Empty 5', 'Empty 6', 'Empty 7', 'Empty 8', 'Empty 9'];
    }

    gallery.style.backgroundImage = "url('" + images[current] + "')";
    title.textContent = galleryTitle[current];
    description.textContent = galleryDesc[current];

    switch (current) {
        case 0:
            text.textContent = "# o o o o";
            break;
        case 1:
            text.textContent = "o # o o o";
            break;
        case 2:
            text.textContent = "o o # o o";
            break;
        case 3:
            text.textContent = "o o o # o";
            break;
        case 4:
            text.textContent = "o o o o #";
            break;
        default:
            text.textContent = "# o o o o";
    }
}

function ChangeGalleryP() {
    current = (current + 1) % 5;
    ChangeGallery();
}

function ChangeGalleryM() {
    current = (current - 1 + 5) % 5;
    ChangeGallery();
}