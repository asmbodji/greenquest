var typed = new Typed(".typing",{
    strings:["Technicien informatique industrielle","Technicien vision industrielle","Dev web"],
    typeSpeed:100,
    BackSpeed:60,
    loop:true
})




// Add this to your script.js for toggling navigation on small screens
document.querySelector('.nav-toggler').addEventListener('click', () => {
    document.querySelector('.aside').classList.toggle('open');
    document.querySelector('.nav-toggler').classList.toggle('active');
});



document.querySelector('.nav-toggler').addEventListener('click', () => {
    document.querySelector('.aside').classList.toggle('open');
    document.body.classList.toggle('menu-open');
});


function toggleSearch() {
    const searchForm = document.querySelector('.search-form');
    searchForm.style.display = searchForm.style.display === 'block' ? 'none' : 'block';
}
