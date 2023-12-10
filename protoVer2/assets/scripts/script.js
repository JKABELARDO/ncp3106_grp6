const texts = ["Dale", "Wax", "Neil"];
let count = 0;
let index = 0;
let currentText = "";
let letter = "";

(function type() {
	if (count === texts.length) {
		count = 0;
	}
	currentText = texts[count];
	letter = currentText.slice(0, ++index);

	document.querySelector("#typing-text").textContent = letter;
	if (letter.length === currentText.length) {
		count++;
		index = 0;
	}
	setTimeout(type, 400);
})();

document.getElementById('lets-go-button').addEventListener('click', function() {
    var pageContent = document.getElementById('page-content');
    pageContent.classList.add('swipe-out');

    setTimeout(function() {
        window.location.href = 'adminLogin.html';
    }, 1000);
});

 

	