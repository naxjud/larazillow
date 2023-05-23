<template>
    <form @submit.prevent="register">
        <!-- centered div -->
        <div class="w-1/2 mx-auto"> 
            <div>
                <label class="input_label">Name</label>
                <input  v-model="form.name" type="text" id="email" class="input_field">
                <div v-if="form.errors.name" class="input_error">{{form.errors.name}}</div>
            </div>
            <div class="mt-4">
                <label class="input_label">Email</label>
                <input  v-model="form.email" type="text" id="email" class="input_field">
                <div v-if="form.errors.email" class="input_error">{{form.errors.email}}</div>
            </div>
            <div class="mt-4">
                <label class="input_label">Password</label>
                <input v-model="form.password" type="password" id="password" class="input_field">
                <div v-if="form.errors.password" class="input_error">{{form.errors.password}}</div>
            </div>
            <div class="mt-4">
                <label class="input_label">Repeat Password</label>
                <input v-model="form.password_confirmation" type="password" id="password" class="input_field">
            </div>
            <div class="mt-4">
                <button class="std_button w-full" type="submit">Create Account</button>
            </div>
            <div class="mt-2 text-center">
                <Link :href="route('login')" class="text-sm text-gray-500">Already have an Account? click here!</Link>
            </div>
        </div>
    </form>
</template>

<script setup>

    import { useForm, Link } from '@inertiajs/vue3';

    const form = useForm({
        name:null,
        email:null,
        password: null,
        password_confirmation: null,
    })

    const register = () => form.post(route('user-account.store'))

</script>