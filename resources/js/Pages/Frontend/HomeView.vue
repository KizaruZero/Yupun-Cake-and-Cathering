<!-- HeroSection.vue -->
<template>
    <GuestLayout>
        <section
            class="bg-cover bg-center h-screen relative"
            style="background-image: url('/path/to/hero-image.jpg')"
        >
            <div
                class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center"
            >
                <div class="text-center text-white px-4">
                    <h1 class="text-5xl font-bold mb-4">
                        Selamat Datang di Cake and Catering
                    </h1>
                    <p class="text-lg mb-6">
                        Menyediakan Kue & Catering untuk semua acara spesial
                        Anda
                    </p>
                    <button
                        class="bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-6 rounded-lg shadow-lg"
                    >
                        Lihat Produk Kami
                    </button>
                </div>
            </div>
        </section>
        <ProductSection />
    </GuestLayout>
</template>

<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import ProductSection from "@/frontend-components/ProductSection.vue";
</script>
