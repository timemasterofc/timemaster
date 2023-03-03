<script setup>
import { onMounted } from "vue";
import dom from "@left4code/tw-starter/dist/js/dom";

onMounted(() => {
    dom("body").removeClass("main").removeClass("error-page").addClass("login");
});
</script>

<template>
    <div class="container sm:px-10">
        <div class="block xl:grid grid-cols-2 gap-4">
            <slot/>
        </div>
    </div>
</template>
