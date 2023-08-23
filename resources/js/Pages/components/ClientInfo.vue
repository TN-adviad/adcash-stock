<template>
    <div class="section financial-info">
        <h2>Client Financial Information</h2>
        <h3>{{financialInfo.clientName}}</h3>
        <div class="financial-details">
            <p>Current Balance: {{ financialInfo.balance }} EUR</p>
            <p>Total Profit/Loss: {{ financialInfo.totalProfitLoss }} EUR</p>
            <p>Current Portfolio Value: {{ financialInfo.currentPortfolioValue }} EUR</p>
        </div>
    </div>
</template>

<script>
import {onMounted, ref} from 'vue';

export default {
    setup() {
        const financialInfo = ref({});
        onMounted(async () => {
            try {
                const response = await fetch('/api/clients/1/financial-info');
                financialInfo.value = await response.json();
            } catch (error) {
                console.error('Error fetching data:', error);
            }
        });

        return {
            financialInfo
        };
    }
};
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

/* Styles for the financial details */
.financial-details {
    text-align: center;
}

.financial-details p {
    margin: 8px 0;
    font-size: 16px;
}

/* Media query for responsiveness */
@media (max-width: 768px) {
    .section {
        margin: 10px 0;
    }
}
</style>
