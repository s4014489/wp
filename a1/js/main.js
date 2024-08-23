const dropdowns = document.querySelectorAll('.dropdown');

function navigateToPage() { 
    var dropdown = document.getElementById("dropdown");
    var selectedOption = dropdown.options[dropdown.selectedIndex].value;
    window.location.href = selectedOption;
}