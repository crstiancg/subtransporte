<script setup>
import Fronted from "@/Layouts/Frontend.vue";
import { Head, useForm, router } from "@inertiajs/vue3";
import { ref, onMounted, watch } from "vue";
// import TextInput from "@/Components/TextInput.vue";

defineProps({
  licencia: Object,
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
  form.post(route("licencias.store"));
  // console.log(props);
};
</script>
      
<template>
  <Fronted>
    <Section class="w-full mx-auto px-4 sm:px-6 lg:px-8 pb-24 py-40 h-[50vh]">
      <!-- <div
        class="bg-red-300 dark:bg-red-600 overflow-hidden shadow-sm sm:rounded-lg mt-4"
      >
        <div
          class="text-center p-6 text-gray-900 font-extrabold dark:text-gray-100 text-4xl"
        >
          En fase de prueba
        </div>
      </div> -->
      <h1
        class="font-extrabold dark:text-gray-100 text-4xl text-center mt-10 mb-6"
      >
        Búsqueda de Licencia
      </h1>

      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Buton Create -->
        <div
          class="bg-white shadow-[6px_0px_24px_0px_#cbd5e0] dark:shadow-sm rounded-lg py-2 dark:bg-gray-800"
        >
          <div class="lg:grid justify-items-center m-2">
            <form @submit.prevent="consultar" class="py-4">
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
                  class="block w-full lg:w-80 p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
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
            v-if="licencia ? true : hidden"
          >
            <!-- probando -->
            <div
              id="alert-additional-content-3"
              class="grid justify-items-center p-4 mb-4 mt-4 text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800 lg:m-full m-2"
              role="alert"
              v-for="licencia in licencia"
              :key="licencia.id"
            >
              <div class="flex items-center">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="currentColor"
                  class="w-6 h-6"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                  />
                </svg>

                <span class="sr-only">Info</span>
                <h3 class="text-lg font-medium mx-2">Vehiculo Autorizado</h3>
              </div>
              <div class="mt-2 mb-4 text-sm">
                <div>
                  <h1 class="text-5xl font-bold">{{ licencia.cod_empresa }}</h1>
                  <!-- <ul class="mt-1.5 ml-4 list-disc list-inside">
                  <li class="text-xl font-bold dark:text-neutral-200">Licencia Ruc - <span class="font-semibold dark:text-emerald-500">{{ licencia.ruc }}</span></li>
                  <li class="text-xl font-bold dark:text-neutral-200">Licencia Representante - <span class="font-semibold dark:text-emerald-500">{{ licencia.ruc }}</span></li>
                  <li class="text-xl font-bold dark:text-neutral-200">Licencia Razon Social - <span class="font-semibold dark:text-emerald-500">{{ licencia.ruc }}</span></li>
                </ul> -->
                </div>
              </div>
            </div>
            <!-- fin -->
          </div>
          <div v-if="licencia == 0">
            <div
              id="alert-additional-content-2"
              class="grid justify-items-center p-4 m-2 text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800"
              role="alert"
            >
              <div class="flex items-center">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="currentColor"
                  class="w-6 h-6"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M12 9v3.75m0-10.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.75c0 5.592 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.57-.598-3.75h-.152c-3.196 0-6.1-1.249-8.25-3.286zm0 13.036h.008v.008H12v-.008z"
                  />
                </svg>

                <span class="sr-only">Info</span>
                <h3 class="text-2xl font-medium mx-4">
                  Vehículo no autorizado
                </h3>
              </div>
            </div>
          </div>
        </div>
        <div v-show="licencia ? true : false"
          class="bg-gray-800 dark:bg-gray-800 shadow-[4px_1px_5px_1px_#a0aec0] dark:shadow-sm rounded-lg mt-4"
        >
          <div class="p-6 text-white dark:text-gray-100 text-center">
            Mayor información en la Gerencia de Transportes
          </div>
        </div>
      </div>
    </Section>
  </Fronted>
</template>
    