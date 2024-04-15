/// Set a timeout function to redirect the user after 5 seconds
setTimeout(function() {
    /// Redirect the user to the success.php page
    window.location.href = "success.php";
}, 5000); /// 5000 milliseconds = 5 seconds
