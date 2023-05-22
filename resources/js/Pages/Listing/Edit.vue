<template>
    <form @submit.prevent="update">
      <div class="flex flex-col sm:grid sm:grid-cols-6 gap-4">
        <div class="col-span-2">
          <label class="input_label">Beds</label>
          <input type="text" v-model.number="form.beds" id="beds" class="input_field"/>
          <div v-if="form.errors.beds" class="input_error">{{ form.errors.beds }}</div>
        </div>
  
        <div class="col-span-2">
          <label class="input_label">Baths</label>
          <input type="text" v-model.number="form.baths" class="input_field"/>
          <div v-if="form.errors.baths" class="input_error">{{ form.errors.baths }}</div>
        </div>
  
        <div class="col-span-2">
          <label class="input_label">Area</label>
          <input type="text" v-model.number="form.area" class="input_field"/>
          <div v-if="form.errors.area" class="input_error">{{ form.errors.area }}</div>
        </div>
  
        <div class="col-span-4">
          <label class="input_label">City</label>
          <input type="text" v-model="form.city" class="input_field"/>
          <div v-if="form.errors.city" class="input_error">{{ form.errors.city }}</div>
        </div>
  
        <div class="col-span-2">
          <label class="input_label">Post Code</label>
          <input type="text" v-model="form.code" class="input_field"/>
          <div v-if="form.errors.code" class="input_error">{{ form.errors.code }}</div>
        </div>
  
        <div class="col-span-4">
          <label class="input_label">Street</label>
          <input type="text" v-model="form.street" class="input_field"/>
          <div v-if="form.errors.street" class="input_error">{{ form.errors.street }}</div>
        </div>
  
        <div class="col-span-2">
          <label class="input_label">Street Nr</label>
          <input type="text" v-model.number="form.street_nr" class="input_field"/>
          <div v-if="form.errors.street_nr" class="input_error">{{ form.errors.street_nr }}</div>
        </div>
  
        <div class="col-span-6">
          <label class="input_label">Price</label>
          <input type="text" v-model.number="form.price" class="input_field"/>
          <div v-if="form.errors.price" class="input_error">{{ form.errors.price }}</div>
        </div>
  
        <div class="col-span-6">
          <button type="submit" class="std_button">Update</button>
        </div>

      </div>
    </form>
  </template>
  
<script setup>
import {reactive} from 'vue'
import {Link, useForm} from '@inertiajs/vue3'


const props = defineProps({
    listing: Object
})

const form = useForm({
    beds: props.listing.beds,
    baths: props.listing.baths,
    area: props.listing.area,
    city: props.listing.city,
    street: props.listing.street,
    code: props.listing.code,
    street_nr: props.listing.street_nr,
    price: props.listing.price
})

const update = () => form.put(route('listing.update',{listing: props.listing.id}))

</script>

  <style scoped>
  label {
    margin-right: 2em;
  }
  
  div {
    padding: 2px
  }
  </style>