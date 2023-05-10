<template>
  <Head title="Infracción" />
  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Infracción
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Buton Create -->

        <div
          class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"
        >
          <div class="p-6 text-gray-900 dark:text-gray-100">
            You're logged in!
          </div>
        </div>

        <form @submit.prevent="consultar" class="py-4">
          <label
            for="default-search"
            class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white"
            >Search</label
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
              id="default-search"
              v-model="form.search"
              class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              placeholder="Ingrese una placa"
            />
            <button
              type="submit"
              class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            >
              Search
            </button>
          </div>
        </form>

        <div class="relative overflow-x-auto py-4" v-if="infraccion ? true :  hidden">
          <table
            class="w-full text-sm text-left text-gray-500 dark:text-gray-400"
          >
            <thead
              class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
            >
              <tr>
                <th scope="col" class="px-6 py-3">Usuario</th>
                <th scope="col" class="px-6 py-3">Placa</th>
                <th scope="col" class="px-6 py-3">Papeleta</th>
                <th scope="col" class="px-6 py-3">Licencia</th>
                <th scope="col" class="px-6 py-3">Monto</th>
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
                <td class="px-6 py-4">{{ infraccion.cod_papeleta }}</td>
                <td class="px-6 py-4">{{ infraccion.licencia }}</td>
                <td class="px-6 py-4">{{ infraccion.monto_final }}</td>

              </tr>
            </tbody>
          </table>
        </div>
        <div class="text-red-700" v-if="infraccion == 0"> No se encontrado ningun registro en la Base de datos</div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm, router } from "@inertiajs/vue3";
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
