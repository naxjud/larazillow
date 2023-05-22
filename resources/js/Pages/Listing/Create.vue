<template>
    <form @submit.prevent="create">
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
          <label class="">Price</label>
          <input type="text" v-model.number="form.price" class="input_field"/>
          <div v-if="form.errors.price" class="input_error">{{ form.errors.price }}</div>
        </div>
  
        <div class="col-span-6">
          <button type="submit" class="std_button w-full">Create</button>
        </div>
      </div>
    </form>
  </template>
  
<script setup>
import {reactive} from 'vue'
import {useForm} from '@inertiajs/vue3'

const form = useForm({
    beds: 0,
    baths: 0,
    area: 0,
    city: null,
    street: null,
    code: null,
    street_nr: null,
    price: 0
})

const create = () => form.post(route('listing.store'))
</script>

  <style scoped>
  label {
    margin-right: 2em;
  }
  
  div {
    padding: 2px
  }
  </style>