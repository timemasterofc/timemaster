<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <GuestLayout>
        <div class="hidden xl:flex flex-col min-h-screen">
            <a href="" class="-intro-x flex items-center pt-5">
                <img
                    alt="Midone Tailwind HTML Admin Template"
                    class="w-6"
                    src="@/assets/images/logo.svg"
                />
                <span class="text-white text-lg ml-3"> Rubick </span>
            </a>
            <div class="my-auto">
                <img
                    alt="Midone Tailwind HTML Admin Template"
                    class="-intro-x w-1/2 -mt-16"
                    src="@/assets/images/illustration.svg"
                />
                <div
                    class="-intro-x text-white font-medium text-4xl leading-tight mt-10"
                >
                    A few more clicks to <br />
                    sign in to your account.
                </div>
                <div
                    class="-intro-x mt-5 text-lg text-white text-opacity-70 dark:text-slate-400"
                >
                    Manage all your e-commerce accounts in one place
                </div>
            </div>
        </div>

        <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
            <div
                class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto"
            >
                <h2
                    class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left"
                >
                    Sign In
                </h2>
                <div class="intro-x mt-2 text-slate-400 xl:hidden text-center">
                    A few more clicks to sign in to your account. Manage all your
                    e-commerce accounts in one place
                </div>
                <form @submit.prevent="submit">
                    <div class="intro-x mt-8">
                        <input
                            type="text"
                            class="intro-x login__input form-control py-3 px-4 block"
                            placeholder="Email"
                            v-model="form.email"
                        />
                        <InputError class="mt-2" :message="form.errors.email" />
                        <input
                            type="password"
                            class="intro-x login__input form-control py-3 px-4 block mt-4"
                            placeholder="Password"
                            v-model="form.password"
                        />
                        <InputError class="mt-2" :message="form.errors.password" />
                    </div>
                    <div
                        class="intro-x flex text-slate-600 dark:text-slate-500 text-xs sm:text-sm mt-4"
                    >
                        <div class="flex items-center mr-auto">
                            <input
                                id="remember-me"
                                type="checkbox"
                                class="form-check-input border mr-2"
                                v-model="form.remember"
                            />
                            <label class="cursor-pointer select-none" for="remember-me"
                            >Remember me</label
                            >
                        </div>
                        <Link
                            v-if="canResetPassword"
                            :href="route('password.request')"
                        >
                            Forgot your password?
                        </Link>
                    </div>
                    <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                        <button
                            class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top"
                        >
                            Login
                        </button>
                        <button
                            class="btn btn-outline-secondary py-3 px-4 w-full xl:w-32 mt-3 xl:mt-0 align-top"
                        >
                            Register
                        </button>
                    </div>
                </form>
                <div
                    class="intro-x mt-10 xl:mt-24 text-slate-600 dark:text-slate-500 text-center xl:text-left"
                >
                    By signin up, you agree to our
                    <a class="text-primary dark:text-slate-200" href=""
                    >Terms and Conditions</a
                    >
                    &
                    <a class="text-primary dark:text-slate-200" href=""
                    >Privacy Policy</a
                    >
                </div>
            </div>
        </div>

<!--        <form @submit.prevent="submit">-->
<!--            <div>-->
<!--                <InputLabel for="email" value="Email" />-->

<!--                <TextInput-->
<!--                    id="email"-->
<!--                    type="email"-->
<!--                    class="mt-1 block w-full"-->
<!--                    v-model="form.email"-->
<!--                    required-->
<!--                    autofocus-->
<!--                    autocomplete="username"-->
<!--                />-->

<!--                <InputError class="mt-2" :message="form.errors.email" />-->
<!--            </div>-->

<!--            <div class="mt-4">-->
<!--                <InputLabel for="password" value="Password" />-->

<!--                <TextInput-->
<!--                    id="password"-->
<!--                    type="password"-->
<!--                    class="mt-1 block w-full"-->
<!--                    v-model="form.password"-->
<!--                    required-->
<!--                    autocomplete="current-password"-->
<!--                />-->

<!--                <InputError class="mt-2" :message="form.errors.password" />-->
<!--            </div>-->

<!--            <div class="block mt-4">-->
<!--                <label class="flex items-center">-->
<!--                    <Checkbox name="remember" v-model:checked="form.remember" />-->
<!--                    <span class="ml-2 text-sm text-gray-600">Remember me</span>-->
<!--                </label>-->
<!--            </div>-->

<!--            <div class="flex items-center justify-end mt-4">-->
<!--                <Link-->
<!--                    v-if="canResetPassword"-->
<!--                    :href="route('password.request')"-->
<!--                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"-->
<!--                >-->
<!--                    Forgot your password?-->
<!--                </Link>-->

<!--                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">-->
<!--                    Log in-->
<!--                </PrimaryButton>-->
<!--            </div>-->
<!--        </form>-->
    </GuestLayout>
</template>
