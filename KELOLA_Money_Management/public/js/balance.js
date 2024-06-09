// script.js

// Assuming you have fetched the transaction data and stored it in an array named transactions

// Calculate total income
const totalIncome = transactions.reduce((total, transaction) => {
    return transaction.type === 'income' ? total + parseFloat(transaction.amount) : total;
}, 0);

// Calculate total expense
const totalExpense = transactions.reduce((total, transaction) => {
    return transaction.type === 'expense' ? total + parseFloat(transaction.amount) : total;
}, 0);

// Calculate remaining balance
const remainingBalance = totalIncome - totalExpense;

// Display totals in the table
document.getElementById('totalIncome').innerText = totalIncome.toFixed(2);
document.getElementById('totalExpense').innerText = totalExpense.toFixed(2);
document.getElementById('remainingBalance').innerText = remainingBalance.toFixed(2);
