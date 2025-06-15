<template>
  <div class="min-h-screen bg-white overflow-x-hidden">
    <!-- Floating Particles Background -->
    <div class="fixed inset-0 pointer-events-none z-0">
      <div 
        v-for="particle in particles" 
        :key="particle.id"
        class="absolute w-2 h-2 rounded-full opacity-20"
        :class="particle.color"
        :style="{
          left: particle.x + 'px',
          top: particle.y + 'px',
          transform: `translate(${particle.offsetX}px, ${particle.offsetY}px)`,
          transition: 'transform 20s linear infinite'
        }"
      ></div>
    </div>

    <!-- Header -->
    <header class="bg-white/95 backdrop-blur-md shadow-sm border-b border-gray-100 sticky top-0 z-50 transition-all duration-300" :class="{ 'bg-white/90': scrolled }">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
          <!-- Logo with pulse animation -->
          <div class="flex items-center">
            <div class="relative">
              <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/image-79kNLuLbeNEYULJxT8oT7IBUYLzULz.png" alt="Npontu Technologies" class="h-16 w-auto transition-transform duration-300 hover:scale-110">
            </div>
          </div>
          
          <!-- Navigation with hover effects -->
          <nav class="hidden md:flex space-x-8">
            <a href="#" class="relative text-gray-900 hover:text-[#00850f] transition-all duration-300 font-medium group">
              Home
              <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-[#00850f] transition-all duration-300 group-hover:w-full"></span>
            </a>
            <a href="#" class="relative text-gray-900 hover:text-[#00850f] transition-all duration-300 font-medium group">
              Products
              <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-[#00850f] transition-all duration-300 group-hover:w-full"></span>
            </a>
            <a href="#" class="relative text-gray-900 hover:text-[#00850f] transition-all duration-300 font-medium group">
              Categories
              <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-[#00850f] transition-all duration-300 group-hover:w-full"></span>
            </a>
            <a href="#" class="relative text-gray-900 hover:text-[#00850f] transition-all duration-300 font-medium group">
              About
              <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-[#00850f] transition-all duration-300 group-hover:w-full"></span>
            </a>
            <a href="#" class="relative text-gray-900 hover:text-[#00850f] transition-all duration-300 font-medium group">
              Contact
              <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-[#00850f] transition-all duration-300 group-hover:w-full"></span>
            </a>
          </nav>
          
          <!-- Actions with animations -->
          <div class="flex items-center space-x-4">
            <button class="text-gray-900 hover:text-[#00850f] transition-all duration-300 hover:scale-110 hover:rotate-12">
              <Search class="h-5 w-5" />
            </button>
            <button class="text-gray-900 hover:text-[#00850f] transition-all duration-300 relative hover:scale-110" @click="cartBounce = true" @animationend="cartBounce = false">
              <ShoppingCart class="h-5 w-5" :class="{ 'animate-bounce': cartBounce }" />
              <span class="absolute -top-2 -right-2 bg-[#ec3435] text-white text-xs rounded-full h-4 w-4 flex items-center justify-center animate-pulse">{{ cartCount }}</span>
            </button>
            <button class="bg-[#00850f] text-white px-4 py-2 rounded-lg hover:bg-[#006b0c] transition-all duration-300 font-medium hover:scale-105 hover:shadow-lg transform">
              Sign Up
            </button>
            <button class="bg-[#00850f] text-white px-4 py-2 rounded-lg hover:bg-[#006b0c] transition-all duration-300 font-medium hover:scale-105 hover:shadow-lg transform">
              Sign In
            </button>
          </div>
          
          <!-- Mobile menu button -->
          <button class="md:hidden text-gray-900 hover:scale-110 transition-transform duration-300">
            <Menu class="h-6 w-6" />
          </button>
        </div>
      </div>
    </header>

    <!-- Hero Section with Animated Elements -->
    <section class="relative bg-gradient-to-br from-[#00850f] via-[#006b0c] to-[#004a08] text-white overflow-hidden">
      <!-- Animated Background Shapes -->
      <div class="absolute inset-0">
        <div class="absolute top-20 left-10 w-32 h-32 bg-[#ffbf00] rounded-full opacity-10 animate-float"></div>
        <div class="absolute top-40 right-20 w-24 h-24 bg-[#ec3435] rounded-full opacity-10 animate-float-delayed"></div>
        <div class="absolute bottom-20 left-1/4 w-40 h-40 bg-white rounded-full opacity-5 animate-pulse"></div>
        <div class="absolute top-1/2 right-10 w-16 h-16 bg-[#ffbf00] rounded-full opacity-20 animate-bounce"></div>
      </div>
      
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
          <div class="animate-slide-in-left">
            <h1 class="text-4xl md:text-6xl font-bold mb-6 leading-tight">
                <span class="inline-block animate-fade-in-up" style="animation-delay: 0.2s">Making</span>
                <span class="inline-block animate-fade-in-up" style="animation-delay: 0.4s"> You</span>
                <span class="inline-block animate-fade-in-up" style="animation-delay: 0.6s"> Free</span>
                <span class="inline-block animate-fade-in-up" style="animation-delay: 0.8s"> To</span>
                <span class="text-[#ffbf00] inline-block animate-fade-in-up " style="animation-delay: 1.0s">Achieve</span>
            </h1>
            <p class="text-xl mb-8 text-green-100 animate-fade-in-up" style="animation-delay: 1.2s">
              Discover premium products and innovative solutions that empower your success. Shop with confidence at Npontu.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 animate-fade-in-up" style="animation-delay: 1.4s">
              <button class="bg-[#ffbf00] text-black px-8 py-4 rounded-lg font-semibold hover:bg-[#e6ac00] transition-all duration-300 flex items-center justify-center hover:scale-105 hover:shadow-2xl transform group">
                Shop Now
                <ArrowRight class="ml-2 h-5 w-5 group-hover:translate-x-2 transition-transform duration-300" />
              </button>
              <button class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-[#00850f] transition-all duration-300 hover:scale-105 transform">
                Learn More
              </button>
            </div>
          </div>
          <div class="relative animate-slide-in-right">
            <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-8 hover:bg-white/20 transition-all duration-500 transform hover:scale-105">
              <div class="grid grid-cols-2 gap-4">
                <div class="bg-white/20 rounded-lg p-4 text-center hover:bg-white/30 transition-all duration-300 transform hover:scale-110 hover:rotate-2 group">
                  <Package class="h-8 w-8 mx-auto mb-2 group-hover:animate-bounce" />
                  <p class="font-semibold">{{ animatedStats.products }}+ Products</p>
                </div>
                <div class="bg-white/20 rounded-lg p-4 text-center hover:bg-white/30 transition-all duration-300 transform hover:scale-110 hover:-rotate-2 group">
                  <Truck class="h-8 w-8 mx-auto mb-2 group-hover:animate-bounce" />
                  <p class="font-semibold">Fast Delivery</p>
                </div>
                <div class="bg-white/20 rounded-lg p-4 text-center hover:bg-white/30 transition-all duration-300 transform hover:scale-110 hover:rotate-2 group">
                  <Shield class="h-8 w-8 mx-auto mb-2 group-hover:animate-bounce" />
                  <p class="font-semibold">Secure Payment</p>
                </div>
                <div class="bg-white/20 rounded-lg p-4 text-center hover:bg-white/30 transition-all duration-300 transform hover:scale-110 hover:-rotate-2 group">
                  <Star class="h-8 w-8 mx-auto mb-2 group-hover:animate-bounce" />
                  <p class="font-semibold">{{ animatedStats.rating }} Star Rated</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Featured Categories with Enhanced Animations -->
    <section class="py-16 bg-gray-50 relative">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12" ref="categoriesSection">
          <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4 animate-fade-in-up">Shop by Category</h2>
          <p class="text-xl text-gray-600 animate-fade-in-up" style="animation-delay: 0.2s">Explore our diverse range of products</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
          <div 
            v-for="(category, index) in categories" 
            :key="category.id"
            class="group cursor-pointer animate-fade-in-up"
            :style="{ animationDelay: (index * 0.1) + 's' }"
            @mouseenter="playHoverSound"
          >
            <div class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-2xl transition-all duration-500 group-hover:-translate-y-4 group-hover:rotate-1 transform relative overflow-hidden">
              <!-- Animated background on hover -->
              <div class="absolute inset-0 bg-gradient-to-br from-[#00850f]/5 to-[#ffbf00]/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
              
              <div class="relative z-10">
                <div class="w-16 h-16 bg-[#00850f] rounded-full flex items-center justify-center mb-4 group-hover:bg-[#ffbf00] transition-all duration-500 group-hover:scale-110 group-hover:rotate-12 transform">
                  <component :is="category.icon" class="h-8 w-8 text-white group-hover:text-black transition-colors duration-300" />
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2 group-hover:text-[#00850f] transition-colors duration-300">{{ category.name }}</h3>
                <p class="text-gray-600 mb-4">{{ category.description }}</p>
                <span class="text-[#00850f] font-medium group-hover:text-[#ffbf00] transition-colors duration-300 inline-flex items-center">
                  Shop Now 
                  <ArrowRight class="ml-1 h-4 w-4 group-hover:translate-x-2 transition-transform duration-300" />
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Featured Products with Magnetic Effect -->
    <section class="py-16 relative">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
          <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4 animate-fade-in-up">Featured Products</h2>
          <p class="text-xl text-gray-600 animate-fade-in-up" style="animation-delay: 0.2s">Handpicked items just for you</p>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
          <div 
            v-for="(product, index) in featuredProducts" 
            :key="product.id" 
            class="group cursor-pointer animate-fade-in-up"
            :style="{ animationDelay: (index * 0.1) + 's' }"
            @mousemove="handleMouseMove"
            @mouseleave="handleMouseLeave"
          >
            <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-500 group-hover:-translate-y-6 transform relative">
              <div class="aspect-square bg-gray-100 relative overflow-hidden">
                <img :src="product.image" :alt="product.name" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                
                <!-- Floating action buttons -->
                <div class="absolute top-4 right-4 space-y-2 opacity-0 group-hover:opacity-100 transition-all duration-300 transform translate-x-4 group-hover:translate-x-0">
                  <button class="w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-md hover:bg-[#ec3435] hover:text-white transition-all duration-300 hover:scale-110 transform" @click="toggleWishlist(product.id)">
                    <Heart class="h-5 w-5" :class="{ 'fill-current text-[#ec3435]': product.wishlisted }" />
                  </button>
                  <button class="w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-md hover:bg-[#00850f] hover:text-white transition-all duration-300 hover:scale-110 transform">
                    <Eye class="h-5 w-5" />
                  </button>
                </div>
                
                <div v-if="product.discount" class="absolute top-4 left-4 bg-[#ec3435] text-white px-2 py-1 rounded-lg text-sm font-semibold animate-pulse">
                  -{{ product.discount }}%
                </div>
              </div>
              <div class="p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-2 group-hover:text-[#00850f] transition-colors duration-300">{{ product.name }}</h3>
                <div class="flex items-center mb-3">
                  <div class="flex text-[#ffbf00]">
                    <Star v-for="i in 5" :key="i" class="h-4 w-4 fill-current hover:scale-125 transition-transform duration-200" />
                  </div>
                  <span class="text-sm text-gray-500 ml-2">({{ product.reviews }})</span>
                </div>
                <div class="flex items-center justify-between">
                  <div class="flex items-center space-x-2">
                    <span class="text-xl font-bold text-gray-900">${{ product.price }}</span>
                    <span v-if="product.originalPrice" class="text-sm text-gray-500 line-through">${{ product.originalPrice }}</span>
                  </div>
                  <button 
                    class="bg-[#00850f] text-white px-4 py-2 rounded-lg hover:bg-[#006b0c] transition-all duration-300 hover:scale-105 transform hover:shadow-lg"
                    @click="addToCart(product)"
                  >
                    Add to Cart
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Newsletter with Animated Background -->
    <section class="py-16 bg-[#00850f] relative overflow-hidden">
      
      
      <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-4 animate-fade-in-up">Stay Updated</h2>
        <p class="text-xl text-green-100 mb-8 animate-fade-in-up" style="animation-delay: 0.2s">Get the latest deals and product updates delivered to your inbox</p>
        
        <div class="flex flex-col sm:flex-row gap-4 max-w-md mx-auto animate-fade-in-up" style="animation-delay: 0.4s">
          <input 
            type="email" 
            placeholder="Enter your email" 
            class="flex-1 px-4 py-3 rounded-lg border-0 focus:ring-2 focus:ring-[#ffbf00] focus:outline-none transition-all duration-300 focus:scale-105 transform"
            v-model="email"
          >
          <button 
            class="bg-[#ffbf00] text-black px-6 py-3 rounded-lg font-semibold hover:bg-[#e6ac00] transition-all duration-300 hover:scale-105 transform hover:shadow-lg"
            @click="subscribeNewsletter"
          >
            Subscribe
          </button>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12 relative">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
          <div class="animate-fade-in-up">
            <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/image-79kNLuLbeNEYULJxT8oT7IBUYLzULz.png" alt="Npontu Technologies" class="h-10 w-auto mb-4 brightness-0 invert hover:scale-110 transition-transform duration-300">
            <p class="text-gray-400 mb-4">Making You Free To Achieve your dreams with quality products and exceptional service.</p>
            <div class="flex space-x-4">
              <a href="#" class="text-gray-400 hover:text-[#00850f] transition-all duration-300 hover:scale-125 transform">
                <Facebook class="h-5 w-5" />
              </a>
              <a href="#" class="text-gray-400 hover:text-[#00850f] transition-all duration-300 hover:scale-125 transform">
                <Twitter class="h-5 w-5" />
              </a>
              <a href="#" class="text-gray-400 hover:text-[#00850f] transition-all duration-300 hover:scale-125 transform">
                <Instagram class="h-5 w-5" />
              </a>
            </div>
          </div>
          
          <div class="animate-fade-in-up" style="animation-delay: 0.1s">
            <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
            <ul class="space-y-2">
              <li><a href="#" class="text-gray-400 hover:text-white transition-all duration-300 hover:translate-x-2 transform inline-block">About Us</a></li>
              <li><a href="#" class="text-gray-400 hover:text-white transition-all duration-300 hover:translate-x-2 transform inline-block">Contact</a></li>
              <li><a href="#" class="text-gray-400 hover:text-white transition-all duration-300 hover:translate-x-2 transform inline-block">FAQ</a></li>
              <li><a href="#" class="text-gray-400 hover:text-white transition-all duration-300 hover:translate-x-2 transform inline-block">Shipping Info</a></li>
            </ul>
          </div>
          
          <div class="animate-fade-in-up" style="animation-delay: 0.2s">
            <h3 class="text-lg font-semibold mb-4">Categories</h3>
            <ul class="space-y-2">
              <li><a href="#" class="text-gray-400 hover:text-white transition-all duration-300 hover:translate-x-2 transform inline-block">Electronics</a></li>
              <li><a href="#" class="text-gray-400 hover:text-white transition-all duration-300 hover:translate-x-2 transform inline-block">Fashion</a></li>
              <li><a href="#" class="text-gray-400 hover:text-white transition-all duration-300 hover:translate-x-2 transform inline-block">Home & Living</a></li>
              <li><a href="#" class="text-gray-400 hover:text-white transition-all duration-300 hover:translate-x-2 transform inline-block">Sports</a></li>
            </ul>
          </div>
          
          <div class="animate-fade-in-up" style="animation-delay: 0.3s">
            <h3 class="text-lg font-semibold mb-4">Customer Service</h3>
            <ul class="space-y-2">
              <li><a href="#" class="text-gray-400 hover:text-white transition-all duration-300 hover:translate-x-2 transform inline-block">Returns</a></li>
              <li><a href="#" class="text-gray-400 hover:text-white transition-all duration-300 hover:translate-x-2 transform inline-block">Track Order</a></li>
              <li><a href="#" class="text-gray-400 hover:text-white transition-all duration-300 hover:translate-x-2 transform inline-block">Size Guide</a></li>
              <li><a href="#" class="text-gray-400 hover:text-white transition-all duration-300 hover:translate-x-2 transform inline-block">Support</a></li>
            </ul>
          </div>
        </div>
        
        <div class="border-t border-gray-800 mt-8 pt-8 text-center animate-fade-in-up" style="animation-delay: 0.4s">
          <p class="text-gray-400">&copy; 2024 Npontu Technologies. All rights reserved.</p>
        </div>
      </div>
    </footer>
  </div>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue'
import { 
  Search, 
  ShoppingCart, 
  Menu, 
  ArrowRight, 
  Package, 
  Truck, 
  Shield, 
  Star, 
  Laptop, 
  Shirt, 
  Home, 
  Dumbbell, 
  Heart,
  Eye,
  Facebook,
  Twitter,
  Instagram
} from 'lucide-vue-next'

const email = ref('')
const scrolled = ref(false)
const cartBounce = ref(false)
const cartCount = ref(3)

// Animated statistics
const animatedStats = ref({
  products: 0,
  rating: 0
})

// Floating particles
const particles = ref([])

// Categories data
const categories = ref([
  {
    id: 1,
    name: 'Electronics',
    description: 'Latest gadgets and tech',
    icon: Laptop
  },
  {
    id: 2,
    name: 'Fashion',
    description: 'Trendy clothing & accessories',
    icon: Shirt
  },
  {
    id: 3,
    name: 'Home & Living',
    description: 'Furniture & decor',
    icon: Home
  },
  {
    id: 4,
    name: 'Sports',
    description: 'Fitness & outdoor gear',
    icon: Dumbbell
  }
])

const featuredProducts = ref([
  {
    id: 1,
    name: 'Premium Wireless Headphones',
    price: 199,
    originalPrice: 249,
    discount: 20,
    reviews: 128,
    image: '/placeholder.svg?height=300&width=300',
    wishlisted: false
  },
  {
    id: 2,
    name: 'Smart Fitness Watch',
    price: 299,
    reviews: 89,
    image: '/placeholder.svg?height=300&width=300',
    wishlisted: false
  },
  {
    id: 3,
    name: 'Organic Cotton T-Shirt',
    price: 49,
    originalPrice: 69,
    discount: 30,
    reviews: 156,
    image: '/placeholder.svg?height=300&width=300',
    wishlisted: true
  },
  {
    id: 4,
    name: 'Modern Table Lamp',
    price: 89,
    reviews: 67,
    image: '/placeholder.svg?height=300&width=300',
    wishlisted: false
  }
])

// Initialize floating particles
const initParticles = () => {
  for (let i = 0; i < 50; i++) {
    particles.value.push({
      id: i,
      x: Math.random() * window.innerWidth,
      y: Math.random() * window.innerHeight,
      offsetX: 0,
      offsetY: 0,
      color: ['bg-[#00850f]', 'bg-[#ffbf00]', 'bg-[#ec3435]'][Math.floor(Math.random() * 3)]
    })
  }
}

// Animate particles
const animateParticles = () => {
  particles.value.forEach(particle => {
    particle.offsetX = Math.sin(Date.now() * 0.001 + particle.id) * 50
    particle.offsetY = Math.cos(Date.now() * 0.001 + particle.id) * 30
  })
  requestAnimationFrame(animateParticles)
}

// Animate statistics counter
const animateStats = () => {
  let productsTarget = 1000
  let ratingTarget = 4.9
  
  const duration = 2000
  const startTime = Date.now()
  
  const animate = () => {
    const elapsed = Date.now() - startTime
    const progress = Math.min(elapsed / duration, 1)
    
    animatedStats.value.products = Math.floor(productsTarget * progress)
    animatedStats.value.rating = (ratingTarget * progress).toFixed(1)
    
    if (progress < 1) {
      requestAnimationFrame(animate)
    }
  }
  
  animate()
}

// Handle scroll effects
const handleScroll = () => {
  scrolled.value = window.scrollY > 50
}

// Mouse move effect for products
const handleMouseMove = (event) => {
  const card = event.currentTarget
  const rect = card.getBoundingClientRect()
  const x = event.clientX - rect.left
  const y = event.clientY - rect.top
  
  const centerX = rect.width / 2
  const centerY = rect.height / 2
  
  const rotateX = (y - centerY) / 10
  const rotateY = (centerX - x) / 10
  
  card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateY(-24px)`
}

const handleMouseLeave = (event) => {
  event.currentTarget.style.transform = 'perspective(1000px) rotateX(0deg) rotateY(0deg) translateY(0px)'
}

// Wishlist toggle
const toggleWishlist = (productId) => {
  const product = featuredProducts.value.find(p => p.id === productId)
  if (product) {
    product.wishlisted = !product.wishlisted
  }
}

// Add to cart with animation
const addToCart = (product) => {
  cartCount.value++
  cartBounce.value = true
  
  // Show success message (you can implement a toast notification here)
  console.log(`Added ${product.name} to cart!`)
}

// Newsletter subscription
const subscribeNewsletter = () => {
  if (email.value) {
    console.log(`Subscribed: ${email.value}`)
    email.value = ''
    // Add success animation or notification
  }
}

// Hover sound effect (optional)
const playHoverSound = () => {
  // You can add a subtle sound effect here
  // const audio = new Audio('/hover-sound.mp3')
  // audio.volume = 0.1
  // audio.play()
}

onMounted(() => {
  initParticles()
  animateParticles()
  animateStats()
  window.addEventListener('scroll', handleScroll)
})

onUnmounted(() => {
  window.removeEventListener('scroll', handleScroll)
})
</script>

<style scoped>
/* Custom animations */
@keyframes float {
  0%, 100% { transform: translateY(0px) rotate(0deg); }
  50% { transform: translateY(-20px) rotate(180deg); }
}

@keyframes float-delayed {
  0%, 100% { transform: translateY(0px) rotate(0deg); }
  50% { transform: translateY(-30px) rotate(-180deg); }
}

@keyframes fade-in-up {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes slide-in-left {
  from {
    opacity: 0;
    transform: translateX(-50px);
  }
  to {
    opacity: 1;
    transform: translateX(0);
  }
}

@keyframes slide-in-right {
  from {
    opacity: 0;
    transform: translateX(50px);
  }
  to {
    opacity: 1;
    transform: translateX(0);
  }
}

@keyframes glow {
  0%, 100% { text-shadow: 0 0 5px #ffbf00, 0 0 10px #ffbf00, 0 0 15px #ffbf00; }
  50% { text-shadow: 0 0 10px #ffbf00, 0 0 20px #ffbf00, 0 0 30px #ffbf00; }
}

@keyframes wave {
  0% { transform: translateX(0); }
  100% { transform: translateX(-100px); }
}

@keyframes wave-delayed {
  0% { transform: translateX(0); }
  100% { transform: translateX(-150px); }
}

@keyframes wave-slow {
  0% { transform: translateX(0); }
  100% { transform: translateX(-200px); }
}

.animate-float {
  animation: float 6s ease-in-out infinite;
}

.animate-float-delayed {
  animation: float-delayed 8s ease-in-out infinite;
}

.animate-fade-in-up {
  animation: fade-in-up 0.8s ease-out forwards;
  opacity: 0;
}

.animate-slide-in-left {
  animation: slide-in-left 1s ease-out forwards;
  opacity: 0;
}

.animate-slide-in-right {
  animation: slide-in-right 1s ease-out forwards;
  opacity: 0;
}

.animate-glow {
  animation: glow 2s ease-in-out infinite;
}

.animate-wave {
  animation: wave 10s linear infinite;
}

.animate-wave-delayed {
  animation: wave-delayed 15s linear infinite;
}

.animate-wave-slow {
  animation: wave-slow 20s linear infinite;
}

/* Smooth scrolling */
html {
  scroll-behavior: smooth;
}

/* Custom scrollbar */
::-webkit-scrollbar {
  width: 8px;
}

::-webkit-scrollbar-track {
  background: #f1f1f1;
}

::-webkit-scrollbar-thumb {
  background: #00850f;
  border-radius: 4px;
}

::-webkit-scrollbar-thumb:hover {
  background: #006b0c;
}
</style>