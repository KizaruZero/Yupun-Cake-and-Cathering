<template>
    <div
        class="flex flex-col min-h-screen bg-gradient-to-b from-orange-50 to-white"
    >
        <NavbarView />
        <!-- Content Section -->
        <div class="flex-grow">
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
