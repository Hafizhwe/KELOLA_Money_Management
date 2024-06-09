// Assuming you have a function to fetch the user_id from localStorage
function getUserId() {
  return localStorage.getItem("userId");
}

// Function to handle form submission
document
  .getElementById("editTransactionForm")
  .addEventListener("submit", function (event) {
    event.preventDefault();

    // Retrieve user_id from localStorage
    var userId = getUserId();

    // Get form data
    var formData = new FormData(this);

    // Append user_id to form data
    formData.append("user_id", userId);

    // Send form data to update the transaction
    fetch("/kelola/public/dashboard/php/update_transaction.php", {
      method: "POST",
      body: formData,
    })
      .then((res) => {
        if (res.status === 200) {
          // Transaction updated successfully
          alert("Transaction updated successfully!");
          // Close the modal
          $("#editTransactionModal").modal("hide");
          // Refresh the transaction entries
          fetchAndRenderIncomeTransactions();
          fetchAndRenderExpenseTransactions();
        } else {
          // Handle error
          alert("Failed to update transaction. Please try again.");
        }
      })
      .catch((error) => {
        console.error(error);
      });
  });
