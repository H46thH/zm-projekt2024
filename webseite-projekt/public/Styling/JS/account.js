const loginForm = document.getElementById('login-form');
const registerForm = document.getElementById('register-form');
const accountButton = document.getElementById('account-button');


const regex = /[^?&=]+(?=\s*$|&|$)/;
const parameter = window.location.href.match(regex);
console.log(parameter[0]);

if (parameter[0] === 'success'){
	const popUp = document.getElementById('pop-up-message');
	const closeButton = document.getElementById('close-alert-button');
	const overlay = document.getElementById('overlay-pop-up');
	popUp.classList.remove('hidden-pop-up');
	overlay.classList.remove('hidden-pop-up');
	closeButton.addEventListener('click', function (){
		popUp.classList.add('hidden-pop-up');
		overlay.classList.add('hidden-pop-up')
	});

}

const accountHeadlines = document.getElementsByClassName("main-content-headline");
const formProduct = document.getElementById('product-create-form');
for (const accountHeadline of accountHeadlines) {
	console.log(accountHeadline)
	const id = accountHeadline.id
	const button = document.querySelector('#main-content-text-' + id);
	accountHeadline.addEventListener('click', function () {
		button.classList.toggle('hidden-text');
		accountHeadline.classList.toggle('clicked');
		if (formProduct.classList.contains('form-text-hidden') && id === '2') {

			setTimeout(() => {
				formProduct.classList.remove('form-text-hidden');
			}, 800);

		} else {
			formProduct.classList.add('form-text-hidden');
		}
	});
}


function registerClicked() {
	console.log('clicked');
	loginForm.classList.toggle('hidden');
	registerForm.classList.toggle('hidden');

	document.querySelectorAll(`[data-text]`).forEach(item => {
		if (item.classList.contains('hidden')) {
			console.log(item);
			accountButton.innerText = item.getAttribute('data-text');
		}
	});

}


const accordions = document.getElementsByClassName('accordion');
for (const accordion of accordions) {
	const id = accordion.id;
	const button = document.querySelector('#accordion-div-' + id);
	accordion.addEventListener('click', function () {
		button.classList.toggle('active');
	});
}

