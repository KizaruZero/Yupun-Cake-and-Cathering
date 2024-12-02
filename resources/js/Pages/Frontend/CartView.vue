<template>
    <GuestLayout>
        <div
            class="min-h-screen bg-gradient-to-br from-orange-50 via-white to-orange-100"
        >
            <div
                class="absolute inset-10 overflow-hidden"
                style="pointer-events: none"
            >
                <div
                    class="absolute top-20 left-10 w-72 h-72 bg-orange-200 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob"
                    style="pointer-events: none"
                ></div>
                <div
                    class="absolute top-40 right-10 w-72 h-72 bg-yellow-200 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob animation-delay-2000"
                    style="pointer-events: none"
                ></div>
                <div
                    class="absolute bottom-10 left-1/2 w-72 h-72 bg-pink-200 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob animation-delay-4000"
                    style="pointer-events: none"
                ></div>
            </div>
            <!-- Hero Section -->
            <div
                class="relative overflow-hidden bg-gradient-to-r from-orange-500 to-orange-600 h-48"
            >
                <div
                    class="absolute inset-0 bg-white/10 backdrop-blur-sm"
                ></div>
                <div
                    class="container mx-auto px-4 h-full flex items-center justify-between relative"
                    v-motion
                    :initial="{ opacity: 0, y: 50 }"
                    :enter="{ opacity: 1, y: 0 }"
                >
                    <h1 class="text-4xl font-bold text-white tracking-tight">
                        Your Catering Cart
                    </h1>
                    <div class="text-white/80">
                        <p class="text-sm">Delivering Happiness</p>
                        <p class="text-lg font-semibold">to Your Events</p>
                    </div>
                </div>

                <!-- Decorative elements -->
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

            <div class="container mx-auto px-4 py-8">
                <!-- Empty State -->
                <div
                    v-if="!cart || Object.keys(cart).length === 0"
                    class="text-center py-16"
                    v-motion
                    :initial="{ opacity: 0, scale: 0.9 }"
                    :enter="{ opacity: 1, scale: 1 }"
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
                                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"
                            />
                        </svg>
                    </div>
                    <p class="text-2xl text-gray-600 font-medium mb-8">
                        Your Cart is Empty
                    </p>
                    <Link
                        href="/menu"
                        class="px-8 py-4 bg-gradient-to-r from-yellow-500 to-orange-500 text-white rounded-full font-medium transform transition-all duration-300 hover:scale-105 hover:shadow-lg hover:bg-orange-50"
                    >
                        Start Ordering
                    </Link>
                </div>

                <!-- Cart Items -->
                <div v-else class="space-y-6">
                    <!-- Cart Items Container -->
                    <div
                        class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-xl p-6 border border-orange-100"
                    >
                        <div
                            v-for="(item, id) in cart"
                            :key="id"
                            class="group relative flex items-center gap-6 py-6 first:pt-0 last:pb-0 border-b border-orange-100 last:border-0"
                            v-motion
                            :initial="{ opacity: 0, x: -20 }"
                            :enter="{ opacity: 1, x: 0 }"
                        >
                            <!-- Image -->
                            <div
                                class="relative w-24 h-24 rounded-xl overflow-hidden group-hover:scale-105 transition-transform duration-300"
                            >
                                <img
                                    :src="`${item.image}`"
                                    :alt="item.name"
                                    class="w-full h-full object-cover"
                                />
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"
                                ></div>
                            </div>

                            <!-- Details -->
                            <div class="flex-1">
                                <h2
                                    class="text-xl font-semibold text-gray-800 group-hover:text-orange-500 transition-colors"
                                >
                                    {{ item.name }}
                                </h2>
                                <p class="text-orange-600 font-medium">
                                    {{ formatCurrency(item.price) }}
                                </p>
                            </div>

                            <!-- Quantity Controls -->
                            <div
                                class="flex items-center gap-3 bg-orange-50 rounded-full px-4 py-2"
                            >
                                <button
                                    @click="
                                        confirmUpdateCart(id, item.quantity - 1)
                                    "
                                    class="text-orange-500 hover:text-orange-700 transition-colors"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5"
                                        viewBox="0 0 20 20"
                                        fill="currentColor"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>
                                </button>
                                <span
                                    class="text-gray-800 font-semibold w-8 text-center"
                                    >{{ item.quantity }}</span
                                >
                                <button
                                    @click="
                                        confirmUpdateCart(id, item.quantity + 1)
                                    "
                                    class="text-orange-500 hover:text-orange-700 transition-colors"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5"
                                        viewBox="0 0 20 20"
                                        fill="currentColor"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>
                                </button>
                            </div>

                            <!-- Remove Button -->
                            <button
                                @click="confirmRemoveFromCart(id)"
                                class="text-gray-400 hover:text-red-500 transition-colors"
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
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                                    />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Order Details -->
                    <div
                        class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-xl p-6 border border-orange-100"
                    >
                        <h3 class="text-xl font-semibold text-gray-800 mb-6">
                            Order Details
                        </h3>

                        <!-- Payment Method -->
                        <div class="space-y-4">
                            <!-- <div>
                                <label
                                    for="payment_method"
                                    class="block text-sm font-medium text-gray-700 mb-2"
                                >
                                    Payment Method
                                </label>
                                <select
                                    v-model="payment_method"
                                    id="payment_method"
                                    class="w-full px-4 py-2.5 rounded-xl border border-orange-200 focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all duration-300 bg-white/50 backdrop-blur-sm"
                                >
                                    <option value="credit_card">
                                        Credit Card
                                    </option>
                                    <option value="bank_transfer">
                                        Bank Transfer
                                    </option>
                                    <option value="cash_on_delivery">
                                        Cash on Delivery
                                    </option>
                                </select>
                            </div> -->
                            <div>
                                <label
                                    for="payment_method"
                                    class="block text-sm font-medium text-gray-700 mb-2"
                                >
                                    Payment Method
                                </label>
                                <select
                                    v-model="payment_method"
                                    id="payment_method"
                                    @change="showPaymentModal"
                                    class="w-full px-4 py-2.5 rounded-xl border border-orange-200 focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all duration-300 bg-white/50 backdrop-blur-sm"
                                >
                                    <option value="">
                                        Select Payment Method
                                    </option>
                                    <option value="bank_transfer">
                                        Bank Transfer
                                    </option>
                                    <option value="e_wallet">E-Wallet</option>
                                    <option value="qris">QRIS</option>
                                    <option value="cash_on_delivery">
                                        Cash on Delivery
                                    </option>
                                </select>

                                <!-- Payment Modal -->
                                <Teleport to="body">
                                    <Transition name="modal">
                                        <div
                                            v-if="isModalVisible"
                                            class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
                                        >
                                            <div
                                                class="bg-white rounded-xl p-6 w-11/12 max-w-md max-h-[80vh] overflow-y-auto"
                                            >
                                                <div
                                                    class="flex justify-between items-center mb-4"
                                                >
                                                    <h2
                                                        class="text-xl font-bold"
                                                    >
                                                        {{ modalTitle }}
                                                    </h2>
                                                    <button
                                                        @click="closeModal"
                                                        class="text-gray-600 hover:text-gray-900"
                                                    >
                                                        ✕
                                                    </button>
                                                </div>

                                                <!-- Bank Transfer Options -->
                                                <div
                                                    v-if="
                                                        payment_method ===
                                                        'bank_transfer'
                                                    "
                                                    class="space-y-4"
                                                >
                                                    <div
                                                        v-for="bank in bankOptions"
                                                        :key="bank.name"
                                                        class="border rounded-lg p-4 hover:bg-gray-100 cursor-pointer"
                                                        @click="
                                                            selectBankMethod(
                                                                bank
                                                            )
                                                        "
                                                    >
                                                        <div
                                                            class="flex items-center"
                                                        >
                                                            <img
                                                                :src="bank.logo"
                                                                :alt="bank.name"
                                                                class="w-12 h-12 mr-4"
                                                            />
                                                            <div>
                                                                <h3
                                                                    class="font-semibold"
                                                                >
                                                                    {{
                                                                        bank.name
                                                                    }}
                                                                </h3>
                                                                <p
                                                                    class="text-sm text-gray-600"
                                                                >
                                                                    {{
                                                                        bank.accountNumber
                                                                    }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="mt-2 text-sm"
                                                        >
                                                            <p>
                                                                {{
                                                                    bank.instructions
                                                                }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- E-Wallet Options -->
                                                <div
                                                    v-else-if="
                                                        payment_method ===
                                                        'e_wallet'
                                                    "
                                                    class="space-y-4"
                                                >
                                                    <div
                                                        v-for="wallet in eWalletOptions"
                                                        :key="wallet.name"
                                                        class="border rounded-lg p-4 hover:bg-gray-100 cursor-pointer"
                                                        @click="
                                                            selectEWalletMethod(
                                                                wallet
                                                            )
                                                        "
                                                    >
                                                        <div
                                                            class="flex items-center"
                                                        >
                                                            <img
                                                                :src="
                                                                    wallet.logo
                                                                "
                                                                :alt="
                                                                    wallet.name
                                                                "
                                                                class="w-12 h-12 mr-4"
                                                            />
                                                            <div class="">
                                                                <h3
                                                                    class="font-semibold"
                                                                >
                                                                    {{
                                                                        wallet.name
                                                                    }}
                                                                </h3>
                                                                <h3
                                                                    class="font-semibold mx-2"
                                                                >
                                                                    {{
                                                                        wallet.number
                                                                    }}
                                                                </h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- QRIS Option -->
                                                <div
                                                    v-else-if="
                                                        payment_method ===
                                                        'qris'
                                                    "
                                                    class="text-center"
                                                >
                                                    <img
                                                        :src="qrisImage"
                                                        alt="QRIS Payment"
                                                        class="mx-auto max-w-full h-auto rounded-lg"
                                                    />
                                                    <p
                                                        class="mt-4 text-sm text-gray-600"
                                                    >
                                                        Scan this QRIS code to
                                                        pay
                                                    </p>
                                                </div>

                                                <!-- Cash on Delivery -->
                                                <div
                                                    v-else-if="
                                                        payment_method ===
                                                        'cash_on_delivery'
                                                    "
                                                    class="text-center"
                                                >
                                                    <p>
                                                        Pay directly to the
                                                        delivery person upon
                                                        receiving your order.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </Transition>
                                </Teleport>
                            </div>
                            <!-- Delivery Date -->
                            <div>
                                <label
                                    for="requested_delivery_date"
                                    class="block text-sm font-medium text-gray-700 mb-2"
                                >
                                    Delivery Date
                                </label>
                                <input
                                    v-model="requested_delivery_date"
                                    type="date"
                                    id="requested_delivery_date"
                                    :min="minDate"
                                    required
                                    class="w-full px-4 py-2.5 rounded-xl border border-orange-200 focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all duration-300 bg-white/50 backdrop-blur-sm"
                                />
                            </div>

                            <!-- Payment Proof -->
                            <div>
                                <label
                                    for="payment_proof"
                                    class="block text-sm font-medium text-gray-700 mb-2"
                                >
                                    Payment Proof
                                </label>
                                <div class="relative">
                                    <input
                                        type="file"
                                        id="payment_proof"
                                        accept="image/*"
                                        @change="handleFileUpload"
                                        ref="fileInput"
                                        class="hidden"
                                        :class="{
                                            'border-red-500':
                                                errors.payment_proof,
                                        }"
                                    />
                                    <button
                                        @click="$refs.fileInput.click()"
                                        class="w-full px-4 py-2.5 rounded-xl border-2 border-dashed border-orange-200 hover:border-orange-400 focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all duration-300 bg-white/50 backdrop-blur-sm text-gray-500 hover:text-orange-600"
                                    >
                                        Click to upload payment proof
                                    </button>
                                </div>

                                <!-- Image Preview -->
                                <div v-if="imagePreview" class="mt-4">
                                    <div class="relative w-32 h-32">
                                        <img
                                            :src="imagePreview"
                                            alt="Preview"
                                            class="w-full h-full object-cover rounded-xl"
                                        />
                                        <button
                                            @click="removeImage"
                                            class="absolute -top-2 -right-2 bg-red-500 text-white p-1 rounded-full hover:bg-red-600 transition-colors"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-4 w-4"
                                                viewBox="0 0 20 20"
                                                fill="currentColor"
                                            >
                                                <path
                                                    fill-rule="evenodd"
                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                    clip-rule="evenodd"
                                                />
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <p
                                    v-if="errors.payment_proof"
                                    class="mt-2 text-sm text-red-500"
                                >
                                    {{ errors.payment_proof }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Total and Checkout -->
                    <div
                        class="bg-gradient-to-r from-orange-500 to-orange-600 rounded-2xl shadow-xl p-6 text-white"
                    >
                        <div class="flex items-center justify-between mb-4">
                            <div>
                                <p class="text-white/80">Total Amount</p>
                                <p class="text-3xl font-bold">
                                    {{ formatCurrency(totalPrice) }}
                                </p>
                            </div>
                            <button
                                @click="submitOrder"
                                class="bg-white text-orange-500 px-8 py-3 rounded-xl font-semibold hover:scale-105 hover:shadow-lg hover:shadow-white/20 transform transition-all duration-300"
                            >
                                Proceed to Payment
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <OrderHistory />
        </div>
    </GuestLayout>
</template>

<script setup>
import { ref, onMounted, computed } from "vue";
import axios from "axios";
import Swal from "sweetalert2";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import { Link } from "@inertiajs/vue3";
import OrderHistory from "@/frontend-components/OrderHistory.vue";

const cart = ref(null);
const errors = ref({});
const payment_method = ref("bank_transfer");
const requested_delivery_date = ref(null);
let payment_proof = ref(null);

// Refs
const fileInput = ref(null);
const imagePreview = ref(null);

const minDate = computed(() => {
    const today = new Date();
    return today.toISOString().split("T")[0];
});

const handleFileUpload = (event) => {
    const file = event.target.files[0];
    if (!file) return;

    // Validate file type
    if (!file.type.includes("image/")) {
        errors.payment_proof = "File harus berupa gambar";
        fileInput.value.value = "";
        return;
    }

    // Validate file size (2MB)
    if (file.size > 2 * 1024 * 1024) {
        errors.payment_proof = "Ukuran file maksimal 2MB";
        fileInput.value.value = "";
        return;
    }

    // Clear any previous errors
    errors.payment_proof = null;

    // Store file in data
    payment_proof = file;

    // Create preview
    imagePreview.value = URL.createObjectURL(file);
};

const removeImage = () => {
    payment_proof = null;
    imagePreview.value = null;
    fileInput.value.value = "";
};

const submitOrder = async () => {
    try {
        const result = await Swal.fire({
            title: "Konfirmasi Pesanan",
            text: "Apakah Anda yakin ingin melanjutkan ke pembayaran?",
            icon: "question",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Lanjutkan!",
        });

        if (result.isConfirmed) {
            // Create cart items array
            const rawCartItems = Object.values(cart.value).map((item) => ({
                product_id: item.product_id,
                quantity: item.quantity,
                price: item.price,
            }));

            const formData = new FormData();

            if (payment_proof) {
                formData.append("payment_proof", payment_proof);
            }

            formData.append(
                "requested_delivery_date",
                requested_delivery_date.value
            );
            formData.append("payment_method", payment_method.value);

            // Append each cart item individually to maintain array structure
            rawCartItems.forEach((item, index) => {
                formData.append(
                    `cart_items[${index}][product_id]`,
                    item.product_id
                );
                formData.append(
                    `cart_items[${index}][quantity]`,
                    item.quantity
                );
                formData.append(`cart_items[${index}][price]`, item.price);
            });

            const response = await axios.post("/api/orders", formData, {
                headers: {
                    "Content-Type": "multipart/form-data",
                },
            });

            Swal.fire(
                "Sukses",
                "Pesanan Anda telah berhasil dibuat!",
                "success"
            );

            fetchCart();
            location.reload();
        }
    } catch (error) {
        console.error("Error submitting order:", error);

        if (error.response && error.response.data) {
            Swal.fire(
                "Error",
                `Failed to submit order: ${JSON.stringify(
                    error.response.data.errors
                )}`,
                "error"
            );
        } else {
            Swal.fire("Error", "Failed to submit order", "error");
        }
    }
};
const fetchCart = async () => {
    try {
        const response = await axios.get("/api/cart");
        cart.value = response.data.data;
    } catch (error) {
        console.error("Error fetching cart:", error);
        Swal.fire("Error", "Failed to fetch cart data", "error");
    }
};

const confirmUpdateCart = async (id, quantity) => {
    if (quantity < 1) return;

    try {
        const result = await Swal.fire({
            title: "Update Quantity",
            text: "Are you sure you want to update the quantity?",
            icon: "question",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, update it!",
        });

        if (result.isConfirmed) {
            await updateCart(id, quantity);
        }
    } catch (error) {
        console.error("Error in confirmUpdateCart:", error);
        Swal.fire("Error", "Failed to update cart", "error");
    }
};

const updateCart = async (id, quantity) => {
    try {
        const response = await axios.post(`/api/cart/update/${id}`, {
            quantity,
        });
        cart.value = response.data.data;
        Swal.fire("Success", "Cart updated successfully", "success");
        fetchCart();
    } catch (error) {
        console.error("Failed to update cart", error);
        Swal.fire("Error", "Failed to update cart", "error");
    }
};

const confirmRemoveFromCart = async (id) => {
    try {
        const result = await Swal.fire({
            title: "Remove Item",
            text: "Are you sure you want to remove this item from the cart?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, remove it!",
        });

        if (result.isConfirmed) {
            await removeFromCart(id);
        }
    } catch (error) {
        console.error("Error in confirmRemoveFromCart:", error);
        Swal.fire("Error", "Failed to remove item from cart", "error");
    }
};

const removeFromCart = async (id) => {
    try {
        const response = await axios.post(`/api/cart/remove/${id}`);
        cart.value = response.data.data;
        Swal.fire(
            "Removed!",
            "The item has been removed from your cart.",
            "success"
        );
        fetchCart();
    } catch (error) {
        console.error("Failed to remove item from cart", error);
        Swal.fire("Error", "Failed to remove item from cart", "error");
    }
};
const totalPrice = computed(() => {
    if (!cart.value) return 0;
    return Object.values(cart.value).reduce(
        (acc, item) => acc + item.price * item.quantity,
        0
    );
});

const formatCurrency = (value) => {
    return new Intl.NumberFormat("id-ID", {
        style: "currency",
        currency: "IDR",
    }).format(value);
};

// Modal
const isModalVisible = ref(false);
import bcaLogo from "@/assets/bca.jpg";
import briLogo from "@/assets/bri.jpg";
import dana from "@/assets/dana.png";
import ovo from "@/assets/ovo.jpg";
import shopee from "@/assets/shopee.png";
import qrisImage from "@/assets/qris.png";
// Assets
// Payment Options
const bankOptions = [
    {
        name: "BCA",
        logo: bcaLogo,
        accountNumber: "1234567890",
        instructions:
            "Transfer to BCA account and include order number as reference",
    },
    {
        name: "BRI",
        logo: briLogo,
        accountNumber: "0987654321",
        instructions:
            "Transfer to BRI account and include order number as reference",
    },
];

const eWalletOptions = [
    {
        name: "Yupun Dana",
        logo: dana,
        number: "081234567890",
    },
    {
        name: "Yupun Shopee Pay",
        logo: shopee,
        number: "081234567890",
    },
    {
        name: "Yupun OVO",
        logo: ovo,
        number: "081234567890",
    },
];

// Computed
const modalTitle = computed(() => {
    const titles = {
        bank_transfer: "Bank Transfer Options",
        e_wallet: "E-Wallet Options",
        qris: "QRIS Payment",
        cash_on_delivery: "Cash on Delivery",
    };
    return titles[payment_method.value] || "Payment Method";
});

// Methods
const showPaymentModal = () => {
    if (payment_method.value) {
        isModalVisible.value = true;
    }
};

const closeModal = () => {
    isModalVisible.value = false;
};

// Selection Handlers
const selectBankMethod = (bank) => {
    // Handle bank method selection
    console.log("Selected Bank:", bank);
    // You can emit an event or call a method to process the selection
    closeModal();
};

const selectEWalletMethod = (wallet) => {
    // Handle e-wallet method selection
    console.log("Selected E-Wallet:", wallet);
    // You can emit an event or call a method to process the selection
    closeModal();
};

onMounted(() => {
    fetchCart();
});
</script>
<style scoped>
/* Modal Transition Styles */
.modal-enter-active,
.modal-leave-active {
    transition: opacity 0.3s ease;
}

.modal-enter-from,
.modal-leave-to {
    opacity: 0;
}
</style>
