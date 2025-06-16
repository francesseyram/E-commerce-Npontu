<script setup>
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue';

const searchQuery = ref('');
const cartCount = ref(1); // This should come from your cart store/state
</script>

<template>
    <nav class="bg-[#00850f] text-[#ffffff] sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Logo -->
                <Link href="/" class="flex items-center space-x-2">
                    <span class="text-2xl font-bold tracking-wider">NPONTU</span>
                </Link>

                <!-- Search Bar -->
                <div class="hidden md:flex flex-1 max-w-md mx-6">
                    <div class="relative w-full">
                        <input type="text" 
                            v-model="searchQuery"
                            class="w-full px-4 py-2 rounded-full text-gray-800 focus:outline-none focus:ring-2 focus:ring-[#ffbf00]"
                            placeholder="Search products...">
                        <button class="absolute right-3 top-2.5">
                            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Navigation Links -->
                <div class="flex items-center space-x-6">
                    <Link href="/shop" class="hover:text-[#ffbf00] transition-colors duration-200">Shop</Link>
                    <Link href="/cart" class="relative hover:text-[#ffbf00] transition-colors duration-200">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                        <span class="absolute -top-2 -right-2 bg-[#ffbf00] text-[#000000] rounded-full w-5 h-5 flex items-center justify-center text-xs font-bold">
                            {{ cartCount }}
                        </span>
                    </Link>
                </div>
            </div>
        </div>
    </nav>
</template>
