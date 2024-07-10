document.addEventListener('DOMContentLoaded', function() {
    let tabLinks = document.querySelectorAll('[data-mdb-tab-init]');

    tabLinks.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();

            // Remove active class from all links
            tabLinks.forEach(link => link.classList.remove('active'));

            // Add active class to the clicked link
            this.classList.add('active');

            // Get the target tab content
            let targetId = this.getAttribute('href').substring(1);

            // Hide all tab contents
            let tabContents = document.querySelectorAll('.tab-content .tab-pane');
            tabContents.forEach(tab => tab.classList.remove('show', 'active'));

            // Show all tab contents with the target ID
            let targetTabs = document.querySelectorAll(`#${targetId}`);
            targetTabs.forEach(tab => tab.classList.add('show', 'active'));
        });
    });
});