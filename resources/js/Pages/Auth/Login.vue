<script setup>
import Checkbox from "@/Components/Checkbox.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.post(route("login"), {
        onFinish: () => form.reset("password"),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Log in" />

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <div
            class="min-h-screen flex items-center justify-center bg-gradient-to-b from-orange-50 to-white/30 backdrop-blur-lg"
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
            <div
                class="bg-white backdrop-blur-lh w-3/4 flex shadow-lg rounded-lg overflow-hidden"
            >
                <!-- Left Side (Form) -->
                <div class="w-1/2 p-8">
                    <h2 class="text-3xl font-semibold mb-2">Welcome back!</h2>
                    <p class="text-sm text-gray-600 mb-6">
                        The faster you fill up, the faster you get a ticket
                    </p>

                    <form @submit.prevent="submit">
                        <div class="mb-4">
                            <InputLabel for="email" value="Email" />
                            <TextInput
                                id="email"
                                type="email"
                                class="mt-1 block w-full rounded-md shadow-sm bg-gradient-to-b from-orange-50 to-white/30 backdrop-blur-lh"
                                v-model="form.email"
                                required
                                autofocus
                                autocomplete="username"
                            />
                            <InputError
                                class="mt-2"
                                :message="form.errors.email"
                            />
                        </div>

                        <div class="mb-4">
                            <InputLabel for="password" value="Password" />
                            <TextInput
                                id="password"
                                type="password"
                                class="mt-1 block w-full rounded-md shadow-sm bg-gradient-to-b from-orange-50 to-white/30 backdrop-blur-lh"
                                v-model="form.password"
                                required
                                autocomplete="current-password"
                            />
                            <InputError
                                class="mt-2"
                                :message="form.errors.password"
                            />
                        </div>

                        <div class="flex items-center mb-4">
                            <Checkbox
                                name="remember"
                                v-model:checked="form.remember"
                            />
                            <span class="ml-2 text-sm text-gray-600"
                                >Remember me</span
                            >
                        </div>

                        <div class="flex items-center justify-between">
                            <Link
                                v-if="canResetPassword"
                                :href="route('password.request')"
                                class="px-8 py-3 bg-gradient-to-r from-yellow-500 to-orange-500 text-white rounded-full font-medium transform transition-all duration-300 hover:scale-105 hover:bg-orange-50"
                            >
                                Forgot Password?
                            </Link>

                            <Link
                                class="px-8 py-3 bg-gradient-to-r from-yellow-500 to-orange-500 text-white rounded-full font-medium transform transition-all duration-300 hover:scale-105 hover:bg-orange-50"
                                :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing"
                                @click="submit"
                            >
                                Log in
                            </Link>
                        </div>
                    </form>

                    <p class="mt-6 text-sm text-center">
                        Don’t have an account?
                        <Link
                            href="/register"
                            class="px-6 py-2 ml-4 bg-gradient-to-r from-yellow-500 to-orange-500 text-white rounded-full font-medium transform transition-all duration-300 hover:scale-110 hover:bg-orange-50"
                        >
                            Sign Up
                        </Link>
                    </p>
                </div>

                <!-- Right Side (Image) -->
                <div class="w-1/2 relative">
                    <img
                        src="@/assets/makan.jpg"
                        alt="Karina"
                        class="object-cover w-full h-full"
                    />
                    <div class="absolute inset-0 bg-black opacity-25"></div>
                    <div class="absolute bottom-4 left-4 text-white">
                        <h3 class="text-3xl font-semibold">Karina</h3>
                        <p class="text-sm mt-2">
                            Aespa (에스파) is a South Korean girl group...
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>

<style scoped>
/* Optional: Add any additional styling here if needed */
</style>
