let select = document.getElementById("select");
let list = document.getElementById("list");
let lis = document.getElementsByClassName('li-select');
let selectText = document.getElementById('selectText');
const regex = /[^?&=]+(?=\s*$|&|$)/;
const category = window.location.href.match(regex);
const regexCategory = /[?&]([^=&#]+)=/g;
const parameterRegex = window.location.href.match(regexCategory);
console.log(parameterRegex[0]);
console.log(category);
console.log(category[0]);


if (category[0] && parameterRegex[0] === '?category=') {
	showProductsWithCategory(category[0]);
} else if (parameterRegex[0] === '?products=') {
	console.log('hallo');
	showInput(category[0]);
}


const productItems = document.getElementsByClassName("product-item");
for (const productItem of productItems) {
	const id = productItem.id
	const button = document.querySelector('#product-button-' + id);
	productItem.addEventListener('mouseover', function () {

		button.classList.remove('product-button-hidden');
	});
	productItem.addEventListener('mouseout', function () {
		button.classList.add('product-button-hidden');
	});

}


/*l
const productItems = document.querySelectorAll('.product-item');

for (const productItem of productItems) {
	productItem.addEventListener('mouseover', function () {
		productItem.classList.add('mouseover');
	});
	productItem.addEventListener('mouseout', function () {
		productItem.classList.remove('mouseover');
	});
}*/

for (const li of lis) {
	li.addEventListener('click', function () {
		showProductsWithCategory(li.innerHTML);
	});
}


select.addEventListener("click", () => {
	list.classList.toggle("open");
});

function showProductsWithCategory(category) {
	selectText.innerText = category;
	if (category === 'All') {
		console.log('hallo');
		showProducts();
	} else {
		document.querySelectorAll(`[data-categories]`).forEach(item => {
			item.classList.remove('hidden');
			const itemsCategory = item.getAttribute('data-categories');
			if (itemsCategory !== category) {
				item.classList.add('hidden');
			}
		});
	}
}

function showInput(category) {
	const items = document.querySelectorAll('.product-item');
	for (const item of items) {
		item.classList.add('hidden');
	}
	const categoryStrings = category.split(',');
	console.log(categoryStrings);
	for (const categoryString of categoryStrings) {
		const item = document.getElementById(categoryString);
		console.log(item)
		item.classList.remove('hidden')
	}
}

function showProducts() {
	const items = document.querySelectorAll('.product-item');
	for (const item of items) {
		item.classList.remove('hidden');
	}
}




