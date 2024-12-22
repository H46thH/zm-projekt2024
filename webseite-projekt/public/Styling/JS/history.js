const regex = /[^?&=]+(?=\s*$|&|$)/;
const category = window.location.href.match(regex);
console.log(category[0]);


if (category[0]){




}