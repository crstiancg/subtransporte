<script setup>
import Fronted from "@/Layouts/Frontend.vue";
import { useForm, Link } from "@inertiajs/vue3";
import { ref, onMounted, watch } from "vue";
// import TextInput from "@/Components/TextInput.vue";
// import { Head, , useForm } from '@inertiajs/vue3';

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
    <Section class="w-full mx-auto px-4 sm:px-6 lg:px-8 pb-24 py-20 h-[50vh]">
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
        Vehículo Autorizado Gtsv
      </h1>

      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Buton Create -->
        <div
          class="bg-white shadow-[6px_0px_24px_0px_#cbd5e0] dark:shadow-sm rounded-lg py-2 dark:bg-gray-800"
        >
        <div class="lg:grid justify-items-center m-2">
          <div class="flex items-center justify-end mt-4">
            <Link
            :href="route('licencias.index')"
             class="items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150" 
             >Limpiar</Link>
          </div>
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
                <h3 class="lg:text-3xl text-lg font-medium mx-2">VEHICULO AUTORIZADO</h3>
              </div>
              <div class="mt-2 mb-4 text-sm">
                <div class="text-center">
                  <h1 class="font-bold lg:text-5xl text-3xl">{{ licencia.placa }} - {{licencia.codigo}}</h1>
                </div>
                <div>
                  <!-- <ul class="mt-1.5 ml-4 list-disc list-inside"> -->
                  <p class="lg:text-xl font-bold  dark:text-gray-300 text-gray-800">PROPIETARIO: <span class="font-semibold dark:text-teal-600 text-teal-600 lg:text-xl  text-xs">{{ licencia.nombre_conductor }}</span></p>
                  <p class="lg:text-xl font-bold  dark:text-gray-300 text-gray-800">EMPRESA: <span class="font-semibold dark:text-teal-600 text-teal-600 lg:text-xl  text-xs">{{ licencia.empresa }}</span></p>
                  <p class="lg:text-xl font-bold  dark:text-gray-300 text-gray-800">DIRECCIÓN: <span class="font-semibold dark:text-teal-600 text-teal-600 lg:text-xl  text-xs">{{ licencia.ruta }}</span></p>
                <!-- </ul> -->
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
                <h3 class="lg:text-3xl text-lg font-medium mx-4">
                  VEHICULO NO AUTORIZADO 
                </h3>
              </div>
            </div>
          </div>
        </div>
        <div
          v-show="licencia ? true : false"
          class="bg-gray-800 dark:bg-gray-800 shadow-[4px_1px_5px_1px_#a0aec0] dark:shadow-sm rounded-lg mt-4"
        >
          <div
            class="p-2 text-center text-sm text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800"
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
<script type="text/javascript">
document.oncontextmenu = function(){return false;}
</script>