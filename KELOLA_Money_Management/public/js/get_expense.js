// Assume you have a function to fetch the user_id from localStorage
function getUserId() {
  return localStorage.getItem("userId");
}

// Fetch expense transactions and update HTML
function fetchAndRenderExpenseTransactions() {
  var userId = getUserId();

  fetch("/kelola/public/dashboard/php/get_expense.php?user_id=" + userId)
    .then((res) => res.json())
    .then((expenseTransactions) => {
      renderExpenseTransactions(expenseTransactions);
    })
    .catch((error) => {
      console.error(error);
    });
}

// Render expense transactions in HTML
function renderExpenseTransactions(expenseTransactions) {
  var expenseEntryContainer = document.querySelector(".expenses-entry");

  // Clear existing entries
  expenseEntryContainer.innerHTML = "";

  expenseTransactions.forEach((transaction) => {
    var entry = document.createElement("div");
    entry.classList.add("expense-entry");

    entry.innerHTML = `
              <div class="d-flex justify-content-between">
                  <div>
                      <h6 class="mb-0">Date: ${transaction.date}</h6>
                      <h6 class="mb-0">Amount: Rp ${transaction.amount}</h6>
                      <h6 class="mb-0">Source Bank: ${transaction.source}</h6>
                      <h6 class="mb-0">Note: ${transaction.notes}</h6>
                  </div>
                  <div>
                      <button class="btn btn-primary" onclick="editTransaction(${transaction.id})" data-bs-toggle="modal" data-bs-target="#editTransactionModal">Edit</button>
                      <button class="btn btn-danger" onclick="deleteTransaction(${transaction.id})">Delete</button>
                  </div>
              </div>
              <hr>
          `;

    expenseEntryContainer.appendChild(entry);
  });
}

// Function to handle edit button click
function editTransaction(transactionId) {
  // Fetch the transaction details based on the transactionId
  // and populate the form fields for editing
  fetch("/kelola/public/dashboard/php/edit_transaction.php?id=" + transactionId)
    .then((res) => res.json())
    .then((transactionDetails) => {
      // Populate modal form with the fetched data
      document.getElementById("editTransactionId").value =
        transactionDetails.id;
      document.getElementById("editTransactionDate").value =
        transactionDetails.date;
      document.getElementById("editTransactionAmount").value =
        transactionDetails.amount;
      document.getElementById("editTransactionSource").value =
        transactionDetails.source;
      document.getElementById("editTransactionNote").value =
        transactionDetails.notes;
    })
    .catch((error) => {
      console.error(error);
    });
}

function deleteTransaction(transactionId) {
  fetch(
    "/kelola/public/dashboard/php/delete_transaction.php?id=" + transactionId,
    {
      method: "DELETE",
    }
  )
    .then((res) => {
      if (res.status === 200) {
        // Transaction deleted successfully
        alert("Transaction deleted successfully!");
        // Refresh the transaction entries
        fetchAndRenderIncomeTransactions();
        fetchAndRenderExpenseTransactions();
      } else {
        // Handle error
        alert("Failed to delete transaction. Please try again.");
      }
    })
    .catch((error) => {
      console.error(error);
    });
}

fetchAndRenderExpenseTransactions();
