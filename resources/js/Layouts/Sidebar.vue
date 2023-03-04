<script setup>
import { Link } from "@inertiajs/vue3";
</script>

<template>
    <div>
        <nav class="side-nav">
            <Link
                :to="{ name: 'side-menu-dashboard-overview-1' }"
                tag="a"
                class="intro-x flex items-center pl-5 pt-4"
            >
                <img
                    alt="Midone Tailwind HTML Admin Template"
                    class="w-6"
                    src="@/assets/images/logo.svg"
                />
                <span class="hidden xl:block text-white text-lg ml-3"> Rubick </span>
            </Link>
            <div class="side-nav__devider my-6"></div>
            <ul>
                <!-- BEGIN: First Child -->
                <li>
                    <Link
                        class="side-menu"
                        :href="route('dashboard')"
                        :class="{ 'side-menu--active': $page.component.startsWith('Dashboard')}"
                    >
                        <div class="side-menu__icon">
                            <component is="HomeIcon"/>
                        </div>
                        <div class="side-menu__title">
                            Home
                        </div>
                    </Link>
                </li>

                <li>
                    <a
                        :href="route('admin.users.index')"
                        class="side-menu"
                        :class="{ 'side-menu--active': $page.component.startsWith('Admin/User') }"
                    >
                        <div class="side-menu__icon">
                            <component is="UserIcon"/>
                        </div>
                        <div class="side-menu__title">
                            Usuários
                        </div>
                    </a>
                </li>
                <!-- END: First Child -->
            </ul>
        </nav>
    </div>
</template>

<style scoped>

</style>
