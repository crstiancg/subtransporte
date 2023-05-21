<script setup>
import Fronted from "@/Layouts/Frontend.vue";
import { Head, useForm, router } from "@inertiajs/vue3";
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
<template>
  <Fronted>
    <Section class="w-full mx-auto px-4 sm:px-6 lg:px-8 pb-24 py-40 h-[50vh]">
      <h1
        class="font-extrabold dark:text-gray-100 text-4xl text-center mt-10 mb-6"
      >
        Búsqueda de Infracción
      </h1>

      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Buton Create -->

        <div
          class="bg-white shadow-[6px_0px_24px_0px_#cbd5e0] dark:shadow-sm rounded-lg py-2 dark:bg-gray-800"
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
                    class="block lg:w-80 w-80 p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
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

            <div
              class="relative overflow-x-auto py-4"
              v-if="infraccion ? true : hidden"
            >
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
                    <th scope="col" class="px-6 py-3">Fecha de infracción</th>
                    <th scope="col" class="px-6 py-3">Codigo</th>
                  </tr>
                </thead>
                <tbody>
                  <tr
                    v-for="infraccion in infraccion"
                    :key="infraccion.id"
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                  >
                    <td class="px-6 py-4">{{ infraccion.datos_conductor }}</td>
                    <td
                      scope="row"
                      class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                    >
                      {{ infraccion.cod_placa }}
                    </td>
                    <td class="px-6 py-6">{{ infraccion.cod_papeleta }}</td>
                    <td class="px-6 py-6">{{ infraccion.fecha_inf }}</td>
                    <td class="px-6 py-6">{{ infraccion.cod_infraccion }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div
              v-if="infraccion == 0"
              class="text-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800"
              role="alert"
            >
              <svg
                aria-hidden="true"
                class="flex-shrink-0 inline w-5 h-5 mr-3"
                fill="currentColor"
                viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  fill-rule="evenodd"
                  d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                  clip-rule="evenodd"
                ></path>
              </svg>
              <span class="sr-only">Info</span>
              <div>
                <span class="font-medium">Alerta!</span> No se encontró ningún
                registro en la Base de Datos
              </div>
            </div>
          </div>
        </div>

        <div
          v-show="infraccion ? true : false"
          class="bg-gray-800 dark:bg-gray-800 shadow-[4px_1px_5px_1px_#a0aec0] dark:shadow-sm rounded-lg mt-4"
        >
          <div
            class="p-5 -mt-2 text-center text-sm text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800"
            role="alert"
          >
            <svg
              aria-hidden="true"
              class="flex-shrink-0 inline w-5 h-5 mr-3"
              fill="currentColor"
              viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                fill-rule="evenodd"
                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                clip-rule="evenodd"
              ></path>
              
            </svg>
            <span class="sr-only">Info</span>
            <div>
              <span class="font-medium">Info Alerta!</span> Mayor información en la
              Gerencia de Transportes.
            </div>
          </div>
        </div>
      </div>
    </Section>
  </Fronted>
</template>