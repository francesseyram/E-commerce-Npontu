<template>
  <div class="min-h-screen bg-[#00850f] text-white">
    <!-- Header -->
    <header class="flex items-center justify-between px-6 py-4 shadow">
      <img src="/NpontuTechLogo.jpg" alt="Npontu Logo" class="h-10" />
      <nav>
        <ul class="flex space-x-6 font-medium">
          <li><a href="#" class="hover:text-[#ffbf00]">Home</a></li>
          <li><a href="#" class="hover:text-[#ffbf00]">Products</a></li>
          <li><a href="#" class="hover:text-[#ffbf00]">Categories</a></li>
        </ul>
      </nav>
    </header>

    <main class="p-6">
      <h1 class="text-3xl font-bold text-white mb-6">Shop by Category</h1>

      <!-- Category Filters -->
      <div class="flex flex-wrap gap-4 mb-8">
        <button
          v-for="category in categories"
          :key="category"
          @click="filterByCategory(category)"
          class="px-4 py-2 rounded-full border text-sm font-medium transition"
          :class="{
            'bg-[#ffbf00] text-black': selectedCategory === category,
            'bg-white text-[#00850f]': selectedCategory !== category
          }"
        >
          <i :class="getIcon(category)" class="mr-2"></i>{{ category }}
        </button>
      </div>

      <!-- Product Grid -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div
          v-for="product in filteredProducts"
          :key="product.id"
          class="bg-white text-[#000000] rounded-lg p-4 shadow hover:shadow-lg transition"
        >
          <h2 class="text-lg font-semibold mb-1">{{ product.name }}</h2>
          <p class="text-sm text-gray-600">Category: {{ product.category?.name }}</p>
          <p class="text-[#00850f] font-bold mt-2">${{ product.price }}</p>
        </div>
      </div>
    </main>
  </div>
</template>

<script setup>
import { ref, onMounted, computed } from 'vue'
import axios from 'axios'

const products = ref([])
const selectedCategory = ref(null)

onMounted(async () => {
  try {
    const response = await axios.get('/api/products')
    products.value = response.data.data
  } catch (error) {
    console.error('Failed to fetch products:', error)
  }
})

const categories = computed(() => {
  const allCategories = products.value.map(p => p.category?.name)
  return [...new Set(allCategories.filter(Boolean))]
})

const filteredProducts = computed(() => {
  return selectedCategory.value
    ? products.value.filter(p => p.category?.name === selectedCategory.value)
    : products.value
})

const filterByCategory = (category) => {
  selectedCategory.value = category
}

const getIcon = (category) => {
  const icons = {
    'Electronics': 'fas fa-laptop',
    'Audio': 'fas fa-headphones',
    'Accessories': 'fas fa-plug',
    'Fashion': 'fas fa-tshirt',
    'Sports': 'fas fa-football-ball',
    'Home & Living': 'fas fa-couch',
  }
  return icons[category] || 'fas fa-tag'
}
</script>
