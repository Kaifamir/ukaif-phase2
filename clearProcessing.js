function clearform(){
    // Get the "Clear" button element


// Add a "click" event listener to the button
  // Show a confirmation popup
  const isConfirmed = confirm("Are you sure you want to clear the form?");
  if (isConfirmed) {
    // Get the form element
    const form = document.getElementById("blogform");
    // Reset the form fields
    form.reset();
  }
}

