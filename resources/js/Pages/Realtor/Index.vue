<template>
    <h1 class="text-3xl mb-4">Your Listings</h1>

    <section>
        <RealtorFilters :filters="filters"/>
    </section>

    <section v-if="listings.data.length"  class="grid grid-cols-1 lg:grid-cols-2 gap-2">
        <Box  v-for="listing in listings.data" :key="listing.id" :listing="listing" :class="{'border-dashed': listing.deleted_at,'border-2 border-green-300':listing.sold_at}">
            <div class="flex flex-col md:flex-row gap-2 md:items-center justify-between" >
                <div :class="{'opacity-25': listing.deleted_at}">
                    <div v-if="listing.sold_at" class="dark:bg-green-900 dart:text-green-200 bg-green-200 text-green-900 p-1 rounded-md uppercase ml-2 text-xs inline-block p-1 mb-2">Sold</div>
                    <div class="xl:flex items-center gap-2">
                        <Price :price="listing.price" class="text-2xl font-medium"/>
                        <ListingSpace :listing="listing"/>
                    </div>
                    <ListingAdress :listing="listing" class="text-gray-500"></ListingAdress>
                </div>
                <section>
                    <div class="flex items-center gap-1 text-gray-600 dark:text-gray-300">
                    <a 
                        class="btn-outline text-xs font-medium" 
                        :href="route('listing.show',{listing: listing.id})"
                        target="_blank"
                    >
                        Preview
                    </a>
                    <Link :href="route('realtor.listing.edit',{listing: listing.id})" class="btn-outline text-xs font-medium" as="button">Edit</Link>
                    <Link  v-if="!listing.deleted_at"  :href="route('realtor.listing.destroy',{listing: listing.id})" class="btn-outline text-xs font-medium text-red-500" as="button" method="delete">Delete</Link>
                    <Link  v-else class="btn-outline text-xs font-medium text-green-500" as="button" :href="route('realtor.listing.restore',{listing: listing.id})" method="put">Restore</Link>
                </div>
                <div class="mt-2">
                    <Link :href="route('realtor.listing.image.create',{listing: listing.id})" class="block w-full btn-outline text-xs font-medium text-center">Images ({{ listing.images_count }})</Link>
                </div>
                <div class="mt-2">
                    <Link :href="route('realtor.listing.show',{listing: listing.id})" class="block w-full btn-outline text-xs font-medium text-center">Offers ({{ listing.offers_count }})</Link>
                </div>
                </section>
            </div>
        </Box>
    </section>
    <EmptyState v-else>No listing yet</EmptyState>
    <section v-if="listings.data.length" class="w-full flex justify-center mt-4 mb-4">
        <Pagination :links="listings.links"></Pagination>
    </section>
    
</template>

<script setup>
    import {Link} from '@inertiajs/vue3';
    import Box from '@/Components/UI/Box.vue';
    import Price from '@/Components/UI/Price.vue';
    import ListingSpace from '@/Components/ListingSpace.vue';
    import ListingAdress from '@/Components/ListingAdress.vue';
    import RealtorFilters from '@/Pages/Realtor/Index/Components/RealtorFilters.vue'
    import Pagination from '@/Components/UI/Pagination.vue';
    import EmptyState from '@/Components/UI/EmptyState.vue';

    defineProps({
        listings: Object,
        filters: Object
    })
</script>