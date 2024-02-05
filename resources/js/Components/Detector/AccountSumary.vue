<template>
  <div class="container mx-auto mt-8">
    <h1 class="text-3xl font-bold mb-4">Account Summary</h1>

    <ul class="list-disc list-inside">
      <li>Initial Balance: {{ accountSummary.initialBalance }} {{ accountSummary.currency }}</li>
      <li>Total Expenses (Categorized): {{ accountSummary.totalExpensesCategorized }} {{ accountSummary.currency }}</li>
      <li>Total Expenses (Uncategorized): {{ accountSummary.totalExpensesUncategorized }} {{ accountSummary.currency }}</li>
      <li>Total Income: {{ accountSummary.totalIncome }} {{ accountSummary.currency }}</li>
      <li>Total Ending Balance: {{ accountSummary.totalEndingBalance }} {{ accountSummary.currency }}</li>
      <li>Net Income: {{ accountSummary.netIncome }} {{ accountSummary.currency }}</li>
      <li>Tax Rate: {{ accountSummary.taxRate * 100 }}%</li>
      <li>Income Tax: {{ accountSummary.incomeTax }} {{ accountSummary.currency }}</li>
      <li>Net Income After Tax: {{ accountSummary.netIncomeAfterTax }} {{ accountSummary.currency }}</li>
      <li>Fecha Último Estado: {{ accountSummary.fechaUltimoEstado }}</li>
      <li>Fecha Siguiente Estado: {{ accountSummary.fechaSiguienteEstado }}</li>
    </ul>
  </div>
</template>

<script>
export default {
  props: {
    accountSummary: {
      type: Object,
      required: true,
    },
  },
};
</script>

<style scoped>
/* Add any specific styles here */
</style>
