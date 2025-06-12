<template>
  <div>
    <div class="filters">
      <input v-model="filters.category" placeholder="Category" />
      <input type="number" v-model="filters.min_price" placeholder="Min Price" />
      <input type="number" v-model="filters.max_price" placeholder="Max Price" />
      <button @click="fetchProducts()">Apply Filters</button>
    </div>

    <div class="product-list">
      <ProductCard v-for="product in products.data" :key="product.id" :product="product" />
    </div>

    <div class="pagination">
      <button @click="changePage(products.prev_page_url)" :disabled="!products.prev_page_url">Previous</button>
      <button @click="changePage(products.next_page_url)" :disabled="!products.next_page_url">Next</button>
    </div>
  </div>
</template>

<script>
import axios from 'axios'
import ProductCard from './ProductCard.vue'

export default {
  components: { ProductCard },
  data() {
    return {
      products: {},
      filters: {
        category: '',
        min_price: '',
        max_price: ''
      },
      apiUrl: '/api/products'
    }
  },
  mounted() {
    this.fetchProducts()
  },
  methods: {
    fetchProducts(url = this.apiUrl) {
      axios.get(url, { params: this.filters })
        .then(response => {
          this.products = response.data
        })
    },
    changePage(url) {
      this.fetchProducts(url)
    }
  }
}
</script>
