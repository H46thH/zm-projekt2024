const regex = /[^?&=]+(?=\s*$|&|$)/;
const category = window.location.href.match(regex);

if (category[0]) {
	console.log(category[0]);
}

const productsDiv = document.getElementById('product-display-status')

function productsClicked() {
	console.log(productsDiv)
	console.log('hallo')
	productsDiv.classList.toggle('open');
}

