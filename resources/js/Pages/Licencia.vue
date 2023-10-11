<script setup>
// import Fronted from "@/Layouts/Frontend.vue";
import { useForm, Link, Head } from "@inertiajs/vue3";
import { ref, onMounted, watch } from "vue";
// import TextInput from "@/Components/TextInput.vue";
// import { Head, , useForm } from '@inertiajs/vue3';
import Fronted from "@/Layouts/Frontend.vue"
defineProps({
  licencia: Object,
});

const max = 6;

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
  <Head title="GTV" />
  <Fronted>
      <div class="relative px-4 pb-0 pt-0 md:pt-[70px] -mt-[150px] md:mt-0">
        <h1 class="max-w-[50rem] sm:max-w-[49rem] px-3 md:px-0 sm:text-5xl md:text-6xl text-4xl font-bold text-center text-gray-50 uppercase">Vehículo Autorizado
        </h1>
        <h2 class="max-w-[50rem] sm:max-w-[49rem]  z-10 font-semibold text-gray-400 mt-6 text-center px-4 text-lg">Gerencia de Transporte y Seguridad Vial </h2>
      </div>
      <form @submit.prevent="consultar" 
      class="flex relative z-[21] mx-autom mt-8 max-w-[550px] hover:scale-105 w-full shadow-lg bg-gray-300 overflow-visible rounded-full transition-transform focus-visible:ring-sky-400 focus-visible:border-sky-400">
      <input type="text" placeholder="Ingrese una placa" v-model="form.search" :maxlength="max" class="block w-full px-6 pl-10 py-4 pr-2 mr-px font-sans ouline-gray-200 font-normal  text-base border-none focus:ring-0 shadow-sm rounded-s-full bg-gray-300 text-dark-900 placeholder:text-gray-500">
      <button type="submit" class="flex items-center px-5 py-1.5  pr-7 text-base gap-1.5 font-sans font-semibold transition-colors border-none cursor-pointer bg-gray-00 hover:bg-gray-400 text-dark-800 group  rounded-e-full rounded-t-full rounded-s-full pointer "><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-dark-800 transition-colors"><path d="M21 21L14.9497 14.9497M14.9497 14.9497C16.2165 13.683 17 11.933 17 10C17 6.13401 13.866 3 10 3C6.13401 3 3 6.13401 3 10C3 13.866 6.13401 17 10 17C11.933 17 13.683 16.2165 14.9497 14.9497Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg><span>Buscar</span></button>
    </form>
    <div class="text-center" v-if="form.search.length>0 && form.search.length <= 5 ">
      <span class="text-green-400 text-sm">Ingrese su placa en el formato: AKF952</span>
    </div>

    <div class="relative" v-if="licencia ? true : hidden">
      <div class="bg-gray-800 dark:text-white max-w-md mx-auto rounded-xl shadow-xl overflow-hidden md:max-w-2xl m-5 hover:shadow-4xl hover:bg-gray-950 transition-all duration-500 ease-in-out">
        <div class="justify-center ">
          <div class="p-6" v-for="licencia in licencia"
          :key="licencia.id">
            <div class="text-center">
              <span class="text-3xl font-extrabold text-green-400">{{ licencia.placa }} - {{licencia.codigo}}</span>
            </div>
            <div class="uppercase tracking-wide text-xl text-green-500 font-semibold text-center">Información del vehiculo</div>
            <p class="block mt-1 text-lg leading-tight font-medium text-white uppercase">Propietario</p>
            <p class="mt-2 text-gray-400">{{ licencia.nombre_conductor }}</p>
            <p class="block mt-1 text-lg leading-tight font-medium text-white uppercase">Empresa</p>
            <p class="mt-2 text-gray-400">{{ licencia.empresa }}</p>
            <p class="block mt-1 text-lg leading-tight font-medium text-white uppercase">Dirección</p>
            <p class="mt-2 text-gray-400">{{ licencia.ruta }}</p>
            <div class="flex items-center justify-center p-2 space-x-4 lg:hidden">
              <button style="margin-right: 20px" class="text-red-500 hover:text-white">
                <div class="image">
                  <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M20 7L9.00004 18L3.99994 13" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                  </div>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div v-if="licencia == 0">
      <div class="card">
        <div class="icon">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-gray-300">
              <linearGradient id="gradientColor">
                  <stop offset="5%" stop-color="#5a0202"></stop>
                  <stop offset="95%" stop-color="#e81515"></stop>
              </linearGradient>
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M12 9v3.75m0-10.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.75c0 5.592 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.57-.598-3.75h-.152c-3.196 0-6.1-1.249-8.25-3.286zm0 13.036h.008v.008H12v-.008z"
                  />
            </svg>
        </div>
        <p class="title">Vehiculo no Autorizado</p>
        <div class="text-center">
          <span class="text-3xl font-extrabold text-red-400 uppercase">{{ form.search }}</span>
        </div>
        <p class="text">Mayor información en la Gerencia de Transportes.</p>
      </div>
    </div>
    
  <!-- <div class="error">
    <div class="error__icon">
        <svg fill="none" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="m13 13h-2v-6h2zm0 4h-2v-2h2zm-1-15c-1.3132 0-2.61358.25866-3.82683.7612-1.21326.50255-2.31565 1.23915-3.24424 2.16773-1.87536 1.87537-2.92893 4.41891-2.92893 7.07107 0 2.6522 1.05357 5.1957 2.92893 7.0711.92859.9286 2.03098 1.6651 3.24424 2.1677 1.21325.5025 2.51363.7612 3.82683.7612 2.6522 0 5.1957-1.0536 7.0711-2.9289 1.8753-1.8754 2.9289-4.4189 2.9289-7.0711 0-1.3132-.2587-2.61358-.7612-3.82683-.5026-1.21326-1.2391-2.31565-2.1677-3.24424-.9286-.92858-2.031-1.66518-3.2443-2.16773-1.2132-.50254-2.5136-.7612-3.8268-.7612z" fill="#393a37"></path></svg>
    </div>
    <div class="error__title">Info Alerta! Mayor información en la Gerencia de Transportes.</div>
  </div> -->
  </Fronted>
</template>

<style scoped>
.image {
  display: flex;
  margin-left: auto;
  margin-right: auto;
  background-color: #00be9e;
  flex-shrink: 0;
  justify-content: center;
  align-items: center;
  width: 2rem;
  height: 2rem;
  border-radius: 9999px;
  animation: animate .6s linear alternate-reverse infinite;
  transition: .6s ease;
}

.image svg {
  color: #00e3d0;
  width: 1rem;
  height: 1rem;
}

@keyframes animate {
  from {
    transform: scale(0.9);
  }

  to {
    transform: scale(1.3);
  }
}
.card {
  height: 270px;
  background-color: #1E293B;
  margin: 10px;
  border-radius: 8px;
  box-shadow: 0px 2px 10px #1E293B;
  border: 2px solid #1E293B;
  font-size: 16px;
  transition: all 0.3s ease;
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  font-family: 'Poppins', sans-serif;
}

.icon {
  margin: 0 auto;
  width: 100%;
  height: 80px;
  max-width: 80px;
  background: linear-gradient(90deg, #5a0202 0%, #e81515 40%, rgba(0, 0, 0, 0.28) 60%);
  border-radius: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  transition: all 0.8s ease;
  background-position: 0px;
  background-size: 200px;
}

.icon svg {
  fill: #3f010100;
}

.card .title {
  width: 100%;
  margin: 0;
  text-align: center;
  margin-top: 30px;
  color: white;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 4px;
}

.card .text {
  width: 80%;
  margin: 0 auto;
  font-size: 13px;
  text-align: center;
  margin-top: 20px;
  color: white;
  font-weight: 200;
  letter-spacing: 2px;
  opacity: 0;
  max-height: 0;
  transition: all 0.3s ease;
}

.card:hover {
  height: 270px;
  background-color: rgb(3 7 18);
}

.card:hover .text {
  transition: all 0.3s ease;
  opacity: 1;
  max-height: 40px;
}

.card:hover .icon {
  background-position: -120px;
  transition: all 0.3s ease;
}

.card:hover .icon svg path {
  fill: url('#gradientColor');
  transition: all 0.1s ease;
}
</style>
