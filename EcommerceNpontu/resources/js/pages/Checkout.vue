<script setup>
import { Head } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue';
import Navbar from '@/components/Navbar.vue';

const shippingDetails = ref({
    firstName: '',
    lastName: '',
    email: '',
    address: '',
    city: '',
    country: '',
    postalCode: ''
});

const cart = ref({
    items: []
});

const steps = [
    { id: 1, name: 'Cart', status: 'complete' },
    { id: 2, name: 'Shipping', status: 'current' },
    { id: 3, name: 'Payment', status: 'upcoming' }
];

onMounted(async () => {
    try {
        const response = await fetch('/current-order');
        if (!response.ok) {
            throw new Error('No order found');
        }
        const data = await response.json();
        if (data && data.items) {
            console.log('Fetched order:', data); // For debugging
            cart.value.items = data.items.map(item => ({
                name: item.product?.name || 'Unknown Product',
                price: parseFloat(item.price),
                quantity: item.quantity
            }));
        }
    } catch (error) {
        console.error('Error fetching order:', error);
    }
});
</script>

<template>
    <Head title="Checkout"/>
    <Navbar />
    
    <!-- Checkout Progress -->
    <div class="bg-[#ffffff] border-b border-[#000000]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="flex justify-center py-4">
                <ol class="flex items-center space-x-4 md:space-x-8">
                    <li v-for="(step, index) in steps" :key="step.id" class="flex items-center">
                        <div :class="[
                            'flex items-center justify-center w-8 h-8 rounded-full',
                            step.status === 'complete' ? 'bg-[#00850f] text-white' :
                            step.status === 'current' ? 'bg-[#ffbf00] text-black' :
                            'bg-gray-200 text-gray-500'
                        ]">
                            {{ step.id }}
                        </div>
                        <span class="ml-2 text-sm font-medium" :class="{
                            'text-[#00850f]': step.status === 'complete',
                            'text-[#000000]': step.status === 'current',
                            'text-gray-500': step.status === 'upcoming'
                        }">{{ step.name }}</span>
                        <svg v-if="index < steps.length - 1" class="ml-4 w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="min-h-screen bg-gray-50 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Shipping Information -->
                <div class="bg-[#ffffff] p-8 rounded-lg shadow-lg border border-[#000000]">
                    <h2 class="text-2xl font-bold mb-8 text-[#00850f] border-b pb-4">Shipping Details</h2>
                    <form class="space-y-4">
                        <div class="grid grid-cols-2 gap-4">
                            <input v-model="shippingDetails.firstName" type="text" 
                                placeholder="First Name" 
                                class="border border-[#000000] p-2 rounded focus:outline-none focus:border-[#00850f]">
                            <input v-model="shippingDetails.lastName" type="text" 
                                placeholder="Last Name" 
                                class="border border-[#000000] p-2 rounded focus:outline-none focus:border-[#00850f]">
                        </div>
                        <input v-model="shippingDetails.email" type="email" 
                            placeholder="Email" 
                            class="w-full border border-[#000000] p-2 rounded focus:outline-none focus:border-[#00850f]">
                        <input v-model="shippingDetails.address" type="text" 
                            placeholder="Address" 
                            class="w-full border border-[#000000] p-2 rounded focus:outline-none focus:border-[#00850f]">
                        <div class="grid grid-cols-2 gap-4">
                            <input v-model="shippingDetails.city" type="text" 
                                placeholder="City" 
                                class="border border-[#000000] p-2 rounded focus:outline-none focus:border-[#00850f]">
                            <input v-model="shippingDetails.postalCode" type="text" 
                                placeholder="Postal Code" 
                                class="border border-[#000000] p-2 rounded focus:outline-none focus:border-[#00850f]">
                        </div>
                    </form>
                </div>

                <!-- Order Summary -->
                <div class="bg-[#ffffff] p-8 rounded-lg shadow-lg border border-[#000000]">
                    <h2 class="text-2xl font-bold mb-8 text-[#00850f] border-b pb-4">Order Summary</h2>
                    <div class="space-y-4">
                        <div v-for="item in cart.items" :key="item.name" class="flex justify-between text-[#000000]">
                            <span>{{ item.name }} ({{ item.quantity }})</span>
                            <span>${{ item.price.toFixed(2) }}</span>
                        </div>
                        <div class="border-t border-[#000000] pt-4">
                            <div class="flex justify-between font-semibold text-[#000000]">
                                <span>Total</span>
                                <span>${{ (cart.items.reduce((acc, item) => acc + item.price * item.quantity, 0)).toFixed(2) }}</span>
                            </div>
                        </div>
                        <button class="mt-8 w-full bg-[#00850f] text-[#ffffff] py-4 rounded-lg font-semibold text-lg hover:bg-[#ffbf00] hover:text-[#000000] transition-colors duration-300 flex items-center justify-center space-x-2">
                            <span>Proceed to Payment</span>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
