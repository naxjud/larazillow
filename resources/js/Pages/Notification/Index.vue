<template>
    <h1 class="text-3xl mb-4">Your Notifications</h1>
    <section v-if="count" class="text-gray-700 dark:text-gray-400">
        <div v-for="(notification, index) in props.notifications.data" :key="notification.id" class="border-b border-gray-200 dark:border-gray-800 py-4 flex justify-between items-center">
        
            <div>
                <span v-if="notification.type==='App\\Notifications\\OfferMade'">
                    Offer <Price :price="notification.data.amount"/> for 
                    <Link :href="route('realtor.listing.show',{listing: notification.data.listing_id})"
                        class="text-indigo-600 dark:text-indigo-400">
                        Listing
                    </Link> was made.
                </span>
            </div>
            <div>
                <Link :href="route('notification.seen',{ notification:notification.id })" 
                    v-if="!notification.read_at" 
                    class="btn-outline text-xs font-medium uppercase" 
                    method="put" 
                    as="button"
                >
                mark as read
                </Link>
            </div>
        </div>
    </section>
    <EmptyState v-else>
        No Notifications yet!
    </EmptyState>

    <section v-if="count" 
        class="w-full flex justify-center mt-4 mb-8" 
    >
        <Pagination :links="props.notifications.links" />
    </section>
</template>

<script setup>
    import EmptyState from '@/Components/UI/EmptyState.vue'
    import Price from '@/Components/UI/Price.vue'
    import {Link} from '@inertiajs/vue3'
    import {computed} from 'vue'
    import Pagination from '@/Components/UI/Pagination.vue'

    const props = defineProps (
        {
            notifications:Object
        }
    )

    const count = computed(
        () => props.notifications.data.length
    )


</script>