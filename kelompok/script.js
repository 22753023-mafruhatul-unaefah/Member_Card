function submitForm() {
    // Get form data
    var form = document.getElementById("memberForm");
    var formData = new FormData(form);

    // You can send formData to the server using AJAX or fetch
    // For simplicity, let's log the data to the console
    for (var pair of formData.entries()) {
        console.log(pair[0] + ', ' + pair[1]);
    }

    // Add code to send the form data to the server here
}
