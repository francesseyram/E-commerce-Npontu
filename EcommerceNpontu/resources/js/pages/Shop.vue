<template>
  <div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Product Listing Page</h1>

    <div v-if="products.length === 0">
      <p>No products available.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
      <div
        v-for="product in products"
        :key="product.id"
        class="border p-4 rounded shadow"
      >
        <h2 class="font-semibold text-lg">{{ product.name }}</h2>
        <p class="text-sm text-gray-600">Category: {{ product.category }}</p>
        <p class="text-green-600 font-bold">${{ product.price }}</p>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'

const products = ref([])

onMounted(async () => {
  try {
    const response = await axios.get('/api/products')
    products.value = response.data.data
  } catch (error) {
    console.error('Failed to fetch products:', error)
  }
})
</script>
