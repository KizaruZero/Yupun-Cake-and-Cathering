<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Register" />

        <div class="min-h-screen flex items-center justify-center bg-gradient-to-b from-orange-50 to-white/30 backdrop-blur-lg">
            <div class="absolute inset-10 overflow-hidden" style="pointer-events: none">
                <div class="absolute top-20 left-10 w-72 h-72 bg-orange-200 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob"></div>
                <div class="absolute top-40 right-10 w-72 h-72 bg-yellow-200 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob animation-delay-2000"></div>
                <div class="absolute bottom-10 left-1/2 w-72 h-72 bg-pink-200 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob animation-delay-4000"></div>
            </div>
            
            <div class="bg-white backdrop-blur-lh w-3/4 flex shadow-lg rounded-lg overflow-hidden">
                <!-- Left Side (Form) -->
                <div class="w-1/2 p-8">
                    <h2 class="text-3xl font-semibold mb-2">Create Account</h2>
                    <p class="text-sm text-gray-600 mb-6">Join us and start your journey</p>

                    <form @submit.prevent="submit">
                        <div class="mb-4">
                            <InputLabel for="name" value="Name" />
                            <TextInput
                                id="name"
                                type="text"
                                class="mt-1 block w-full rounded-md shadow-sm bg-gradient-to-b from-orange-50 to-white/30 backdrop-blur-lh"
                                v-model="form.name"
                                required
                                autofocus
                                autocomplete="name"
                            />
                            <InputError class="mt-2" :message="form.errors.name" />
                        </div>

                        <div class="mb-4">
                            <InputLabel for="email" value="Email" />
                            <TextInput
                                id="email"
                                type="email"
                                class="mt-1 block w-full rounded-md shadow-sm bg-gradient-to-b from-orange-50 to-white/30 backdrop-blur-lh"
                                v-model="form.email"
                                required
                                autocomplete="username"
                            />
                            <InputError class="mt-2" :message="form.errors.email" />
                        </div>

                        <div class="mb-4">
                            <InputLabel for="password" value="Password" />
                            <TextInput
                                id="password"
                                type="password"
                                class="mt-1 block w-full rounded-md shadow-sm bg-gradient-to-b from-orange-50 to-white/30 backdrop-blur-lh"
                                v-model="form.password"
                                required
                                autocomplete="new-password"
                            />
                            <InputError class="mt-2" :message="form.errors.password" />
                        </div>

                        <div class="mb-4">
                            <InputLabel for="password_confirmation" value="Confirm Password" />
                            <TextInput
                                id="password_confirmation"
                                type="password"
                                class="mt-1 block w-full rounded-md shadow-sm bg-gradient-to-b from-orange-50 to-white/30 backdrop-blur-lh"
                                v-model="form.password_confirmation"
                                required
                                autocomplete="new-password"
                            />
                            <InputError class="mt-2" :message="form.errors.password_confirmation" />
                        </div>

                        <div class="flex items-center justify-between mt-6">
                            <Link
                                :href="route('login')"
                                class="px-8 py-3 bg-gradient-to-r from-yellow-500 to-orange-500 text-white rounded-full font-medium transform transition-all duration-300 hover:scale-105 hover:bg-orange-50"
                            >
                                Already registered?
                            </Link>

                            <PrimaryButton
                                class="px-8 py-3 bg-gradient-to-r from-yellow-500 to-orange-500 text-white rounded-full font-medium transform transition-all duration-300 hover:scale-105 hover:bg-orange-50"
                                :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing"
                            >
                                Register
                            </PrimaryButton>
                        </div>
                    </form>
                </div>

                <!-- Right Side (Image) -->
                <div class="w-1/2 relative">
                    <img
                        src="@/assets/nasigoreng.jpg"
                        alt=""
                        class="object-cover w-full h-full"
                    />
                    <div class="absolute inset-0 bg-black opacity-25"></div>
                    <div class="absolute bottom-4 left-4 text-white">
                        <h3 class="text-3xl font-semibold"></h3>
                        <p class="text-sm mt-2"></p>
                    </div>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>

<style scoped>
/* Optional: Add any additional styling here if needed */
</style>
