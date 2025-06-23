function validateForm() {
  const name = document.getElementById("fullname").value.trim();
  const age = document.getElementById("age").value.trim();
  const email = document.getElementById("email").value.trim();
  const gender = document.querySelector('input[name="gender"]:checked');
  const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  // Validate full name
  if (name === "") {
    alert("Please enter your full name.");
    return false;
  }

  // Validate age
  if (age === "" || isNaN(age) || age < 1) {
    alert("Please enter a valid age.");
    return false;
  }

  // Validate gender selection
  if (!gender) {
    alert("Please select your gender.");
    return false;
  }

  // Validate email
  if (email === "" || !emailPattern.test(email)) {
    alert("Please enter a valid email address.");
    return false;
  }

  // If all validations pass
  alert("Registration submitted successfully!");
  return true; // allow form to submit
}