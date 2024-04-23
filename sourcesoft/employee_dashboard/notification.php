<?php
// Function to fetch notifications from the server
function fetchNotifications() {
    // Use AJAX or Fetch API to get notifications from the server
    fetch('notification.php') // Check this URL
        .then(response => response.text())
        .then(data => {
            // Update the content of the notificationDropdown div with the fetched data
            document.querySelector('.dropdown-menu').innerHTML = data;

            // Show the dropdown
            showNotificationDropdown();
        })
        .catch(error => console.error('Error fetching notifications:', error));
}

?>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Notification icon click event
        document.getElementById('notificationDropdown').addEventListener('click', function () {
            // Fetch and display notifications
            fetchNotifications();
        });

        // Function to fetch notifications from the server
        function fetchNotifications() {
            // Use AJAX or Fetch API to get notifications from the server
            fetch('notification.php')
                .then(response => response.text())
                .then(data => {
                    // Update the content of the notificationDropdown div with the fetched data
                    document.querySelector('.dropdown-menu').innerHTML = data;

                    // Show the dropdown
                    showNotificationDropdown();
                })
                .catch(error => console.error('Error fetching notifications:', error));
        }

        // Function to show the notification dropdown
        function showNotificationDropdown() {
            var dropdown = document.querySelector('.dropdown-menu');
            dropdown.style.display = 'block';

            // Automatically hide the dropdown after a certain time (e.g., 5 seconds)
            setTimeout(function () {
                dropdown.style.display = 'none';
            }, 5000); // 5000 milliseconds = 5 seconds
        }
    });
</script>
