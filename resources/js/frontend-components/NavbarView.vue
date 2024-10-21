<template>
    <div class="fixed w-full top-0 z-50">
        <!-- Navbar Container -->
        <nav
            class="bg-white/80 backdrop-blur-md shadow-lg border-b border-gray-100"
            :class="{ 'shadow-lg': scrolled }"
        >
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <!-- Logo and Brand -->
                    <div class="flex items-center">
                        <Link href="/" class="flex items-center space-x-2">
                            <!-- Food icon -->
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-8 w-8 text-orange-500"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <path
                                    d="M15 11h.01M11 11h.01M7 11h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                />
                            </svg>
                            <span
                                class="text-2xl font-bold bg-gradient-to-r from-orange-500 to-yellow-500 bg-clip-text text-transparent"
                            >
                                Tasty Catering
                            </span>
                        </Link>
                    </div>

                    <!-- Desktop Navigation -->
                    <div class="hidden md:flex md:items-center md:space-x-8">
                        <Link
                            v-for="item in navigationItems"
                            :key="item.path"
                            :href="item.path"
                            class="relative px-3 py-2 text-gray-700 transition-colors duration-200 hover:text-orange-500 group"
                            :class="{ 'text-orange-500': isActive(item.path) }"
                        >
                            {{ item.name }}
                            <span
                                class="absolute bottom-0 left-0 w-full h-0.5 bg-orange-500 transform scale-x-0 transition-transform duration-200 group-hover:scale-x-100"
                                :class="{ 'scale-x-100': isActive(item.path) }"
                            ></span>
                        </Link>

                        <!-- Order Now Button -->
                        <Link
                            href="/order"
                            class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-orange-500 to-yellow-500 text-white rounded-full hover:from-orange-600 hover:to-yellow-600 transition-all duration-200 transform hover:scale-105"
                        >
                            <span>Order Now</span>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 ml-2"
                                viewBox="0 0 20 20"
                                fill="currentColor"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                        </Link>

                        <!-- User Menu Dropdown -->
                        <div class="relative" v-click-outside="closeUserMenu">
                            <button
                                @click="toggleUserMenu"
                                class="flex items-center space-x-2 text-gray-700 hover:text-orange-500 focus:outline-none"
                            >
                                <div
                                    class="w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center"
                                >
                                    <svg
                                        v-if="!user"
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5"
                                        viewBox="0 0 20 20"
                                        fill="currentColor"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>
                                    <span v-else class="text-sm font-medium">{{
                                        user.initials
                                    }}</span>
                                </div>
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5"
                                    :class="{
                                        'transform rotate-180': isUserMenuOpen,
                                    }"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"
                                    />
                                </svg>
                            </button>

                            <!-- Dropdown Menu -->
                            <transition
                                enter-active-class="transition duration-200 ease-out"
                                enter-from-class="transform scale-95 opacity-0"
                                enter-to-class="transform scale-100 opacity-100"
                                leave-active-class="transition duration-75 ease-in"
                                leave-from-class="transform scale-100 opacity-100"
                                leave-to-class="transform scale-95 opacity-0"
                            >
                                <div
                                    v-if="isUserMenuOpen"
                                    class="absolute right-0 mt-2 w-48 rounded-xl bg-white py-2 shadow-xl ring-1 ring-black ring-opacity-5"
                                >
                                    <template v-if="!user">
                                        <Link
                                            href="/login"
                                            class="block px-4 py-2 text-gray-700 hover:bg-orange-50 hover:text-orange-500"
                                            @click="closeUserMenu"
                                        >
                                            Sign In
                                        </Link>
                                        <Link
                                            href="/register"
                                            class="block px-4 py-2 text-gray-700 hover:bg-orange-50 hover:text-orange-500"
                                            @click="closeUserMenu"
                                        >
                                            Create Account
                                        </Link>
                                    </template>
                                    <template v-else>
                                        <div
                                            class="px-4 py-2 border-b border-gray-100"
                                        >
                                            <p
                                                class="text-sm font-medium text-gray-900"
                                            >
                                                {{ user.name }}
                                            </p>
                                            <p class="text-xs text-gray-500">
                                                {{ user.email }}
                                            </p>
                                        </div>
                                        <Link
                                            href="/profile"
                                            class="block px-4 py-2 text-gray-700 hover:bg-orange-50 hover:text-orange-500"
                                            @click="closeUserMenu"
                                        >
                                            Your Profile
                                        </Link>
                                        <Link
                                            href="/orders"
                                            class="block px-4 py-2 text-gray-700 hover:bg-orange-50 hover:text-orange-500"
                                            @click="closeUserMenu"
                                        >
                                            Your Orders
                                        </Link>
                                        <Link
                                            href="/logout"
                                            method="post"
                                            as="button"
                                            class="block w-full text-left px-4 py-2 text-gray-700 hover:bg-orange-50 hover:text-orange-500"
                                            @click="closeUserMenu"
                                        >
                                            Sign Out
                                        </Link>
                                    </template>
                                </div>
                            </transition>
                        </div>
                    </div>

                    <!-- Mobile menu button -->
                    <div class="flex items-center md:hidden">
                        <button
                            @click="isMobileMenuOpen = !isMobileMenuOpen"
                            class="inline-flex items-center justify-center p-2 rounded-md text-gray-700 hover:text-orange-500 hover:bg-orange-50"
                        >
                            <svg
                                :class="{
                                    hidden: isMobileMenuOpen,
                                    block: !isMobileMenuOpen,
                                }"
                                class="h-6 w-6"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16"
                                />
                            </svg>
                            <svg
                                :class="{
                                    block: isMobileMenuOpen,
                                    hidden: !isMobileMenuOpen,
                                }"
                                class="h-6 w-6"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"
                                />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile menu -->
            <transition
                enter-active-class="transition duration-200 ease-out"
                enter-from-class="transform -translate-y-full"
                enter-to-class="transform translate-y-0"
                leave-active-class="transition duration-100 ease-in"
                leave-from-class="transform translate-y-0"
                leave-to-class="transform -translate-y-full"
            >
                <div
                    v-if="isMobileMenuOpen"
                    class="md:hidden bg-white border-t border-gray-100"
                >
                    <div class="px-2 pt-2 pb-3 space-y-1">
                        <Link
                            v-for="item in navigationItems"
                            :key="item.path"
                            :href="item.path"
                            class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-orange-500 hover:bg-orange-50"
                            :class="{
                                'bg-orange-50 text-orange-500': isActive(
                                    item.path
                                ),
                            }"
                            @click="isMobileMenuOpen = false"
                        >
                            {{ item.name }}
                        </Link>
                    </div>
                    <!-- Mobile User Menu -->
                    <div class="pt-4 pb-3 border-t border-gray-100">
                        <div v-if="user" class="px-4 flex items-center">
                            <div class="flex-shrink-0">
                                <div
                                    class="h-10 w-10 rounded-full bg-orange-100 flex items-center justify-center"
                                >
                                    <span class="text-orange-500 font-medium">{{
                                        user.initials
                                    }}</span>
                                </div>
                            </div>
                            <div class="ml-3">
                                <div
                                    class="text-base font-medium text-gray-800"
                                >
                                    {{ user.name }}
                                </div>
                                <div class="text-sm font-medium text-gray-500">
                                    {{ user.email }}
                                </div>
                            </div>
                        </div>
                        <div class="mt-3 px-2 space-y-1">
                            <template v-if="!user">
                                <Link
                                    href="/login"
                                    class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-orange-500 hover:bg-orange-50"
                                    @click="isMobileMenuOpen = false"
                                >
                                    Sign In
                                </Link>
                                <Link
                                    href="/register"
                                    class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-orange-500 hover:bg-orange-50"
                                    @click="isMobileMenuOpen = false"
                                >
                                    Create Account
                                </Link>
                            </template>
                            <template v-else>
                                <Link
                                    href="/profile"
                                    class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-orange-500 hover:bg-orange-50"
                                    @click="isMobileMenuOpen = false"
                                >
                                    Your Profile
                                </Link>
                                <Link
                                    href="/orders"
                                    class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-orange-500 hover:bg-orange-50"
                                    @click="isMobileMenuOpen = false"
                                >
                                    Your Orders
                                </Link>
                                <Link
                                    href="/logout"
                                    method="post"
                                    as="button"
                                    class="block w-full text-left px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-orange-500 hover:bg-orange-50"
                                    @click="isMobileMenuOpen = false"
                                >
                                    Sign Out
                                </Link>
                            </template>
                        </div>
                    </div>
                </div>
            </transition>
        </nav>
    </div>
</template>

<script setup>
import { ref, computed, onMounted, onUnmounted } from "vue";
import { Link, usePage } from "@inertiajs/vue3";

// Navigation items
const navigationItems = [
    { name: "Home", path: "/" },
    { name: "Menu", path: "/experiment" },
    { name: "Services", path: "/services" },
    { name: "About", path: "/about" },
    { name: "Contact", path: "/contact" },
];

// User state from Inertia
const { props } = usePage();
const user = computed(() => props.auth.user);

// Mobile menu state
const isMobileMenuOpen = ref(false);

// User menu state
const isUserMenuOpen = ref(false);

// Scroll state
const scrolled = ref(false);

// Active route checker
const isActive = (path) => window.location.pathname === path;

// Close user menu
const closeUserMenu = () => {
    isUserMenuOpen.value = false;
};

// Toggle user menu
const toggleUserMenu = () => {
    isUserMenuOpen.value = !isUserMenuOpen.value;
};

// Handle scroll
const handleScroll = () => {
    scrolled.value = window.scrollY > 0;
};

// Lifecycle hooks
onMounted(() => {
    window.addEventListener("scroll", handleScroll);
});

onUnmounted(() => {
    window.removeEventListener("scroll", handleScroll);
});

// Click outside directive
const vClickOutside = {
    mounted(el, binding) {
        el.clickOutsideEvent = (event) => {
            if (!(el === event.target || el.contains(event.target))) {
                binding.value(event);
            }
        };
        document.addEventListener("click", el.clickOutsideEvent);
    },
    unmounted(el) {
        document.removeEventListener("click", el.clickOutsideEvent);
    },
};
</script>
