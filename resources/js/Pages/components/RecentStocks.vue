<template>
    <div class="section recent-stocks">
        <h2>Recent Stocks</h2>
        <ul class="stock-list">
            <li v-for="stock in recentStocks" :key="stock.id" class="stock-item">
                <span class="stock-name">{{ stock.name }}</span>
                <span class="stock-price">{{ stock.current_price }}{{ stock.currency }}</span>
            </li>
        </ul>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';

const recentStocks = ref([]);

onMounted(async () => {
    try {
        const response = await fetch('/api/stocks/recent');
        recentStocks.value = await response.json();
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

/* Styles for the stock list */
.stock-list {
    list-style: none;
    padding: 0;
}

/* Styles for individual stock items */
.stock-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid #e0e0e0;
    padding: 10px 0;
}

.stock-name {
    font-weight: bold;
}

.stock-price {
    color: #007bff; /* Stock price text color */
}

/* Media query for responsiveness */
@media (max-width: 768px) {
    .section {
        margin: 10px 0;
    }
}
</style>
