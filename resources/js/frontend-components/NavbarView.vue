<!-- Navbar.vue -->
<template>
    <header class="bg-white shadow-lg fixed w-full z-10">
        <nav class="container mx-auto flex justify-between items-center py-4">
            <!-- Logo -->
            <div class="text-2xl font-bold">
                <Link :href="route('/')" class="text-yellow-500">
                    Cake & Catering
                </Link>
            </div>

            <!-- Menu Items (Hidden on mobile, visible on larger screens) -->
            <div class="hidden md:flex space-x-6">
                <Link
                    href="/"
                    class="hover:text-yellow-500"
                    :class="{ 'text-yellow-500': isActive('/') }"
                >
                    Home
                </Link>
                <Link
                    href="/about"
                    class="hover:text-yellow-500"
                    :class="{ 'text-yellow-500': isActive('/about') }"
                >
                    Tentang Kami
                </Link>
                <Link
                    href="/products"
                    class="hover:text-yellow-500"
                    :class="{ 'text-yellow-500': isActive('/products') }"
                >
                    Produk
                </Link>
                <Link
                    href="/contact"
                    class="hover:text-yellow-500"
                    :class="{ 'text-yellow-500': isActive('/contact') }"
                >
                    Hubungi Kami
                </Link>
            </div>

            <!-- CTA Button -->
            <Link
                href="/order"
                class="hidden md:inline-block bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded-lg"
            >
                Pesan Sekarang
            </Link>

            <!-- Auth Links for Desktop -->
            <div class="hidden md:flex space-x-4">
                <div v-if="!user">
                    <!-- Guest links: Login / Register -->
                    <Link
                        href="/login"
                        class="text-yellow-500 px-4 py-2 hover:bg-yellow-500 hover:text-white rounded"
                    >
                        Login
                    </Link>
                    <Link
                        href="/register"
                        class="text-yellow-500 px-4 py-2 hover:bg-yellow-500 hover:text-white rounded"
                    >
                        Register
                    </Link>
                </div>
                <div v-else>
                    <!-- Authenticated user links: Profile / Logout -->
                    <Link
                        href="/profile"
                        class="text-yellow-500 px-4 py-2 hover:bg-yellow-500 hover:text-white rounded"
                    >
                        Profile
                    </Link>
                    <Link
                        href="/logout"
                        method="post"
                        as="button"
                        class="text-yellow-500 px-4 py-2 hover:bg-yellow-500 hover:text-white rounded"
                    >
                        Log Out
                    </Link>
                </div>
            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden relative">
                <button @click="toggleMenu" class="text-yellow-500">
                    <!-- Hamburger Icon -->
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7"
                        />
                    </svg>
                </button>

                <!-- Mobile Dropdown Menu -->
                <div
                    v-if="isMenuOpen"
                    class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg"
                >
                    <Link
                        href="/"
                        class="block px-4 py-2 text-gray-800 hover:bg-gray-100"
                        @click="toggleMenu"
                        :class="{ 'text-yellow-500': isActive('/') }"
                    >
                        Home
                    </Link>
                    <Link
                        href="/about"
                        class="block px-4 py-2 text-gray-800 hover:bg-gray-100"
                        @click="toggleMenu"
                        :class="{ 'text-yellow-500': isActive('/about') }"
                    >
                        Tentang Kami
                    </Link>
                    <Link
                        href="/products"
                        class="block px-4 py-2 text-gray-800 hover:bg-gray-100"
                        @click="toggleMenu"
                        :class="{ 'text-yellow-500': isActive('/products') }"
                    >
                        Produk
                    </Link>
                    <Link
                        href="/contact"
                        class="block px-4 py-2 text-gray-800 hover:bg-gray-100"
                        @click="toggleMenu"
                        :class="{ 'text-yellow-500': isActive('/contact') }"
                    >
                        Hubungi Kami
                    </Link>
                    <Link
                        href="/order"
                        class="block px-4 py-2 text-gray-800 hover:bg-gray-100 bg-yellow-500"
                        @click="toggleMenu"
                    >
                        Pesan Sekarang
                    </Link>
                    <!-- Tambahkan di dalam Mobile Dropdown Menu setelah link produk -->
                    <div v-if="!user">
                        <!-- Guest links: Login / Register -->
                        <Link
                            href="/login"
                            class="block px-4 py-2 text-gray-800 hover:bg-gray-100"
                            @click="toggleMenu"
                        >
                            Login
                        </Link>
                        <Link
                            href="/register"
                            class="block px-4 py-2 text-gray-800 hover:bg-gray-100"
                            @click="toggleMenu"
                        >
                            Register
                        </Link>
                    </div>
                    <div v-else>
                        <!-- Authenticated user links: Profile / Logout -->
                        <Link
                            href="/profile"
                            class="block px-4 py-2 text-gray-800 hover:bg-gray-100"
                            @click="toggleMenu"
                        >
                            Profile
                        </Link>
                        <Link
                            href="/logout"
                            method="post"
                            as="button"
                            class="block px-4 py-2 text-gray-800 hover:bg-gray-100"
                            @click="toggleMenu"
                        >
                            Log Out
                        </Link>
                    </div>
                </div>
            </div>
        </nav>
    </header>
</template>

<script setup>
import { ref, computed } from "vue";
import { Link, usePage } from "@inertiajs/vue3";

// Ref untuk mengontrol tampilan menu mobile
const isMenuOpen = ref(false);

// Mengambil data user dari props Inertia
const { props } = usePage();
const user = computed(() => props.auth.user);

// Fungsi untuk toggle menu mobile
const toggleMenu = () => {
    isMenuOpen.value = !isMenuOpen.value;
};

// Fungsi untuk menentukan apakah link aktif
const currentPath = computed(() => window.location.pathname);

const isActive = (path) => {
    return currentPath.value === path;
};
</script>

<style scoped>
/* Tambahkan style tambahan jika diperlukan */
</style>
