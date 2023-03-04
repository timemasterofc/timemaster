<template>
    <AuthenticatedLayout>
        <div class="intro-y flex justify-between items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">Form Layout</h2>
            <Link :href="route('admin.users.create')">
                Cadastrar usuário
            </Link>
        </div>
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="col-span-12">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th class="whitespace-nowrap">Nome</th>
                        <th class="whitespace-nowrap">E-mail</th>
                        <th class="whitespace-nowrap">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="user in users.data">
                        <td>{{user.name}}</td>
                        <td>{{user.email}}</td>
                        <td>
                            <Link
                                :href="route('admin.users.destroy', user.id)"
                                method="delete"
                            >
                                <component is="TrashIcon"/>
                            </Link>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import {Link} from '@inertiajs/vue3';

defineProps({ users: Array });
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";


</script>

<style scoped>

</style>
