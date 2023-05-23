let darkMode = localStorage.getItem("darkMode");
const sideMenu = document.querySelector("aside");
const menuBtn = document.querySelector("#menu-btn");
const closeBtn = document.querySelector("#close-btn");
const themeToggler = document.querySelector(".theme-toggler");

// show sidebar
menuBtn.addEventListener('click', () => {
    sideMenu.style.display = 'block';
})

// close sidebar
closeBtn.addEventListener('click', () => {
    sideMenu.style.display = 'none';
})

//enable darkmode
const enableDarkMode = () => {

	document.body.classList.add('dark-theme-variables');
	themeToggler.querySelector('span:nth-child(1)').classList.remove('active');
    	themeToggler.querySelector('span:nth-child(2)').classList.add('active');
	localStorage.setItem("darkMode", "enabled");
};


//disable darmode
const disableDarkMode = () => {

	document.body.classList.remove('dark-theme-variables');
	themeToggler.querySelector('span:nth-child(1)').classList.add('active');
    	themeToggler.querySelector('span:nth-child(2)').classList.remove('active');
	localStorage.setItem("darkMode", "null");
};

if (darkMode === "enabled") {
	enableDarkMode();
};


// change theme
themeToggler.addEventListener('click', () => {
  darkMode = localStorage.getItem("darkMode");
    if(darkMode !== "enabled") {
	enableDarkMode();
	
    }else{
	disableDarkMode();
    }

    
    
});

