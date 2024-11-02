<template>
    <GuestLayout>
        <div
            class="min-h-screen bg-gradient-to-b from-orange-50 to-white relative overflow-hidden"
        >
            <!-- Main Content -->
            <div
                class="relative container mx-auto px-4 pt-24 pb-16 sm:px-6 lg:px-8"
            >
                <div class="grid lg:grid-cols-2 gap-12 items-center">
                    <!-- Left Column - Text Content -->
                    <div class="text-center lg:text-left space-y-8">
                        <h2
                            class="text-orange-500 font-medium tracking-wide uppercase text-sm"
                        >
                            About Us
                        </h2>
                        <h1
                            class="text-4xl md:text-5xl lg:text-6xl font-playfair font-bold text-gray-900 leading-tight"
                        >
                            Welcome to Yupun Cake & Catering
                        </h1>
                        <p
                            class="text-lg text-gray-600 max-w-2xl mx-auto lg:mx-0"
                        >
                            At Yupun, we believe that every occasion deserves a
                            touch of sweetness and a dash of elegance. Our
                            expert team is dedicated to crafting exquisite cakes
                            and providing top-notch catering services that will
                            elevate your celebrations.
                        </p>

                        <p
                            class="text-lg text-gray-600 max-w-2xl mx-auto lg:mx-0"
                        >
                            With over a decade of experience, we specialize in
                            creating custom cakes tailored to your vision,
                            alongside a diverse menu of delectable dishes that
                            cater to every palate. Let us make your next event
                            unforgettable!
                        </p>

                        <!-- CTA Button -->
                        <div class="flex justify-center lg:justify-start">
                            <button
                                class="px-8 py-4 bg-gradient-to-r from-orange-500 to-yellow-500 text-white rounded-full font-medium transform transition-all duration-300 hover:scale-105 hover:shadow-lg"
                            >
                                Contact Us
                            </button>
                        </div>
                    </div>

                    <!-- Right Column - Image Section -->
                    <div class="relative">
                        <div class="relative rounded-2xl overflow-hidden">
                            <img
                                src="@/assets/telor.png"
                                alt="Delicious cake"
                                class="w-full h-full object-cover rounded-2xl"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>

<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import AboutUsSection from "@/frontend-components/AboutUsSection.vue";
</script>

<style>
/* You can add any additional styles here if needed */
</style>
