<template>
  <div class="min-h-screen bg-gradient-to-br from-[#00850f] via-[#006b0c] to-[#004a08] flex items-center justify-center p-4 relative overflow-hidden">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0 overflow-hidden">
      <!-- Floating Particles -->
      <div 
        v-for="particle in backgroundParticles" 
        :key="particle.id"
        class="absolute rounded-full opacity-10 animate-float"
        :class="particle.color"
        :style="{
          left: particle.x + '%',
          top: particle.y + '%',
          width: particle.size + 'px',
          height: particle.size + 'px',
          animationDelay: particle.delay + 's',
          animationDuration: particle.duration + 's'
        }"
      ></div>
      
      <!-- Animated Shapes -->
      <div class="absolute top-20 left-10 w-32 h-32 bg-[#ffbf00] rounded-full opacity-5 animate-float"></div>
      <div class="absolute bottom-20 right-20 w-24 h-24 bg-[#ec3435] rounded-full opacity-5 animate-float-delayed"></div>
      <div class="absolute top-1/2 left-1/4 w-16 h-16 bg-white rounded-full opacity-10 animate-pulse"></div>
      
      <!-- Grid Pattern -->
      <div class="absolute inset-0 opacity-5">
        <div class="grid grid-cols-12 gap-4 h-full">
          <div v-for="i in 144" :key="i" class="border border-white/20"></div>
        </div>
      </div>
    </div>

    <!-- Main Container -->
    <div class="relative z-10 w-full max-w-md">
      <!-- Logo Section -->
      <div class="text-center mb-8 animate-fade-in-down">
        <div class="inline-block relative">
          <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/image-cXVUuL6rTg4xOhgQrmSbdN6kOahjhK.png" alt="Npontu Technologies" class="h-16 w-auto mx-auto mb-4 hover:scale-110 transition-transform duration-300">
          <div class="absolute inset-0 bg-[#00850f] rounded-full opacity-20 animate-ping"></div>
        </div>
        <h1 class="text-2xl font-bold text-white mb-2">Welcome Back</h1>
        <p class="text-green-100">Sign in to your Npontu account</p>
      </div>

      <!-- Login Form Container -->
      <div class="bg-white/95 backdrop-blur-md rounded-2xl shadow-2xl overflow-hidden p-8 transform transition-all duration-500 hover:scale-105">
        <div class="text-center mb-6">
          <h2 class="text-2xl font-bold text-gray-900 mb-2">Sign In</h2>
          <p class="text-gray-600">Enter your credentials to continue</p>
        </div>

        <form @submit.prevent="handleLogin" class="space-y-6">
          <!-- Email Field -->
          <div class="relative group">
            <label class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
            <div class="relative">
              <input 
                type="email" 
                v-model="loginForm.email"
                required
                class="w-full px-4 py-3 pl-12 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#00850f] focus:border-transparent transition-all duration-300 group-hover:border-[#00850f]"
                placeholder="Enter your email"
              >
              <Mail class="absolute left-4 top-1/2 transform -translate-y-1/2 h-5 w-5 text-gray-400 group-hover:text-[#00850f] transition-colors duration-300" />
            </div>
          </div>

          <!-- Password Field -->
          <div class="relative group">
            <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
            <div class="relative">
              <input 
                :type="showPassword ? 'text' : 'password'"
                v-model="loginForm.password"
                required
                class="w-full px-4 py-3 pl-12 pr-12 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#00850f] focus:border-transparent transition-all duration-300 group-hover:border-[#00850f]"
                placeholder="Enter your password"
              >
              <Lock class="absolute left-4 top-1/2 transform -translate-y-1/2 h-5 w-5 text-gray-400 group-hover:text-[#00850f] transition-colors duration-300" />
              <button 
                type="button"
                @click="showPassword = !showPassword"
                class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-[#00850f] transition-colors duration-300"
              >
                <Eye v-if="!showPassword" class="h-5 w-5" />
                <EyeOff v-else class="h-5 w-5" />
              </button>
            </div>
          </div>

          <!-- Remember Me & Forgot Password -->
          <div class="flex items-center justify-between">
            <label class="flex items-center">
              <input type="checkbox" v-model="loginForm.remember" class="rounded border-gray-300 text-[#00850f] focus:ring-[#00850f]">
              <span class="ml-2 text-sm text-gray-600">Remember me</span>
            </label>
            <a href="#" class="text-sm text-[#00850f] hover:text-[#006b0c] transition-colors duration-300">Forgot password?</a>
          </div>

          <!-- Submit Button -->
          <button 
            type="submit"
            :disabled="loading"
            class="w-full bg-[#00850f] text-white py-3 px-4 rounded-lg font-semibold hover:bg-[#006b0c] focus:ring-4 focus:ring-[#00850f]/20 transition-all duration-300 transform hover:scale-105 disabled:opacity-50 disabled:cursor-not-allowed relative overflow-hidden group"
          >
            <span v-if="!loading" class="relative z-10">Sign In</span>
            <span v-else class="relative z-10 flex items-center justify-center">
              <Loader2 class="animate-spin h-5 w-5 mr-2" />
              Signing In...
            </span>
            <div class="absolute inset-0 bg-[#ffbf00] transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></div>
          </button>
        </form>

        
      </div>
    </div>

    <!-- Success/Error Toast -->
    <div 
      v-if="toast.show"
      class="fixed top-4 right-4 z-50 max-w-sm w-full bg-white rounded-lg shadow-lg border-l-4 p-4 animate-slide-in-right"
      :class="toast.type === 'success' ? 'border-[#00850f]' : 'border-[#ec3435]'"
    >
      <div class="flex items-center">
        <div class="flex-shrink-0">
          <CheckCircle v-if="toast.type === 'success'" class="h-5 w-5 text-[#00850f]" />
          <XCircle v-else class="h-5 w-5 text-[#ec3435]" />
        </div>
        <div class="ml-3">
          <p class="text-sm font-medium text-gray-900">{{ toast.message }}</p>
        </div>
        <button @click="toast.show = false" class="ml-auto text-gray-400 hover:text-gray-600">
          <X class="h-4 w-4" />
        </button>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { 
  Mail, 
  Lock, 
  Eye, 
  EyeOff, 
  Loader2,
  CheckCircle,
  XCircle,
  X
} from 'lucide-vue-next'
import axios from '@/axios'

// Form state
const loginForm = ref({
  email: '',
  password: '',
  remember: false
})

// UI states
const showPassword = ref(false)
const loading = ref(false)
const backgroundParticles = ref([])

// Toast notification
const toast = ref({
  show: false,
  type: 'success',
  message: ''
})

// Initialize background particles
const initBackgroundParticles = () => {
  for (let i = 0; i < 30; i++) {
    backgroundParticles.value.push({
      id: i,
      x: Math.random() * 100,
      y: Math.random() * 100,
      size: Math.random() * 8 + 4,
      color: ['bg-[#ffbf00]', 'bg-white', 'bg-[#ec3435]'][Math.floor(Math.random() * 3)],
      delay: Math.random() * 5,
      duration: Math.random() * 10 + 10
    })
  }
}

// Show toast notification
const showToast = (type, message) => {
  toast.value = { show: true, type, message }
  setTimeout(() => {
    toast.value.show = false
  }, 5000)
}

// Handle login - Frontend only
const handleLogin = async () => {
  try {
    loading.value = true;
    const response = await axios.post('/login', {
      email: loginForm.value.email,
      password: loginForm.value.password,
      remember: loginForm.value.remember
    });

    // Redirect will be handled by Laravel
    toast.value = {
      show: true,
      type: 'success',
      message: 'Login successful!'
    };
  } catch (error) {
    console.error('Login error:', error);
    toast.value = {
      show: true,
      type: 'error',
      message: error.response?.data?.message || 'Login failed. Please try again.'
    };
  } finally {
    loading.value = false;
  }
};

// Handle social login - Frontend only
const handleSocialLogin = (provider) => {
  console.log(`Social login with ${provider}`)
  showToast('success', `${provider} login clicked! Implement your OAuth flow.`)
  
  // You can emit an event or call a parent method here
  // this.$emit('socialLogin', provider)
}

onMounted(() => {
  initBackgroundParticles()
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

@keyframes fade-in-down {
  from { opacity: 0; transform: translateY(-30px); }
  to { opacity: 1; transform: translateY(0); }
}

@keyframes fade-in-up {
  from { opacity: 0; transform: translateY(30px); }
  to { opacity: 1; transform: translateY(0); }
}

@keyframes slide-in-right {
  from { opacity: 0; transform: translateX(50px); }
  to { opacity: 1; transform: translateX(0); }
}

.animate-float { animation: float 6s ease-in-out infinite; }
.animate-float-delayed { animation: float-delayed 8s ease-in-out infinite; }
.animate-fade-in-down { animation: fade-in-down 0.8s ease-out forwards; }
.animate-fade-in-up { animation: fade-in-up 0.8s ease-out forwards; opacity: 0; }
.animate-slide-in-right { animation: slide-in-right 0.5s ease-out forwards; }

/* Custom scrollbar */
::-webkit-scrollbar { width: 6px; }
::-webkit-scrollbar-track { background: #f1f1f1; }
::-webkit-scrollbar-thumb { background: #00850f; border-radius: 3px; }
::-webkit-scrollbar-thumb:hover { background: #006b0c; }
</style>
