<template>
    <form @submit.prevent="login">
        <!-- centered div -->
        <div class="w-1/2 mx-auto"> 
            <div>
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
                <button class="std_button w-full" type="submit">Login</button>
            </div>
        </div>
    </form>
</template>

<script setup>

    import { useForm } from '@inertiajs/vue3';

    const form = useForm({
        email:null,
        password: null
    })

    const login = () => form.post(route('login.store'))

</script>