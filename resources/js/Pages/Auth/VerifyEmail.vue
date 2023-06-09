<template>
    <div> You need to be verified first to see this
    </div>

    <div>
        <Link 
        :href="route('verification.send')" 
        as="button"
        method="post"
        class="text-indigo-600 dark:text-indigo-400"
        >
            Resend Verification Email
        </Link>
    </div>
</template>

<script setup>
    import {Link} from '@inertiajs/vue3'
</script>

