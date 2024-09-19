<script setup>
import NavbarView from "@/frontend-components/NavbarView.vue";
import FooterView from "@/frontend-components/FooterView.vue";
</script>

<template>
    <div class="flex flex-col min-h-screen">
        <NavbarView class="flex-shrink-0" />
        <main class="flex-grow">
            <div class="container mx-auto p-6">
                <slot />
            </div>
        </main>

        <FooterView class="flex-shrink-0" />
    </div>
</template>
