const spanValues = document.getElementsByClassName('status-display');
for (const spanValue of spanValues) {
	if (spanValue.innerText === '1') {
		spanValue.innerText = 'In Preparation'
	} else if (spanValue.innerText === '2') {
		spanValue.innerText = 'Send'
	} else if(spanValue.innerText === '3' || spanValue.innerText === '5'){
		spanValue.innerText = 'Delivered'
	}else if (spanValue.innerText === '4' || spanValue.innerText === '6'){
		spanValue.innerText = 'Not Arrived'
	}



	else {
		spanValue.innerText = 'No Status'
	}
}