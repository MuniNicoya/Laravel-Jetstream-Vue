// Import TransactionData from '../types';
import { ref } from 'vue';

export function useTransactionParser() {
  const currentTransaction = ref(new TransactionData());

  function parseTransactionLine(transactionLine) {
    let isDate = transactionLine.match(/^[0-9]{2}[\/-][0-9]{2}$/);

    if (transactionLine.trim() === '-') {
      // just skip and return the currentTransaction unchanged
      return;
    }

    if (isDate) {
      if (currentTransaction.value.date) {
        // A new transaction detected, but there's already a transaction in progress
        const oldTransaction = new TransactionData(currentTransaction.value);
        const newTransaction = new TransactionData();
        newTransaction.date = transactionLine;
        currentTransaction.value = newTransaction;
        return oldTransaction;
      } else {
        // Logic to set the date for the new transaction
        currentTransaction.value.date = transactionLine;
        return;
      }
    } else if (currentTransaction.value.date && !currentTransaction.value.number) {
      currentTransaction.value.number = transactionLine;
      return;
    } else if (currentTransaction.value.date && !currentTransaction.value.number) {
      currentTransaction.value.number = transactionLine;
      return;
    } else if (currentTransaction.value.number && !currentTransaction.value.description) {
      // Add a check here to remove the date from the beginning of the description
      if (transactionLine.length > 9 && /^\d{2}-\d{2}-\d{2}/.test(transactionLine.substring(0, 8))) {
        transactionLine = transactionLine.substring(9);
      }
      currentTransaction.value.description = transactionLine;
      return;
    } else if (currentTransaction.value.description && !currentTransaction.value.amount) {
      currentTransaction.value.amount = transactionLine.replace(/,/g, '');
      return;
    } else if (currentTransaction.value.amount && !currentTransaction.value.daily_balance) {
      currentTransaction.value.daily_balance = transactionLine.replace(/,/g, '');
      return;
    }
    // Line didn't match any pattern, but returning currentTransaction for consistency
  }

  return { currentTransaction, parseTransactionLine };
}

export function classifyTransaction(transactionDescription) {
  const tokens = transactionDescription.toLowerCase().split(' ');

  for (const token of tokens) {
    for (const subcategory of subcategories) {
      if (subcategory.keywords.includes(token)) {
        const associatedBudgets = budgets.filter(budget => budget.subcategoryIds.includes(subcategory.id));
        return associatedBudgets.map(budget => budget.name);
      }
    }
  }
  return ["Uncategorized"]; // Default category if no match is found
}
