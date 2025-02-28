/*===================
A LINK DISABLE
====================*/

/* jqueryをjavascriptに書き換え */
(function (){
	document.querySelectorAll('a.disable').forEach(elm => {
		elm.style.cursor="default" ; //処理
		elm.addEventListener('click', function(event) {
			event.preventDefault(); //イベント発生時の処理
			// console.log('実行');
		});
	});
}());

/*===================
LINKBOX
====================*/

/* jqueryをjavascriptに書き換え */
	(function (){
		const linkbox = document.querySelectorAll('.linkbox');
		for (let i = 0; i < linkbox.length; i++) {
			linkbox[i].style.cursor = "pointer" //処理
			linkbox[i].addEventListener('click', function(event) {
				//イベント発生時の処理
				let myLocation =  linkbox[i].querySelector('a').getAttribute('href');
				let myTarget   =  linkbox[i].querySelector('a').getAttribute('target');
				if(myTarget == "_blank"){
					window.open(myLocation, myTarget);
					console.log(myLocation, myTarget);
				}else{
					window.location.href = myLocation;
					console.log(myLocation, linkbox);
					}
			});
		};
	}());

/*==========================
  HAMBURGER MENU ANIMATION
============================*/

/* jqueryをjavascriptに書き換え */
(function (){
	const navToggle = document.getElementById("nav_toggle");
	const target1 = document.querySelector("header");
	const target2 = document.querySelector("nav");
	navToggle.addEventListener('click', function(){
		//イベント発生時の処理
		target1.classList.toggle('open');
		target2.classList.toggle('navopen');
	}, false);
}());
//css style is required separately for nav and nav.navopen.

function resizeclass(){
	var w = window.innerWidth;
	const x = 992;
	const target1 = document.querySelector("header");
	const target2 = document.querySelector("nav");
	if(w >= x){
		// console.log(window.innerWidth);
		target1.classList.remove('open');
		target2.classList.remove('navopen');
	}
}
window.addEventListener("resize", resizeclass);


/*==========================
On Scroll Layout settings
for MEGAMEMU and PAGETOP button
============================*/

window.addEventListener("scroll", ()=>{
	const header = document.querySelector(".lower-megamenu-wrap");
	const pagetop = document.querySelector(".pagetop");
	header.classList.toggle('scroll', window.scrollY > 70);
	pagetop.classList.toggle('scroll', window.scrollY > 70);
});


/*==========================
Scroll animation by
IntersectionObserver
============================*/

const scrollobj = document.querySelectorAll('.scroll-target');
const options = {threshold : 0};
function intersectionCallback(entries){
	entries.forEach((entry) => {
		if(entry.isIntersecting){
			entry.target.classList.add('scroll');
		}
	});
}
const observer = new IntersectionObserver(intersectionCallback, options);
scrollobj.forEach(item => {observer.observe(item);});
