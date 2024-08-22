const dropdowns = document.querySelectorAll('.dropdown');

function navigateToPage() { 
    const url = this.getAttribute('href');
    window.location.href = url;
    
}