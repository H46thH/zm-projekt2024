checkResult();

document.querySelectorAll('.product-count-wrapper').forEach(counter => {
	const minusButton = counter.querySelector('.minus');
	const plusButton = counter.querySelector('.plus');
	const inputField = counter.querySelector('.product');
	const prices = counter.querySelector('.price');

	function changeAmountOfProducts(operator, devide) {
		event.preventDefault();
		const currentValue = Number(inputField.innerHTML) || 0;
		inputField.innerHTML = (currentValue + operator).toString();
		const currentPrice = parseInt(prices.innerHTML);
		const inputValue = parseInt(inputField.innerHTML);
		console.log(currentPrice);
		console.log(inputValue);
		if (devide) {
			prices.innerHTML = (currentPrice / (inputValue + 1)).toString();
		} else {
			prices.innerHTML = (currentPrice * inputValue).toString();
		}
		checkResult();
	}

	minusButton.addEventListener('click', event => {
		changeAmountOfProducts(-1, true);
	});

	plusButton.addEventListener('click', event => {
		changeAmountOfProducts(1, false);
	});

});

function checkResult() {
	const result = document.getElementById('result');
	const prices = document.getElementsByClassName('price')
	let allPrices = 0;
	let allProducts = 0
	for (const price of prices) {
		allPrices += parseInt(price.innerHTML);
	}
	result.innerHTML = allPrices.toString() + ' €';
}



