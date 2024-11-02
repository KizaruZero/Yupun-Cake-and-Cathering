<template>
    <GuestLayout>
        <div class="container mx-auto px-4 py-8">
            <h1 class="text-3xl font-bold mb-8 text-gray-800">
                Keranjang Belanja Anda
            </h1>
            <div
                v-if="!cart || Object.keys(cart).length === 0"
                class="text-center py-8"
            >
                <p class="text-xl text-gray-600">Keranjang Anda kosong</p>
            </div>
            <div v-else class="bg-white rounded-lg shadow-md p-6">
                <div
                    v-for="(item, id) in cart"
                    :key="id"
                    class="flex items-center justify-between border-b py-4"
                >
                    <div class="flex items-center space-x-4">
                        <img
                            :src="`/storage/${item.image}`"
                            :alt="item.name"
                            class="w-16 h-16 object-cover rounded"
                        />
                        <div>
                            <h2 class="text-lg font-semibold text-gray-800">
                                {{ item.name }}
                            </h2>
                            <p class="text-gray-600">
                                {{ formatCurrency(item.price) }}
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-2">
                        <button
                            @click="confirmUpdateCart(id, item.quantity - 1)"
                            class="text-gray-500 hover:text-gray-700"
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
                                    d="M20 12H4"
                                />
                            </svg>
                        </button>
                        <span class="text-gray-800 font-semibold">{{
                            item.quantity
                        }}</span>
                        <button
                            @click="confirmUpdateCart(id, item.quantity + 1)"
                            class="text-gray-500 hover:text-gray-700"
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
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"
                                />
                            </svg>
                        </button>
                        <button
                            @click="confirmRemoveFromCart(id)"
                            class="ml-4 text-red-500 hover:text-red-700"
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
                <div class="mt-4">
                    <label
                        for="payment_method"
                        class="block text-sm font-medium text-gray-700"
                        >Pilih Metode Pembayaran</label
                    >
                    <select
                        v-model="payment_method"
                        id="payment_method"
                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    >
                        <option value="credit_card">Kartu Kredit</option>
                        <option value="bank_transfer">Transfer Bank</option>
                        <option value="cash_on_delivery">
                            Bayar di Tempat
                        </option>
                    </select>
                </div>
                <!-- Date -->
                <div class="mt-4">
                    <label for="date" class="block" name="date">Date</label>
                    <input
                        v-model="requested_delivery_date"
                        type="date"
                        id="requested_delivery_date"
                        class="mt-1 p-2 border rounded"
                        :min="minDate"
                        required
                    />
                </div>
                <div class="payment_proof">
                    <label
                        for="payment_proof"
                        class="block font-medium text-gray-700"
                    >
                        Bukti Pembayaran
                    </label>

                    <input
                        type="file"
                        id="payment_proof"
                        class="mt-1 p-2 border rounded w-full"
                        accept="image/*"
                        @change="handleFileUpload"
                        ref="fileInput"
                        :class="{ 'border-red-500': errors.payment_proof }"
                    />

                    <div v-if="imagePreview" class="mt-2">
                        <img
                            :src="imagePreview"
                            alt="Preview"
                            class="h-32 object-cover rounded"
                        />
                        <button
                            type="button"
                            @click="removeImage"
                            class="mt-1 text-red-600 text-sm"
                        >
                            Hapus Gambar
                        </button>
                    </div>

                    <p
                        v-if="errors.payment_proof"
                        class="mt-1 text-red-500 text-sm"
                    >
                        {{ errors.payment_proof }}
                    </p>
                </div>

                <div class="mt-8 flex justify-between items-center">
                    <p class="text-xl font-semibold text-gray-800">
                        Total: {{ formatCurrency(totalPrice) }}
                    </p>
                    <button
                        @click="submitOrder"
                        class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 transition duration-300"
                    >
                        Lanjutkan ke Pembayaran
                    </button>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>

<script setup>
import { ref, onMounted, computed } from "vue";
import axios from "axios";
import Swal from "sweetalert2";
import GuestLayout from "@/Layouts/GuestLayout.vue";

const cart = ref(null);
const errors = ref({});
const payment_method = ref("credit_card");
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

onMounted(() => {
    fetchCart();
});
</script>
