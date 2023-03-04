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
                <form @submit.prevent="form.post(route('admin.users.store'), {
                    preserveScroll: true,
                    onSuccess: () => form.reset('name', 'email', 'password'),
                })">
                    <div>
                        <label for="name" class="form-label">Nome</label>
                        <input
                            id="name"
                            type="text"
                            class="form-control"
                            v-model="form.name"
                        />
                    </div>
                    <div>
                        <label for="email" class="form-label">E-mail</label>
                        <input
                            id="email"
                            type="email"
                            class="form-control"
                            v-model="form.email"
                        />
                    </div>
                    <div>
                        <label for="password" class="form-label">Senha</label>
                        <input
                            id="password"
                            type="password"
                            class="form-control"
                            v-model="form.password"
                        />
                    </div>
                    <button>
                        Cadastrar
                    </button>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {useForm} from "@inertiajs/vue3";

const form = useForm({
    name: null,
    email: null,
    password:null
});
</script>

<style scoped>

</style>
