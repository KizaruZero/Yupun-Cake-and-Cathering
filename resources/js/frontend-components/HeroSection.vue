<template>
    <div class="min-h-screen bg-gradient-to-b from-orange-50 to-white mt-16">
        <!-- Decorative Elements -->
        <div class="absolute inset-10 overflow-hidden">
            <div
                class="absolute top-20 left-10 w-72 h-72 bg-orange-200 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob"
            ></div>
            <div
                class="absolute top-40 right-10 w-72 h-72 bg-yellow-200 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob animation-delay-2000"
            ></div>
            <div
                class="absolute bottom-10 left-1/2 w-72 h-72 bg-pink-200 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob animation-delay-4000"
            ></div>
        </div>

        <!-- Main Content -->
        <div class="relative container pb-16 px-52">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <!-- Left Column - Text Content -->
                <div class="text-center lg:text-left space-y-8">
                    <div class="space-y-4">
                        <h2
                            class="text-orange-500 font-medium tracking-wide uppercase text-sm"
                        >
                            Welcome to Yupun Cake & Catering
                        </h2>
                        <h1
                            class="text-4xl md:text-5xl lg:text-6xl font-playfair font-bold text-gray-900 leading-tight"
                        >
                            <span class="block text-orange-500"> Lezatnya</span>
                            Tak Terlupakan, Untuk Setiap Acara
                            <span class="block text-orange-500"> Istimewa</span>
                            Anda
                        </h1>
                        <p
                            class="text-lg text-gray-600 max-w-2xl mx-auto lg:mx-0"
                        >
                            Creating unforgettable culinary experiences for your
                            special moments. From elegant catering to
                            custom-crafted cakes, we bring your celebrations to
                            life.
                        </p>
                    </div>

                    <!-- CTA Buttons -->
                    <div
                        class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start"
                    >
                        <button
                            class="px-8 py-4 bg-gradient-to-r from-orange-500 to-yellow-500 text-white rounded-full font-medium transform transition-all duration-300 hover:scale-105 hover:shadow-lg flex items-center justify-center space-x-2 group"
                            @mouseenter="isHovered = true"
                            @mouseleave="isHovered = false"
                        >
                            <span>Order Now</span>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 transform transition-transform duration-300 group-hover:translate-x-1"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M13 7l5 5m0 0l-5 5m5-5H6"
                                />
                            </svg>
                        </button>
                        <Link
                            href="/experiment"
                            class="px-8 py-4 border-2 border-orange-500 text-orange-500 rounded-full font-medium transform transition-all duration-300 hover:scale-105 hover:shadow-lg hover:bg-orange-50"
                        >
                            View Menu
                        </Link>
                    </div>

                    <!-- Features -->
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-6 pt-8">
                        <div class="flex items-center space-x-2">
                            <div
                                class="w-12 h-12 rounded-full bg-orange-100 flex items-center justify-center"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-6 w-6 text-orange-500"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                                    />
                                </svg>
                            </div>
                            <div class="text-left">
                                <p class="font-medium text-gray-900">24/7</p>
                                <p class="text-sm text-gray-500">Service</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div
                                class="w-12 h-12 rounded-full bg-orange-100 flex items-center justify-center"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-6 w-6 text-orange-500"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                                    />
                                </svg>
                            </div>
                            <div class="text-left">
                                <p class="font-medium text-gray-900">Quality</p>
                                <p class="text-sm text-gray-500">Assured</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div
                                class="w-12 h-12 rounded-full bg-orange-100 flex items-center justify-center"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-6 w-6 text-orange-500"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"
                                    />
                                </svg>
                            </div>
                            <div class="text-left">
                                <p class="font-medium text-gray-900">
                                    Best Price
                                </p>
                                <p class="text-sm text-gray-500">Guaranteed</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Right Column - Image Section -->
                <div class="relative">
                    <div class="relative rounded-2xl overflow-hidden group">
                        <img
                            src="@/assets/hero.png"
                            alt="Delicious catering spread"
                            class="w-full h-full object-cover rounded-2xl transform transition-transform duration-700 group-hover:scale-105"
                        />
                        <!-- Floating Elements -->
                        <div
                            class="absolute -top-6 -right-4 bg-white/20 p-4 rounded-xl shadow-xl transform rotate-12 animate-float"
                        >
                            <img
                                src="@/assets/nasi-goreng.png"
                                alt="Cake"
                                class="w-20 h-20 object-cover rounded-lg"
                            />
                            <p
                                class="mt-2 text-center font-medium text-gray-900"
                            >
                                Custom Food
                            </p>
                        </div>
                        <div
                            class="absolute -bottom-4 -left-0 bg-white/20 p-4 rounded-xl shadow-xl transform -rotate-6 animate-float animation-delay-1000"
                        >
                            <img
                                src="@/assets/cake.png"
                                alt="Catering"
                                class="w-20 h-20 object-cover rounded-lg"
                            />
                            <p
                                class="mt-2 text-center font-medium text-gray-900"
                            >
                                Custom Cake
                            </p>
                        </div>
                    </div>

                    <!-- Stats -->
                    <div
                        class="absolute bottom-4 left-1/2 transform -translate-x-1/2 bg-white/80 backdrop-blur-md rounded-2xl p-6 shadow-lg"
                    >
                        <div class="flex space-x-8">
                            <div class="text-center">
                                <p class="text-3xl font-bold text-orange-500">
                                    500+
                                </p>
                                <p class="text-sm text-gray-600">
                                    Happy Clients
                                </p>
                            </div>
                            <div class="text-center">
                                <p class="text-3xl font-bold text-orange-500">
                                    50+
                                </p>
                                <p class="text-sm text-gray-600">
                                    Cake Designs
                                </p>
                            </div>
                            <div class="text-center">
                                <p class="text-3xl font-bold text-orange-500">
                                    12+
                                </p>
                                <p class="text-sm text-gray-600">
                                    Years Experience
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from "vue";
import { Link } from "@inertiajs/vue3";

const isHovered = ref(false);
</script>

<style>
@keyframes blob {
    0% {
        transform: translate(0px, 0px) scale(1);
    }
    33% {
        transform: translate(30px, -50px) scale(1.1);
    }
    66% {
        transform: translate(-20px, 20px) scale(0.9);
    }
    100% {
        transform: translate(0px, 0px) scale(1);
    }
}

.animate-blob {
    animation: blob 7s infinite;
}

.animation-delay-2000 {
    animation-delay: 2s;
}

.animation-delay-4000 {
    animation-delay: 4s;
}

@keyframes float {
    0% {
        transform: translateY(0px) rotate(12deg);
    }
    50% {
        transform: translateY(-10px) rotate(12deg);
    }
    100% {
        transform: translateY(0px) rotate(12deg);
    }
}

.animate-float {
    animation: float 6s ease-in-out infinite;
}

.animation-delay-1000 {
    animation-delay: 1s;
}
</style>
