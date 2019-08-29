window.onscroll = function()
{
	let headerHeight = document.getElementById("header").clientHeight;
	if (document.body.scrollTop > headerHeight || document.documentElement.scrollTop > headerHeight) // TODO change this value to the header height
		document.getElementById("top-button").classList.add("shown");
	else
		document.getElementById("top-button").classList.remove("shown");
};

function topFunction()
{
	document.body.scrollTop = 0; // For Safari
	document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}
