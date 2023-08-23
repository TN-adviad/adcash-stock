<script setup>
import ClientInfo from "./components/ClientInfo.vue";
import Transactions from "./components/Transactions.vue";
import RecentStocks from "./components/RecentStocks.vue";
import MostProfitableClients from "./components/MostProfitableClients.vue";
import PurchaseStockModal from "./components/PurchaseStockModal.vue";

</script>

<template>
    <client-info></client-info>
    <PurchaseStockModal></PurchaseStockModal>
    <div style="float: left; width:80%">
        <transactions></transactions>
    </div>
    <div style="float:left;">
        <recent-stocks></recent-stocks>
        <most-profitable-clients></most-profitable-clients>
    </div>

</template>
