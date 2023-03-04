<script setup>
import {onMounted, ref} from 'vue';
import dom from "@left4code/tw-starter/dist/js/dom";
onMounted(() => {
    dom("body").removeClass("error-page").removeClass("login").addClass("main");
});
import Sidebar from "@/Layouts/Sidebar.vue";

const showingNavigationDropdown = ref(false);
</script>

<template>
    <div class="py-2">
        <div class="flex mt-[4.7rem] md:mt-0">
            <Sidebar/>

            <!-- Page Heading -->
<!--            <header class="bg-white shadow" v-if="$slots.header">-->
<!--                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">-->
<!--                    <slot name="header" />-->
<!--                </div>-->
<!--            </header>-->

            <!-- Page Content -->
            <div class="content">
                <slot />
            </div>
        </div>
    </div>
</template>
