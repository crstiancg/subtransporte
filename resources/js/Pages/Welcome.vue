<template>

<nav class="bg-white border-gray-200 dark:bg-gray-900">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="/" class="flex items-center">
        <img src="https://portal.munipuno.gob.pe/sites/default/files/LOGO%20MPP%202022_2.png" class="h-10 mr-3" alt="Municipalidad Logo" />
        <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Transportes</span>
    </a>
    <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
      <span class="sr-only">Open main menu</span>
      <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
    </button>
    <div class="hidden w-full md:block md:w-auto" id="navbar-default">
      <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
          <NavLink :href="route('infraccion.index')" :active="route().current('infraccion.index')"> Infraccion
          </NavLink>

          <NavLink :href="route('licencia.index')" :active="route().current('licencia.index')"> Licencia
          </NavLink>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
 
  <section class="w-full mx-auto px-4 sm:px-6 lg:px-8 pb-24">
        <h1 class="text-3xl text-center mt-10 font-semibold dark:text-gray-500 mb-6">
            Búsqueda de infracciones
        </h1>

          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Buton Create -->

        <div
          class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"
        >
        <div class="p-6 text-gray-900 dark:text-gray-100">

        <div class="flex justify-center">
          <form @submit.prevent="consultar" class="">
          <label
            for="default-search"
            class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white"
            >Ingrese una placa</label
          >
          <div class="relative">
            <div
              class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none"
            >
              <svg
                aria-hidden="true"
                class="w-5 h-5 text-gray-500 dark:text-gray-400"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                ></path>
              </svg>
            </div>
            <input
              type="search"
              v-model="form.search"
              class="block px-24 py-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              placeholder="Ingrese una placa"
            />
            <button
              type="submit"
              class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            >
              Buscar
            </button>
          </div>
        </form>
        </div>

        <div class="relative overflow-x-auto py-4" v-if="infraccion ? true :  hidden">
          <table
            class="w-full text-sm text-left text-gray-500 dark:text-gray-400"
          >
            <thead
              class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
            >
              <tr>
                <th scope="col" class="px-6 py-3">Conductor</th>
                <th scope="col" class="px-6 py-3">Placa</th>
                <th scope="col" class="px-6 py-3">Papeleta</th>
                <th scope="col" class="px-6 py-3">Licencia</th>
                <th scope="col" class="px-6 py-3">Codigo</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="infraccion in infraccion" :key="infraccion.id"
                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
              >

              <td class="px-6 py-4">{{ infraccion.dato_conductor }}</td>
                <td
                  scope="row"
                  class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                >{{ infraccion.cod_placa }}
                </td>
                <td class="px-6 py-6">{{ infraccion.cod_papeleta }}</td>
                <td class="px-6 py-6">{{ infraccion.licencia }}</td>
                <td class="px-6 py-6">{{ infraccion.monto_final }}</td>

              </tr>
            </tbody>
          </table>
        </div>
        <div class="dark:text-red-400 p-4 text-center" v-if="infraccion == 0"> No existe ningun registro de la placa</div>
        </div>
        </div>

        
        <div
          class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-4"
        >
          <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
            Mayor información en la subgerencia de transportes
          </div>
        </div>
      </div>

    </section>

</div>

<footer class="w-full bg-white shadow dark:bg-gray-800  fixed left-0 bottom-0 flex justify-center items-center">
    <div class="w-full mx-auto max-w-screen-xl p-4 md:flex md:items-center md:justify-center">
      <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 <a href="#" class="hover:underline">Subgerencia de Transporte™</a>. Todos los derechos reservados.
    </span>
    </div>
</footer>

</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm, router } from "@inertiajs/vue3";
import NavLink from '@/Components/NavLink.vue';

import { ref, onMounted, watch } from "vue";
import TextInput from "@/Components/TextInput.vue";

defineProps({
  infraccion: Object,
});

// const input = ref(null);
// const button = ref("hola");

const form = useForm({
  search: "",
});

// onMounted(() => {
//   console.log("holaaa xd ");
// });

// watch(input, () => {
//   console.log(input.value);
// });

const consultar = () => {
  form.post(route("infraccion.store"));
  // console.log(props);
};
</script>