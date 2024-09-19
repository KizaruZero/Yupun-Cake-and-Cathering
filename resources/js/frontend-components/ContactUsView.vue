<!-- ContactSection.vue -->
<template>
    <section class="py-12 bg-white">
        <div class="container mx-auto">
            <h2 class="text-4xl font-bold text-center mb-8">Hubungi Kami</h2>
            <form class="max-w-lg mx-auto">
                <div class="mb-4">
                    <label class="block text-gray-600 mb-2" for="name"
                        >Nama</label
                    >
                    <input
                        type="text"
                        id="name"
                        class="w-full p-2 border border-gray-300 rounded-lg"
                    />
                </div>
                <div class="mb-4">
                    <label class="block text-gray-600 mb-2" for="email"
                        >Email</label
                    >
                    <input
                        type="email"
                        id="email"
                        class="w-full p-2 border border-gray-300 rounded-lg"
                    />
                </div>
                <div class="mb-4">
                    <label class="block text-gray-600 mb-2" for="message"
                        >Pesan</label
                    >
                    <textarea
                        id="message"
                        class="w-full p-2 border border-gray-300 rounded-lg"
                    ></textarea>
                </div>
                <button
                    type="submit"
                    class="bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-6 rounded-lg shadow-lg"
                >
                    Kirim
                </button>
            </form>
        </div>
    </section>
</template>
