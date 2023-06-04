<template>
    <Box :class="{'border-green-500 border-2 shadow-md':offer.accepted_at}">
        <template #header>
            <section class="flex items-center justify-between">
                <div>Offer # {{ offer.id }}</div>
                <div>
                     <span 
                         v-if="offer.accepted_at"
                         class="dark:bg-green-900 dart:text-green-200 bg-green-200 text-green-900 p-1 rounded-md uppercase ml-2 text-xs"
                     >
                         accepted
                     </span>
                     <span v-if="offer.rejected_at"  
                         class="dark:bg-red-900 dart:text-red-200 bg-red-200 text-red-900 p-1 rounded-md uppercase ml-2 text-xs"
                     >
                         rejected

                     </span>
                 </div>
            </section>          
        </template>
        
        <section class="flex items-center justify-between">
            <div>
                <Price :price="offer.amount" class="text-xl"/>
                <div class="text-gray-500">
                    Difference:<Price :price="difference"/>
                </div>
                <div class="text-gray-500 text-sm">
                    Made by {{ offer.bidder.name }}
                </div>
                <div class="text-gray-500 text-sm">
                    Made on {{ madeOn }}
                </div>
            </div>
            <div>
                <Link 
                    v-if="!isSold"
                    :href="route('realtor.offer.accept', {offer:offer.id})" 
                    class="btn-outline text-xs font-medium"
                    method="put"
                    as="button"
                >
                    Accept
                </Link>
            </div>

        </section>
    </Box>
</template>

<script setup>
    import Box from '@/Components/UI/Box.vue'
    import { Link } from '@inertiajs/vue3'
    import Price from '@/Components/UI/Price.vue'
    import {computed} from 'vue'

    const props = defineProps({
        listingPrice: Number,
        offer:Object,
        isSold: Boolean,
    })

    const difference = computed(
        () => props.offer.amount - props.listingPrice
    )
    const madeOn = computed(
        () => new Date(props.offer.created_at).toDateString()
    )

</script>