// Assume you have a function to fetch the user_id from localStorage
function getUserId() {
  return localStorage.getItem("userId");
}

// Fetch income transactions and update HTML
function fetchAndRenderIncomeTransactions() {
  var userId = getUserId();

  fetch("/kelola/public/dashboard/php/get_income.php?user_id=" + userId)
    .then((res) => res.json())
    .then((incomeTransactions) => {
      renderIncomeTransactions(incomeTransactions);
    })
    .catch((error) => {
      console.error(error);
    });
}

// Render income transactions in HTML
function renderIncomeTransactions(incomeTransactions) {
  var incomeEntryContainer = document.querySelector(".income-entry");

  // Clear existing entries
  incomeEntryContainer.innerHTML = "";

  incomeTransactions.forEach((transaction) => {
    var entry = document.createElement("div");
    entry.classList.add("income-entry");

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

    incomeEntryContainer.appendChild(entry);
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

fetchAndRenderIncomeTransactions();
