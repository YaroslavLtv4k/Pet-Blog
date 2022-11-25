const btnPopularPosts = document.querySelector('.button-popular-posts')
const btnRecentPosts = document.querySelector('.button-recent-posts')
const popularPosts = document.querySelector('.popular-posts')
const recentPosts = document.querySelector('.recent-posts')

// if click on "Recent" button
btnRecentPosts.addEventListener('click', ()=>{
	btnRecentPosts.classList.add('active')
	recentPosts.classList.add('active')
	btnPopularPosts.classList.remove('active')
	popularPosts.classList.remove('active')
})
// if click on "Popular" button
btnPopularPosts.addEventListener('click', ()=>{
	btnPopularPosts.classList.add('active')
	popularPosts.classList.add('active')
	btnRecentPosts.classList.remove('active')
	recentPosts.classList.remove('active')
})