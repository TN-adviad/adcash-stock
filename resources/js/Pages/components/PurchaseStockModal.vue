<template>
    <div class="purchase-stock-modal">
        <button @click="openModal">Purchase</button>
        <modal v-if="isModalOpen" @close="closeModal">
            <h2>Purchase Stock</h2>
            <label for="stock">Select Stock:</label>
            <select v-model="selectedStock" id="stock">
                <option v-for="stock in stocks" :key="stock.id" :value="stock.id">{{ stock.name }}</option>
            </select>
            <br>
            <br>
            <label for="quantity">Quantity:</label>
            <input v-model.number="quantity" type="number" id="quantity" />
            <button @click="purchaseStock">Buy</button>
        </modal>
    </div>
</template>

<script>
import { ref } from 'vue';
import Modal from './Modal.vue'; // Assuming you have a Modal component

export default {
    components: {
        Modal
    },
    setup() {
        const isModalOpen = ref(false);
        const stocks = ref([]);
        const selectedStock = ref(null);
        const quantity = ref(1);

        const fetchStocks = async () => {
            try {
                const response = await fetch('/api/stocks');
                stocks.value = await response.json();
            } catch (error) {
                console.error('Error fetching stocks:', error);
            }
        };

        const openModal = () => {
            isModalOpen.value = true;
            fetchStocks();
        };

        const closeModal = () => {
            isModalOpen.value = false;
            selectedStock.value = null;
            quantity.value = 1;
        };

        const purchaseStock = async () => {
            if (!selectedStock.value || quantity.value <= 0) {
                return;
            }

            const data = {
                stock_id: selectedStock.value,
                quantity: quantity.value,
                client_id: 1 //todo fetch user_id dynamicly
            };

            try {
                //todo store data in vuex
                const response = await fetch('/api/clients/purchase', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data)
                });

                const result = await response.json();
                if (result.success) {
                    console.log('Stock purchased successfully');
                    closeModal();
                } else {
                    console.error('Error purchasing stock:', result.message);
                }
            } catch (error) {
                console.error('Error purchasing stock:', error);
            }
        };

        return {
            isModalOpen,
            stocks,
            selectedStock,
            quantity,
            openModal,
            closeModal,
            purchaseStock
        };
    }
};
</script>

<style scoped>
/* Styles for the purchase stock modal */
.purchase-stock-modal {
    text-align: center;
}

/* Styles for the modal */
.modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 9999;
}

.modal-content {
    background-color: #ffffff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    max-width: 400px;
}

/* Media query for responsiveness */
@media (max-width: 768px) {
    .purchase-stock-modal {
        margin-top: 10px;
    }
}
</style>
