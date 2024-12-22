let slideIndex = 1;


function carousel() {

	let i;
	let x = document.getElementsByClassName("mySlides");
	for (i = 0; i < x.length; i++) {
		x[i].style.display = "none";
	}
	slideIndex++;
	if (slideIndex > x.length) {
		slideIndex = 1
	}
	if (x[slideIndex - 1]) {
		x[slideIndex - 1].style.display = "block";
	}


	setTimeout(carousel, 2000);
}

const texts = document.getElementsByClassName("overlay-item-text");
for (const text of texts) {
	const id = text.id
	const button = document.querySelector('#category-' + id);
	console.log('hallo');
	console.log(id);
	console.log(button);
	console.log('hal')
	text.addEventListener('mouseover', function () {

		button.classList.remove('category-hidden');
	});
	text.addEventListener('mouseout', function () {
		button.classList.add('category-hidden');
	});

}

let iterator = 0
document.addEventListener("scroll", function () {
	const elements = document.querySelectorAll('.overlay-main-content');
	const overlay = document.querySelectorAll('.overlay-item');

	removeClass(elements);
	removeClass(overlay);
	if (iterator === 0) {
		iterator = 1
		carousel();
	}


});

function removeClass(elements) {
	for (const element of elements) {
		const position = element.getBoundingClientRect();

		if (position.top < window.innerHeight && position.bottom >= 0) {
			for (const overlay of elements) {

				setTimeout(() => {

				}, 1000);
				overlay.classList.remove('left');
				overlay.classList.remove('right');
			}
		}
	}
}


const form = document.getElementById('searchCategoryForm');
const login = document.getElementById('login-link');
const dropdown = document.getElementById('login-drop-down');


login.addEventListener('mouseover', function () {
	dropdown.classList.add('active');
});

dropdown.addEventListener('mouseover', function () {
	dropdown.classList.add('active');
});

dropdown.addEventListener('mouseout', function () {
	dropdown.classList.remove('active');
});


/*

fetch('https://dummyjson.com/products')
	.then(res => res.json())
	.then(data => {
		console.log(data);
		for (let product of data['products']) {
			categoriesArray.push(product['category']);
			for (let product of data['products']) {
				productsArray.push({
					id: product['id'],
					image: product['images'][0],
					category: product['category'],
					title: product['title'],
					description: product['description']
				});
			}
		}
	})
	.catch(error => {
		console.error('Error:', error);
	});

fetch("https://api.escuelajs.co/api/v1/products")
	.then((res) => res.json())
	.then(data => {
		for (let info of data) {
			categoriesArray.push(info['category']['name']);
			images.push(info['images'][0]);
		}
		categoriesArray = [...new Set(categoriesArray)];
		let i = 0;
		for (let category of categoriesArray) {
			if (i < 5) {
				let input  =  document.createElement('input');
				input.type = "submit";
				input.name = category;
				input.value = category
				let div = document.createElement('div');
				div.classList.add('category-content');
				div.id = category;
				div.appendChild(input);
				categoriesWrapper.appendChild(div);
				i++
			}


		}



		/!*for (let image of images) {
			let slider  = document.getElementById('image-slider');
			let img  =  document.createElement('img');
			img.src = image;
			img.style.width = 300 +  'px';
			img.style.height = 300 +  'px';
			img.style.objectFit =  'cover';
			img.classList.add('mySlides');
			console.log(img);
			slider.appendChild(img);

		}*!/
	});



*/

/*const products = {
	categories  : categoriesArray,
	products : productsArray
};*/








