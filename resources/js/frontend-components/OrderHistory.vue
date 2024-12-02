<template>
    <div
        class="min-h-screen bg-gradient-to-br from-orange-50 via-white to-orange-100"
    >
        <!-- Hero Section -->
        <div
            class="relative overflow-hidden bg-gradient-to-r from-orange-500 to-orange-600 h-48"
        >
            <div class="absolute inset-0 bg-white/10 backdrop-blur-sm"></div>
            <div
                class="container mx-auto px-4 h-full flex items-center justify-between relative"
                data-aos="fade-up"
            >
                <div>
                    <h1 class="text-4xl font-bold text-white tracking-tight">
                        Order History
                    </h1>
                    <p class="text-orange-100 mt-2">
                        Track your delicious moments with us
                    </p>
                </div>
            </div>

            <!-- Decorative wave -->
            <div class="absolute -bottom-6 left-0 right-0">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120">
                    <path
                        fill="white"
                        d="M0,64L80,69.3C160,75,320,85,480,80C640,75,800,53,960,48C1120,43,1280,53,1360,58.7L1440,64L1440,120L1360,120C1280,120,1120,120,960,120C800,120,640,120,480,120C320,120,160,120,80,120L0,120Z"
                    ></path>
                </svg>
            </div>
        </div>

        <div class="container mx-auto px-4 py-12">
            <!-- Orders List -->
            <div class="space-y-6">
                <div
                    v-for="order in orders"
                    :key="order.id"
                    class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-xl border border-orange-100 overflow-hidden"
                    data-aos="fade-up"
                >
                    <!-- Order Header -->
                    <div
                        class="bg-gradient-to-r from-orange-500 to-orange-600 p-6"
                    >
                        <div
                            class="flex flex-wrap items-center justify-between gap-4"
                        >
                            <div class="text-white">
                                <p class="text-orange-100">
                                    Order ID: #{{ order.id }}
                                </p>
                                <p class="text-2xl font-bold">
                                    {{ formatCurrency(order.total_price) }}
                                </p>
                            </div>
                            <div class="flex items-center gap-4">
                                <div class="text-right text-white">
                                    <p class="text-orange-100">Order Date</p>
                                    <p class="font-semibold">
                                        {{ formatDate(order.order_date) }}
                                    </p>
                                </div>
                                <div
                                    class="px-4 py-2 rounded-full text-sm font-semibold"
                                    :class="{
                                        'bg-green-500 text-white':
                                            order.status === 'completed',
                                        'bg-yellow-500 text-white':
                                            order.status === 'pending',
                                        'bg-blue-500 text-white':
                                            order.status === 'processing',
                                        'bg-red-500 text-white':
                                            order.status === 'cancelled',
                                    }"
                                >
                                    {{ capitalizeFirst(order.status) }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Order Details -->
                    <div class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Left Column -->
                            <div class="space-y-4">
                                <h3 class="text-lg font-semibold text-gray-800">
                                    Order Details
                                </h3>

                                <div class="grid grid-cols-2 gap-4">
                                    <div class="bg-orange-50 p-4 rounded-xl">
                                        <p class="text-sm text-gray-600">
                                            Payment Method
                                        </p>
                                        <p class="font-medium text-gray-800">
                                            {{
                                                formatPaymentMethod(
                                                    order.payment_method
                                                )
                                            }}
                                        </p>
                                    </div>

                                    <div class="bg-orange-50 p-4 rounded-xl">
                                        <p class="text-sm text-gray-600">
                                            Delivery Date
                                        </p>
                                        <p class="font-medium text-gray-800">
                                            {{
                                                formatDate(
                                                    order.requested_delivery_date
                                                )
                                            }}
                                        </p>
                                    </div>
                                </div>

                                <!-- Payment Proof -->
                                <div v-if="order.payment_proof" class="mt-4">
                                    <p class="text-sm text-gray-600 mb-2">
                                        Payment Proof
                                    </p>
                                    <div class="relative w-32 h-32">
                                        <img
                                            :src="`/storage/${order.payment_proof}`"
                                            class="w-full h-full object-cover rounded-xl"
                                            alt="Payment Proof"
                                        />
                                        <button
                                            @click="
                                                viewImage(order.payment_proof)
                                            "
                                            class="absolute inset-0 bg-black/50 text-white opacity-0 hover:opacity-100 transition-opacity rounded-xl flex items-center justify-center"
                                        >
                                            View
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Right Column - Order Items -->
                            <div>
                                <h3
                                    class="text-lg font-semibold text-gray-800 mb-4"
                                >
                                    Order Items
                                </h3>
                                <div class="space-y-3">
                                    <div
                                        v-for="item in order.order_items"
                                        :key="item.id"
                                        class="flex items-center gap-4 p-3 rounded-xl hover:bg-orange-50 transition-colors"
                                    >
                                        <div
                                            class="w-12 h-12 bg-orange-100 rounded-lg overflow-hidden"
                                        >
                                            <img
                                                :src="`${item.product.image}`"
                                                :alt="item.product.name"
                                                class="w-full h-full object-cover"
                                            />
                                        </div>
                                        <div class="flex-1">
                                            <h4
                                                class="font-medium text-gray-800"
                                            >
                                                {{ item.product.name }}
                                            </h4>
                                            <p class="text-sm text-gray-600">
                                                {{ formatCurrency(item.price) }}
                                                × {{ item.quantity }}
                                            </p>
                                        </div>
                                        <div class="text-right">
                                            <p
                                                class="font-semibold text-gray-800"
                                            >
                                                {{
                                                    formatCurrency(
                                                        item.subtotal
                                                    )
                                                }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Empty State -->
            <div
                v-if="!orders.length"
                class="text-center py-12"
                data-aos="fade-up"
            >
                <div class="w-24 h-24 mx-auto mb-6 text-orange-400">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 012-2h2a2 2 0 012 2"
                        />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">
                    No Orders Yet
                </h3>
                <p class="text-gray-600 mb-6">
                    Start ordering our delicious cakes and catering services!
                </p>
                <Link
                    href="/menu"
                    class="inline-flex items-center px-6 py-3 bg-orange-500 text-white rounded-xl hover:bg-orange-600 transition-colors"
                >
                    View Menu
                </Link>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import { Link } from "@inertiajs/vue3";
import Swal from "sweetalert2";
import "aos/dist/aos.css";
import AOS from "aos";

const orders = ref([]);
const selectedImage = ref(null);

const fetchOrders = async () => {
    try {
        const response = await axios.get("/api/order/history");
        orders.value = response.data;
    } catch (error) {
        console.error("Error fetching orders:", error);
    }
};

// Format currency
const formatCurrency = (amount) => {
    return new Intl.NumberFormat("id-ID", {
        style: "currency",
        currency: "IDR",
    }).format(amount);
};

// Format date
const formatDate = (date) => {
    return new Date(date).toLocaleDateString("id-ID", {
        year: "numeric",
        month: "long",
        day: "numeric",
    });
};

// Format payment method
const formatPaymentMethod = (method) => {
    const methods = {
        credit_card: "Credit Card",
        bank_transfer: "Bank Transfer",
        cash_on_delivery: "Cash on Delivery",
    };
    return methods[method] || method;
};

// Capitalize the first letter of a string
const capitalizeFirst = (string) => {
    return string.charAt(0).toUpperCase() + string.slice(1);
};

// View Image
const viewImage = (imagePath) => {
    Swal.fire({
        imageUrl: `/storage/${imagePath}`,
        imageAlt: "Payment Proof",
        showConfirmButton: false,
        background: "#f7f7f7",
    });
};
onMounted(() => {
    fetchOrders();
});
// Initialize AOS for animations
AOS.init();
</script>

<style scoped>
/* Additional custom styles can go here */
</style>
