function toggleDropdown() {
    const dropdownContent = document.getElementById('dropdownContent');
    if (dropdownContent.style.display === 'block') {
        dropdownContent.style.display = 'none';
    } else {
        dropdownContent.style.display = 'block';
    }
}

// Optional: Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
    if (!event.target.matches('#login')) {
        const dropdownContent = document.getElementById('dropdownContent');
        if (dropdownContent.style.display === 'block') {
            dropdownContent.style.display = 'none';
        }
    }
}
