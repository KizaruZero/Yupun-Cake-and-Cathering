<template>
    <GuestLayout>
        <div
            class="min-h-screen bg-gradient-to-br from-orange-50 via-white to-orange-100"
        >
            <!-- Hero Section -->
            <div
                class="relative overflow-hidden bg-gradient-to-r from-orange-500 to-orange-600 h-64"
            >
                <div
                    class="absolute inset-0 bg-white/10 backdrop-blur-sm"
                ></div>
                <!-- Decorative patterns -->
                <div class="absolute inset-0 opacity-10">
                    <div
                        class="absolute inset-0"
                        style="
                            background-image: url('data:image/svg+xml,%3Csvg width=\'20\' height=\'20\' viewBox=\'0 0 20 20\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'1\' fill-rule=\'evenodd\'%3E%3Ccircle cx=\'3\' cy=\'3\' r=\'3\'/%3E%3C/g%3E%3C/svg%3E');
                        "
                    ></div>
                </div>

                <div
                    class="container mx-auto px-4 h-full flex flex-col justify-center relative"
                    v-motion
                    :initial="{ opacity: 0, y: 50 }"
                    :enter="{ opacity: 1, y: 0 }"
                >
                    <h1
                        class="text-4xl md:text-5xl font-bold text-white tracking-tight mb-2"
                    >
                        Contact Us
                    </h1>
                    <p class="text-white/90 text-lg">
                        We'd Love to Hear From You
                    </p>
                </div>

                <!-- Wave separator -->
                <div class="absolute -bottom-6 left-0 right-0">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 1440 120"
                    >
                        <path
                            fill="white"
                            d="M0,64L80,69.3C160,75,320,85,480,80C640,75,800,53,960,48C1120,43,1280,53,1360,58.7L1440,64L1440,120L1360,120C1280,120,1120,120,960,120C800,120,640,120,480,120C320,120,160,120,80,120L0,120Z"
                        ></path>
                    </svg>
                </div>
            </div>

            <!-- Main Content -->
            <div class="container mx-auto px-4 py-12">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                    <!-- Contact Information -->
                    <div
                        class="space-y-8"
                        v-motion
                        :initial="{ opacity: 0, x: -50 }"
                        :enter="{ opacity: 1, x: 0 }"
                    >
                        <div
                            class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-xl p-8 border border-orange-100"
                        >
                            <h2
                                class="text-2xl font-semibold text-gray-800 mb-6"
                            >
                                Get in Touch
                            </h2>

                            <div class="space-y-6">
                                <!-- Location -->
                                <div class="flex items-start gap-4">
                                    <div
                                        class="flex-shrink-0 w-12 h-12 bg-orange-100 rounded-full flex items-center justify-center text-orange-500"
                                    >
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
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"
                                            />
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"
                                            />
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="font-medium text-gray-800">
                                            Visit Us
                                        </h3>
                                        <p class="text-gray-600 mt-1">
                                            123 Cake Street, Pastry Lane<br />Bakery
                                            City, BC 12345
                                        </p>
                                    </div>
                                </div>

                                <!-- Phone -->
                                <div class="flex items-start gap-4">
                                    <div
                                        class="flex-shrink-0 w-12 h-12 bg-orange-100 rounded-full flex items-center justify-center text-orange-500"
                                    >
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
                                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"
                                            />
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="font-medium text-gray-800">
                                            Call Us
                                        </h3>
                                        <p class="text-gray-600 mt-1">
                                            +1 (234) 567-8900
                                        </p>
                                        <p class="text-gray-600">
                                            Mon - Sat: 8:00 AM - 8:00 PM
                                        </p>
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="flex items-start gap-4">
                                    <div
                                        class="flex-shrink-0 w-12 h-12 bg-orange-100 rounded-full flex items-center justify-center text-orange-500"
                                    >
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
                                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                                            />
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="font-medium text-gray-800">
                                            Email Us
                                        </h3>
                                        <p class="text-gray-600 mt-1">
                                            info@yupuncatering.com
                                        </p>
                                        <p class="text-gray-600">
                                            orders@yupuncatering.com
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Social Media -->
                            <div class="mt-8 pt-8 border-t border-orange-100">
                                <h3 class="font-medium text-gray-800 mb-4">
                                    Follow Us
                                </h3>
                                <div class="flex gap-4">
                                    <a
                                        href="#"
                                        class="w-10 h-10 bg-orange-100 rounded-full flex items-center justify-center text-orange-500 hover:bg-orange-500 hover:text-white transition-colors duration-300"
                                    >
                                        <svg
                                            class="h-5 w-5"
                                            fill="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"
                                            />
                                        </svg>
                                    </a>
                                    <a
                                        href="#"
                                        class="w-10 h-10 bg-orange-100 rounded-full flex items-center justify-center text-orange-500 hover:bg-orange-500 hover:text-white transition-colors duration-300"
                                    >
                                        <svg
                                            class="h-5 w-5"
                                            fill="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                                            />
                                        </svg>
                                    </a>
                                    <a
                                        href="#"
                                        class="w-10 h-10 bg-orange-100 rounded-full flex items-center justify-center text-orange-500 hover:bg-orange-500 hover:text-white transition-colors duration-300"
                                    >
                                        <svg
                                            class="h-5 w-5"
                                            fill="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"
                                            />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Form -->
                    <div
                        class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-xl p-8 border border-orange-100"
                        v-motion
                        :initial="{ opacity: 0, x: 50 }"
                        :enter="{ opacity: 1, x: 0 }"
                    >
                        <h2 class="text-2xl font-semibold text-gray-800 mb-6">
                            Send Us a Message
                        </h2>

                        <form @submit.prevent="submitForm">
                            <div class="space-y-4">
                                <!-- Name Field -->
                                <div>
                                    <label
                                        for="name"
                                        class="block text-gray-700 font-medium"
                                        >Name</label
                                    >
                                    <input
                                        type="text"
                                        id="name"
                                        v-model="form.name"
                                        required
                                        class="mt-1 w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent"
                                    />
                                </div>

                                <!-- Email Field -->
                                <div>
                                    <label
                                        for="email"
                                        class="block text-gray-700 font-medium"
                                        >Email</label
                                    >
                                    <input
                                        type="email"
                                        id="email"
                                        v-model="form.email"
                                        required
                                        class="mt-1 w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent"
                                    />
                                </div>

                                <!-- Message Field -->
                                <div>
                                    <label
                                        for="message"
                                        class="block text-gray-700 font-medium"
                                        >Message</label
                                    >
                                    <textarea
                                        id="message"
                                        v-model="form.message"
                                        required
                                        class="mt-1 w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent"
                                        rows="4"
                                    ></textarea>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="mt-6">
                                <button
                                    type="submit"
                                    class="w-full py-3 px-6 bg-orange-500 text-white font-semibold rounded-lg hover:bg-orange-600 transition duration-300"
                                >
                                    Send Message
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>

<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";

const form = {
    name: "",
    email: "",
    message: "",
};

const submitForm = () => {
    // Add your form submission logic here
    console.log("Form submitted", form);
    alert("Thank you for contacting us!");
    form.name = "";
    form.email = "";
    form.message = "";
};
</script>
<style scoped>
/* Additional styling if needed */
</style>
