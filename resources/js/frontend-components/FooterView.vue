<!-- Footer.vue -->
<template>
    <footer class="bg-gray-800 text-white py-8">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- About Section -->
            <div>
                <h4 class="text-lg font-bold mb-4">Cake & Catering</h4>
                <p class="text-gray-400">
                    Kami menyediakan berbagai kue dan layanan katering untuk
                    acara spesial Anda.
                </p>
            </div>

            <!-- Navigation Links -->
            <div>
                <h4 class="text-lg font-bold mb-4">Navigasi</h4>
                <ul>
                    <li class="mb-2">
                        <Link href="/" class="hover:text-yellow-500">Home</Link>
                    </li>
                    <li class="mb-2">
                        <Link href="/about" class="hover:text-yellow-500"
                            >Tentang Kami</Link
                        >
                    </li>
                    <li class="mb-2">
                        <Link href="/products" class="hover:text-yellow-500"
                            >Produk</Link
                        >
                    </li>
                    <li class="mb-2">
                        <Link href="/contact" class="hover:text-yellow-500"
                            >Hubungi Kami</Link
                        >
                    </li>
                </ul>
            </div>

            <!-- Contact & Social Media -->
            <div>
                <h4 class="text-lg font-bold mb-4">Hubungi Kami</h4>
                <p class="text-gray-400 mb-2">
                    Alamat: Jl. Kenangan No. 123, Kota Bahagia
                </p>
                <p class="text-gray-400 mb-4">Telepon: (021) 123-4567</p>

                <!-- Social Media Links -->
                <div class="flex space-x-4">
                    <a
                        href="https://facebook.com"
                        target="_blank"
                        class="hover:text-yellow-500"
                    >
                        <svg
                            class="w-6 h-6 fill-current text-gray-400 hover:text-yellow-500"
                            viewBox="0 0 24 24"
                        >
                            <path
                                d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.437 9.877v-6.987H7.898v-2.89h2.539v-2.197c0-2.507 1.492-3.892 3.78-3.892 1.096 0 2.238.195 2.238.195v2.465h-1.26c-1.242 0-1.63.773-1.63 1.564v1.865h2.773l-.443 2.89h-2.33v6.987C18.343 21.128 22 16.991 22 12z"
                            />
                        </svg>
                    </a>
                    <a
                        href="https://instagram.com"
                        target="_blank"
                        class="hover:text-yellow-500"
                    >
                        <svg
                            class="w-6 h-6 fill-current text-gray-400 hover:text-yellow-500"
                            viewBox="0 0 24 24"
                        >
                            <path
                                d="M16.001 4H8.001C6.895 4 6.001 4.894 6.001 6v8c0 1.106.894 2 2 2h8c1.106 0 2-.894 2-2V6c0-1.106-.894-2-2-2zm-4 10c-1.658 0-3-1.342-3-3s1.342-3 3-3 3 1.342 3 3-1.342 3-3 3zm4.5-6.5c-.276 0-.5-.224-.5-.5s.224-.5.5-.5.5.224.5.5-.224.5-.5.5zM18 8.999h-1.5v.007h1.5v-.007z"
                            />
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="text-center text-gray-400 mt-8">
            <p>&copy; 2024 Cake & Catering. Semua Hak Cipta Dilindungi.</p>
        </div>
    </footer>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
// No logic required here for the footer
</script>
