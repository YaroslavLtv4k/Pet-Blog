const hamBtn = document.querySelector('.ham')
const menuContent = document.querySelector('.mob-menu-content')
const body = document.querySelector('body')

function mobileMenu() {
	menuContent.classList.toggle('active')
	body.classList.toggle('mobMenu')
}

hamBtn.addEventListener("click", mobileMenu)