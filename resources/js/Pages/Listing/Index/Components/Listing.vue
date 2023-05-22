<template>
    <Box :key="listing.id">
        <Link :href="route('listing.show', {listing: listing.id})">
        <div class="flex items-center">
            <Price :price="listing.price" class="text-2xl font-bold"/>
            <div class="text-xs text-gray-500 ml-2">
                <Price :price="monthlyPayment"/>/pm
            </div>
        </div>
            <ListingSpace  :listing="listing" class="text-lg"/>
            <ListingAdress :listing="listing" class="text-gray-400"/>
        </Link>&nbsp;
        <div v-if="user">
            <div>
                <Link :href="route('listing.edit', {listing: listing.id})">edit</Link>
            </div>
            <div>
                <Link :href="route('listing.destroy', {listing: listing.id})" method="DELETE" as="button">Delete</Link>
            </div>
        </div>
    </Box>
</template>


<script setup>
    import {Link, usePage} from '@inertiajs/vue3'
    import {computed} from 'vue'
    import ListingAdress from '@/Components/ListingAdress.vue';
    import Box from '@/Components/UI/Box.vue';
    import ListingSpace from '@/Components/ListingSpace.vue';
    import Price from '@/Components/UI/Price.vue';
    import {useMonthlyPayment} from '@/Composables/useMonthlyPayment'

    const props = defineProps({
        listing: Object,
    })

    const page = usePage()

    const user = computed(
        () => page.props.user
    )

    const { monthlyPayment } = useMonthlyPayment(props.listing.price, 2.5 , 25)


</script>