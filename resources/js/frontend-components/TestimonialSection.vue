<template>
    <div
        class="min-h-screen bg-gradient-to-b from-orange-50 to-white relative overflow-hidden"
    >
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
        <div class="flex px-52 py-20 bg-white">
            <div class="flex space-x-10 rounded-lg">
                <!-- Left Section -->
                <div class="w-1/2">
                    <img
                        src="@/assets/yupun.png"
                        alt=""
                        class="rounded-2xl transform transition-transform duration-700 hover:scale-105"
                    />
                </div>

                <!-- Right Section -->
                <div class="w-1/2 place-content-center">
                    <p class="text-lg text-gray-900">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore
                        magna aliqua.
                    </p>

                    <!-- User Info -->
                    <div class="flex items-center mt-6 space-x-4">
                        <img
                            src="https://via.placeholder.com/50"
                            alt="User"
                            class="w-12 h-12 rounded-full"
                        />
                        <div>
                            <p class="font-semibold text-gray-900">
                                Jonathan Vallem
                            </p>
                            <p class="text-sm text-gray-500">New York, USA</p>
                        </div>
                    </div>

                    <!-- Navigation Arrows -->
                </div>
            </div>
        </div>
    </div>
</template>

<script setup></script>

<style scoped>
.group:hover .group-hover\:scale-110 {
    transform: scale(1.1);
}
</style>
