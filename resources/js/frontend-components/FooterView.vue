<template>
    <footer
        class="backdrop-blur-lg border-t border-gray-100 py-8 mt-8 shadow-md bg-orange-300"
    >
        <div class="mx-auto px-4 sm:px-6 lg:px-52">
            <!-- Top Section with Links -->
            <div class="flex flex-col md:flex-row md:justify-between">
                <!-- Logo and Description -->
                <div class="mb-8 md:mb-0">
                    <Link href="/" class="flex items-center space-x-2 mb-4">
                        <img src="@/assets/logo.png" alt="Logo" class="w-12" />
                    </Link>
                    <p class="text-black">
                        Menyediakan layanan catering berkualitas dengan cita
                        rasa tinggi untuk setiap acara istimewa Anda. Nikmati
                        makanan lezat bersama kami.
                    </p>
                </div>

                <!-- Navigation Links -->
                <div class="grid grid-cols-2 gap-8 md:grid-cols-3">
                    <!-- Menu Column -->
                    <div>
                        <h3 class="text-sm font-semibold text-black mb-4">
                            Menu
                        </h3>
                        <ul class="space-y-2">
                            <li>
                                <Link
                                    href="/about"
                                    class="text-black hover:text-orange-600 transition duration-200"
                                    >Tentang Kami</Link
                                >
                            </li>
                            <li>
                                <Link
                                    href="/menu"
                                    class="text-black hover:text-orange-600 transition duration-200"
                                    >Menu</Link
                                >
                            </li>
                            <li>
                                <Link
                                    href="/catering"
                                    class="text-black hover:text-orange-600 transition duration-200"
                                    >Layanan Catering</Link
                                >
                            </li>
                        </ul>
                    </div>

                    <!-- Information Column -->
                    <div>
                        <h3 class="text-sm font-semibold text-black mb-4">
                            Informasi
                        </h3>
                        <ul class="space-y-2">
                            <li>
                                <Link
                                    href="/faq"
                                    class="text-black hover:text-orange-600 transition duration-200"
                                    >FAQ</Link
                                >
                            </li>
                            <li>
                                <Link
                                    href="/privacy"
                                    class="text-black hover:text-orange-600 transition duration-200"
                                    >Kebijakan Privasi</Link
                                >
                            </li>
                            <li>
                                <Link
                                    href="/terms"
                                    class="text-black hover:text-orange-600 transition duration-200"
                                    >Syarat & Ketentuan</Link
                                >
                            </li>
                        </ul>
                    </div>

                    <!-- Contact Column -->
                    <div>
                        <h3 class="text-sm font-semibold text-black mb-4">
                            Kontak
                        </h3>
                        <ul class="space-y-2">
                            <li class="text-black">
                                Email: info@cateringco.com
                            </li>
                            <li class="text-black">
                                Telepon: +62 812-3456-7890
                            </li>
                            <li class="text-black">
                                Alamat: Jl. Pangan Sejahtera No.123
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Bottom Section -->
            <div
                class="mt-8 border-t border-gray-200 pt-4 text-center text-black text-sm"
            >
                <p>&copy; 2024 Catering Co. Semua Hak Dilindungi.</p>
            </div>
        </div>
    </footer>
</template>

<script setup>
// Import router link
import { Link } from "@inertiajs/vue3";
</script>

<style scoped>
/* Optional additional styling */
</style>
