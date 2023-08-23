<template>
    <div class="section most-profitable-clients">
        <h2>Most Profitable Clients</h2>
        <ul class="client-list">
            <li v-for="client in mostProfitableClients" :key="client.client_id" class="client-item">
                <span class="client-name">{{ client.name }}</span>
                <span class="client-profit">{{ client.total_profit }} EUR</span>
            </li>
        </ul>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';

const mostProfitableClients = ref([]);

onMounted(async () => {
    try {
        const response = await fetch('/api/clients/profitable');
        mostProfitableClients.value = await response.json();
    } catch (error) {
        console.error('Error fetching data:', error);
    }
});
</script>

<style scoped>
/* Styles for the entire section */
.section {
    background-color: #f8f8f8;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    padding: 20px;
    margin: 20px 0;
}

/* Styles for the client list */
.client-list {
    list-style: none;
    padding: 0;
}

/* Styles for individual client items */
.client-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid #e0e0e0;
    padding: 10px 0;
}

.client-name {
    font-weight: bold;
}

.client-profit {
    color: #39b54a; /* Profit text color */
}

/* Media query for responsiveness */
@media (max-width: 768px) {
    .section {
        margin: 10px 0;
    }
}
</style>
