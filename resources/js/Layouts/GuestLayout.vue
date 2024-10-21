<template>
    <div class="flex flex-col min-h-screen bg-gray-100">
        <NavbarView />
        <!-- Content Section -->
        <div class="flex-grow p-6 bg-white">
            <div class="mx-auto">
                <slot />
            </div>
        </div>
        <FooterView class="flex-shrink-0" />
    </div>
</template>
<script setup>
import NavbarView from "@/frontend-components/NavbarView.vue";
import FooterView from "@/frontend-components/FooterView.vue";
</script>
