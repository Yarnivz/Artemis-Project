const options = {
	method: 'GET',
	headers: {
		'X-RapidAPI-Host': 'amazon-product-reviews-keywords.p.rapidapi.com',
		'X-RapidAPI-Key': 'SIGN-UP-FOR-KEY'
	}
};

fetch('https://amazon-product-reviews-keywords.p.rapidapi.com/categories?country=NL', options)
	.then(response => response.json())
	.then(response => console.log(response))
	.catch(err => console.error(err));