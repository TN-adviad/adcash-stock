<template>
    <div class="section">
        <h2>User Transaction History</h2>
        <table class="transaction-table">
            <thead>
            <tr>
                <th>Quantity</th>
                <th>Stock</th>
                <th>Current Price</th>
                <th>Purchase Price</th>
                <th>Purchase Date</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="transaction in transactions" :key="transaction.id" class="transaction-item">
                <td>{{ transaction.purchase_quantity }}</td>
                <td>{{ transaction.stock_name }}</td>
                <td>{{ transaction.stock_current_price }}</td>
                <td>{{ transaction.purchase_price }}</td>
                <td>{{ transaction.purchase_date }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';

const transactions = ref([]);

onMounted(async () => {
    try {
        const response = await fetch('/api/clients/1/transactions');
        transactions.value = await response.json();
    } catch (error) {
        console.error('Error fetching data:', error);
    }
});
</script>


<style scoped>
/* Styles for the entire section */
.section {
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    padding: 20px;
    margin: 20px 0;
}

/* Styles for the transaction table */
.transaction-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
}

.transaction-table th,
.transaction-table td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #e0e0e0;
}

.transaction-table th {
    font-weight: bold;
}

/* Styles for individual transaction items */
.transaction-item {
    background-color: #f8f8f8;
}

/* Media query for responsiveness */
@media (max-width: 768px) {
    .section {
        margin: 10px 0;
    }
}
</style>
